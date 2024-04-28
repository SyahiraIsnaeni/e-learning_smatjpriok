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
    <div class="sm:flex mx-5 sm:mx-8 lg:mx-10 xl:mx-20">
        <div>
            <h1 class="font-bold text-lg lg:text-xl xl:text-2xl">
                Edit Ujian {{$mapel["nama_mapel"]}}
            </h1>
            <h1
                class="font-semibold text-[15px] lg:text-[17px] xl:text-lg mt-1.5 lg:mt-2.5 xl:mt-3"
            >
                {{$mapel["nama_kelas"]}}
            </h1>
        </div>
        <a href="{{route("course-guru-examination", ['mapelId' => $mapel['mapel_id'], 'guruId' => $guru->id])}}" class="hidden sm:block ml-auto">
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

<!-- FORM TAMBAH UJIAN -->
<section class="text-black mt-8 xl:mt-12 mb-10">
    <div class="mx-5 sm:mx-8 lg:mx-10 xl:mx-20">
        <form action="{{ route("edit-guru-data-examination", ['mapelId' => $mapel['mapel_id'], 'ujianId' => $ujian->id, 'guruId' => $guru->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <label for="judul" class="lg:flex">
                <div class="lg:w-1/4">
                    <p
                        class="text-[13.5px] lg:text-[15px] xl:text-base mt-3 xl:mt-4 font-medium"
                    >
                        Judul Ujian
                    </p>
                </div>
                <div class="lg:w-3/4">
                    <input
                        class="mt-1.5 xl:mt-2 px-3 py-2 xl:py-3 mr-4 border-2 rounded-md w-full block text-[12.5px] lg:text-sm xl:text-[15px] lg:placeholder:text-[12.5px] xl:placeholder:text-sm"
                        type="text"
                        id="judul"
                        name="judul"
                        placeholder="Masukkan Judul Ujian"
                        value="{{$ujian->judul}}"
                    />
                </div>
            </label>

            <label for="deskripsi" class="lg:flex mt-5">
                <div class="lg:w-1/4">
                    <p
                        class="text-[13.5px] lg:text-[15px] xl:text-base font-medium mt-3 xl:mt-4"
                    >
                        Petunjuk Ujian
                    </p>
                </div>
                <div class="form-group lg:w-3/4" style="margin-top: 10px">
                    <textarea id="inp_editor0" name="deskripsi">
                                                 &lt;p&gt;{{$ujian->deskripsi}}&lt;/p&gt;
                                                </textarea>
                    <script>
                        var editor0 = new RichTextEditor("#inp_editor0");
                    </script>
                </div>
            </label>

            <label for="deadline" class="lg:flex mt-5">
                <div class="lg:w-1/4">
                    <p
                        class="text-[13.5px] lg:text-[15px] xl:text-base font-medium mt-4 xl:mt-4"
                    >
                        Tenggat/Deadline
                    </p>
                </div>
                <div class="md:w-[300px]">
                    <input
                        class="mt-1.5 xl:mt-2 px-3 py-2 lg:py-2.5 mr-4 border-2 rounded-md w-full block text-[12.5px] lg:text-sm xl:text-[15px] lg:placeholder:text-[13.5px] xl:placeholder:text-sm"
                        type="datetime-local"
                        id="deadline"
                        name="deadline"
                        placeholder="Pilih Tanggal dan Waktu"
                        value="{{$ujian->deadline}}"
                    />
                </div>
            </label>

            <label for="durasi" class="lg:flex mt-5">
                <div class="lg:w-1/4">
                    <p
                        class="text-[13.5px] lg:text-[15px] xl:text-base font-medium mt-4 xl:mt-4"
                    >
                        Durasi Ujian
                    </p>
                </div>
                <div class="md:w-[300px]">
                    <input
                        class="mt-1.5 xl:mt-1 px-3 py-2 lg:py-2.5 mr-4 border-2 rounded-md w-full block text-[12.5px] lg:text-sm xl:text-[15px] lg:placeholder:text-[13.5px] xl:placeholder:text-sm"
                        type="time"
                        id="durasi"
                        name="durasi"
                        step="1"
                        value="{{$ujian->durasi}}"
                    />
                </div>
            </label>

            <label for="soal" class="mt-5">
                <p class="text-[13.5px] lg:text-[15px] xl:text-base font-medium mt-5 xl:mt-4">
                    Soal Ujian
                </p>
                <div class="bg-white rounded-md w-full border shadow mt-1.5 pt-2 pb-4 px-3 relative" id="soalContainer">
                    @foreach($ujian->pertanyaan as $key => $row)
                        <div class="soal bg-[#E6F4F1] mt-3 rounded-md py-3 px-3 border-2" id="examinationSection{{ $key + 1 }}">
                            <div class="flex">
                                <div class="w-5/6">
                                    <input type="hidden" name="nomor[]" value="{{ $row->nomor }}">
                                    <p class="text-[13px] lg:text-sm xl:text-[15px] font-bold mt-1.5">{{ $row->nomor }}</p>
                                </div>
                            </div>
                            <div class="form-group lg:w-full" style="margin-top: 10px">
                                <div class="form-group lg:w-full" style="margin-top: 10px">
                                <textarea id="inp_editor{{ $key + 1 }}" name="pertanyaan[]">
                                                 &lt;p&gt;{{$row->pertanyaan}}&lt;/p&gt;
                                                </textarea>
                                    <script>
                                        var editor1 = new RichTextEditor("#inp_editor{{ $key + 1 }}");
                                    </script>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </label>

            <button
                type="submit"
                class="mt-5 lg:mt-8 bg-[#02455C] block ml-auto text-white font-medium text-[13px] md:text-sm lg:text-[15px] xl:text-base px-4 md:px-5 md:py-2 lg:px-10 lg:py-2 xl:px-12 py-1.5 xl:py-2.5 rounded-md ease-in-out hover:scale-105 duration-300"
            >
                Simpan
            </button>
        </form>
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
