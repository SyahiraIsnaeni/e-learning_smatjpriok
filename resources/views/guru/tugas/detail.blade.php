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
    <link
        rel="stylesheet"
        href={{asset("../editor/richtexteditor/rte_theme_default.css")}}
    />
    <script
        type="text/javascript"
        src={{asset("../editor/richtexteditor/rte.js")}}
    ></script>
    <script
        type="text/javascript"
        src={{asset("../editor/richtexteditor/plugins/all_plugins.js")}}
    ></script>
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
                href="{{route("profile-guru", $guru->id)}}"
                class="text-white py-2.5 block text-center text-sm hover:text-oren"
            >My Profile</a
            >
            <a
                href="{{route("tutorial-guru", $guru->id)}}"
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
            <a href="{{route("profile-guru", $guru->id)}}">
                <p class="hover:text-oren">My Profile</p>
            </a>
            <a href="{{route("tutorial-guru", $guru->id)}}">
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
                Pengerjaan Tugas {{$tugas->judul}}
            </h1>
            <h1
                class="font-medium text-sm lg:text-base xl:text-lg mt-2.5 lg:mt-3.5 xl:mt-3"
            >
                {{$mapel["nama_mapel"]}} - {{$mapel["nama_kelas"]}}
            </h1>
        </div>
        <div class="ml-auto">
            <a href="{{route("course-guru-assignment", ['mapelId' => $mapel['mapel_id'], 'guruId' => $guru->id])}}" class="hidden sm:block ml-auto">
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

<!-- PETUNJUK TUGAS -->
<section class="text-black mt-8 xl:mt-10">
    <div class="mx-5 sm:mx-8 lg:mx-10 xl:mx-20">
        <div
            class="py-3.5 px-4 sm:py-4 sm:px-4 md:px-5 md:py-5 bg-white rounded-md shadow border border-black border-opacity-25"
        >
            <h1
                class="text-[13.5px] sm:text-sm md:text-[14.5px] lg:text-[15px] xl:text-base font-bold"
            >
                Petunjuk Tugas
            </h1>
            <p
                class="text-[13px] sm:text-[13.5px] md:text-sm lg:text-[14.5px] xl:text-[15px] mt-3 md:mt-4 leading-relaxed"
            >
                {!! $tugas->deskripsi !!}
            </p>
            @foreach($tugas->dokumen as $row)
            <a
                href="{{ asset('storage/public/tugas/dokumen/' . $row->dokumen) }}"
                class="text-[12.5px] sm:text-[13px] md:text-[13.5px] lg:text-sm xl:text-[14.5px] underline"
            >
                <div class="flex py-0.5 mt-2 md:mt-3">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 384 512"
                        class="w-4 h-4"
                    >
                        <path
                            d="M320 464c8.8 0 16-7.2 16-16V160H256c-17.7 0-32-14.3-32-32V48H64c-8.8 0-16 7.2-16 16V448c0 8.8 7.2 16 16 16H320zM0 64C0 28.7 28.7 0 64 0H229.5c17 0 33.3 6.7 45.3 18.7l90.5 90.5c12 12 18.7 28.3 18.7 45.3V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64z"
                        />
                    </svg>
                    <p class="ml-1">{{$row->dokumen}}</p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>

