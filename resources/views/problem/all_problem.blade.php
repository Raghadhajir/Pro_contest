@include('panel.static.header')
@include('panel.static.main')



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>All Problems</title>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f6f6;
        padding: 20px;
    }

    .all {
        margin-top: 80px;
        margin-left: 230px;
        margin-right: auto;
        direction: ltr;
    }

    h2 {
        color: #002a5c;
        display: inline-block;
    }

    .add-button {
        float: right;
        background-color: #002a5c;
        color: white;
        padding: 10px 20px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: bold;
        letter-spacing: 1px;
    }

    table {
        width: 100%;
        margin-top: 20px;
        background: white;
        border-collapse: collapse;
        border-radius: 12px;
        overflow: hidden;
        direction: ltr;
    }

    th,
    td {
        padding: 14px 20px;
        text-align: center;
    }

    th {
        background-color: #f4f6f8;
        font-weight: bold;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .solved {
        color: #00bfa6;
        font-weight: bold;
    }

    .download-btn {
        background-color: transparent;
        color: #002a5c;
        border: 2px solid #002a5c;
        padding: 6px 14px;
        border-radius: 20px;
        text-decoration: none;
        font-weight: bold;
        transition: background-color 0.3s, color 0.3s;
    }

    .download-btn:hover {
        background-color: #002a5c;
        color: white;
    }

    .badge {
        padding: 5px 12px;
        font-size: 14px;
        border-radius: 12px;
    }
    </style>
</head>

<body>
    <div class="all">
        <div class="container">
            <h2 style="margin-right: 850px;">All Problems:</h2>
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Problem Title</th>
                        <th>Level</th>
                        <th>Number of Solutions</th>
                        <th>Download File</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($problems as $index => $problem)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $problem->title }}</td>
                        <td>
                            @if($problem->level === 'beginner')
                            <span class="badge badge-success">Beginner</span>
                            @elseif($problem->level === 'medium')
                            <span class="badge badge-warning text-white">Medium</span>
                            @elseif($problem->level === 'advanced')
                            <span class="badge badge-danger">Advanced</span>
                            @else
                            <span class="badge badge-secondary">N/A</span>
                            @endif
                        </td>
                        <td>{{ $problem->solves_count }}</td>
                        <td>
                            <a href="{{ route('problem.download', $problem->id) }}"
                                class="btn btn-sm btn-outline-dark btn-download">Download</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>

@include('panel.static.footer')