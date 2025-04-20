@include('panel.static.header')
@include('panel.static.main')


<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">

        </div>
        <div class="content-body">

            <style>
                body {}

                .container {
                    font-family: Arial, sans-serif;
                    margin-top: 100px;
                    padding: 0;
                    height: fit-content;
                    width: 300px;
                    padding: 20px;
                    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                }

                input[type="text"] {
                    width: 100%;
                    margin-bottom: 15px;
                    margin-top: 10px;
                    box-sizing: border-box;
                    font-size: 2.2rem;
                }

                input[type="submit"] {
                    max-width: max-content;
                    margin-top: 20px;
                    margin-inline: auto;
                    font-size: var(--fs-9);
                    font-weight: var(--fw-500);
                    text-transform: uppercase;
                    border: 1px solid #5C4B99;
                    padding: 8px 20px;
                    transition: var(--transition);
                    background: hsl(0, 0%, 91%);
                }
            </style>
            <div class="container">
                <form method="post" action="{{route('course_add')}}">
                @csrf

                    <label for="name">course name :</label>
                    <input type="text" id="name" name="name">
                    @error('name')
                        <p style="color:red">*{{ $message }}</p>
                    @enderror

                    user name :
                    <br>
                    <select name="username">
                        @foreach ($students as $student)

                            <option value="{{$student->id}}">
                                {{$student->name}}
                            </option>
                        @endforeach
                    </select>
                    <br><br>

                    <label for="course_date">course date :</label>
                    <br>

                    <input type="date" id="course_date" name="course_date">
                    @error('course_date')
                        <p style="color:red">*{{ $message }}</p>
                    @enderror
                    <br><br>

                    <label for="postponed_date">postponed date :</label>
                    <br>

                    <input type="date" id="postponed_date" name="postponed_date">
                    @error('postponed_date')
                        <p style="color:red">*{{ $message }}</p>
                    @enderror
                    <br><br>

                    <input type="submit" value="add">
            </div>
        </div>
    </div>
</div>

@include('panel.static.footer')

</body>

</html>
