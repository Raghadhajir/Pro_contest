@include('panel.static.header')
@include('panel.static.main')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <style>
    body {
        background-color: #f4f7fb;
        font-family: 'Segoe UI', sans-serif;
        padding: 40px;
        padding-top: 80px;
    }

    h2 {
        color: #1d3557;
        font-weight: 700;
        margin-bottom: 30px;
        margin-top: 0;
        direction: rtl;
        padding-right: 815px;
    }

    .filter-bar {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
        background-color: #ffffff;
        padding: 15px 20px;
        border-radius: 10px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
        margin-bottom: 25px;
        gap: 15px;
        direction: ltr;
    }

    .filter-bar .form-group {
        margin: 0;
    }

    .filter-bar .form-group label {
        font-weight: 500;
        margin-right: 5px;
    }

    .filter-bar .btn-group {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-right: auto;
    }

    table {
        background-color: #ffffff;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }

    thead {
        background-color: #f1f4f8;
    }

    th,
    td {
        text-align: center;
        vertical-align: middle;
        padding: 16px 12px;
    }

    .badge-status {
        padding: 6px 14px;
        border-radius: 16px;
        font-size: 0.85rem;
        font-weight: 500;
    }

    .status-accepted {
        background-color: #c6f6d5;
        color: #2f855a;
    }

    .status-reject {
        background-color: #feb2b2;
        color: #c53030;
    }

    .status-process {
        background-color: #d6bcfa;
        color: #6b46c1;
    }

    .status-pending {
        background-color: #edf2f7;
        color: #718096;
    }

    td.action-buttons {
        text-align: center !important;
    }

    .action-wrapper {
        display: inline-flex;
        justify-content: center;
        align-items: center;
        background: #f9f9f9;
        border-radius: 12px;
        padding: 6px 12px;
        margin: auto;
    }

    .action-buttons i {
        font-size: 1rem;
        padding: 6px;
        margin: 0 6px;
        cursor: pointer;
        transition: 0.2s ease;
    }

    .action-buttons .edit {
        color: #38a169;
    }

    .action-buttons .delete {
        color: #e53e3e;
    }

    .action-buttons i:hover {
        transform: scale(1.1);
    }

    .fa-filter {
        margin-right: 8px;
        color: #4a5568;
    }

    .badge-level {
        padding: 6px 14px;
        border-radius: 16px;
        font-size: 0.85rem;
        font-weight: 500;
    }

    .level-beginner {
        background-color: #e6fffa;
        color: #319795;
    }

    .level-medium {
        background-color: #fefcbf;
        color: #b7791f;
    }

    .level-advanced {
        background-color: #fed7e2;
        color: #d53f8c;
    }
    </style>
</head>

<body>
    <div class="container">
        <h2>Solved Problems</h2>

        <!-- Filter Bar -->
        <form method="GET" action="{{ route('all_solve') }}" class="filter-bar">
            <div class="d-flex flex-wrap align-items-center justify-content-between w-100" style="gap: 15px;">
                <div class="d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#4a5568" viewBox="0 0 24 24">
                        <path
                            d="M3 4a1 1 0 0 1 .8-.98l16-2A1 1 0 0 1 21 2v2a1 1 0 0 1-.293.707L14 12v8a1 1 0 0 1-2 0v-8l-6.707-7.293A1 1 0 0 1 5 4V2a1 1 0 0 1 .8-.98z" />
                    </svg>
                    <span class="font-weight-semibold" style="margin-left: 8px;">Filter By</span>
                </div>

                <div class="vr"></div>

                <div class="form-group mb-0">
                    <label class="mb-0" style="font-size: 0.9rem;">Date</label>
                    <input type="date" name="date" class="form-control" value="{{ request('date') }}">
                </div>

                <div class="vr"></div>

                <div class="form-group mb-0">
                    <label class="mb-0" style="font-size: 0.9rem;">Status</label>
                    <select name="status" class="form-control">
                        <option value="">All</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="accepted" {{ request('status') == 'accepted' ? 'selected' : '' }}>Accepted
                        </option>
                        <option value="reject" {{ request('status') == 'reject' ? 'selected' : '' }}>Rejected</option>
                        <option value="processing" {{ request('status') == 'processing' ? 'selected' : '' }}>Processing
                        </option>
                    </select>
                </div>

                <div class="vr"></div>

                <div class="btn-group mb-0">
                    <button type="submit" class="btn btn-outline-primary">Apply</button>
                    <a href="{{ route('all_solve') }}" class="btn btn-outline-secondary">Reset</a>
                </div>
            </div>
        </form>

        <!-- Table -->
        <table class="table">
            <thead>
                <tr>
                    <th>Action</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Student Name</th>
                    <th>Level</th>
                    <th>Problem Name</th>
                    <th>ID</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($solves->sortBy('id') as $solve)
                <tr>
                    <td class="action-buttons">
                        <div class="action-wrapper d-flex">
                            <a href="{{ route('one_solve', $solve) }}" class="edit" title="Edit"
                                style="margin-right:5px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#38a169"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M4 21h4l10-10-4-4L4 17v4zM20.7 7.3c.4-.4.4-1 0-1.4l-2.6-2.6a1 1 0 0 0-1.4 0l-1.8 1.8 4 4 1.8-1.8z" />
                                </svg>
                            </a>
                            <p> &nbsp; &nbsp;</p>
                            <form action="{{ route('solves.destroy', $solve) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this item?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="border: none; background: none;" title="Delete">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#e53e3e"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M6 7h12v13a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2V7zm3 3v7h2v-7H9zm4 0v7h2v-7h-2zM15.5 4l-1-1h-5l-1 1H5v2h14V4z" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </td>
                    <td>
                        @php
                        $statusOptions = [
                        'accepted' => 'status-accepted',
                        'reject' => 'status-reject',
                        'process' => 'status-process',
                        'pending' => 'status-pending',
                        ];
                        $statusValue = strtolower($solve->status);
                        $statusClass = $statusOptions[$statusValue] ?? 'status-pending';
                        @endphp
                        <span class="badge-status {{ $statusClass }}">{{ ucfirst($statusValue) }}</span>
                    </td>
                    <td>{{ $solve->created_at->format('d M Y') }}</td>
                    <td>{{ $solve->user->name }}</td>
                    <td>
                        @php
                        $level = $solve->problem->level;
                        $levelClass = match($level) {
                        'beginner' => 'level-beginner',
                        'medium' => 'level-medium',
                        'advanced' => 'level-advanced',
                        default => 'badge-secondary',
                        };
                        @endphp
                        <span class="badge-level {{ $levelClass }}">{{ ucfirst($level) }}</span>
                    </td>
                    <td>{{ $solve->problem->title }}</td>
                    <td>{{ str_pad($solve->id, 5, '0', STR_PAD_LEFT) }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="7">No matching results found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
@include('panel.static.footer')