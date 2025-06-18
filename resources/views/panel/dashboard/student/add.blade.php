@include('panel.static.header')
@include('panel.static.main')


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>New Student</title>


    <style>
    .add_student {
        font-family: Arial, sans-serif;
        background-color: #f1f7f7;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .form-container {
        background-color: white;
        padding: 30px 40px;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgb(63, 91, 204);
        text-align: center;
    }

    .form-container h2 {
        color: #1b3a5d;
        margin-bottom: 20px;
    }

    .photo-upload {
        margin-bottom: 20px;
    }

    .photo-upload img {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background-color: #1b3a5d;
        padding: 10px;
    }

    .photo-upload p {
        margin-top: 10px;
        font-size: 14px;
        color: #1b3a5d;
    }

    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
        margin-bottom: 20px;
    }

    /* input[type="text"], input[type="email"], input[type="password"], input[type="tel"] {
      padding: 10px;
      border: none;
      border-radius: 5px;
      box-shadow: 2px 2px 5px rgb(63, 91, 204);
      font-size: 14px;
    }

    select {
      padding: 10px;
      border: none;
      border-radius: 5px;
      box-shadow: 2px 2px 5px rgb(63, 91, 204);
      font-size: 14px;
      width: 100%;
      background-color: white;
      color: #555;
      appearance: none;
    } */

    .std_info {
        padding: 10px;
        border: none;
        border-radius: 5px;
        box-shadow: 2px 2px 5px rgb(63, 91, 204);
        font-size: 14px;
        width: 100%;
        background-color: white;
        color: #555;
        appearance: none;
    }


    select:invalid {
        color: #999;
    }

    button {
        padding: 10px 30px;
        background-color: #1b3a5d;
        color: white;
        border: none;
        border-radius: 6px;
        font-size: 16px;
        cursor: pointer;
    }

    button:hover {
        background-color: #16304b;
    }
    </style>
</head>

<div class="add_student">
    <div class="form-container">
        <h2>New Student</h2>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>* {{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('student_add') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="photo-upload">
                <label for="photo-upload-input">
                    <img src="https://cdn-icons-png.flaticon.com/512/847/847969.png" alt="Upload Icon"
                        style="cursor: pointer;">
                    <p style="cursor: pointer;">upload photo</p>
                </label>
                <input type="file" id="photo-upload-input" style="display: none;" name="image">
                @error('image')
                <p style="color:red">*{{ $message }}</p>
                @enderror
            </div>

            <div class="form-grid" style="direction: ltr;">
                <input type="text" placeholder="Name" name="name" class="std_info">
                @error('name')
                <p style="color:red">*{{ $message }}</p>
                @enderror

                <input type="email" placeholder="Email" name="email" class="std_info">
                @error('email')
                <p style="color:red">*{{ $message }}</p>
                @enderror

                <input type="password" placeholder="Password" name="password" class="std_info">
                @error('password')
                <p style="color:red">*{{ $message }}</p>
                @enderror

                <input type="tel" placeholder="Mobile Phone" name="phone" class="std_info">
                @error('phone')
                <p style="color:red">*{{ $message }}</p>
                @enderror

                <input type="date" placeholder="Birth Date" name="birthday" class="std_info">
                @error('birthday')
                <p style="color:red">*{{ $message }}</p>
                @enderror

                <input type="text" placeholder="College" name="college" class="std_info">
                @error('college')
                <p style="color:red">*{{ $message }}</p>
                @enderror


                <input type="text" placeholder="Score" name="score" class="std_info">
                @error('score')
                <p style="color:red">*{{ $message }}</p>
                @enderror

                <!-- <select name="team_id" id="team_id" class="std_info">
            <option value="" disabled selected hidden>-- Select Team --</option>
                @foreach ($teams as $team)
                    <option value="{{ $team->id }}">{{ $team->name }}</option>
                @endforeach
        </select>
        @error('team_id')
            <p style="color:red">*{{ $message }}</p>
        @enderror -->
            </div>

            <button type="submit">Add now</button>
        </form>
    </div>
</div>

</html>

@include('panel.static.footer')