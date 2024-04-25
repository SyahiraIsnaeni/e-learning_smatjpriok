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
                href="{{route("dashboard-guru", $guru->id)}}"
                class="text-white py-2.5 block text-center text-sm hover:text-oren"
            >Dashboard</a
            >
            <a
                href="../../profile/guru.html"
                class="text-white py-2.5 block text-center text-sm hover:text-oren"
            >My Profile</a
            >
            <a
                href="#"
                class="text-white py-2.5 block text-center text-sm hover:text-oren"
            >Tutorial</a
            >
            <form action="{{ route('logout-guru') }}" method="post" style="display: flex; justify-content: center; align-items: center;">
                @csrf
                <button type="submit" class="text-center items-center text-white py-2.5 block text-sm hover:text-oren">
                    Logout
                </button>
            </form>
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
            <a href="{{route("dashboard-guru", $guru->id)}}">
                <p class="hover:text-oren">Dashboard</p>
            </a>
            <a href="../../profile/guru.html">
                <p class="hover:text-oren">My Profile</p>
            </a>
            <a href="#">
                <p class="hover:text-oren">Tutorial</p>
            </a>
            <form action="{{ route('logout-guru') }}" method="post">
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

<!-- MAPEL DAN KELAS -->
<section class="text-black mt-8 xl:mt-12">
    <div class="mx-5 sm:mx-8 flex lg:mx-10 xl:mx-20">
        <div>
            <h1 class="font-bold text-lg lg:text-xl xl:text-2xl">
                Pengumpulan Tugas Limit Tak Hingga
            </h1>
            <h1
                class="font-medium text-sm md:text-[15px] lg:text-base xl:text-lg mt-2.5 lg:mt-3.5 xl:mt-3"
            >
                Matematika Wajib - XI IPS 2
            </h1>
        </div>
        <div class="ml-auto">
            <a href="../detail-tugas/guru.html" class="hidden sm:block ml-auto">
                <div
                    class="bg-[#EE982B] py-2 px-3 lg:py-2 xl:py-2.5 lg:px-4 xl:px-6 rounded-md flex transition ease-in-out hover:scale-105 duration-300"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 448 512"
                        class="w-3.5 h-3.5 mt-0.5 lg:mt-[3px] lg:h-[14px] lg:w-[14px] xl:h-[16px] xl:w-[16px]"
                    >
                        <path
                            d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"
                        />
                    </svg>
                    <p
                        class="text-[13px] font-semibold ml-0.5 xl:ml-1 lg:text-[13.5px] xl:text-[15px]"
                    >
                        Kembali
                    </p>
                </div>
            </a>
        </div>
    </div>
</section>

<!-- PENGERJAAN TUGAS -->
<section class="text-black mt-8 xl:mt-10 mb-10">
    <div class="mx-5 sm:mx-8 lg:mx-10 xl:mx-20">
        <!-- INFORMASI PENGERJAAN TUGAS -->
        <div
            class="py-3.5 flex px-4 sm:py-4 sm:px-4 md:px-5 md:py-5 lg:py-7 lg:px-6 bg-white rounded-md shadow border border-black border-opacity-25"
        >
            <div
                class="text-[12.5px] sm:text-[13px] md:text-[13.5px] lg:text-sm xl:text-[15px] font-medium"
            >
                <p>Nama Siswa</p>
                <p class="mt-2 md:mt-4 lg:mt-5">File Pengumpulan</p>
            </div>
            <div
                class="text-[12.5px] sm:text-[13px] md:text-[13.5px] lg:text-sm xl:text-[15px] font-medium ml-3"
            >
                <p>:</p>
                <p class="mt-2 md:mt-4 lg:mt-5">:</p>
            </div>
            <div
                class="text-[12.5px] sm:text-[13px] md:text-[13.5px] lg:text-sm xl:text-[15px] font-medium ml-2"
            >
                <p>Arif Hidayat Putra</p>
                <div class="mt-2 md:mt-4 lg:mt-5">
                    <a
                        href="path/to/your/document.pdf"
                        download="your-document-name.pdf"
                        class="underline"
                    >
                        <div class="flex py-0.5">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 384 512"
                                class="w-4 h-4 mt-0.5"
                            >
                                <path
                                    d="M320 464c8.8 0 16-7.2 16-16V160H256c-17.7 0-32-14.3-32-32V48H64c-8.8 0-16 7.2-16 16V448c0 8.8 7.2 16 16 16H320zM0 64C0 28.7 28.7 0 64 0H229.5c17 0 33.3 6.7 45.3 18.7l90.5 90.5c12 12 18.7 28.3 18.7 45.3V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64z"
                                />
                            </svg>
                            <p class="ml-1">Jawaban Arif Hidayat Putra.pdf</p>
                        </div>
                    </a>
                    <a
                        href="path/to/your/document.pdf"
                        download="your-document-name.pdf"
                        class="underline"
                    >
                        <div class="flex py-0.5">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 384 512"
                                class="w-4 h-4 mt-0.5"
                            >
                                <path
                                    d="M320 464c8.8 0 16-7.2 16-16V160H256c-17.7 0-32-14.3-32-32V48H64c-8.8 0-16 7.2-16 16V448c0 8.8 7.2 16 16 16H320zM0 64C0 28.7 28.7 0 64 0H229.5c17 0 33.3 6.7 45.3 18.7l90.5 90.5c12 12 18.7 28.3 18.7 45.3V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64z"
                                />
                            </svg>
                            <p class="ml-1">Jawaban Arif Hidayat Putra.pdf</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div
            class="mt-5 md:mt-7 flex text-[12.5px] sm:text-[13px] md:text-[13.5px] lg:text-sm xl:text-[15px]"
        >
            <p class="font-semibold my-auto">Nilai Tugas</p>
            <input
                class="ml-4 lg:ml-5 text-center px-3 py-2 xl:py-2.5 mr-4 border-2 border-black border-opacity-25 rounded-md w-[75px] md:w-[80px] block "
                type="number"
                id="nilai"
                name="nilai"
            />
            <button class="bg-[#763500] md:ml-3 py-2 px-3 md:py-2.5 md:px-3.5 rounded-md transition ease-in-out hover:scale-105 duration-300">
                <p class="font-semibold text-white text-[12.5px] sm:text-[13px] md:text-[13.5px] lg:text-sm xl:text-[14.5px]">Upload Nilai</p>
            </button>
        </div>
    </div>
</section>

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
