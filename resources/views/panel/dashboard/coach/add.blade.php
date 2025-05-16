@include('panel.static.header')
@include('panel.static.main')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>New Coach</title>
  <style>
    .add_coach {
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
    .co_info {
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
      appearance: none; /* لإزالة السهم الافتراضي ببعض المتصفحات */
    /* } */

    select:invalid {
      color: #999; /* لتغيير لون placeholder */
    } */

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

<div class="add_coach">
  <div class="form-container">
    <h2>New coach</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>* {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('coach_add') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="photo-upload">
        <label for="photo-upload-input">
          <img src="https://cdn-icons-png.flaticon.com/512/847/847969.png" alt="Upload Icon" style="cursor: pointer;">
          <p style="cursor: pointer;">upload photo</p>
        </label>
        <input type="file" id="photo-upload-input" style="display: none;" name="image">
        @error('image')
            <p style="color:red">*{{ $message }}</p>
        @enderror
      </div>

      <div class="form-grid">
        <input type="text" placeholder="Name" name="name" class="co_info">
        @error('name')
            <p style="color:red">*{{ $message }}</p>
        @enderror

        <input type="email" placeholder="Email" name="email" class="co_info">
        @error('email')
            <p style="color:red">*{{ $message }}</p>
        @enderror

        <input type="password" placeholder="Password" name="password" class="co_info">
        @error('password')
            <p style="color:red">*{{ $message }}</p>
        @enderror

        <input type="tel" placeholder="Mobile Phone" name="phone" class="co_info">
        @error('phone')
            <p style="color:red">*{{ $message }}</p>
        @enderror

        <input type="date" placeholder="Birth Date" name="birthday" class="co_info">
        @error('birthday')
            <p style="color:red">*{{ $message }}</p>
        @enderror

        <input type="text" placeholder="College" name="college" class="co_info">
        @error('college')
            <p style="color:red">*{{ $message }}</p>
        @enderror


        <!-- <select name="team_id" id="team_id" >
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


