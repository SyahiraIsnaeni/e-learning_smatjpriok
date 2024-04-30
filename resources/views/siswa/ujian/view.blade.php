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

    <style>
        .editable {
            background-color: white !important;
        }
    </style>
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
                class="text-white py-2.5 block text-center text-sm hover:text-oren"
            >Dashboard</a
            >
            <a
                href="{{route("course-siswa", $siswa->id)}}"
                class="text-white py-2.5 block text-center text-sm hover:text-oren"
            >My Courses</a
            >
            <a
                href="../../profile/siswa.html"
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
                <p class="hover:text-oren">Dashboard</p>
            </a>
            <a href="{{route("course-siswa", $siswa->id)}}">
                <p class="hover:text-oren">My Courses</p>
            </a>
            <a href="../../profile/siswa.html">
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

<!-- MAPEL UJIAN -->
<section class="text-black mt-8 xl:mt-12">
    <div class="mx-5 sm:mx-8 lg:mx-10 xl:mx-20">
        <h1 class="font-bold text-lg lg:text-xl xl:text-2xl">Ujian</h1>
        <h1
            class="font-medium text-sm lg:text-base xl:text-lg mt-1.5 lg:mt-2.5 xl:mt-3"
        >
            {{$mapel["nama_mapel"]}}
        </h1>
    </div>
</section>

<!-- LIST UJIAN -->
<section class="text-black mt-8 mb-10 xl:mt-10">
    <div class="mx-5 sm:mx-8 lg:mx-10 xl:mx-20">
        @foreach($ujian as $row)
            <a href="{{route('detail-siswa-examination', ['mapelId' => $mapel['mapel_id'], 'pengerjaanUjianId' => $row->id, 'siswaId' => $siswa->id])}}">
                <div
                    class="bg-white lg:mt-3 mt-2 flex bg-opacity-90 shadow px-3 py-3 lg:py-4 rounded-lg border border-black border-opacity-25 transition ease-in-out hover:-translate-y-1.5 duration-300 hover:shadow-md"
                >
                    <div class="sm:w-2/3 mr-2 sm:mr-5 ml-2 md:ml-3 lg:ml-5 w-full">
                        <!-- TAMPILAN HP -->
                        <div class="sm:hidden flex">
                            <div>
                                <h1
                                    class="font-bold text-[15px] md:text-[15.5px] lg:text-base"
                                >
                                    {{$row->judul}}
                                </h1>
                                <p
                                    class="block sm:hidden font-normal text-[11px] lg:text-[13px] mt-1.5"
                                >
                                    Diposting: {{$row->created_at->format('j F Y')}}
                                </p>
                                <p
                                    class="font-normal text-[11px] sm:text-xs lg:text-[13px] mt-0.5 lg:mt-1.5"
                                >
                                    Tenggat: {{ \Carbon\Carbon::parse($row->deadline)->format('j F Y, \p\u\k\u\l H:i') }}
                                </p>
                            </div>
                            <div class="flex justify-center ml-auto pl-3 mt-1">
                                <div
                                    class="rounded-full w-[7px] h-[7px] bg-[#A33F46] mt-[5px]"
                                ></div>
                                <p class="text-[#A33F46] text-xs font-semibold ml-1">
                                    Belum Dikerjakan
                                </p>
                            </div>
                        </div>

                        <!-- TAMPILAN TABLET KEATAS -->
                        <div class="hidden sm:block">
                            <div class="flex">
                                <h1
                                    class="font-bold text-[15px] md:text-[15.5px] lg:text-base"
                                >
                                    {{$row->judul}}
                                </h1>
                                <p
                                    class="hidden sm:block font-normal text-xs lg:text-[13px] mt-1 ml-1"
                                >
                                    | Diposting: {{$row->created_at->format('j F Y')}}
                                </p>
                            </div>
                            <p
                                class="font-normal text-[11px] sm:text-xs lg:text-[13px] mt-1 lg:mt-1.5"
                            >
                                Tenggat: {{ \Carbon\Carbon::parse($row->deadline)->format('j F Y, \p\u\k\u\l H:i') }}
                            </p>
                        </div>
                        <p
                            class="text-xs md:text-[12.5px] lg:text-[13.5px] leading-normal mt-1.5 text-justify"
                        >
                            {{ strlen(strip_tags($row->deskripsi)) > 250 ? substr(strip_tags($row->deskripsi), 0, 250) . '...' : strip_tags($row->deskripsi) }}
                        </p>
                    </div>

                    <div class="hidden sm:block w-1/3 mt-3 sm:mt-2 lg:mt-1.5 relative">
                        <div class="flex justify-center">
                            <div
                                class="rounded-full w-[7px] h-[7px] bg-[#A33F46] mt-[5px]"
                            ></div>
                            <p
                                class="text-[#A33F46] text-xs lg:text-[13px] font-semibold ml-1 lg:ml-1.5"
                            >
                                Belum Dikerjakan
                            </p>
                        </div>
                        <div
                            class="flex flex-col items-center left-1/2 transform -translate-x-1/2 absolute bottom-0 mb-3 sm:mb-2 lg:mb-1.5"
                        >
                            <p class="text-xs lg:text-[13px] mt-8 font-medium flex">
                                <span class="underline">Selengkapnya</span>
                                <span
                                ><svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        height="16"
                                        width="14"
                                        viewBox="0 0 448 512"
                                        class="ml-1 block mt-0.5 lg:mt-[1px]"
                                    >
                      <path
                          d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"
                      /></svg
                                    ></span>
                            </p>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
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
