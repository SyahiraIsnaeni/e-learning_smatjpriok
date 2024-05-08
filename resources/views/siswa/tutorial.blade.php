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
                href="{{route("dashboard-siswa", $siswa->id)}}"
                class="text-white py-2.5 block text-center text-sm hover:text-oren "
            >Dashboard</a
            >
            <a
                href="{{route("course-siswa", $siswa->id)}}"
                class="text-white py-2.5 block text-center text-sm hover:text-oren"
            >My Courses</a
            >
            <a
                href="{{route("profile-siswa", $siswa->id)}}"
                class="text-white py-2.5 block text-center text-sm hover:text-oren"
            >My Profile</a
            >
            <a
                href="{{route("tutorial-siswa")}}"
                class="text-white py-2.5 block text-center text-sm hover:text-oren font-bold underline underline-offset-8 decoration-2 decoration-oren"
            >Tutorial</a
            >
            <form action="{{ route('logout-siswa') }}" method="post" style="display: flex; justify-content: center; align-items: center;">
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
            <a href="{{route("dashboard-siswa", $siswa->id)}}">
                <p
                    class="hover:text-oren"
                >
                    Dashboard
                </p>
            </a>
            <a href="{{route("course-siswa", $siswa->id)}}">
                <p class="hover:text-oren">My Courses</p>
            </a>
            <a href="{{route("profile-siswa", $siswa->id)}}">
                <p class="hover:text-oren">My Profile</p>
            </a>
            <a href="{{route("tutorial-siswa")}}">
                <p class="hover:text-oren  font-bold underline underline-offset-8 decoration-2 decoration-oren">Tutorial</p>
            </a>
            <form action="{{ route('logout-siswa') }}" method="post" >
                @csrf
                <button type="submit" class="hover:text-oren">
                    <span>Logout</span>
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
            <h1 class="font-semibold text-base lg:text-lg xl:text-xl">A. Mengakses Materi</h1>
            <ol class="list-decimal mx-5 sm:mx-8 lg:mx-10 xl:mx-20 mt-5 lg:mt-10">
                <img src="{{asset("images/login-siswa1.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px]">
                <li class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px] mt-5" >Login terlebih dahulu dengan memasukkan <b>Email/NIS dan password</b> pada kolom input login.</li>
                <img src="{{asset("images/dashboard-siswa.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px] mt-5">
                <li class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px] mt-5" >Setelah login, Siswa akan diarahkan ke halaman dashboard. Pada dashboard tersebut, siswa dapat melihat progres kegiatan belajar siswa. Siswa juga dapat mengakses materi, tugas, dan ujian terbaru yang diunggah oleh guru. Siswa juga dapat mengakses fitur jadwal belajar siswa</li>
                <img src="{{asset("images/course-siswa.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px] mt-5">
                <li class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px] mt-5" >Pilih menu mata pelajaran yang diinginkan untuk diakses.</li>
                <img src="{{asset("images/materi-siswa1.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px] mt-5">
                <li class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px] mt-5" >Pilih menu <b>materi pelajaran</b>.</li>
                <img src="{{asset("images/materi-siswa2.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px] mt-5">
                <li class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px] mt-5" >Siswa akan diarahkan ke halaman <b>view materi</b>. Pada halaman ini, siswa dapat memilih materi yang ingin dibaca. Jika ingin kembali, maka klik tombol kembali.</li>
                <img src="{{asset("images/materi-siswa3.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px] mt-5">
                <img src="{{asset("images/materi-siswa4.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px] mt-5">
                <li class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px] mt-5" >Setelah memilih materi yang diinginkan, siswa dapat melihat detail materi tersebut. Jika sudah selesai dibaca, maka siswa dapat menandai <b>sudah dibaca</b> pada tombol di akhir materi di posisi pojok kanan bawah</li>
                <img src="{{asset("images/materi-siswa5.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px] mt-5">
                <li class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px] mt-5" >Setelah menandai materi "sudah dibaca", maka status materi tersebut sudah berubah menjadi <b>sudah dibaca</b>.</li>
            </ol>
        </div>
        <div class="mt-7 lg:mt-10 xl:mt-12">
            <h1 class="font-semibold text-base lg:text-lg xl:text-xl">B. Mengakses Tugas</h1>
            <ol class="list-decimal mx-5 sm:mx-8 lg:mx-10 xl:mx-20 mt-5 lg:mt-10">
                <img src="{{asset("images/login-siswa1.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px]">
                <li class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px] mt-5" >Login terlebih dahulu dengan memasukkan <b>Email/NIS dan password</b> pada kolom input login. Jika sudah melakukan step ini, silakan skip step ini.</li>
                <img src="{{asset("images/dashboard-siswa.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px] mt-5">
                <li class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px] mt-5" >Pilih tab <b>My Courses</b> untuk mengakses mata pelajaran.</li>
                <img src="{{asset("images/course-siswa.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px] mt-5">
                <li class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px] mt-5" >Pilih <b>mata pelajaran</b> yang diinginkan.</li>
                <img src="{{asset("images/tugas-siswa1.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px] mt-5">
                <li class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px] mt-5" >Pilih menu <b>tugas</b> untuk mengakses tugas-tugas siswa.</li>
                <img src="{{asset("images/tugas-siswa2.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px] mt-5">
                <li class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px] mt-5" >Silakan pilih tugas yang ingin dikerjakan. Jika ingin kembali silakan klik tombol kembali.</li>
                <img src="{{asset("images/tugas-siswa3.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px] mt-5">
                <li class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px] mt-5" >Pada halaman detail tugas, siswa dapat melihat petunjuk tugas dan mengunggah dokumen pengerjaan tugas. Dokumen pengerjaan tugas dapat diunggah lebih dari 1 file. Jika ingin kembali silakan klik tombol kembali.</li>
                <img src="{{asset("images/tugas-siswa4.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px] mt-5">
                <li class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px] mt-5" >Jika tugas sudah diunggah, maka akan tampil halaman seperti pada gambar di atas. Jika ingin membatalkan tugas yang ingin dikumpulkan, klik tombol <b>batalkan</b> sehingga tugas otomatis dibatalkan pengumpulannya. Jika ingin kembali silakan klik tombol kembali.</li>
                <img src="{{asset("images/tugas-siswa5.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px] mt-5">
                <li class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px] mt-5" >Jika tugas telah diserahkan, maka status tugas adalah <b>sudah diserahkan</b>. Jika ingin kembali silakan klik tombol kembali.</li>
                <img src="{{asset("images/tugas-siswa6.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px] mt-5">
                <li class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px] mt-5" >Jika tugas sudah dinilai, maka tampilan detail pengerjaan tugas akan seperti gambar di atas. Jika ingin kembali silakan klik tombol kembali.</li>
            </ol>
        </div>
        <div class="mt-7 lg:mt-10 xl:mt-12">
            <h1 class="font-semibold text-base lg:text-lg xl:text-xl">C. Mengakses Ujian</h1>
            <ol class="list-decimal mx-5 sm:mx-8 lg:mx-10 xl:mx-20 mt-5 lg:mt-10">
                <img src="{{asset("images/login-siswa1.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px]">
                <li class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px] mt-5" >Login terlebih dahulu dengan memasukkan <b>Email/NIS dan password</b> pada kolom input login. Jika sudah melakukan step ini, silakan skip step ini.</li>
                <img src="{{asset("images/dashboard-siswa.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px] mt-5">
                <li class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px] mt-5" >Pilih tab <b>My Courses</b> untuk mengakses mata pelajaran.</li>
                <img src="{{asset("images/course-siswa.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px] mt-5">
                <li class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px] mt-5" >Pilih <b>mata pelajaran</b> yang diinginkan.</li>
                <img src="{{asset("images/ujian-siswa1.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px] mt-5">
                <li class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px] mt-5" >Pilih menu <b>ujian</b> untuk mengakses ujian-ujian siswa.</li>
                <img src="{{asset("images/ujian-siswa2.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px] mt-5">
                <li class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px] mt-5" >Silakan pilih ujian yang ingin dikerjakan. Jika ingin kembali silakan klik tombol kembali.</li>
                <img src="{{asset("images/ujian-siswa3.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px] mt-5">
                <li class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px] mt-5" >Setelah memilih ujian yang ingin dikerjakan, akan disediakan halaman petunjuk ujian. Jika ingin mulai mengerjakan ujian, maka klik tombol <b>mulai ujian</b>. Jika ingin kembali silakan klik tombol kembali.</li>
                <img src="{{asset("images/ujian-siswa4.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px] mt-5">
                <li class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px] mt-5" >Setelah klik tombol <b>mulai ujian</b>, maka akan muncul soal ujian berupa essay. Kerjakan ujian tersebut tanpa membuka halaman lain agar meminimalisasi error pada ujian yang dikerjakan. Kumpulkan ujian 5 menit sebelum waktu habis untuk memaksimalkan pengumpulan ujian agar tidak terjadi error dalam pengumpulan. <span>Jika siswa tidak mengumpulkan ujian sampai waktu habis, maka form ujian akan terkumpul secara otomatis.</span></li>
                <img src="{{asset("images/ujian-siswa5.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px] mt-5">
                <li class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px] mt-5" >Jika ujian telah dikumpulkan, maka status ujian pada <b>view ujian</b> akan menjadi <span class="text-green-600 font-semibold">sudah dikerjakan</span>. Jika ingin kembali silakan klik tombol kembali.</li>
                <img src="{{asset("images/ujian-siswa6.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px] mt-5">
                <li class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px] mt-5" >Jika ingin melihat nilai ujian, maka klik ujian yang diinginkan sehingga akan diarahkan ke halaman petunjuk ujian. Selanjutnya, klik tombol <b>lihat nilai</b>. Jika ingin kembali silakan klik tombol kembali.</li>
                <img src="{{asset("images/ujian-siswa7.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px] mt-5">
                <li class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px] mt-5" >Siswa akan diarahkan ke halaman detail penilaian. Jika ingin kembali silakan klik tombol kembali</li>
            </ol>
        </div>
        <div class="mt-7 lg:mt-10 xl:mt-12">
            <h1 class="font-semibold text-base lg:text-lg xl:text-xl">D. Melihat Jadwal Belajar</h1>
            <ol class="list-decimal mx-5 sm:mx-8 lg:mx-10 xl:mx-20 mt-5 lg:mt-10">
                <img src="{{asset("images/login-siswa1.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px]">
                <li class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px] mt-5" >Login terlebih dahulu dengan memasukkan <b>Email/NIS dan password</b> pada kolom input login. Jika sudah melakukan step ini, silakan skip step ini.</li>
                <img src="{{asset("images/jadwal-belajar1.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px] mt-5">
                <li class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px] mt-5" >Pilih menu <b>jadwal belajar</b> pada halaman dashboard siswa.</li>
                <img src="{{asset("images/jadwal-belajar2.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px] mt-5">
                <li class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px] mt-5" >Siswa akan diarahkan ke halaman jadwal belajar siswa.</li>
            </ol>
        </div>
        <div class="mt-7 lg:mt-10 xl:mt-12">
            <h1 class="font-semibold text-base lg:text-lg xl:text-xl">D. Mengubah Profil Siswa</h1>
            <ol class="list-decimal mx-5 sm:mx-8 lg:mx-10 xl:mx-20 mt-5 lg:mt-10">
                <img src="{{asset("images/login-siswa1.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px]">
                <li class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px] mt-5" >Login terlebih dahulu dengan memasukkan <b>Email/NIS dan password</b> pada kolom input login. Jika sudah melakukan step ini, silakan skip step ini.</li>
                <img src="{{asset("images/jadwal-belajar1.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px] mt-5">
                <li class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px] mt-5" >Pilih tab <b>My Profile</b> pada halaman dashboard siswa.</li>
                <img src="{{asset("images/profil-siswa.png")}}" class="object-cover mx-auto lg:w-[600px] xl:w-[800px] xl:h-[350px] lg:h-[300px] mt-5">
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
