<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>{{$title}}</title>
    <link rel="icon" href="{{asset("images/logo.png")}}" type="image/png" />
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <!-- <link href="../../css/index.css" rel="stylesheet" /> -->

    <!-- PENTING!!!! -->
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
</head>
<body class="bg-biru-muda font-learn">
<!-- NAVBAR -->
<nav
    class="sticky bg-biru-tua py-3 lg:py-3.5 top-0 w-full z-30 mb-7 xl:mb-10"
>
    <!-- TAMPILAN HP -->
    <div class="md:hidden relative">
        <div class="ml-5 sm:ml-8 flex items-center">
            <img src="{{asset("images/logo.png")}}" class="w-10 my-auto" />
            <h1
                class="font-medium text-sm text-white block my-auto ml-2 tracking-normal"
            >
                E-Learning SMA Tanjung Priok
            </h1>
            <!-- button hamburger -->
            <div
                class="w-9 h-8 bg-[#F1F1E6] rounded-md flex ml-auto mr-5 sm:mr-8 mt-1 cursor-pointer"
                id="toggleButton"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="w-5 my-auto mx-auto"
                    viewBox="0 0 448 512"
                >
                    <path
                        fill="#02455C"
                        d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"
                    />
                </svg>
            </div>
        </div>
        <!-- Navigasi Hamburger -->
        <div
            class="hidden md:flex flex-col items-start absolute mt-3 right-0 bg-[#02455C] p-4 w-48 rounded-l-md rounded-t-none opacity-95 h-screen"
            id="mobileMenu"
        >
            <a
                href="{{route("dashboard-admin")}}"
                class="text-white py-2.5 block text-center text-sm hover:text-oren"
            >Dashboard</a
            >
            <a
                href="#"
                class="text-white py-2.5 block text-center text-sm hover:text-oren"
            >Tutorial</a
            >
            <a
                href="../login/admin.html"
                class="text-white py-2.5 block text-center text-sm hover:text-oren"
            >Logout</a
            >
            <!-- Tambahkan navigasi lainnya sesuai kebutuhan -->
        </div>
    </div>

    <!-- TAMPILAN TABLET DAN KOMPUTER -->
    <div class="hidden mx-5 sm:mx-8 lg:mx-10 xl:mx-20 md:grid grid-cols-2">
        <div class="flex">
            <img
                src="{{asset("images/logo.png")}}"
                class="md:w-[40px] md:h-[40px] lg:w-[48px] lg:h-[47px]"
            />
            <h1
                class="block my-auto ml-3 font-medium tracking-wide lg:tracking-normal text-white text-[14px] lg:text-base"
            >
                E-Learning SMA Tanjung Priok Jakarta
            </h1>
        </div>
        <div
            class="justify-evenly flex my-auto text-white font-medium text-[13.5px] lg:text-[14.5px] xl:text-[15.5px] lg:tracking-normal xl:tracking-normal"
        >
            <a href="{{route("dashboard-admin")}}">
                <p
                    class="hover:text-oren"
                >
                    Dashboard
                </p>
            </a>
            <a href="#">
                <p class="hover:text-oren">Tutorial</p>
            </a>
            <a href="../login/admin.html">
                <p class="hover:text-oren">Logout</p>
            </a>
        </div>
    </div>

    <script>
        document
            .getElementById("toggleButton")
            .addEventListener("click", function () {
                document.getElementById("mobileMenu").classList.toggle("hidden");
                document
                    .getElementById("mobileMenu")
                    .classList.toggle("animate-slide-right"); // Tambahkan kelas animasi
            });
    </script>
</nav>

<!-- TITLE -->
<div class="mx-5 sm:mx-8 lg:mx-10 xl:mx-20">
    <h1 class="font-bold text-lg lg:text-xl xl:text-2xl">Edit Data Guru</h1>
</div>

