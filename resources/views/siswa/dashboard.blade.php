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
                href="{{route("dashboard-siswa", $siswa->id)}}"
                class="text-white py-2.5 block text-center text-sm hover:text-oren font-bold underline underline-offset-8 decoration-2 decoration-oren"
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
                href="#"
                class="text-white py-2.5 block text-center text-sm hover:text-oren"
            >Tutorial</a
            >
            <form action="{{ route('logout-siswa') }}" method="post" style="display: flex; justify-content: center; align-items: center;">
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
            <a href="{{route("dashboard-siswa", $siswa->id)}}">
                <p
                    class="hover:text-oren font-bold underline underline-offset-8 decoration-2 decoration-oren"
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
            <a href="#">
                <p class="hover:text-oren">Tutorial</p>
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
        Selamat Datang {{$siswa->nama}}
    </h1>
    <p
        class="font-medium text-[14px] md:text-[15px] lg:text-base xl:text-lg mt-2 xl:mt-3"
    >
        Selamat belajar, dunia menanti kecerdasanmu!
    </p>
</div>

<!-- CONTENT -->
<section
    class="mx-5 sm:mx-8 xl:mx-20 lg:mx-10 mt-8 xl:mt-10 mb-10 md:grid md:grid-cols-2 md:gap-5 lg:gap-8 xl:gap-20"
