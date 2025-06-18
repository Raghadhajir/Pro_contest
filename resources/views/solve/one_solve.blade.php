@include('panel.static.header')
@include('panel.static.main')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Solution Details</title>
    <link href="https://fonts.googleapis.com/css2?family=Segoe+UI:wght@400;600&display=swap" rel="stylesheet">
    <style>
    body {
        font-family: 'Segoe UI', sans-serif;
        background-color: #eef4f9;
        margin: 0;
        padding: 40px;
        direction: ltr;
    }

    .all {
        margin-top: 40px;
        margin-left: 250px;
        margin-right: auto;
        /* direction: ltr; */
    }

    .container {
        max-width: 800px;
        margin: auto;
        background-color: white;
        padding: 40px 30px;
        border-radius: 20px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.05);
    }

    .solve-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 10px;
    }

    .solve-title {
        font-size: 20px;
        font-weight: bold;
        color: #1f2d50;

    }

    .state-title {
        font-size: 16px;
        font-weight: bold;
        color: #1f2d50;
    }

    .status-badge {
        padding: 10px 20px;
        border-radius: 12px;
        font-weight: bold;
        background-color: #f0f3ff;
        color: #375ee0;
        border: 1px solid #d4e1ff;
        display: inline-block;

    }

    .row-info-box {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        flex-wrap: wrap;
        gap: 10px;
        font-size: 14px;
        margin: 20px 0;
        border-bottom: 1px solid #ddd;



        padding-bottom: 20px;
    }

    .info-block {
        flex: 1 1 23%;
        min-width: 120px;
    }

    .label {
        font-weight: 600;
        color: #666;
    }

    .value {
        margin-top: 4px;
        color: #111;
    }

    .download-btn {
        display: inline-block;
        background-color: #1f2d50;
        color: white;
        padding: 6px 14px;
        border-radius: 10px;
        font-size: 12px;
        font-weight: bold;
        text-decoration: none;
        margin-top: 4px;
    }

    .download-section {
        text-align: center;
        margin: 40px 0;
    }

    .download-section .file-upload-label {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 150px;
        height: 150px;
        background-color: #7d9bb3;
        border-radius: 20px;
        cursor: pointer;
        margin: 0 auto 20px auto;
        transition: background-color 0.3s;
    }

    .download-section .file-upload-label:hover {
        background-color: #5c7b97;
    }

    .download-section .file-upload-label img {
        width: 80px;
    }

    .action-buttons {
        display: flex;
        justify-content: space-between;
        margin-top: 30px;
        gap: 10px;
        flex-wrap: wrap;
    }

    .action-buttons form {
        flex: 1 1 30%;
    }

    .action-buttons button {
        width: 100%;
        padding: 12px;
        font-size: 16px;
        font-weight: bold;
        border-radius: 10px;
        border: none;
        color: white;
    }

    .btn-accept {
        background-color: #2ecc71;
    }

    .btn-reject {
        background-color: #e74c3c;
    }

    .btn-process {
        background-color: #3498db;
    }

    @media (max-width: 600px) {
        .row-info-box {
            flex-direction: column;
        }

        .action-buttons form {
            width: 100%;
        }
    }
    </style>
</head>

<body>
    <div class="all">
        <div class="container">
            <div class="solve-header">
                <!-- كلمة SOLVE على اليسار -->
                <div class="solve-title">
                    SOLVE
                </div>

                <!-- كلمة State على اليمين -->
                <div class="state-title">
                    State
                </div>
            </div>
            <!-- التاريخ تحت كلمة SOLVE -->
            <div style="text-align: right; color: #555; font-size: 12px; margin-bottom: 10px;">
                <small>{{ $solve->created_at->format('d/m/Y') }}</small>
            </div>
            <!-- البادج تحت كلمة State وتقليل المسافة بينهما -->
            <div style="text-align:left; font-size: 12px; color: #375ee0; margin-top: -30px;">
                <small>
                    <div class="status-badge"
                        style="padding: 8px 8px; border-radius: 12px; font-weight: bold; background-color: #f0f3ff; color: #375ee0; border: 1px solid #d4e1ff; display: inline-block ; ">
                        @if($solve->status === 'accepted')
                        Completed
                        @elseif($solve->status === 'reject')
                        Rejected
                        @else
                        Processing
                        @endif
                    </div>
                </small>
            </div>
            <div class="row-info-box">
                <div class="info-block">
                    <div class="label">Issue</div>
                    <div class="value">{{ $solve->problem->title }}</div>
                </div>
                <div class="info-block">
                    <div class="label">Race name</div>
                    <div class="value">{{ $solve->user->team->name ?? '-' }}</div>
                </div>
                <div class="info-block">
                    <div class="label">From</div>
                    <div class="value">{{ $solve->user->name }}</div>
                </div>
                <div class="info-block">
                    <div class="label">Download Problem</div>
                    <div class="value">
                        <a href="{{ route('problem.download',  $solve->problem->id) }}" class="download-btn" download>
                            Download
                        </a>
                    </div>
                </div>
            </div>

            <div class="download-section">
                <a href="{{ asset('storage/' . $solve->file) }}" download style="text-decoration: none;">
                    <div class="file-upload-label">
                        <img src="https://cdn-icons-png.flaticon.com/512/724/724933.png" alt="download icon">
                    </div>
                    <div style="font-weight: bold; color: #1c3d5a; margin-top: 10px;">
                        Download Solve Problem
                    </div>
                </a>
            </div>

            <div class="action-buttons">
                <form action="{{ route('solves.updateStatus', $solve) }}" method="POST">
                    @csrf
                    <button name="status" value="reject" class="btn-reject">Rejected</button>
                </form>

                <form action="{{ route('solves.updateStatus', $solve) }}" method="POST">
                    @csrf
                    <button name="status" value="process" class="btn-process">Processing</button>
                </form>

                <form action="{{ route('solves.updateStatus', $solve) }}" method="POST">
                    @csrf
                    <button name="status" value="accepted" class="btn-accept">Completed</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>

@include('panel.static.footer')