<section class="mt-5 mb-10 xl:mt-8">
    <div class="mx-5 sm:mx-8 lg:mx-10 xl:mx-20">
        <form method="post" enctype="multipart/form-data" action="{{route("edit-detail-data-guru", ["id" => $guru->id])}}">
            @csrf
            <div class="block w-full lg:flex lg:gap-10 xl:gap-20">
                <div class="lg:w-1/2">
                    <div class="mt-5 md:mt-8 lg:mt-5 rounded-md">
                        <p class="text-[13.5px] sm:text-sm lg:text-[14.5px] xl:text-base font-medium bg-white">Nama Lengkap</p>
                        <input value="{{$guru->nama}}" class="mt-1.5 py-1 px-2 lg:py-1.5 w-full rounded-md text-[13px] sm:text-sm lg:text-[14px] xl:text-[15px] border border-black border-opacity-25">
                    </div>
                    <div class="mt-2 md:mt-3 lg:mt-5 rounded-md">
                        <p class="text-[13.5px] sm:text-sm lg:text-[14.5px] xl:text-base font-medium bg-white">NIP</p>
                        <input value="{{$guru->nip}}" class="mt-1.5 py-1 px-2 lg:py-1.5 w-full rounded-md text-[13px] sm:text-sm lg:text-[14px] xl:text-[15px] border border-black border-opacity-25">
                    </div>
                    <div class="mt-2 md:mt-3 lg:mt-5 rounded-md">
                        <p class="text-[13.5px] sm:text-sm lg:text-[14.5px] xl:text-base font-medium">Email</p>
                        <input value="{{$guru->email}}" name="email" class="mt-1.5 lg:py-1.5 py-1 px-2 text-[13px] sm:text-sm lg:text-[14px] xl:text-[15px] w-full rounded-md border border-black border-opacity-25">
                    </div>
                </div>
                <div class="lg:w-1/2">
                    <div class="mt-2 md:mt-3 lg:mt-5 rounded-md">
                        <p class="text-[13.5px] sm:text-sm lg:text-[14.5px] xl:text-base font-medium ">Password</p>
                        <input name="password" type="password" class="mt-1.5 lg:py-1.5 text-[13px] sm:text-sm lg:text-[14px] xl:text-[15px] py-1 px-2 w-full rounded-md border border-black border-opacity-25">
                    </div>
                    <div class="mt-2 md:mt-3 lg:mt-5 rounded-md">
                        <p class="text-[13.5px] sm:text-sm lg:text-[14.5px] xl:text-base font-medium ">Konfirmasi Password</p>
                        <input name="konfirmasiPassword" type="password" class="mt-1.5 lg:py-1.5 py-1 px-2 text-[13px] sm:text-sm lg:text-[14px] xl:text-[15px] w-full rounded-md border border-black border-opacity-25">
                    </div>
                </div>
            </div>
            <div class="mt-8 xl:mt-10 flex">
                <div class="w-fit">
                    <a href="{{route("data-guru")}}">
                        <div
                            class="bg-[#EE982B] flex py-2 px-3 lg:py-2.5 lg:px-3.5 rounded-md transition hover:scale-105 hover:duration-300"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 448 512"
                                class="w-3.5 h-3.5 mt-0.5 md:mt-[3.3px] lg:mt-[2.5px] lg:h-[15px] lg:w-[15px]"
                            >
                                <path
                                    d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"
                                />
                            </svg>
                            <p class=" ml-0.5 lg:ml-1 text-[12.5px] md:text-[13px] lg:text-sm font-semibold">
                                Kembali
                            </p>
                        </div>
                    </a>
                </div>
                <button class="ml-auto" type="submit">
                    <div
                        class="bg-[#02455C] py-2 px-3 lg:py-2.5 lg:px-3.5 rounded-md transition hover:scale-105 hover:duration-300 flex"
                    >
                        <p class="text-[12.5px] text-white md:text-[13px] lg:text-sm font-semibold">
                            Simpan Data
                        </p>
                    </div>
                </button>
            </div>
        </form>
    </div>
</section>
@include('sweetalert::alert')
<!-- COPYRIGHT -->
<footer class="block inset-x-0 bottom-0 mb-5">
    <div class="mx-5 sm:mx-8 lg:mx-10 xl:mx-20">
        <h3 class="text-black opacity-95 font-thin text-[10px] lg:text-[12px]">
            © SMA Tanjung Priok, 2024. All Right Reserved
        </h3>
        <h3
            class="text-black opacity-95 font-thin text-[10px] lg:text-[12px] lg:mt-1"
        >
            Hand-crafted and Made with ❤️ by Team Capstone UNDIP
        </h3>
    </div>
</footer>
</body>
</html>
