<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .input-field {
            border-radius: 0.5rem;
            padding: 0.75rem;
            border: 1px solid #d1d5db;
            width: 100%;
            font-size: 1rem;
            margin-bottom: 1.5rem;
        }
        .input-field:focus {
            outline: none;
            border-color: #4f46e5;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.15);
        }
        .error-message {
            color: #dc2626;
            font-size: 0.875rem;
            margin-top: -1rem;
            margin-bottom: 1rem;
        }
        .info-label {
            font-weight: 500;
            color: #374151;
            font-size: 1rem;
            display: block;
            margin-bottom: 0.5rem;
        }
        .password-input-container {
            position: relative;
            display: flex;
            flex-direction: column; /* Stack label and input */
            align-items: flex-start; /* Align items to the start (left) */
            width: 100%;
            margin-bottom: 1.5rem;
        }
        #password, #confirm-password {
            flex: 1;
            margin-right: 0;
        }
        .password-toggle-button {
            position: absolute;
            right: 0.75rem;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            padding: 0.25rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .password-toggle-icon {
            width: 1rem;
            height: 1rem;
            color: #6b7280;
            transition: transform 0.2s ease-in-out, color 0.2s ease-in-out; /* Smooth transition */
        }
        .password-toggle-icon.active {
            transform: scale(1.2); /* Enlarge slightly when active */
            color: #4f46e5; /* Change color when active */
        }
        .password-input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
            width: 100%;
        }

        #password,
        #confirm-password {
            flex: 1;
            padding-right: 2.5rem;
            border-radius: 0.5rem;
            padding: 0.75rem;
            border: 1px solid #d1d5db;
            font-size: 1rem;
            margin-bottom: 0;
        }

        .password-toggle-button {
            position: absolute;
            right: 0.75rem;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            padding: 0.25rem;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 10;
        }

        .password-toggle-icon {
            width: 1rem;
            height: 1rem;
            color: #6b7280;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-blue-50 to-purple-100 p-8 flex items-center justify-center min-h-screen">
    <div class="container max-w-2xl mx-auto bg-white shadow-xl rounded-xl p-12">
        <h1 class="text-2xl font-semibold text-gray-800 mb-4">Registration</h1>
        <form method="POST" action="{{ route('register') }}" id="registration-form" class="space-y-6">
            @csrf
            <div>
                <label for="user-type" class="info-label">User Type:</label>
                <select id="user-type" name="user_type" class="input-field" required>
                    <option value="" disabled selected>Select User Type</option>
                    <option value="student">Student</option>
                    <option value="faculty">Faculty</option>
                </select>
                <div id="user-type-error" class="error-message"></div>
            </div>
            <div>
                <label for="student-id" class="info-label">Student ID:</label>
                <input type="text" id="student-id" name="student_id" class="input-field" placeholder="Enter your Student ID">
                <div id="student-id-error" class="error-message"></div>
            </div>
            <div>
                <label for="first-name" class="info-label">First Name:</label>
                <input type="text" id="first-name" name="first_name" class="input-field" placeholder="Enter your First Name">
                <div id="first-name-error" class="error-message"></div>
            </div>
            <div>
                <label for="middle-name" class="info-label">Middle Name:</label>
                <input type="text" id="middle-name" name="middle_name" class="input-field" placeholder="Enter your Middle Name (Optional)">
                <div id="middle-name-error" class="error-message"></div>
            </div>
            <div>
                <label for="last-name" class="info-label">Last Name:</label>
                <input type="text" id="last-name" name="last_name" class="input-field" placeholder="Enter your Last Name">
                <div id="last-name-error" class="error-message"></div>
            </div>
            <div>
                <label for="email" class="info-label">Email:</label>
                <input type="email" id="email" name="email" class="input-field" placeholder="Enter your Email">
                <div id="email-error" class="error-message"></div>
            </div>
            <div class="password-input-container">
                <label for="password" class="info-label">Password:</label>
                <div class="password-input-wrapper">
                    <input type="password" id="password" name="password" class="input-field" placeholder="Enter your Password">
                    <button type="button" class="password-toggle-button" id="password-toggle-button">
                        <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="password-toggle-icon" id="password-toggle-icon-svg">
                            <path d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                            <path d="M3 12s3-5 9-5 9 5 9 5-3 5-9 5-9-5-9-5z" />
                        </svg>
                    </button>
                </div>
                <div id="password-error" class="error-message"></div>
            </div>
            <div class="password-input-container">
                <label for="confirm-password" class="info-label">Confirm Password:</label>
                <div class="password-input-wrapper">
                    <input type="password" id="confirm-password" name="confirm_password" class="input-field" placeholder="Confirm your Password">
                    <button type="button" class="password-toggle-button" id="confirm-password-toggle-button">
                        <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="password-toggle-icon" id="confirm-password-toggle-icon-svg">
                            <path d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                            <path d="M3 12s3-5 9-5 9 5 9 5-3 5-9 5-9-5-9-5z" />
                        </svg>
                    </button>
                </div>
                <div id="confirm-password-error" class="error-message"></div>
            </div>
            <div>
                <label for="course" class="info-label">Course:</label>
                <input type="text" id="course" name="course" class="input-field" placeholder="Enter your Course">
                <div id="course-error" class="error-message"></div>
            </div>
            <div>
                <label for="school" class="info-label">School Attended:</label>
                <input type="text" id="school" name="school" class="input-field" placeholder="Enter your School">
                <div id="school-error" class="error-message"></div>
            </div>
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 px-6 rounded-lg focus:outline-none focus:shadow-outline text-xl w-full">
                Register
            </button>
            <div class="text-center text-gray-700 text-lg mt-4">
                Already have an account?
                <a href="/login" class="text-blue-700 hover:text-blue-800 font-semibold">Login</a>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const registrationForm = document.getElementById('registration-form');
            const passwordToggleButton = document.getElementById('password-toggle-button');
            const confirmPasswordToggleButton = document.getElementById('confirm-password-toggle-button');
            const passwordToggleIcon = document.getElementById('password-toggle-icon-svg');
            const confirmPasswordToggleIconSvg = document.getElementById('confirm-password-toggle-icon-svg');
            let isPasswordVisible = false;
            let isConfirmPasswordVisible = false;

            passwordToggleButton.addEventListener('click', () => {
                isPasswordVisible = !isPasswordVisible;
                document.getElementById('password').type = isPasswordVisible ? 'text' : 'password';
                passwordToggleIcon.classList.toggle('active', isPasswordVisible);
            });

            confirmPasswordToggleButton.addEventListener('click', () => {
                isConfirmPasswordVisible = !isConfirmPasswordVisible;
                document.getElementById('confirm-password').type = isConfirmPasswordVisible ? 'text' : 'password';
                confirmPasswordToggleIconSvg.classList.toggle('active', isConfirmPasswordVisible);
            });

            // Optional: You can also add a client-side validation before form submission
            registrationForm.addEventListener('submit', (event) => {
                // You can call your JS validation functions here
            });
        });
    </script>
</body>
</html>