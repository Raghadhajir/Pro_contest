<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Traits\GeneralTrait;
use App\Models\Contest;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;



class TeamController extends Controller
{
    use GeneralTrait;
    public function AddTeam(Request $request)
    {
        DB::beginTransaction(); // بدء المعاملة (Transaction)

        try {
            $validate = Validator::make($request->all(), [
                'team.name' => 'required|string|unique:teams,name',
                'team.coach_id' => [
                    'required',
                    Rule::exists('users', 'uuid')->where(function ($query) {
                        $query->where('is_coach', 1);
                    }),
                ],
                'team.contest_id' => 'required|exists:contests,uuid',
                'team.members' => 'required|array|min:1|max:3',
                'team.members.*.id' => 'required|exists:users,uuid',
            ]);

            if ($validate->fails()) {
                throw new \Exception($validate->errors()->first());
            }

            // استخراج البيانات من الـ request
            $data = $request->input('team');
            $contestId = Contest::where('uuid', $data['contest_id'])->value('id');
            $coachId = User::where('uuid', $data['coach_id'])->value('id');
            // إضافة الفريق
            $addteam = Team::create([
                'name' => $data['name'],
                'contest_id' => $contestId,
                'user_id' => $coachId,
            ]);

            if (!$addteam) {
                throw new \Exception('Failed to create the team');
            }

            // إضافة الأعضاء للفريق
            foreach ($data['members'] as $member) {
                $user = User::where('uuid', $member['id'])->where('is_coach', 0)->first();
                // dd($user->name);

                if (!$user) {
                    throw new \Exception("The member '{$member['id']}' does not exist.");
                }

                // تحقق إذا العضو بالفعل موجود في فريق آخر
                if ($user->team_id) {
                    throw new \Exception("The member '{$user->name}' is already assigned to a team.");
                }

                // تحديث العضو ليكون جزء من الفريق الجديد
                $user->update([
                    'team_id' => $addteam->id,
                ]);
            }

            // إذا كل شيء تمام، نعمل commit
            DB::commit();

            // إرسال الاستجابة بنجاح
            return $this->apiResponse(null, false, 'Team added successfully', 200);

        } catch (\Exception $e) {
            // في حالة الخطأ، نرجع rollback للـ transaction
            DB::rollBack();

            // إرسال الاستجابة بالخطأ
            return $this->apiResponse(null, false, $e->getMessage(), 400);
        }
}

}
