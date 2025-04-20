@include('panel.static.header')
@include('panel.static.main')


<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">

        </div>
        <div class="content-body">
            @if (!$teams)
                <br>
                <h2>There are no teams yet</h2>

            @else


                <table class="table m-0">
                    <thead>
                        <tr>
                            <th>Team name </th>
                            <th>Coach </th>
                            <th>Members </th>
                            <th>Creation date </th>




                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($teams as $team)

                            <tr>
                                <td style="width:100px;">{{$team->name}}</td>

                                <td style="width:100px;">
                                     @foreach($coachs as $coach)
                                        @if($team->id == $coach->team_id)
                                            {{$coach->name}}
                                        @endif
                                    @endforeach
                                </td>

                                <td style="width:100px;">
                                    @foreach($members as $member)
                                        @if($team->id == $member->team_id)
                                            {{$member->name}},
                                        @endif
                                    @endforeach
                                </td>
                                <td style="width:100px;">{{$team->created_at}}</td>

                                <td>
                                <button style="margin-right: 5px;"> <a href="{{route('team_delete', ['id' => $team->id])}}">Hide</a></button>
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
