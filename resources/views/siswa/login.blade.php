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
<section class="mt-20 px-8 md:mt-24 lg:mt-28 xl:mt-32">
    <div class="w-1/2 hidden md:block float-left">
        <img
            class="md:w-[380px] md:-mt-5 lg:w-[480px] xl:w-[600px] lg:-mt-12 mx-auto"
            src="{{asset("images/login-siswa.png")}}"
            alt="Login Student"
        />
    </div>
    <div class="md:inline-block md:w-1/2 md:px-10 xl:px-20 lg:px-12">
        <h1
            class="text-black font-bold text-3xl lg:text-4xl xl:text-5xl text-center"
        >
            Student Login
        </h1>
        <h3
            class="mt-2 lg:mt-3 xl:mt-5 text-black font-semibold text-lg lg:text-xl xl:text-2xl text-center"
        >
            E-Learning SMA Tanjung Priok
        </h3>
        <div class="text-black mt-6 xl:mt-14">
            @if(isset($error))
                <div class="rounded-md w-full px-2 py-2 text-[13px] sm:text-sm md:text-[15px] font-normal bg-red-700 text-white mb-4">
                    <p class="text-center">{{$error}}</p>
                </div>
            @endif
            <form method="post" action="{{route("login-siswa")}}">
                @csrf
                <label for="nis" class="font-medium">
                    <p class="text-sm lg:text-base xl:text-lg font-medium">
                        NIS/Email
                    </p>
                    <input
                        class="mt-1 xl:mt-2 px-3 py-2 xl:py-3 mr-4 border-2 shadow rounded-lg w-full block text-xs lg:text-sm xl:text-base"
                        type="text"
                        id="emailNis"
                        name="emailNis"
                        placeholder="Masukkan NIS atau Email"
                    />
                </label>
                <label for="password" class="font-medium text-2xl">
                    <p
                        class="text-sm lg:text-base xl:text-lg font-medium mt-3 xl:mt-4"
                    >
                        Password
                    </p>
                    <input
                        class="mt-1 xl:mt-2 px-3 py-2 xl:py-3 mr-4 border-2 shadow rounded-lg w-full block text-xs lg:text-sm xl:text-base"
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Masukkan Password"
                    />
                </label>
                <button class="text-white font-semibold text-sm lg:text-base w-full" type="submit">
                    <div
                        class="px-3 bg-biru-tua mt-6 xl:mt-8 rounded-lg h-8 lg:h-11 transition ease-in-out hover:scale-105 duration-300"
                    >
                        <p class="text-center py-1.5 lg:py-2.5">Submit</p>
                    </div>
                </button>
            </form>
        </div>
        <div class="mt-2 lg:mt-3 xl:mt-4">
            <a class="text-black text-xs lg:text-sm" href="../forget-password/siswa.html"
            >Forgot your password?
                <span class="underline underline-offset-2 font-semibold hover:font-bold hover:text-oren"
                >Click here</span
                ></a
            >
            <br />
        </div>
        <div class="lg:mt-1">
            <a class="text-black text-xs lg:text-sm" href="{{route("login-guru")}}"
            >Are you a Teacher?
                <span class="underline underline-offset-2 font-semibold hover:font-bold hover:text-oren"
                >Login here</span
                ></a
            >
        </div>
    </div>
</section>
</body>
</html>
