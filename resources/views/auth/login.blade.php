<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h1 class="text-2xl font-semibold mb-6 text-center text-gray-800">Login</h1>
        
        <!-- Update the form to POST to the login route -->
        <form method="POST" action="{{ route('login.submit') }}">
            @csrf
            <div class="mb-4">
                <!-- Change the label from "Username" to "Student ID" -->
                <label for="student_id" class="block text-gray-700 text-sm font-bold mb-2">Student ID</label>
                <input type="text" id="student_id" name="student_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-6">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                <input type="password" id="password" name="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full">
                Login
            </button>
        </form>

        <!-- Link to registration page -->
        <p class="text-center text-gray-600 text-sm mt-4">
            Don't have an account? <a href="{{ route('register') }}" class="text-blue-500 hover:text-blue-700 font-semibold">Create Account</a>
        </p>
    </div>
</body>
</html>
