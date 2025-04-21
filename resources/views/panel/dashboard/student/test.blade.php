@include('panel.static.header')
@include('panel.static.main')


<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">

        </div>
        <div class="content-body">
            @if (!$students)
                <br>
                <h2>There are no students yet</h2>
            @else
                <table class="table m-0">
                    <thead>
                        <tr>
                            <th>name</th>
                            <th>email</th>
                            <th>phone</th>
                            <th>Birthday</th>
                            <th>college</th>
                            <th>score</th>
                            <th>image</th>
                            <th>team</th>
                            <th>courses</th>
                        </tr>
                    </thead>
                    <tbody>


                        @foreach ($students as $student)
                            <tr>
                                <td style="width:100px;">{{$student->name}}</td>
                                <td style="width:100px;">{{$student->email}}</td>
                                <td style="width:100px;">{{$student->phone}}</td>
                                <td style="width:100px;">{{$student->birthday}}</td>
                                <td style="width:100px;">{{$student->college}}</td>
                                <td style="width:100px;">{{$student->score}}</td>
                                <td style="width:100px;">
                                    <img src="{{ asset($student->image) }}" style="width: 70px; height: 70px;" alt="img">
                                </td>
                                <td style="width:100px;">{{$student->team->name}}</td>
                                <td style="width:100px;">
                                    @foreach($courses as $course)
                                        @if($student->id == $course->user_id)
                                            {{$course->name}},
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                <button style="margin-right: 5px;"> <a href="{{route('student_edit', ['id' => $student->id])}}">Edit</a></button>
                                <button style="margin-right: 5px;"> <a href="{{route('student_delete', ['id' => $student->id])}}">Hide</a></button>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <br><br><br>
            @endif
        </div>
    </div>
</div>

@include('panel.static.footer')

</body>

</html>
