@include('panel.static.header')
@include('panel.static.main')

<style>
    body {
        /* font-family: Arial, sans-serif;
        background-color: #f1f9f9; */
        display: flex;
        /* min-height: 100vh; */
    }
    .all {
        margin: 100px;
    }
    .content {
        padding: 30px;
    }

    .content h2 {
        color: #002a5c;
        /* margin-bottom: 20px; */
    }

    .team-card {
        background-color: white;
        border-radius: 12px;
        width: 1000px;
        box-shadow: 0 6px 12px rgba(75, 111, 255, 0.6);        padding: 20px;
        margin-bottom: 20px;
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
    }

    .team-info {
        display: flex;
        gap: 200px;
        flex: 1;
    }

    .team-column {
        display: flex;
        flex-direction: column;
    }

    .team-column p {
        margin: 6px 0;
        font-size: 14px;
    }

    .team-column span {
        color: #f55b5b;
        font-weight: bold;
        display: block;

    }

    .date {
        font-weight: bold;
        color: #003366;
        margin-top: 6px;
    }

  </style>

<div class="all">
    <div class="content">
        <h2>Teams:</h2>

        @foreach ($teams as $team)
            <div class="team-card">
                <div class="team-info">
                    <div class="team-column">
                        <p><span>Team name</span> {{ $team->name }}</p>
                    </div>
                    <div class="team-column">
                        <p><span>Coach name</span>
                            @foreach($coachs as $coach)
                                @if($coach->team_id == $team->id)
                                    {{ $coach->name }}
                                @endif
                            @endforeach
                        </p>
                    </div>
                    <div class="team-column">
                        <p><span>Members</span>
                            @foreach($members as $member)
                                @if($member->team_id == $team->id)
                                    {{ $member->name }}<br>
                                @endif
                            @endforeach
                        </p>
                    </div>
                    <div class="team-column">
                        <p><span>Created date</span> <span class="date">{{ $team->created_at }}</span></p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>


@include('panel.static.footer')

