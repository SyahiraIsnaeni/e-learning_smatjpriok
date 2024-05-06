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
            <a href="{{route("profile-guru", $guru->id)}}">
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
<section class="text-black mt-8 xl:mt-12 md:flex">
    <div class="mx-5 sm:mx-8 lg:mx-10 xl:mx-20 md:mr-10">
        <h1 class="font-bold text-lg lg:text-xl xl:text-2xl">
            Ujian {{$mapel["nama_mapel"]}}
        </h1>
        <h1
            class="font-medium text-sm lg:text-base xl:text-lg mt-1.5 lg:mt-2.5 xl:mt-3"
        >
            {{$mapel["nama_kelas"]}}
        </h1>
    </div>
    <div class="hidden md:block ml-auto mr-5 sm:mr-8 lg:mr-10 xl:mr-20">
        <a href="{{route("course-guru-detail", ['mapelId' => $mapel['mapel_id'], 'guruId' => $guru->id])}}" class="hidden sm:block ml-auto">
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
</section>

<!-- ADD DAN SEARCH -->
<section class="mt-8 xl:mt-12">
    <div class="mx-5 sm:mx-8 lg:mx-10 xl:mx-20 flex">
        <a href="{{route("course-guru-add-essay", ['mapelId' => $mapel['mapel_id'], 'guruId' => $guru->id])}}">
            <div
                class="bg-[#763500] rounded-md px-3 py-2.5 xl:py-3 lg:px-4 flex transition ease-in-out hover:scale-105 duration-300"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    height="16"
                    width="14"
                    viewBox="0 0 448 512"
                    fill="#ffffff"
                >
                    <path
                        d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"
                    />
                </svg>
                <p
                    class="ml-1.5 text-xs lg:text-[13px] xl:text-sm font-semibold text-white"
                >
                    Tambah Ujian
                </p>
            </div>
        </a>

        <label
            for="search"
            class="font-medium text-2xl ml-auto flex rounded-md border-2 border-black border-opacity-25 sm:w-[250px] md:w-[280px] lg:w-[300px] xl:w-[350px] bg-white"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                height="16"
                width="16"
                viewBox="0 0 512 512"
                class="opacity-50 my-auto ml-2 lg:ml-3"
            >
                <path
                    d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"
                />
            </svg>
            <input
                class="w-full block text-xs lg:text-[13px] xl:text-sm ml-1 lg:ml-2 rounded-md"
                type="search"
                id="search"
                name="search"
                placeholder="Cari Ujian..."
            />
        </label>
    </div>
</section>

<!-- LIST UJIAN -->
<section class="text-black mt-5 mb-10">
    <div class="mx-5 sm:mx-8 lg:mx-10 xl:mx-20">
        @foreach($ujian as $row)
            <a href="{{route('detail-guru-examination', ['mapelId' => $mapel['mapel_id'], 'ujianId' => $row->id, 'guruId' => $guru->id])}}">
                <div class="relative mt-2 lg:mt-3 bg-white-first">
                    <div
                        class="bg-white flex bg-opacity-90 shadow px-3 py-3 lg:py-4 rounded-lg border border-black border-opacity-25 hover:bg-gray-100 hover:shadow-md cursor-pointer"
                    >
                        <div class="mx-2 my-0.5 md:mx-3 lg:mx-5 w-full">
                            <div class="flex relative">
                                <div class="w-5/6">
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
                                <div class="w-1/6 relative">
                                    <button
                                        type="button"
                                        class="-mr-3 absolute right-0 mt-0.5 focus:outline-none w-8 h-8 hover:bg-gray-300 hover:rounded-full flex items-center justify-center"
                                        onclick="showOptions(event, {{$row->id}})"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            height="16"
                                            width="4"
                                            viewBox="0 0 128 512"
                                        >
                                            <path
                                                d="M64 360a56 56 0 1 0 0 112 56 56 0 1 0 0-112zm0-160a56 56 0 1 0 0 112 56 56 0 1 0 0-112zM120 96A56 56 0 1 0 8 96a56 56 0 1 0 112 0z"
                                            />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <p
                                class="text-xs md:text-[12.5px] lg:text-[13.5px] leading-normal mt-1.5 text-justify"
                            >
                                {{ strlen(strip_tags($row->deskripsi)) > 300 ? substr(strip_tags($row->deskripsi), 0, 300) . '...' : strip_tags($row->deskripsi) }}
                            </p>
                        </div>
                    </div>
                    <!-- List untuk edit dan delete -->
                    <ul
                        id="optionsList{{$row->id}}"
                        class="hidden text-xs lg:text-[12.5px] py-3 bg-white absolute right-0 top-0 border border-black border-opacity-25 mt-12 mr-5 lg:mr-8 p-2 rounded-md shadow-md"
                    >
                        <a href="{{route('edit-guru-examination', ['mapelId' => $mapel['mapel_id'], 'tugasId' => $row->id, 'guruId' => $guru->id])}}">
                            <li class="mb-2 px-4 hover:font-bold">Edit</li>
                        </a>
                        <form method="post" action="{{route('delete-guru-data-examination', ['mapelId' => $mapel['mapel_id'], 'ujianId' => $row->id, 'guruId' => $guru->id])}}" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button >
                                <li class="px-4 hover:font-bold">Delete</li>
                            </button>
                        </form>
                    </ul>
                    <script>
                        function showOptions(event, tugasId) {
                            event.stopPropagation();
                            event.preventDefault();
                            const optionsList = document.getElementById("optionsList"+tugasId);
                            optionsList.classList.toggle("hidden");
                        }
                    </script>
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
