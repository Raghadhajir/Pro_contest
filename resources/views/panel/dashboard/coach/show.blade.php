@include('panel.static.header')
@include('panel.static.main')


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f0fafa;
      padding: 20px;
    }
    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 40px;
    }

    .header h2 {
      color: #1f3c7d;
      margin: 0;
    }

    .add-button {
      background-color: #1f3c7d;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 8px;
      font-size: 14px;
      cursor: pointer;
      letter-spacing: 1px;
    }
    .all {
    margin-right: 500px;
    margin-left: 500px;
    margin-top: 100px;
    }
    h2 {
      color:rgb(2, 66, 130);
    }
    .container {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      /* margin: 100px; */
    }
    .card {
      background: white;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(75, 111, 255, 0.6);
      width: 200px;
      padding: 15px;
      text-align: center;
    }
    .card img {
      width: 100%;
      height: 150px;
      object-fit: cover;
      border-radius: 10px;
    }
    .name {
      font-size: 18px;
      font-weight: bold;
      margin: 10px 0 5px;
    }
    .info {
      font-size: 14px;
      color: #555;
      margin: 5px 0;
    }
    .score {
      font-weight: bold;
      color: red;
      margin-top: 10px;
    }
  </style>
</head>
<body>


<div class="all">
    <div class="header">
        <h2>Coaches</h2>
        <button class="add-button">ADD NEW COACH</button>
    </div>
    <h2>Coachs:</h2>

        <div class="container">
            @foreach ($coachs as $coach)


                <div class="card">
                    <img src="{{ asset($coach->image) }}" style="width: 70px; height: 70px;" alt="img">
                    <div class="name">{{ $coach->name }}</div>
                    <div class="info">Email: {{$coach->email}}</div>
                    <div class="info">Mobile: {{$coach->phone}}</div>
                    <div class="info">BirthDate: {{$coach->birthday}}</div>
                    <div class="info">College: {{$coach->college}}</div>
                    <div class="info">Team: {{$coach->team->name}}</div>
                    <!-- <div class="score">Score: {{$coach->score}}</div> -->
                </div>
            @endforeach

        </div>


</div>
@include('panel.static.footer')


</body>
</html>