>
    <!-- PROGRES AKTIVITAS -->
    <div
        class="bg-[#244868] py-5 px-5 lg:px-6 xl:py-8 xl:px-8 rounded-lg relative bg-opacity-95"
    >
        <div class="flex items-center">
            <!-- PROGRES BAR -->
            <div class="flex items-left justify-left mb-5 xl:ml-5 xl:mt-4">
                <svg class="w-40 h-40">
                    <g transform="scale(4)">
                        <circle
                            cx="20"
                            cy="20"
                            r="16"
                            fill="none"
                            stroke="#000000"
                            stroke-width="8"
                        />
                        <circle
                            id="progress"
                            cx="20"
                            cy="20"
                            r="15.9"
                            fill="none"
                            stroke="#EE982B"
                            stroke-width="8"
                            stroke-dasharray="0, 100"
                        />
                    </g>
                    <circle cx="79.5" cy="80.5" r="48.5" fill="#FFEBCD" />
                    <text
                        x="50%"
                        y="50%"
                        text-anchor="middle"
                        alignment-baseline="middle"
                        font-size="15"
                        fill="#000"
                        id="progressText"
                        font-weight="bold"
                    ></text>
                </svg>
            </div>


            <!-- KETERANGAN -->
            <div class="block ml-5 sm:ml-8 md:ml-5 lg:ml-8 xl:ml-16">
                <div class="flex items-center -mt-10">
                    <div class="w-4 h-2.5 bg-oren"></div>
                    <p
                        class="block ml-2 text-[11px] lg:text-[12px] xl:text-[13px] xl:font-normal text-white font-thin tracking-wide"
                    >
                        Progres yang sudah dikerjakan
                    </p>
                </div>
                <div class="flex items-center mt-2">
                    <div class="w-4 h-2.5 bg-black"></div>
                    <p
                        class="block ml-2 text-[11px] lg:text-[12px] xl:text-[13px] xl:font-normal text-white font-thin tracking-wide"
                    >
                        Progres yang belum dikerjakan
                    </p>
                </div>
            </div>
        </div>

        <!-- PROGRES AKTIVITAS ANDA -->
        <div class="text-white">
            <h1
                class="font-semibold text-base lg:text-[17px] xl:text-[18px] md:mt-1 xl:mt-3"
            >
                Progres Aktivitas Anda
            </h1>
            <p
                class="font-thin xl:font-light text-xs sm:text-[13px] lg:text-[13.5px] xl:text-[15px] leading-normal xl:leading-relaxed sm:tracking-wide mt-1 md:mt-1.5 lg:mt-2 xl:mt-2.5"
            >
                Terdapat beberapa kegiatan menarik yang perlu kamu selesaikan. Ayo,
                jangan tunggu lebih lama lagi, selesaikan aktivitasnya sekarang!
            </p>
        </div>
    </div>

    <!-- AKTIVITAS BELAJAR -->
    <div
        class="bg-[#00ABA2] py-5 px-5 lg:px-6 xl:py-7 xl:px-7 rounded-lg mt-7 md:mt-0 bg-opacity-75"
    >
        <h1
            class="text-black font-bold text-base lg:text-[17px] xl:text-[18px]"
        >
            Aktivitas Belajar
        </h1>
        <div class="">
            <div
                class="mb-2 bg-[#F1F1E6] rounded-md transition ease-in-out hover:-translate-y-1 duration-300 hover:shadow-lg"
            >
                @if($firstMateri && $firstMateri->judul != null)
                    <a href="{{route("detail-siswa-material", ["mapelId" => $firstMateri->mapel->id, "materiId" => $firstMateri->id, "siswaId" => $siswa->id])}}">
                        <div
                            class="text-black mt-4 xl:mt-5 py-3 px-3 xl:px-5 lg:py-3.5 xl:py-4"
                        >
                            <h2
                                class="font-semibold text-[13px] md:text-[14px] lg:text-[14.5px] xl:text-[15px]"
                            >
                               Materi {{ $firstMateri->judul }}
                            </h2>
                            <p
                                class="font-normal text-xs md:text-[13px] lg:text-[13.5px] xl:text-[14px] mt-1.5 sm:mt-2"
                            >
                                {{ $firstMateri->mapel->nama }}
                            </p>
                        </div>
                    </a>
                @else
                @endif
            </div>
            <div
                class="mb-2 bg-[#F1F1E6] rounded-md transition ease-in-out hover:-translate-y-1 duration-300 hover:shadow-lg"
            >
                @if($firstTugas && $firstTugas->judul != null)
                <a href="{{route("detail-siswa-assignment", ["mapelId" => $firstTugas->mapel->id, "pengerjaanTugasId" => $firstTugas->id, "siswaId" => $siswa->id])}}">
                    <div class="text-black mt-3 xl:mt-4 py-3 xl:px-5 px-3 xl:py-4">
                        <h2
                            class="font-semibold text-[13px] md:text-[14px] lg:text-[14.5px] xl:text-[15px]"
                        >
                            Tugas {{ $firstTugas->judul }}
                        </h2>
                        <p
                            class="font-normal text-xs mt-1.5 md:text-[13px] xl:text-[14px] sm:mt-2 lg:text-[13.5px]"
                        >
                            {{ $firstTugas->mapel->nama }}
                        </p>
                    </div>
                </a>
                @else
                @endif
            </div>
            <div
                class="mb-2 bg-[#F1F1E6] rounded-md transition ease-in-out hover:-translate-y-1 duration-300 hover:shadow-lg"
            >
                @if($firstUjian && $firstUjian->judul != null)
                <a href="{{route("detail-siswa-examination", ["mapelId" => $firstUjian->mapel->id, "pengerjaanUjianId" => $firstUjian->id, "siswaId" => $siswa->id])}}">
                    <div
                        class="text-black mt-3 xl:mt-4 py-3 px-3 xl:px-5 lg:py-3.5 xl:py-4"
                    >
                        <h2
                            class="font-semibold text-[13px] md:text-[14px] lg:text-[14.5px] xl:text-[15px]"
                        >
                            Ujian {{ $firstUjian->judul }}
                        </h2>
                        <p
                            class="font-normal text-xs mt-1.5 md:text-[13px] sm:mt-2 lg:text-[13.5px] xl:text-[14px]"
                        >
                            {{ $firstUjian->mapel->nama }}
                        </p>
                    </div>
                </a>
                @else
                @endif
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const progress = document.getElementById("progress");
            const progressText = document.getElementById("progressText");

            function updateProgress(percentage) {
                const dashArray = {{$totalSelesai}};
                progress.style.strokeDasharray = `${dashArray}, 100`;
                progressText.textContent = `{{$totalSelesai}}%`;
            }

            // Example: Set the progress to 50%
            updateProgress(75);
        });
    </script>
</section>

<section class="mt-5 md:mt-10 lg:mt-12 mx-5 sm:mx-8 xl:mx-20 lg:mx-10 xl:mt-10 mb-10 ">
    <div class="transition ease-in-out hover:-translate-y-1 duration-300 hover:shadow-lg rounded-lg">
        <a href="../ujian/list-ujian/siswa.html">
            <div class="mt-5 md:mt-0 bg-[#FFA15D]  px-5 sm:px-7 py-6 lg:py-7 xl:px-8 xl:py-8 rounded-lg bg-opacity-95">
                <h1 class="font-semibold text-[16px] lg:text-[17px] xl:text-lg">Jadwal Pelajaran</h1>
                <p class="font-normal text-[13px] sm:text-[13.5px] xl:text-sm xl:tracking-normal xl:leading-relaxed xl:mt-2 mt-1.5 leading-relaxed">
                    Ayo, mari kita telusuri jadwal pelajaranmu dengan semangat untuk meraih impian akademismu yang gemilang! Dengan menjalankan jadwal ini sebagai panduan, kamu dapat membentuk kebiasaan belajar yang teratur, mencapai prestasi tertinggi, dan menggali potensi tersembunyi sepenuhnya. Ayo, bersemangat dan berjuang bersama untuk meraih kesuksesan!
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
