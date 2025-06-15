@include('panel.static.header')
@include('panel.static.main')


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Students</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Inter', sans-serif;
      background-color: #f1f7f9;
      margin: 0;
      padding: 2rem;
    }
    .all {
        margin-top: 100px;
        margin-left: 200px;
        margin-right: auto;
        direction: ltr;

    }

    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 2rem;
      max-width: 900px;
      margin-left: auto;
      margin-right: auto;
    }

    .header h2 {
      color: #004080;
      margin: 0;
    }

    .add-button {
      background-color: #007bff;
      color: white;
      padding: 10px 15px;
      border: none;
      border-radius: 5px;
      font-size: 14px;
      cursor: pointer;
      text-decoration: none;
    }

    .students-container {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
      gap: 1.5rem;
      max-width: 900px;
      margin: 0 auto;
    }

    .student-card {
      background-color: white;
      border-radius: 12px;
      box-shadow: 0 4px 8px rgb(21, 65, 243);
      padding: 1rem;
      text-align: center;
    }

    .student-card img {
      width: 100%;
      border-radius: 12px;
      height: 180px;
      object-fit: cover;
    }

    .student-card h3 {
      margin: 10px 0 5px;
      font-size: 18px;
    }

    .student-info {
      font-size: 14px;
      color: #555;
      margin-bottom: 5px;
    }

    .score {
      font-weight: bold;
      color: #d00;
      margin-top: 10px;
      font-size: 16px;
    }

    .card-actions {
      display: flex;
      justify-content: center;
      gap: 15px;
      margin-top: 10px;
    }

    .card-actions i {
      cursor: pointer;
      font-size: 16px;
      color: #555;
    }

    .card-actions i:hover {
      color: #000;
    }
  </style>
</head>
<body>

<div class="all">
    <div class="header">
        <h2>Students:</h2>
        <a href={{ route('student_add') }} class="add-button">Add New Student</a>
    </div>

    <div class="students-container">
        @foreach ($students as $student)
            <div class="student-card">
                <img src="{{ asset($student->image) }}" alt="img">
                <h3>{{ $student->name }}</h3>
                <div class="student-info">Email: {{$student->email}}</div>
                <div class="student-info">Mobile: {{$student->phone}}</div>
                <div class="student-info">BirthDate: {{$student->birthday}}</div>
                <div class="student-info">College: {{$student->college}}</div>
                <div class="student-info">Team: {{$student->team?->name}}</div>
                <div class="score">Score: {{$student->score}}</div>
                <div class="card-actions">
                <a href={{route('student_edit', ['id' => $student->id])}}><i class="fas fa-edit"></i></a>
                <a href={{route('student_delete', ['id' => $student->id])}}><i class="fas fa-trash-alt"></i></a>
                </div>
            </div>
        @endforeach
    </div>
</div>



  </div>

</body>
</html>
@include('panel.static.footer')

