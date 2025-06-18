@include('panel.static.header')
@include('panel.static.main')

<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <title>لوحة الإحصائيات</title>

    <style>
    body {
        margin: 0;
        padding: 2.5rem 1rem 1rem;
        background-color: #f3f4f6;
        /* bg-gray-100 */
        font-family: 'Arial', sans-serif;
        box-sizing: border-box;
    }

    .cards-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 4rem;
        padding: 2.25rem;
        margin-top: 1rem;
        margin-bottom: 2.5rem;
    }

    .card {
        width: 120px;
        padding: 0.25rem;
        background-color: #fff;
        border-radius: 0.375rem;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        text-align: center;
        font-size: 9px;
    }

    .card.bg-yellow {
        background-color: #fef9c3;
    }

    .card.bg-indigo {
        background-color: #c7d2fe;
    }

    .card.bg-rose {
        background-color: #fecdd3;
    }

    .card.bg-cyan {
        background-color: #cffafe;
    }

    .card-icon {
        font-size: 20px;
        margin-bottom: 4px;
    }

    .card-title {
        color: #4b5563;
        margin-bottom: 2px;
        line-height: 1;
        font-size: 13px !important;
        white-space: nowrap;


    }

    .card-number {
        font-weight: bold;
        font-size: 20px;
        margin-top: 2px;
        /* white-space: nowrap; */
    }

    .charts-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 0.5rem;
        position: relative;
        top: -4.5rem;

    }

    .chart-row {
        display: flex;
        align-items: flex-start;
        justify-content: flex-end;
        gap: 0.5rem;
        width: 100%;
        max-width: 550px;

    }

    .chart-box {
        background-color: white;
        border: 2px solid #1e3a8a;
        border-radius: 0.375rem;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 520px;
        padding: 0.5rem;
        height: 500%;
        max-height: 500px;
        box-sizing: border-box;
    }

    .student-row {
        display: flex;
        flex-direction: row-reverse;
        align-items: center;
        gap: 0.25rem;
        margin-bottom: 0.25rem;
    }

    .student-index {
        width: 24px;
        text-align: center;
        font-size: 18px;
        font-weight: bold;
        color: #1e3a8a;
    }

    .student-info {
        width: 100%;
    }

    .student-info-header {
        display: flex;
        justify-content: space-between;
        font-size: 8px;
        margin-bottom: 2px;
    }

    .student-score {
        font-size: 12px;
        font-weight: bold;
        color: #f97316;
    }

    .student-name {
        font-size: 12px;
        color: #374151;
    }

    .progress-bar-container {
        width: 100%;
        background-color: white;
        height: 12px;
        border-radius: 9999px;
        overflow: hidden;
        text-align: right;
    }

    .progress-bar {
        height: 12px;
        border-radius: 9999px;
        float: left;
    }

    .color-1 {
        background-color: #b9f6f4;
    }

    .color-2 {
        background-color: #c7d6ff;
    }

    .color-3 {
        background-color: #ffd6e8;
    }

    .chart-label {
        width: 60px;
        font-size: 20px;
        font-weight: bold;
        color: #1e3a8a;
        padding-top: 0.25rem;
        text-align: left;
    }
    </style>
</head>

<body>
    <!-- الكروت -->
    <div class="cards-container">
        <div class="card bg-yellow">
            <div class="card-icon">👤</div>
            <div class="card-title">Total Students</div>
            <div class="card-number">{{ $totalStudents }}</div>
        </div>
        <div class="card bg-indigo">
            <div class="card-icon">👥</div>
            <div class="card-title">Total Teams</div>
            <div class="card-number">{{ $totalTeams }}</div>
        </div>
        <div class="card bg-rose">
            <div class="card-icon">🧩</div>
            <div class="card-title">Solved Problems</div>
            <div class="card-number">{{ $solvedProblems }}</div>
        </div>
        <div class="card bg-cyan">
            <div class="card-icon">⏱️</div>
            <div class="card-title">Total Problems</div>
            <div class="card-number">{{ $totalProblems }}</div>
        </div>
    </div>

    <!-- المخططات -->
    <div class="charts-container">
        @foreach ([['Beginner', $students_0_20, 0], ['Medium', $students_20_40, 20], ['Advanced', $students_40_60, 40]]
        as [$label, $group, $min])
        <div class="chart-row">
            <div class="chart-box">
                @foreach ($group as $index => $student)
                @php
                $colors = ['color-1', 'color-2', 'color-3'];
                $colorClass = $colors[$index] ?? 'color-1';
                $width = (($student->score - $min) / 20) * 100;
                @endphp
                <div class="student-row">
                    <div class="student-index">{{ sprintf('%02d', $index + 1) }}</div>
                    <div class="student-info">
                        <div class="student-info-header">
                            <span class="student-score">{{ $student->score }}</span>
                            <span class="student-name">{{ $student->name }}</span>
                        </div>
                        <div class="progress-bar-container">
                            <div class="progress-bar {{ $colorClass }}" style="width: {{ $width }}%;"></div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="chart-label">{{ $label }}</div>
        </div>
        @endforeach
    </div>

</body>

</html>

@include('panel.static.footer')
