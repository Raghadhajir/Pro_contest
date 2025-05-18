@include('panel.static.header')
@include('panel.static.main')

<style>
body {
    background-color: #f4f7fb;
    font-family: 'Segoe UI', sans-serif;
    padding: 40px;
    padding-top: 80px;
}

.contest-card {
    background-color: #ffffff;
    border-radius: 16px;
    padding: 25px;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
    margin-bottom: 30px;
    border: none;
    direction: ltr;
}

.btn-add {
    margin-top: 10px;
    float: right;
    background-color: #1d3557;
    border: none;
    font-weight: bold;
    letter-spacing: 1px;
    padding: 10px 20px;
    color: #fff;
}

.btn-add:hover {
    background-color: #16324c;
}

.badge-status {
    padding: 6px 14px;
    border-radius: 16px;
    font-size: 0.85rem;
    font-weight: 500;
}

.status-available {
    background-color: #c6f6d5;
    color: #2f855a;
}

.status-unavailable {
    background-color: #feb2b2;
    color: #c53030;
}

.text-danger {
    color: #d90429 !important;
}

/* تنسيق الكروت */
.team-card {
    background-color: white;
    border-radius: 12px;
    width: 100%;
    box-shadow: 0 6px 12px rgba(75, 111, 255, 0.6);
    padding: 20px;
    margin-bottom: 20px;
    direction: ltr;
}

.team-info {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 20px;
}

.team-column {
    display: flex;
    flex-direction: column;
    flex: 1;
    min-width: 150px;
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
    color: #000;
    font-weight: normal;
}

/* المودال */
.modal {
    display: none;
    position: fixed;
    z-index: 999;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.4);
}

.modal-content {
    background-color: #fff;
    margin: 10% auto;
    padding: 40px;
    border-radius: 16px;
    width: 90%;
    max-width: 500px;
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
    position: relative;
}

.close {
    color: #aaa;
    position: absolute;
    top: 10px;
    right: 20px;
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
}

.close:hover {
    color: #000;
}

.form-control {
    background-color: #e6e6e6;
    border: 2px solid #1c3d5a;
    border-radius: 10px;
    padding: 12px;
    font-size: 16px;
    margin-bottom: 15px;
    width: 100%;
}

.btn-submit {
    background-color: #1c3d5a;
    color: white;
    font-weight: bold;
    padding: 12px 24px;
    border-radius: 10px;
    border: none;
    letter-spacing: 2px;
    display: block;
    margin: 20px auto 0 auto;
    transition: background-color 0.3s;
}

.btn-submit:hover {
    background-color: #00bfa6;
}
</style>

<body>
    <div style=" justify-content: space-between; align-items: center; margin-bottom: 20px;">
        @if (!$contest || $contest->register_availability == 0)
        <button style=" margin-right: 100px" class="btn btn-add" onclick="openModal()">ADD NEW RACE</button>
        @endif
        <h2 style="direction: ltr; padding-right: 970px;">Date of races</h2>

    </div>
    <div class="container">
        <div class="contest-card">
            @if($contest)
            <table class="table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>name</th>
                        <th>Registration</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($contest->date)->format('d M, Y') }}</td>
                        <td>{{ $contest->name }}</td>
                        <td>
                            <span
                                class="badge-status {{ $contest->register_availability ? 'status-available' : 'status-unavailable' }}">
                                {{ $contest->register_availability ? 'available' : 'unavailable' }}
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
            @else
            <p>No contests added yet.</p>
            @endif

        </div>
        <h2 style="direction: ltr; padding-right: 800px;">Participating teams:</h2>

        @forelse($teams as $team)
        <div class="team-card">
            <div class="team-info">
                <div class="team-column">
                    <p><span>Team name</span> {{ $team->name }}</p>
                </div>
                <div class="team-column">
                    <p><span>Coach name</span> {{ $team->users->first()->name ?? 'N/A' }}</p>
                </div>
                <div class="team-column">
                    <p><span>Members</span>
                        @foreach($team->users as $user)
                        {{ $user->name }}@if(!$loop->last), @endif
                        @endforeach
                    </p>
                </div>
                <div class="team-column">
                    <p><span>Created date</span> <span class="date"
                            style="color:gray;">{{ $team->created_at->format('d/m/Y') }}</span></p>
                </div>
            </div>
        </div>
        @empty
        <p>No teams registered.</p>
        @endforelse
    </div>

    <!-- Modal -->
    <div id="raceModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h3>Add new race </h3>
            <form action="{{ route('contests.store') }}" method="POST">
                @csrf
                <input type="text" name="name" class="form-control" placeholder="Race Name" required>
                <input type="date" name="date" class="form-control" placeholder="Date" required>
                <select name="register_availability" class="form-control" required>
                    <option value="" disabled selected>Registration</option>
                    <option value="1">Available</option>
                    <option value="0">Not Available</option>
                </select>
                <button type="submit" class="btn-submit">ADD NOW</button>
            </form>
        </div>
    </div>

    <script>
    function openModal() {
        document.getElementById('raceModal').style.display = 'block';
    }

    function closeModal() {
        document.getElementById('raceModal').style.display = 'none';
    }

    window.onclick = function(event) {
        const modal = document.getElementById('raceModal');
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    </script>
</body>

@include('panel.static.footer')
