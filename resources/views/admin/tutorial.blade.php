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
                class="text-white py-2.5 block text-center text-sm hover:text-oren "
            >Dashboard</a
            >
            <a
                href="{{route("tutorial-admin")}}"
                class="text-white py-2.5 block text-center text-sm hover:text-oren font-bold underline underline-offset-8 decoration-2 decoration-oren"
            >Tutorial</a
            >
            <form action="{{ route('logout-admin') }}" method="post" style="display: flex; justify-content: center; align-items: center;">
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
            <a href="{{route("dashboard-admin")}}">
                <p
                    class="hover:text-oren "
                >
                    Dashboard
                </p>
            </a>
            <a href="{{route("tutorial-admin")}}">
                <p class="hover:text-oren font-bold underline underline-offset-8 decoration-2 decoration-oren">Tutorial</p>
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
        Tata Cara Penggunaan Sistem E-Learning SMA Tanjung Priok
    </h1>
</div>

<!-- CONTENT -->
<section class="mt-7 mb-10 xl:mt-10">
    <div
        class="mx-5 sm:mx-8 lg:mx-10 xl:mx-20"
    >
        <div>
            <h1 class="font-semibold text-base lg:text-lg xl:text-xl">A. Mengelola Data Siswa</h1>
            <ol class="list-decimal mx-5 sm:mx-8 lg:mx-10 xl:mx-20 mt-5 lg:mt-10">
                <img src="{{asset("images/login-admin1.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px]">
                <li class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px]" >Login terlebih dahulu dengan memasukkan <b>email dan password</b> pada kolom input login.</li>
                <img src="{{asset("images/pilihan-admin.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px] mt-5">
                <li class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px] " >Pilih menu <b>kelola data siswa</b></li>
                <img src="{{asset("images/pilih-kelas-admin.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px] mt-5">
                <li class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px]" >Pilih kelas yang ingin dikelola. Jika ingin kembali silakan klik tombol kembali.</li>
                <img src="{{asset("images/list-siswa-admin.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px] mt-5">
                <li class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px]" >Pilih siswa yang ingin dikelola datanya. Jika ingin kembali silakan klik tombol kembali.</li>
                <img src="{{asset("images/edit-data-siswa-admin.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px] mt-5">
                <li class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px]" >Edit data email jika dibutuhkan, edit data password dan konfirmasi password jika ingin mengubah password siswa. <b>Pastikan password dan konfirmasi password terisi sebelum menyimpan data</b>. Jika ingin kembali silakan klik tombol kembali.</li>
            </ol>
        </div>
        <div class="mt-7 lg:mt-10 xl:mt-12">
            <h1 class="font-semibold text-base lg:text-lg xl:text-xl">B. Mengelola Data Guru</h1>
            <ol class="list-decimal mx-5 sm:mx-8 lg:mx-10 xl:mx-20 mt-5 lg:mt-10">
                <img src="{{asset("images/login-admin1.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px]">
                <li class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px]" >Login terlebih dahulu dengan memasukkan <b>email dan password</b> pada kolom input login. Jika sudah melakukan step ini silahkan skip step ini.</li>
                <img src="{{asset("images/pilihan-admin.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px] mt-5">
                <li class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px] " >Pilih menu <b>kelola data guru</b>.</li>
                <img src="{{asset("images/list-guru-admin.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px] mt-5">
                <li class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px]" >Pilih guru yang ingin dikelola datanya. Jika ingin kembali silakan klik tombol kembali.</li>
                <img src="{{asset("images/edit-data-guru-admin.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px] mt-5">
                <li class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px]" >Edit data email jika dibutuhkan, edit data password dan konfirmasi password jika ingin mengubah password guru. <b> Pastikan password dan konfirmasi password terisi sebelum menyimpan data</b>. Jika ingin kembali silakan klik tombol kembali.</li>
            </ol>
        </div>
        <div class="mt-7 lg:mt-10 xl:mt-12">
            <h1 class="font-semibold text-base lg:text-lg xl:text-xl">C. Menghapus Data E-Learning Permanen</h1>
            <ol class="list-decimal mx-5 sm:mx-8 lg:mx-10 xl:mx-20 mt-5 lg:mt-10">
                <img src="{{asset("images/login-admin1.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px]">
                <li class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px]" >Login terlebih dahulu dengan memasukkan <b>email dan password</b> pada kolom input login. Jika sudah melakukan step ini silahkan skip step ini.</li>
                <img src="{{asset("images/pilihan-admin.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px] mt-5">
                <li class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px] " >Pilih menu kelola <b>hapus data permanen</b>. <span class="text-red-600 font-semibold">Gunakan fitur ini dengan bijak, karena semua data materi, tugas, dan ujian akan terhapus permanen</span>.</li>
            </ol>
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
