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
                href="{{route("profile-siswa", $siswa->id)}}"
                class="text-white py-2.5 block text-center text-sm hover:text-oren"
            >My Profile</a
            >
            <a
                href="{{route("tutorial-siswa", $siswa->id)}}"
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
            <a href="{{route("profile-siswa", $siswa->id)}}">
                <p class="hover:text-oren">My Profile</p>
            </a>
            <a href="{{route("tutorial-siswa", $siswa->id)}}">
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

<!-- MAPEL DAN KELAS -->
<section class="text-black mt-8 xl:mt-12">
    <div class="mx-5 sm:mx-8 lg:mx-10 xl:mx-20">
        <h1 class="font-bold text-lg lg:text-xl xl:text-2xl">
            Materi {{$materi["materi"]->judul}}
        </h1>
        <h1
            class="font-medium text-sm lg:text-base xl:text-lg mt-1.5 lg:mt-2.5 xl:mt-3"
        >
            {{$mapel["nama_mapel"]}}
        </h1>
    </div>
</section>

<!-- DETAIL MATERI -->
<section class="mt-8 lg:mt-10 xl:mt-12 mb-10">
    <div class="mx-5 sm:mx-8 lg:mx-10 xl:mx-20">
        <!-- GAMBAR -->
        @if($materi["materi"]->gambar != null)
            <div>
                <img
                    class="w-[300px] h-[210px] sm:w-[320px] sm:h-[230px] md:w-[350px] md:h-[250px] lg:w-[400px] lg:h-[270px] xl:w-[440px] xl:h-[290px] object-cover object-center rounded-sm mx-auto"
                    src="{{ asset('storage/public/materi/gambar/' . $materi["materi"]->gambar) }}"
                />
            </div>
        @endif
        <!-- ISI MATERI -->
        <div>
            <p
                class="text-[12.5px] md:text-[13px] lg:text-sm xl:text-[15px] lg:leading-relaxed text-justify mt-5"
            >
                {!! $materi["materi"]->deskripsi !!}
            </p>
        </div>
        <!-- DOKUMEN -->
        <div class="mt-5">
            @foreach($materi["materi"]->dokumen as $doc)
                <a
                    href="{{ asset('storage/public/materi/dokumen/' . $doc->dokumen) }}"
                    class="text-[12.5px] md:text-[13px] lg:text-sm xl:text-[15px] underline"
                >
                    <div class="flex py-0.5">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 384 512"
                            class="w-4 h-4 mt-1"
                        >
                            <path
                                d="M320 464c8.8 0 16-7.2 16-16V160H256c-17.7 0-32-14.3-32-32V48H64c-8.8 0-16 7.2-16 16V448c0 8.8 7.2 16 16 16H320zM0 64C0 28.7 28.7 0 64 0H229.5c17 0 33.3 6.7 45.3 18.7l90.5 90.5c12 12 18.7 28.3 18.7 45.3V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64z"
                            />
                        </svg>
                        <p class="ml-1">{{$doc->dokumen}}</p>
                    </div>
                </a>
            @endforeach
        </div>
        <!-- TOMBOL -->
        <div class="mt-8 flex">
            <a href="{{route("course-siswa-material", ['mapelId' => $mapel['mapel_id'], 'siswaId' => $siswa->id])}}">
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
            @if($materi["is_read"] == 0)
                <form action="{{route("detail-read-siswa-material", ["mapelId" => $mapel["mapel_id"], "materiId" => $materi["materi"]->id, "siswaId" => $siswa->id])}}" method="post" enctype="multipart/form-data" class="ml-auto">
                    @csrf
                    <input type="hidden" name="is_read" value="1">
                    <button type="submit"
                            class="bg-[#01C91A] bg-opacity-80 py-2 px-3 lg:py-2.5 lg:px-3.5 rounded-md transition hover:scale-105 hover:duration-300 flex"
                    >
                        <p class="text-[12.5px] md:text-[13px] lg:text-sm font-semibold">
                            Sudah Dibaca
                        </p>
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 448 512"
                            class="ml-1 w-4 h-4"
                        >
                            <path
                                d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"
                            />
                        </svg>
                    </button>
                </form>
            @else
                <div class="bg-white border border-black border-opacity-20 flex px-3 py-2 rounded-md ml-auto">
                    <p class="text-[12.5px] text-[#01C91A] md:text-[13px] lg:text-sm font-semibold ml-auto">
                        Sudah Dibaca
                    </p>
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 448 512"
                        class="ml-1 w-4 h-4"
                        fill="#01C91A"
                    >
                        <path
                            d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"
                        />
                    </svg>
                </div>
            @endif

        </div>
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
