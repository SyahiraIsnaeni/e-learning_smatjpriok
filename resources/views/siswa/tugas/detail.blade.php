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

<!-- MAPEL DAN KELAS -->
<section class="text-black mt-8 xl:mt-12">
    <div class="mx-5 sm:mx-8 lg:mx-10 xl:mx-20">
        <h1 class="font-bold text-lg lg:text-xl xl:text-2xl">
            Tugas {{$tugas["tugas"]->judul}}
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
    <div class="mx-5 sm:mx-8 lg:mx-10 xl:mx-20 md:flex">
        <div
            class="md:w-2/3 h-fit bg-white border shadow rounded-md border-black border-opacity-25 py-3 px-3 sm:px-5 sm:py-4 lg:px-6 lg:py-5 xl:mr-5"
        >
            <h1 class="font-bold text-[13.5px] sm:text-sm lg:text-[15px] xl:text-base">Petunjuk Tugas</h1>
            <p class="text-[13px] md:text-[13.5px] lg:text-sm xl:text-[15px] leading-relaxed mt-2 lg:mt-3">
                {!! $tugas["tugas"]->deskripsi !!}
            </p>
            <div class="mt-3">
                @foreach($tugas["tugas"]->dokumen as $doc)
                    <a
                        href="{{ asset('storage/public/tugas/dokumen/' . $doc->dokumen) }}"
                        class="text-[12.5px] md:text-[13.5px] lg:text-sm xl:text-[14.5px] underline"
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
                            <p class="ml-1">
                                {{$doc->dokumen}}
                            </p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
        <div
            class="md:w-1/3 h-fit md:ml-3 mt-5 md:mt-0 bg-white border shadow rounded-md border-black border-opacity-25 py-3 px-3 sm:px-5 sm:py-4 lg:px-6 lg:py-5"
        >
            <div class="flex">
                <h1 class="font-bold text-[13.5px] sm:text-sm lg:text-[15px] xl:text-base">Pengumpulan Tugas</h1>
                @if($tugas["pengerjaanTugas"]->nilai == null)
                    <p class="text-xs ml-auto mt-0.5 font-light sm:text-[13px] lg:text-sm xl:text-[14.5px]">{{$tugas["pengerjaanTugas"]->status}}</p>
                @else
                    <p class="text-xs ml-auto mt-0.5 font-light sm:text-[13px] lg:text-sm xl:text-[14.5px]">Dinilai</p>
                @endif

            </div>
            @if($tugas["pengerjaanTugas"]->nilai != null)
                <div class="mt-3">
                    @foreach($tugas["dokumen"] as $doc)
                        <a href="{{asset("storage/pubic/tugas/siswa/dokumen" . $doc->dokumen)}}}">
                            <p class="mt-1.5 text-xs lg:text-sm underline">{{$doc->dokumen && strlen($doc->dokumen) > 30 ? substr($doc->dokumen, 0, 30) . '...' : $doc->dokumen}}</p>
                        </a>
                    @endforeach
                </div>
                <div
                    class="mt-5 md:mt-3 lg:mt-4 w-fit bg-[#EEE8A9] border shadow rounded-md border-black border-opacity-25 py-2 md:py-2.5 px-4 md:px-5 lg:px-6"
                >
                    <p class="font-semibold text-[12.5px] md:text-[13px] lg:text-[13.5px] xl:text-sm text-center">Nilai : {{$tugas["pengerjaanTugas"]->nilai}}</p>
                </div>
            @elseif($tugas["pengerjaanTugas"]->status == "belum dikumpulkan")
            <form method="post" action="{{route('add-siswa-assignment', ['mapelId' => $mapel['mapel_id'], 'pengerjaanTugasId' => $tugas["tugas"]->id, 'siswaId' => $siswa->id])}}" enctype="multipart/form-data">
                @csrf
                <div class="mt-3 lg:mt-3">
                    <div
                        id="selected-files"
                        class="text-[13px] text-gray-700 mb-4"
                    ></div>
                    <script>
                        function submitForm(event) {
                            const fileInput = document.getElementById('dokumen');
                            const selectedFiles = fileInput.files;

                            if (selectedFiles.length === 0) {
                                event.preventDefault();
                                alert('Mohon pilih setidaknya satu file.');
                            }
                        }
                    </script>

                    <div class="mt-2 flex">
                        <div class="w-1/2 mt-[3px] md:mt-[3.5px] lg:mt-1">
                            <label
                                for="dokumen"
                                class="text-xs lg:text-[13px] xl:text-[13.5px] cursor-pointer font-semibold text-black bg-[#EE982B] px-3 py-2 lg:px-4 lg:py-[9px] rounded-md"
                            >
                                Tambah File
                            </label>
                            <input
                                class="hidden"
                                type="file"
                                id="dokumen"
                                name="dokumen[]"
                                multiple
                                onchange="updateSelectedFiles(this)"
                            />
                        </div>
                        <div class="w-1/2 ml-auto text-right">
                            <button type="submit"
                                    onclick="submitForm(event)"
                                    class="py-2 px-3 lg:px-4 lg:py-2.5 xl:px-5 rounded-md bg-[#02455C] text-white text-xs lg:text-[13px] xl:text-[13.5px] font-semibold transition hover:scale-105 hover:duration-300"
                            >
                                Serahkan
                            </button>
                        </div>
                    </div>


                    <script>
                        function updateSelectedFiles(input) {
                            var selectedFiles = input.files;
                            var filesContainer = document.getElementById("selected-files");

                            for (var i = 0; i < selectedFiles.length; i++) {
                                var fileName = selectedFiles[i].name;

                                // SVG sebagai string
                                var svgString =
                                    '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="w-4 h-4">' +
                                    '<path d="M320 464c8.8 0 16-7.2 16-16V160H256c-17.7 0-32-14.3-32-32V48H64c-8.8 0-16 7.2-16 16V448c0 8.8 7.2 16 16 16H320zM0 64C0 28.7 28.7 0 64 0H229.5c17 0 33.3 6.7 45.3 18.7l90.5 90.5c12 12 18.7 28.3 18.7 45.3V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64z"/>' +
                                    "</svg>";

                                // Membuat elemen span untuk menampung ikon dan nama file
                                var fileElement = document.createElement("div");
                                fileElement.className = "flex items-center"; // Menggunakan kelas Tailwind untuk layout flex dan penempatan item tengah

                                // Menambahkan ikon SVG dan nama file ke elemen span
                                fileElement.innerHTML =
                                    '<div class="w-4 h-4 mr-2">' +
                                    svgString +
                                    "</div>" +
                                    fileName +
                                    "\n"; // Menggunakan kelas Tailwind untuk lebar, tinggi, dan margin

                                // Menambahkan elemen span ke kontainer file
                                filesContainer.appendChild(fileElement);
                            }
                        }
                    </script>
                </div>
            </form>
            @else
                <div class="mt-3">
                    @foreach($tugas["dokumen"] as $doc)
                        <a href="{{asset("storage/pubic/tugas/siswa/dokumen" . $doc->dokumen)}}}">
                            <p class="mt-1.5 text-xs lg:text-sm underline">{{$doc->dokumen && strlen($doc->dokumen) > 30 ? substr($doc->dokumen, 0, 30) . '...' : $doc->dokumen}}</p>
                        </a>
                    @endforeach
                    <form method="post" action="{{route('delete-siswa-assignment', ['mapelId' => $mapel['mapel_id'], 'pengerjaanTugasId' => $tugas["tugas"]->id, 'siswaId' => $siswa->id])}}" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class=" mt-3 lg:mt-4 xl:mt-5 w-full px-2 rounded-md bg-red-700 ">
                            <p class="text-white font-semibold py-1.5 text-xs lg:text-[13px] xl:text-sm">Batalkan</p>
                        </button>
                    </form>
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
