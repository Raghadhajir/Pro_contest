@include('panel.static.header')
@include('panel.static.main')
<div class="problem-form-wrapper">
    <style>
    .problem-form-wrapper {
        background-color: #f6f8fa;
        font-family: Arial, sans-serif;
        display: flex;
        justify-content: center;
        align-items: flex-start;
        padding-top: 50px;
        min-height: 100vh;
    }

    .problem-form-wrapper .form-container {
        background-color: #fff;
        padding: 40px;
        border-radius: 16px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 500px;
    }

    .problem-form-wrapper h3 {
        text-align: left;
        font-weight: bold;
        margin-bottom: 30px;
    }

    .problem-form-wrapper .form-group label {
        font-weight: bold;
        margin-bottom: 8px;
    }

    .problem-form-wrapper .form-control {
        background-color: #e6e6e6;
        border: 2px solid #1c3d5a;
        border-radius: 10px;
        padding: 12px;
        font-size: 16px;
    }

    .problem-form-wrapper textarea.form-control {
        resize: vertical;
    }

    .problem-form-wrapper .custom-file-input {
        display: none;
    }

    .problem-form-wrapper .file-upload-label {
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

    .problem-form-wrapper .file-upload-label:hover {
        background-color: #5c7b97;
    }

    .problem-form-wrapper .file-upload-label img {
        width: 80px;
    }

    .problem-form-wrapper .btn-submit {
        background-color: #1c3d5a;
        color: white;
        font-weight: bold;
        padding: 12px;
        width: 100%;
        border-radius: 10px;
        border: none;
        letter-spacing: 2px;
        transition: background-color 0.3s;
    }

    .problem-form-wrapper .btn-submit:hover {
        background-color: #00bfa6;
    }
    </style>

    <div class="form-container">
        <h3>:Add new problem </h3>

        @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Error!</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('store_problem') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <input type="text" name="title" class="form-control" placeholder="Problem name" required>
            </div>

            <div class="form-group">
                <textarea name="description" class="form-control" rows="3" placeholder="Problem description"
                    required></textarea>
            </div>
            <div class="form-group">
                <select name="level" class="form-control" required>
                    <option value="beginner" selected>Beginner</option>
                    <option value="medium">Medium</option>
                    <option value="advanced">Advanced</option>
                </select>
            </div>
            <div class="form-group">
                <label>Problem file</label>
                <label for="file-upload" class="file-upload-label">
                    <img src="https://cdn-icons-png.flaticon.com/512/724/724933.png" alt="upload icon">
                </label>
                <input id="file-upload" type="file" name="file" class="custom-file-input" required>
            </div>



            <button type="submit" class="btn-submit">ADD NOW</button>
        </form>
    </div>
</div>
@include('panel.static.footer')
