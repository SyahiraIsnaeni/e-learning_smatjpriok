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
                class="text-white py-2.5 block text-center text-sm hover:text-oren font-bold underline underline-offset-8 decoration-2 decoration-oren"
            >Dashboard</a
            >
            <a
                href="{{route("tutorial-admin")}}"
                class="text-white py-2.5 block text-center text-sm hover:text-oren"
            >Tutorial</a
            >
            <form action="{{ route('logout-admin') }}" method="post" style="display: flex; justify-content: center; align-items: center;">
                @csrf
                <button type="submit" class="text-center items-center text-white py-2.5 block text-sm hover:text-oren">
                    Logout
                </button>
            </form>
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
                    class="hover:text-oren font-bold underline underline-offset-8 decoration-2 decoration-oren"
                >
                    Dashboard
                </p>
            </a>
            <a href="{{route("tutorial-admin")}}">
                <p class="hover:text-oren">Tutorial</p>
            </a>
            <form action="{{ route('logout-admin') }}" method="post">
                @csrf
                <button type="submit">
                    <span class="hover:text-oren">Logout</span>
                </button>
            </form>
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

<!-- SELAMAT DATANG -->
<div class="mx-5 sm:mx-8 lg:mx-10 xl:mx-20">
    <h1 class="font-bold text-lg lg:text-xl xl:text-2xl">
        Selamat Datang Admin SMA Tanjung Priok
    </h1>
    <p
        class="font-medium text-[14px] md:text-[15px] lg:text-base xl:text-lg mt-2 xl:mt-3"
    >
        Ayo kelola data guru dan murid dengan mudah dan efisien!
    </p>
</div>

<!-- CONTENT -->
<section class="mt-7 mb-10 xl:mt-10">
    <div
        class="mx-5 sm:mx-8 lg:mx-10 xl:mx-20 grid md:grid-cols-2 lg:grid-cols-3 gap-4 xl:gap-7"
    >
        <!-- Kelola Data Siswa -->
        <div
            class="ease-in-out duration-300 hover:scale-105"
        >
            <a href="{{route("data-kelas")}}">
                <div
                    class="bg-[#49CA94] px-5 sm:px-7 py-6 lg:py-8 lg:px-8 xl:px-9 xl:py-9 rounded-lg bg-opacity-80"
                >
                    <h1 class="font-semibold text-[16px] lg:text-[17px] xl:text-lg">
                        Kelola Data Siswa
                    </h1>
                    <p
                        class="font-normal text-[13px] sm:text-[13.5px] xl:text-[14.5px] xl:tracking-normal xl:leading-relaxed xl:mt-2 mt-1.5 leading-relaxed"
                    >
                        Optimalkan administrasi dan dukung pertumbuhan murid dengan pengelolaan data terintegrasi!
                    </p>
                    <div class="mt-5 xl:mt-7 flex justify-end">
                        <p class="text-[13px] xl:text-sm font-medium flex">
                  <span class="underline underline-offset-1">Selengkapnya</span
                  ><span>
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        height="16"
                        width="14"
                        viewBox="0 0 448 512"
                        class="ml-1 block mt-0.5 xl:mt-[2.5px] xl:ml-1.5"
                    >
                      <path
                          d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"
                      /></svg
                    ></span>
                        </p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Kelola Data Guru -->
        <div
            class=" ease-in-out duration-300 hover:scale-105"
        >
            <a href="{{route("data-guru")}}">
                <div
                    class="bg-[#71B9DE] px-5 sm:px-7 py-6 lg:py-8 lg:px-8 xl:px-9 xl:py-9 rounded-lg bg-opacity-80"
                >
                    <h1 class="font-semibold text-[16px] lg:text-[17px] xl:text-lg">
                        Kelola Data Guru
                    </h1>
                    <p
                        class="font-normal text-[13px] sm:text-[13.5px] xl:text-[14.5px] xl:tracking-normal xl:leading-relaxed xl:mt-2 mt-1.5 leading-relaxed"
                    >
                        Optimalkan efisiensi lingkungan pembelajaran dengan mengelola data guru secara terstruktur!
                    </p>
                    <div class="mt-5 xl:mt-7 flex justify-end">
                        <p class="text-[13px] xl:text-sm font-medium flex">
                  <span class="underline underline-offset-1">Selengkapnya</span
                  ><span>
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        height="16"
                        width="14"
                        viewBox="0 0 448 512"
                        class="ml-1 block mt-0.5 xl:mt-[2.5px] xl:ml-1.5"
                    >
                      <path
                          d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"
                      /></svg
                    ></span>
                        </p>
                    </div>
                </div>
            </a>
        </div>

        <div class="ease-in-out duration-300 hover:scale-105">
            <button onclick="showConfirmation()" class="bg-[#FF7272] px-5 sm:px-7 py-6 lg:py-8 lg:px-8 xl:px-9 xl:py-9 rounded-lg bg-opacity-80">
                <h1 class="font-semibold text-[16px] lg:text-[17px] xl:text-lg text-left">Hapus Data Permanen</h1>
                <p class="font-normal text-left text-[13px] sm:text-[13.5px] xl:text-[14.5px] xl:tracking-normal xl:leading-relaxed xl:mt-2 mt-1.5 leading-relaxed">Fitur ini memungkinkan admin dapat menghapus seluruh data sistem e-learning secara permanen.</p>
                <div class="mt-5 xl:mt-7 flex">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="h-5 w-5 mr-1"><path d="M256 32c14.2 0 27.3 7.5 34.5 19.8l216 368c7.3 12.4 7.3 27.7 .2 40.1S486.3 480 472 480H40c-14.3 0-27.6-7.7-34.7-20.1s-7-27.8 .2-40.1l216-368C228.7 39.5 241.8 32 256 32zm0 128c-13.3 0-24 10.7-24 24V296c0 13.3 10.7 24 24 24s24-10.7 24-24V184c0-13.3-10.7-24-24-24zm32 224a32 32 0 1 0 -64 0 32 32 0 1 0 64 0z"/></svg>
                    <p class="text-[13px] xl:text-sm font-medium">Gunakan fitur ini dengan bijak</p>
                </div>
            </button>
            <form id="delete-e-learning-form" method="post" action="{{ route("delete-e-learning") }}" class="d-inline">
                @csrf
                @method('DELETE')
            </form>
        </div>

        <script>
            function showConfirmation() {
                if (confirm('Anda yakin ingin menghapus seluruh data sistem e-learning secara permanen?')) {
                    document.getElementById('delete-e-learning-form').submit();
                }
            }
        </script>

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
