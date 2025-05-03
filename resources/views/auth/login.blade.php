<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .form-container {
            background-color: white;
            border-radius: 0.5rem;
            padding: 2rem;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        .input-field {
            border-radius: 0.375rem;
            padding: 0.75rem;
            border: 1px solid #e2e8f0;
            width: 100%;
            font-size: 1rem;
            margin-bottom: 1rem;
            box-sizing: border-box;
        }
        .input-field:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.15);
        }
        .login-button {
            background-color: #3b82f6;
            color: white;
            padding: 0.75rem;
            border-radius: 0.375rem;
            font-size: 1rem;
            width: 100%;
            cursor: pointer;
            transition: background-color 0.2s ease-in-out;
            border: none;
            font-weight: 600;
        }
        .login-button:hover {
            background-color: #2563eb;
        }
        .register-link {
            font-size: 0.875rem;
            color: #6b7280;
            margin-top: 1rem;
            text-align: center;
        }
        .register-link a {
            color: #3b82f6;
            font-weight: 600;
            text-decoration: none;
        }
        .register-link a:hover {
            text-decoration: underline;
        }
        .error-message {
            color: #dc2626;
            font-size: 0.875rem;
            margin-top: -0.75rem;
            margin-bottom: 0.75rem;
        }
    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="form-container max-w-md w-full">
        <h1 class="text-2xl font-semibold text-gray-800 mb-4">Login</h1>

        @if(session('error'))
            <div class="error-message text-center mb-4">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                <input type="text" id="email" name="email" class="input-field" placeholder="Enter your email" value="{{ old('email') }}">
                @error('email')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                <input type="password" id="password" name="password" class="input-field" placeholder="Enter your password">
                @error('password')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="login-button">Login</button>

            <div class="register-link">
                Don't have an account? <a href="{{ route('register') }}">Create Account</a>
            </div>
        </form>
    </div>
</body>
</html>
