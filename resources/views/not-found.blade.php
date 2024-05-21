<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>404</title>
    <link rel="icon" href="{{asset("images/logo.png")}}" type="image/png" />
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
</head>
<body class="bg-[#02455C] dark:bg-dark dark:text-light">
<main class="flex items-center justify-center h-screen">
    <div class="p-4 space-y-4">
        <div class="flex flex-col items-start space-y-3 sm:flex-row sm:space-y-0 sm:items-center sm:space-x-3">
            <p class="font-semibold text-red-600 text-9xl">404</p>
            <div class="space-y-2">
                <h1 id="pageTitle" class="flex items-center space-x-2">
                    <svg aria-hidden="true" class="w-6 h-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                    <span class="font-medium sm:text-2xl text-bases text-white"> Oops! Page not found. </span>
                </h1>
                <p class="text-base font-normal text-gray-300">The page you ara looking for was not found.</p>
            </div>
        </div>
    </div>
</main>
</body>
</html>
