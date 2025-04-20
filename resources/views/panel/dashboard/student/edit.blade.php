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

                input[type="text"],
                input[type="email"],
                input[type="password"],
                 select {
                    width: 100%;
                    margin-bottom: 15px;
                    margin-top: 10px;
                    box-sizing: border-box;
                    font-size: 1.2rem;
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
                <form method="post" action="{{route('student_edit',['id'=>$student->id])}}" enctype="multipart/form-data">
                    @csrf
                    <label for="name">name :</label>
                    <input type="text" id="name" name="name" value="{{ $student->name }}">
                    @error('name')
                        <p style="color:red">*{{ $message }}</p>
                    @enderror

                    <label for="email">email :</label>
                    <input type="email" id="email" name="email" value="{{ $student->email }}">
                    @error('email')
                        <p style="color:red">*{{ $message }}</p>
                    @enderror


                    <label for="pass">password :</label>
                    <input type="password" id="pass" name="password" value="{{ $student->password }}">
                    @error('password')
                        <p style="color:red">*{{ $message }}</p>
                    @enderror


                    <label for="phone">phone :</label>
                    <input type="text" id="phone" name="phone" value="{{ $student->phone }}">
                    @error('phone')
                        <p style="color:red">*{{ $message }}</p>
                    @enderror


                    <label for="birthday">birthday :</label>
                    <input type="date" id="birthday" name="birthday" value="{{ $student->birthday }}">
                    @error('birthday')
                        <p style="color:red">*{{ $message }}</p>
                    @enderror


                    <label for="college">college :</label>
                    <input type="text" id="college" name="college" value="{{ $student->college }}">
                    @error('college')
                        <p style="color:red">*{{ $message }}</p>
                    @enderror


                    <label for="is_coach">is_coach :</label>
                    <input type="text" id="is_coach" name="is_coach" value="{{ $student->is_coach }}">
                    @error('is_coach')
                        <p style="color:red">*{{ $message }}</p>
                    @enderror


                    <label for="score">score :</label>
                    <input type="text" id="score" name="score" value="{{ $student->score }}">
                    @error('score')
                        <p style="color:red">*{{ $message }}</p>
                    @enderror


                    <label for="image"> Upload image :</label>
                    <input type="file" id="image" name="image" class="form-control" >
                    @error('image')
                        <p style="color:red">*{{ $message }}</p>
                    @enderror


                    team :
                    <select name="team_id" >
                        @foreach ($teams as $team)

                            <option value="{{$team->id}}">
                                {{$team->name}}
                            </option>
                        @endforeach
                    </select>
                    <br><br>


                    <input type="hidden" name="type" value="student">


                    <input type="submit" value="edit">
            </div>
        </div>
    </div>
</div>

@include('panel.static.footer')

</body>

</html>
