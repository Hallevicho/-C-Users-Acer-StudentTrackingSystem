<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Welcome</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            cursor: pointer;
            font-family: 'Arial', sans-serif;
        }

        .quote-box {
            opacity: 1;
            transition: opacity 1s ease-in-out;
        }

        .quote-box.fade {
            opacity: 0;
        }
    </style>
</head>
<body onclick="nextQuote()" class="bg-black text-white flex items-center justify-center min-h-screen transition-all duration-500">
    <div id="quoteBox" class="quote-box text-xl font-semibold max-w-2xl text-center bg-gray-900 text-white p-10 shadow-2xl rounded-3xl border border-gray-700">
        Welcome to our Portal! Click anywhere to begin.
    </div>

<script>
    const messages = [
        "Welcome to our Portal! Click anywhere to begin.",
        "We’re glad to have you here — whether you’re a student, instructor, or administrator.",
        "Let’s get you signed in and started!"
    ];

    let index = 0;

    function nextQuote() {
        const quoteBox = document.getElementById('quoteBox');
        
        // Fade out the current message
        quoteBox.classList.add('fade');
        
        setTimeout(() => {
            index++;
            if (index < messages.length) {
                quoteBox.innerText = messages[index];
                // Fade back in for the next quote
                quoteBox.classList.remove('fade');
            } else {
                // After the last message fades out, immediately trigger the redirect
                window.location.href = "{{ route('login') }}";
            }
        }, 1000); // Fade duration
    }
</script>
</body>
</html>
