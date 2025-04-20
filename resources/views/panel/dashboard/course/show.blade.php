@include('panel.static.header')
@include('panel.static.main')


<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">

        </div>
        <div class="content-body">
            @if (!$courses)
                <br>
                <h2>There are no courses yet</h2>

            @else


                <table class="table m-0">
                    <thead>
                        <tr>
                            <th>name </th>
                            <th>user name </th>
                            <th>course date </th>
                            <th>postponed date </th>




                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($courses as $course)

                            <tr>
                                <td style="width:100px;">{{$course->name;}}</td>
                                <td style="width:100px;">{{$course->user->name}}</td>
                                <td style="width:100px;">{{$course->course_date}}</td>
                                <td style="width:100px;">{{$course->postponed_date}}</td>

                                <td>
                                <button style="margin-right: 5px;"> <a href="{{route('course_delete', ['id' => $course->id])}}">Hide</a></button>
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
