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

    .form-container {
        background-color: #fff;
        padding: 50px;
        border-radius: 16px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 500px;
    }

    .form-container h3 {
        text-align: left;
        font-weight: bold;
        margin-bottom: 30px;
    }

    .form-control {
        background-color: #e6e6e6;
        border: 2px solid #1c3d5a;
        border-radius: 10px;
        padding: 12px;
        font-size: 16px;
        font-family: Arial, sans-serif;
        margin-bottom: 15px;
        width: 100%;
        max-width: 500px;
        height: 100%;
        max-height: 600;

    }

    .btn-submit {
        background-color: #1c3d5a;
        color: white;
        font-weight: bold;
        padding: 12px 24px;
        border-radius: 10px;
        border: none;
        letter-spacing: 2px;
        transition: background-color 0.3s;
        display: block;
        margin: 20px auto 0 auto;
        /* وسّط الزر */
    }

    .btn-submit:hover {
        background-color: #00bfa6;
    }
    </style>

    <div class="form-container">
        <h3>Add new contest </h3>

        <form action="{{ route('contests.store') }}" method="POST">
            @csrf

            <input type="text" name="name" class="form-control" placeholder="Race Name" value="{{ old('name') }}"
                required>

            <input type="date" name="date" class="form-control" placeholder="Date" value="{{ old('date') }}" required>

            <select name="register_availability" class="form-control" required>
                <option value="" disabled selected>Registration</option>
                <option value="1" {{ old('register_availability') == '1' ? 'selected' : '' }}>Available</option>
                <option value="0" {{ old('register_availability') == '0' ? 'selected' : '' }}>Not Available</option>
            </select>

            <button type="submit" class="btn-submit">ADD NOW</button>
        </form>
    </div>
</div>

@include('panel.static.footer')