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
                href="{{route("dashboard-guru", $guru->id)}}"
                class="text-white py-2.5 block text-center text-sm hover:text-oren "
            >Dashboard</a
            >
            <a
                href="{{route("profile-guru", $guru->id)}}"
                class="text-white py-2.5 block text-center text-sm hover:text-oren"
            >My Profile</a
            >
            <a
                href="{{route("tutorial-guru")}}"
                class="text-white py-2.5 block text-center text-sm hover:text-oren font-bold underline underline-offset-8 decoration-2 decoration-oren"
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
                <p
                    class="hover:text-oren"
                >
                    Dashboard
                </p>
            </a>
            <a href="{{route("profile-guru", $guru->id)}}">
                <p class="hover:text-oren">My Profile</p>
            </a>
            <a href="{{route("tutorial-guru")}}">
                <p class="hover:text-oren  font-bold underline underline-offset-8 decoration-2 decoration-oren">Tutorial</p>
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

<!-- SELAMAT DATANG -->
<div class="mx-5 sm:mx-8 lg:mx-10 xl:mx-20">
    <h1 class="font-bold text-lg lg:text-xl xl:text-2xl">
        Tata Cara Penggunaan Sistem E-Learning SMA Tanjung Priok
    </h1>
</div>

<!-- TUTORIAL -->
<section class="mt-7 mb-10 xl:mt-10">
    <div
        class="mx-5 sm:mx-8 lg:mx-10 xl:mx-20"
    >
        <div>
            <h1 class="font-semibold text-base lg:text-lg xl:text-xl">A. Mengelola Data Materi</h1>
            <ol class="list-decimal mx-5 sm:mx-8 lg:mx-10 xl:mx-20 mt-5 lg:mt-10">
                <img src="{{asset("images/login-guru1.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px]">
                <li class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px] mt-5" >Login terlebih dahulu dengan memasukkan <b>Email/NIP dan password</b> pada kolom input login.</li>
                <img src="{{asset("images/dashboard-guru.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px] mt-5">
                <li class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px] mt-5" >Pilih <b>mata pelajaran</b> yang diinginkan.</li>
                <img src="{{asset("images/materi-pelajaran-guru.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px] mt-5">
                <li class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px] mt-5" >Pilih menu <b>materi pelajaran</b>.</li>
                <img src="{{asset("images/view-materi-guru.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px] mt-5">
                <li class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px] mt-5" >Jika ingin menambahkan materi, pilih tombol <b>tambah materi</b>. Jika ingin kembali silakan klik tombol kembali.</li>
                <img src="{{asset("images/tambah-materi-guru1.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px] mt-5">
                <img src="{{asset("images/tambah-materi-guru2.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px] mt-5">
                <img src="{{asset("images/tambah-materi-guru3.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px] mt-5">
                <li class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px] mt-5" >Isi judul, deskripsi, gambar (opsional), dan dokumen (opsional). Untuk dokumen bisa lebih dari 1 dokumen yang ingin diunggah. <b>Pastikan judul dan deskripsi terisi sebelum menyimpan data</b>. Setelah selesai mengisi data materi yang diinginkan, simpan materi dengan cara klik tombol <b>simpan</b>. Jika ingin kembali silakan klik tombol kembali.</li>
                <img src="{{asset("images/materi-guru1.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px] mt-5">
                <li class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px] mt-5" >Jika ingin melihat materi yang telah ditambahkan, dapat kembali ke halaman <b>view materi</b> dan klik materi yang diinginkan. Jika ingin kembali silakan klik tombol kembali.</li>
                <img src="{{asset("images/materi-guru3.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px] mt-5">
                <li class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px] mt-5" >Gambar di atas merupakan hasil materi yang telah ditambahkan, materi tersebut akan otomatis masuk ke dalam data e-learning siswa terkait sesuai dengan mata pelajaran pada kelas yang ditambahkan. Jika ingin kembali silakan klik tombol kembali.</li>
                <img src="{{asset("images/edit-materi-guru.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px] mt-5">
                <li class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px] mt-5" >Jika ingin mengedit materi, silakan klik tombol titik tiga pada pojok kanan materi yang diinginkan. Kemudian, silakan klik edit. Maka, Anda akan diarahkan ke halaman edit materi yang telah dipilih.</li>
                <img src="{{asset("images/edit-materi-guru2.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px] mt-5">
                <li class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px] mt-5" >Pada halaman edit materi, silakan edit kolom materi yang ingin diedit. <span class="font-semibold text-red-600">Jika ingin mengedit data gambar atau dokumen, maka gambar dan dokumen lama akan terhapus</span>. <b>Pastikan kolom judul dan kolom deskripsi tidak kosong</b>. Setelah mengedit data yang diperlukan, klik tombol <b>simpan</b>. Jika ingin kembali silakan klik tombol kembali</li>
                <img src="{{asset("images/hapus-materi-guru.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px] mt-5">
                <li class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px] mt-5" >Jika ingin menghapus data materi, silakan klik tombol titik tiga pada pojok kanan materi yang diinginkan untuk dihapus. Klik tombol hapus pada menu di tombol titik tiga yang dipilih. <span class="font-semibold text-red-600">Pastikan Anda yakin untuk menghapus materi tersebut karena data materi akan terhapus permanen</span>.</li>
            </ol>
        </div>
        <div class="mt-7 lg:mt-10 xl:mt-12">
            <h1 class="font-semibold text-base lg:text-lg xl:text-xl">B. Mengelola Data Tugas</h1>
            <ol class="list-decimal mx-5 sm:mx-8 lg:mx-10 xl:mx-20 mt-5 lg:mt-10">
                <img src="{{asset("images/login-guru1.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px]">
                <li class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px] mt-5" >Login terlebih dahulu dengan memasukkan <b>Email/NIP dan password</b> pada kolom input login. Jika sudah melakukan step ini, silakan skip step ini.</li>
                <img src="{{asset("images/dashboard-guru.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px] mt-5">
                <li class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px] mt-5" >Pilih <b>mata pelajaran</b> yang diinginkan.</li>
                <img src="{{asset("images/tugas-pelajaran-guru.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px] mt-5">
                <li class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px] mt-5" >Pilih menu <b>tugas</b>.</li>
                <img src="{{asset("images/view-tugas-guru.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px] mt-5">
                <li class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px] mt-5" >Jika ingin menambahkan tugas, pilih tombol <b>tambah tugas</b>. Jika ingin kembali silakan klik tombol kembali.</li>
                <img src="{{asset("images/tambah-tugas-guru.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px] mt-5">
                <li class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px] mt-5" >Isi judul, deskripsi, deadline, dan dokumen (opsional). Untuk dokumen bisa lebih dari 1 dokumen yang ingin diunggah. <b>Pastikan judul, deskripsi, dan deadline terisi sebelum menyimpan data</b>. Setelah selesai mengisi data tugas yang diinginkan, simpan tugas dengan cara klik tombol <b>simpan</b>. Jika ingin kembali silakan klik tombol kembali.</li>
                <img src="{{asset("images/edit-tugas-guru.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px] mt-5">
                <li class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px] mt-5" >Jika ingin melihat tugas yang telah ditambahkan, dapat kembali ke halaman <b>view tugas</b> dan klik tugas yang diinginkan. Jika ingin melakukan edit tugas, maka klik tombol titik tiga pada pojok kanan atas tugas yang diinginkan. Kemudian, klik tombol <b>edit</b> pada menu tersebut. Jika ingin kembali silakan klik tombol kembali.</li>
                <img src="{{asset("images/edit-tugas-guru2.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px] mt-5">
                <li class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px] mt-5" >Pada halaman edit tugas, silakan edit kolom tugas yang ingin diedit. <span class="font-semibold text-red-600">Jika ingin mengedit data dokumen, maka dokumen lama akan terhapus dan terganti dengan yang baru diunggah</span>. <b>Pastikan kolom judul dan kolom deskripsi tidak kosong</b>. Setelah mengedit data yang diperlukan, klik tombol <b>simpan</b>. Jika ingin kembali silakan klik tombol kembali</li>
                <img src="{{asset("images/pengerjaan-tugas-guru.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px] mt-5">
                <li class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px] mt-5" >Jika ingin melihat detail tugas dan pengerjaan tugas siswa, maka klik tombol tugas yang ingin dilihat sehingga akan diarahkan ke halaman detail tugas yang berisikan detail instruksi tugas dan pengerjaan siswa yang telah dikumpulkan. Jika ingin kembali silakan klik tombol kembali</li>
                <img src="{{asset("images/pengerjaan-tugas-guru2.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px] mt-5">
                <li class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px] mt-5" >Jika ingin melihat pengerjaan tugas siswa, maka klik tombol <b>lihat tugas</b> sehingga akan diarahkan ke detail pengerjaan tugas siswa. Jika ingin kembali silakan klik tombol kembali</li>
                <img src="{{asset("images/pengerjaan-tugas-guru3.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px] mt-5">
                <img src="{{asset("images/pengerjaan-tugas-guru4.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px] mt-5">
                <li class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px] mt-5" >Jika ingin menilai pengerjaan tugas siswa, silakan isikan nilai pada kolom input nilai. Kemudian, klik <b>upload nilai</b> sehingga nilai akan tersimpan dan nilai tersebut dapat dilihat oleh siswa. Jika ingin mengedit nilai, silakan klik tombol <b>edit nilai</b> sehingga kolom nilai dapat terisi kembali. Jika ingin kembali silakan klik tombol kembali</li>
                <img src="{{asset("images/hapus-tugas-guru.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px] mt-5">
                <li class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px] mt-5" >Jika ingin menghapus data tugas, silakan klik tombol titik tiga pada pojok kanan tugas yang diinginkan untuk dihapus. Klik tombol hapus pada menu di tombol titik tiga yang dipilih. <span class="font-semibold text-red-600">Pastikan Anda yakin untuk menghapus tugas tersebut karena data tugas dan pengerjaan tugas siswa akan terhapus permanen</span>.</li>
            </ol>
        </div>
        <div class="mt-7 lg:mt-10 xl:mt-12">
            <h1 class="font-semibold text-base lg:text-lg xl:text-xl">C. Mengelola Data Ujian</h1>
            <ol class="list-decimal mx-5 sm:mx-8 lg:mx-10 xl:mx-20 mt-5 lg:mt-10">
                <img src="{{asset("images/login-guru1.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px]">
                <li class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px] mt-5" >Login terlebih dahulu dengan memasukkan <b>Email/NIP dan password</b> pada kolom input login. Jika sudah melakukan step ini, silakan skip step ini.</li>
                <img src="{{asset("images/dashboard-guru.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px] mt-5">
                <li class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px] mt-5" >Pilih <b>mata pelajaran</b> yang diinginkan.</li>
                <img src="{{asset("images/ujian-pelajaran-guru.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px] mt-5">
                <li class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px] mt-5" >Pilih menu <b>ujian</b>.</li>
                <img src="{{asset("images/view-ujian-guru.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px] mt-5">
                <li class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px] mt-5" >Jika ingin menambahkan ujian, pilih tombol <b>tambah ujian</b>. Jika ingin kembali silakan klik tombol kembali.</li>
                <img src="{{asset("images/tambah-ujian-guru1.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px] mt-5">
                <img src="{{asset("images/tambah-ujian-guru2.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px] mt-5">
                <li class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px] mt-5" >Isi judul, deskripsi, deadline, durasi, serta soal ujian. Jika ingin menambahkan soal, dapat klik tombol <b>tambah soal</b> sehingga akan ditambahkan kolom untuk menambah soal. <b>Pastikan semua kolom terisi sebelum menyimpan data</b>. Setelah selesai mengisi data ujian yang diinginkan, simpan ujian dengan cara klik tombol <b>simpan</b>. Jika ingin kembali silakan klik tombol kembali.</li>
                <img src="{{asset("images/edit-ujian-guru.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px] mt-5">
                <li class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px] mt-5" >Jika ingin melihat ujian yang telah ditambahkan, dapat kembali ke halaman <b>view ujian</b> dan klik ujian yang diinginkan. Jika ingin melakukan edit ujian, maka klik tombol titik tiga pada pojok kanan atas tugas yang diinginkan. Kemudian, klik tombol <b>edit</b> pada menu tersebut. Jika ingin kembali silakan klik tombol kembali.</li>
                <img src="{{asset("images/edit-ujian-guru2.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px] mt-5">
                <li class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px] mt-5" >Pada halaman edit ujian, silakan edit kolom ujian yang ingin diedit. <b>Pastikan semua data terisi sebelum disimpan kembali</b>. Setelah mengedit data yang diperlukan, klik tombol <b>simpan</b>. Jika ingin kembali silakan klik tombol kembali</li>
                <img src="{{asset("images/pengerjaan-ujian-guru.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px] mt-5">
                <li class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px] mt-5" >Jika ingin melihat detail ujian dan pengerjaan ujian siswa, maka klik tombol ujian yang ingin dilihat sehingga akan diarahkan ke halaman detail tugas yang berisikan detail instruksi ujian dan pengerjaan ujian siswa yang telah dikumpulkan. Jika ingin kembali silakan klik tombol kembali</li>
                <img src="{{asset("images/pengerjaan-ujian-guru2.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px] mt-5">
                <li class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px] mt-5" >Jika ingin melihat pengerjaan ujian siswa, maka klik tombol <b>lihat pengerjaan</b> sehingga akan diarahkan ke detail pengerjaan ujian siswa. Jika ingin kembali silakan klik tombol kembali</li>
                <img src="{{asset("images/pengerjaan-ujian-guru3.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px] mt-5">
                <img src="{{asset("images/pengerjaan-ujian-guru4.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px] mt-5">
                <li class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px] mt-5" >Jika ingin menilai pengerjaan ujian siswa, silakan isikan poin nilai pada kolom input poin masing-masing soal. Kemudian, klik <b>submit nilai</b> sehingga nilai akan tersimpan dan nilai tersebut dapat dilihat oleh siswa. Jika ingin mengedit poin, silakan klik tombol <b>edit nilai</b> sehingga kolom poin dapat terisi kembali. Jika ingin kembali silakan klik tombol kembali</li>
                <img src="{{asset("images/hapus-ujian-guru.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px] mt-5">
                <li class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px] mt-5" >Jika ingin menghapus data ujian, silakan klik tombol titik tiga pada pojok kanan ujian yang diinginkan untuk dihapus. Klik tombol hapus pada menu di tombol titik tiga yang dipilih. <span class="font-semibold text-red-600">Pastikan Anda yakin untuk menghapus ujian tersebut karena data ujian dan pengerjaan ujian siswa akan terhapus permanen</span>.</li>
            </ol>
        </div>
        <div class="mt-7 lg:mt-10 xl:mt-12">
            <h1 class="font-semibold text-base lg:text-lg xl:text-xl">D. Mengubah Profil Guru</h1>
            <ol class="list-decimal mx-5 sm:mx-8 lg:mx-10 xl:mx-20 mt-5 lg:mt-10">
                <img src="{{asset("images/login-siswa1.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px]">
                <li class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px] mt-5" >Login terlebih dahulu dengan memasukkan <b>Email/NIP dan password</b> pada kolom input login. Jika sudah melakukan step ini, silakan skip step ini.</li>
                <img src="{{asset("images/jadwal-belajar1.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px] mt-5">
                <li class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px] mt-5" >Pilih tab <b>My Profile</b> pada halaman dashboard guru.</li>
                <img src="{{asset("images/profil-guru.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px] mt-5">
                <li class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px] mt-5" >Siswa dapat melakukan edit email, password, dan konfirmasi password. Pastikan <b>password dan konfirmasi password</b> terisi dan sesuai sebelum disimpan.</li>
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
