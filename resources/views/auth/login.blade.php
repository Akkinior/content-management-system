

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log In | Portal</title>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f0f4f8;
        }

        .split-container {
            display: flex;
            width: 90vw;
            height: 90vh;
            max-width: 1200px;
            background-color: #fff;
            box-shadow: 0 4px 20px rgba(0,0,0,0.15);
        }

        .image-panel {
            flex: 0 0 60%;
            background: url('/path/to/your/image.jpg') center/cover no-repeat;
        }

        .form-panel {
            flex: 0 0 40%;
            padding: 3rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-header h1 {
            margin-bottom: 1.5rem;
            color: #333333;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: #555555;
        }

        .form-group input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #cccccc;
            border-radius: 4px;
        }

        .form-actions {
            text-align: right;
        }

        .btn-primary {
            background-color: #007bff;
            color: #ffffff;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .error-list {
            background-color: #ffe6e6;
            border-left: 4px solid #ff0000;
            padding: 1rem;
            margin-bottom: 1.5rem;
        }

        .error-list ul {
            list-style-type: none;
            padding-left: 0;
        }

        .error-list li {
            color: #ff0000;
        }

        .form-header h1 {
            margin-bottom: 1.5rem;
            color: #333333;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: #555555;
        }

        .form-group input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #cccccc;
            border-radius: 4px;
        }

        .form-actions {
            text-align: right;
        }

        .btn-primary {
            background-color: #007bff;
            color: #ffffff;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .error-list {
            background-color: #ffe6e6;
            border-left: 4px solid #ff0000;
            padding: 1rem;
            margin-bottom: 1.5rem;
        }

        .error-list ul {
            list-style-type: none;
            padding-left: 0;
        }

        .error-list li {
            color: #ff0000;
        }
    </style>
</head>
<body>
    <div class="split-container">
        <div class="image-panel">
            <!-- optional content or leave blank for pure background image -->
        </div>
        <div class="form-panel">
            <div class="form-header">
                <h1>Login to Your Account</h1>
            </div>

            @if($errors->any())
                <div class="error-list">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('login.post') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        value="{{ old('email') }}"
                        placeholder="Enter your email"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        placeholder="Enter your password"
                        required
                    >
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>