<!-- LIST PENGERJAAN TUGAS -->
<section class="text-black mt-5 mb-10">
    <div class="mx-5 sm:mx-8 lg:mx-10 xl:mx-20">
        <div
            class="px-4 py-3.5 sm:py-4 sm:px-4 md:px-5 md:py-5 bg-white rounded-md shadow border border-black border-opacity-25"
        >
            <div class="sm:flex">
                <h1
                    class="text-[13.5px] md:text-[14.5px] lg:text-[15px] xl:text-base sm:text-sm font-bold"
                >
                    Pengumpulan Tugas
                </h1>
                <div class="sm:ml-auto flex">
                    <a class="w-fit" href="{{route("detail-nilai-guru-assignment", ["mapelId" => $mapel["mapel_id"], "tugasId" => $tugas->id, "guruId" => $guru->id])}}">
                        <div class="bg-green-700 px-2.5 py-1.5 hover:scale-105 duration-300 rounded-md mr-5">
                            <p class="text-white text-xs sm:text-[13px] md:text-[13.5px] lg:text-sm xl:text-[14.5px] font-normal">Export Nilai</p>
                        </div>
                    </a>
                    <p
                        class="text-xs sm:text-[13px] md:text-[13.5px] lg:text-sm xl:text-[14.5px] font-normal mt-2 pt-1 sm:mt-0 "
                    >
                        Total Pengumpulan: {{count($tugas->pengerjaanTugas)}} Siswa
                    </p>
                </div>
            </div>
            <!-- TAMPILAN HP -->
            <div class="mt-5 md:hidden">
                @foreach($tugas->pengerjaanTugas as $row)
                    <a href="{{route('detail-penilaian-guru-assignment', ['mapelId' => $mapel['mapel_id'], 'tugasId' => $tugas->id, 'pengerjaanTugasId' => $row->id, 'guruId' => $guru->id])}}">
                        <div
                            class="mt-3 py-3 px-3 flex bg-[#E6F4F1] rounded-md border border-black border-opacity-20 transition hover:-translate-y-0.5 hover:shadow-md hover:duration-200"
                        >
                            <p class="text-xs sm:text-[12.5px] font-medium w-1/2 sm:w-1/3">
                                {{$row->siswa->nama}}
                            </p>
                            <p
                                class="text-xs sm:text-[12.5px] font-medium w-1/2 sm:w-1/3 text-center"
                            >
                                {{$row->status}}
                            </p>
                            <p
                                class="text-xs sm:text-[12.5px] hidden font-medium sm:block sm:w-1/3 sm:text-right"
                            >
                                {{ $row->updated_at->format('d/m/Y, \p\u\k\u\l H:i') }}
                            </p>
                        </div>
                    </a>
                @endforeach

            </div>

            <!-- TAMPILAN TABLET - LAPTOP -->
            <div class="mt-6 hidden md:block">
                @foreach($tugas->pengerjaanTugas as $row)
                    @if(count($tugas->pengerjaanTugas) != 0)
                            <div
                                class="mt-3 py-3 lg:py-3.5 px-5 lg:px-10 xl:px-16 flex bg-[#E6F4F1] rounded-md border border-black border-opacity-20"
                            >
                                <p
                                    class="text-[13px] lg:text-[13.5px] xl:text-sm font-medium w-1/5"
                                >
                                    {{$row->siswa->nama}}
                                </p>
                                <p
                                    class="text-[13px] lg:text-[13.5px] xl:text-sm font-medium w-1/5 text-center"
                                >
                                    {{$row->status}}
                                </p>
                                <p
                                    class="text-[13px] lg:text-[13.5px] xl:text-sm font-medium w-1/5 text-center"
                                >
                                    {{ $row->updated_at->format('d/m/Y, \p\u\k\u\l H:i') }}
                                </p>
                                @if($row->nilai != null)
                                    <p
                                        class="text-[13px] lg:text-[13.5px] xl:text-sm font-medium w-1/5 text-center"
                                    >
                                        Sudah dinilai
                                    </p>
                                @else
                                    <p
                                        class="text-[13px] lg:text-[13.5px] xl:text-sm font-medium w-1/5 text-center"
                                    >
                                        belum dinilai
                                    </p>
                                @endif
                                <a
                                    href="{{route('detail-penilaian-guru-assignment', ['mapelId' => $mapel['mapel_id'], 'tugasId' => $tugas->id, 'pengerjaanTugasId' => $row->id, 'guruId' => $guru->id])}}"
                                    class="flex justify-end ml-auto hover:text-[#D78010] hover:font-semibold"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 576 512"
                                        class="h-4 w-6 mt-0.5 fill-current hover:text-orange-500"
                                    >
                                        <path
                                            d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"
                                        />
                                    </svg>
                                    <p
                                        class="underline text-[13px] lg:text-[13.5px] xl:text-sm ml-0.5 font-medium"
                                    >
                                        Lihat Tugas
                                    </p>
                                </a>
                            </div>
                    @else
                        <p class="mt-3 font-medium text-xs sm:text-[13px] lg:text-[13.5px] xl:text-sm">Belum ada pengumpulan tugas</p>
                    @endif
                @endforeach
            </div>
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
