<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Teams</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f1f9f9;
      padding: 20px;
    }

    h2 {
      color: #002a5c;
    }

    .team-card {
      background-color: white;
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      padding: 20px;
      margin-bottom: 20px;
      width: 500px;
    }

    .team-card span {
      color: #f55b5b;
      font-weight: bold;
      font-size: 14px;
    }

    .team-card p {
      margin: 5px 0;
    }

    .team-section {
      color: #003366;
      font-weight: bold;
      margin-top: 10px;
    }
  </style>
</head>
<body>

  <h2>Teams:</h2>

    @foreach ($teams as $team)

        <div class="team-card">
            <p><span>Team name</span>: {{$team->name}}</p>
            <p><span>Coach name</span>:
                @foreach($coachs as $coach)
                    @if($team->id == $coach->team_id)
                        {{$coach->name}}
                    @endif
                @endforeach
            </p>
            <p><span>Members</span>:<br>
                @foreach($members as $member)
                    @if($team->id == $member->team_id)
                        {{$member->name}}<br>
                    @endif
                @endforeach
            </p>
            <p><span>Creation date</span>: {{$team->created_at}}</p>
        </div>
    @endforeach



</body>
</html>
