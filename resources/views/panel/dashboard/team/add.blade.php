
@include('panel.static.header')
@include('panel.static.main')

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row"></div>
        <div class="content-body">

            <style>
                .form-container {
                    font-family: Arial, sans-serif;
                    margin: 100px auto;
                    padding: 20px;
                    width: 400px;
                    box-shadow: 0 2px 8px rgb(63, 91, 204);
                    background-color: #fff;
                    border-radius: 10px;
                }

                .form-container label {
                    font-weight: bold;
                    display: block;
                    margin-top: 15px;
                }

                .form-container input[type="text"],
                .form-container select {
                    width: 100%;
                    padding: 10px;
                    margin-top: 5px;
                    margin-bottom: 15px;
                    font-size: 1.1rem;
                    border: 1px solid #ccc;
                    border-radius: 5px;
                }

                .form-container input[type="submit"] {
                    display: block;
                    width: 100%;
                    padding: 10px;
                    font-size: 1.1rem;
                    font-weight: bold;
                    color: #fff;
                    background-color: #1b3a5d;
                    border: none;
                    border-radius: 5px;
                    cursor: pointer;
                    transition: background-color 0.3s ease;
                    text-transform: uppercase;
                }

                .form-container input[type="submit"]:hover {
                    background-color: #16304b;
                }

                .form-container p {
                    color: red;
                    margin-top: -10px;
                    margin-bottom: 10px;
                }
            </style>

            <div class="form-container">
                <form method="post" action="{{ route('team_add') }}">
                    @csrf

                    <label for="tname">Team Name:</label>
                    <input type="text" id="tname" name="name" placeholder="Enter team name">
                    @error('name')
                        <p>*{{ $message }}</p>
                    @enderror

                    <label for="contest">Contest:</label>
                    <select name="contest_id" id="contest">
                        @foreach ($contests as $contest)
                            <option value="{{ $contest->id }}">{{ $contest->name }}</option>
                        @endforeach
                    </select>

                    <input type="submit" value="Add">
                </form>
            </div>

        </div>
    </div>
</div>

@include('panel.static.footer')
</body>
</html>

