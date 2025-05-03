<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance System</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        /* Optional: Add some hover effect to the left section */
        .left-section:hover {
            cursor: pointer;
            opacity: 0.9;
        }
    </style>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="container flex justify-center gap-8">

        <!-- Clickable Left Section -->
        <div class="left-section bg-blue-500 text-white rounded-lg p-8 flex items-center" onclick="window.location.href='{{ route('login') }}'">
            <p class="text-xl font-semibold">"Seamless Attendance, Anytime, Anywhere"</p>
        </div>

        <!-- Login Card -->
        <div class="login-card bg-white rounded-lg shadow-md p-8 w-full max-w-md">
            <h2 class="text-2xl font-semibold mb-6 text-gray-800">Login to your Account</h2>
            <form action="{{ route('login') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="username" class="block text-gray-700 text-sm font-bold mb-2">Username</label>
                    <input type="text" id="username" name="username" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div>
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                    <input type="password" id="password" name="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full">Login</button>
            </form>
            <div class="mt-4">
                <a href="{{ route('register') }}" class="text-blue-500 hover:text-blue-700 text-sm font-semibold">Create Account</a>
            </div>
        </div>

        <!-- Registration Card -->
        <div class="registration-card bg-white rounded-lg shadow-md p-6 w-full max-w-md">
            <div class="flex items-center justify-center mb-4">
                <div class="student-icon rounded-full bg-gray-200 p-3">
                    <span class="text-gray-700">Student</span>
                </div>
            </div>
            <form action="{{ route('register') }}" method="POST" class="space-y-2">
                @csrf
                <div>
                    <label for="firstname" class="block text-gray-700 text-sm font-bold mb-1">First Name</label>
                    <input type="text" id="firstname" name="firstname" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div>
                    <label for="studentId" class="block text-gray-700 text-sm font-bold mb-1">Student ID</label>
                    <input type="text" id="studentId" name="studentId" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div>
                    <label for="lastname" class="block text-gray-700 text-sm font-bold mb-1">Last Name</label>
                    <input type="text" id="lastname" name="lastname" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div>
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-1">Email</label>
                    <input type="email" id="email" name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div>
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-1">Password</label>
                    <input type="password" id="password" name="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div>
                    <label for="password_confirmation" class="block text-gray-700 text-sm font-bold mb-1">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full">Create Account</button>
            </form>
        </div>
    </div>

    <script>
        // Basic JavaScript for handling potential mobile view and tab switching
        const container = document.querySelector('.container');
        const leftSection = document.querySelector('.left-section');
        const loginCard = document.querySelector('.login-card');
        const registrationCard = document.querySelector('.registration-card');

        function adjustLayout() {
            if (window.innerWidth < 768) { // Example breakpoint for mobile
                container.classList.remove('flex', 'justify-center', 'gap-8');
                container.classList.add('flex-col');
                leftSection.classList.add('hidden'); // Hide left section on small screens
                loginCard.classList.remove('w-full', 'max-w-md'); //adjust the width
                registrationCard.classList.remove('w-full', 'max-w-md');
                loginCard.classList.add('w-full');
                registrationCard.classList.add('w-full');

            } else {
                container.classList.add('flex', 'justify-center', 'gap-8');
                container.classList.remove('flex-col');
                leftSection.classList.remove('hidden');  // Show left section on larger screens
                loginCard.classList.add('w-full', 'max-w-md');
                registrationCard.classList.add('w-full', 'max-w-md');
                loginCard.classList.remove('w-full');
                registrationCard.classList.remove('w-full');
            }
        }

        adjustLayout(); // Initial adjustment

        window.addEventListener('resize', adjustLayout); // Adjust on window resize
    </script>
</body>

</html>
