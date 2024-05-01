<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>{{$title}}</title>
    <link rel="icon" href="{{asset("images/logo.png")}}" type="image/png" />
    <!-- <link href="/public/css/output.css" rel="stylesheet" /> -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />

    <!-- PENTING!!!! -->
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
</head>
<body class="bg-biru-muda font-learn">
<div class="px-8 mt-20 md:mt-24 lg:mt-32">
    <h1 class="text-center text-3xl font-bold leading-normal lg:text-4xl xl:text-5xl">Forget Password Student</h1>
    <h4 class="text-center mt-5 lg:mt-8 mb-7 sm:mb-10 lg:mb-12 xl:mb-16 font-semibold text-base sm:text-lg lg:text-xl xl:text-2xl">Please Confirm Your Email</h4>
    <div class="sm:mx-16 md:mx-28 lg:mx-56 xl:mx-64">
        <label for="email" class="font-medium">
            <p class="text-sm lg:text-base xl:text-lg">Email</p>
            <input
                class="mt-2 xl:mt-2 px-3 py-2.5 xl:py-3 mr-4 border-2 shadow rounded-lg w-full block text-xs lg:text-sm xl:text-base"
                type="email"
                id="email"
                name="email"
                placeholder="Masukkan Email"
            />
        </label>
        <a class="text-white font-semibold text-sm lg:text-base" href="#">
            <div
                class="px-3 bg-biru-tua mt-6 xl:mt-8 rounded-lg h-9 lg:h-11 transition ease-in-out hover:scale-105 duration-300"
            >
                <p class="text-center py-2 lg:py-2.5">Submit</p>
            </div>
        </a>
    </div>
</div>
</body>
</html>
