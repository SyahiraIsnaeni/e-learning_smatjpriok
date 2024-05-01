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
                    .classList.toggle("animate-slide-right");
            });
    </script>
</nav>

<!-- MAPEL DAN KELAS -->
<section class="text-black mt-8 xl:mt-12">
    <div class="mx-5 sm:mx-8 lg:mx-10 xl:mx-20">
        <div>
            <h1 class="font-bold text-lg lg:text-xl xl:text-2xl">
                Ujian {{$ujian->judul}}
            </h1>
            <h1
                class="font-medium text-[15px] lg:text-[17px] xl:text-lg mt-1.5 lg:mt-2.5 xl:mt-3"
            >
                {{$mapel["nama_mapel"]}}
            </h1>
        </div>
    </div>
</section>

<section class="text-black mt-8 xl:mt-10">
    <div class="mx-5 sm:mx-8 lg:mx-10 xl:mx-20">
        <div
            class="py-3.5 px-4 sm:py-4 sm:px-4 md:px-5 md:py-5 bg-white rounded-md shadow border border-black border-opacity-25"
        >
            <h1
                class="text-[13.5px] sm:text-sm md:text-[14.5px] lg:text-[15px] xl:text-base font-bold"
            >
                Pengerjaan Ujian
            </h1>
            <p
                class="text-[13px] font-medium md:text-[13.5px] lg:text-sm xl:text-[14.5px] mt-3 md:mt-4 leading-relaxed"
            >
                Nama : {{$siswa->nama}}
            </p>
            <p
                class="text-[13px] font-medium md:text-[13.5px] lg:text-sm xl:text-[14.5px] mt-0.5 md:mt-1 leading-relaxed"
            >
                Waktu Mulai: {{ \Carbon\Carbon::parse($pengerjaanSiswa->started_at)->format('j F Y, \p\u\k\u\l H:i') }}
            </p>
            <p
                class="text-[13px] font-medium md:text-[13.5px] lg:text-sm xl:text-[14.5px] mt-0.5 md:mt-1 leading-relaxed"
            >
                Waktu Selesai: {{ \Carbon\Carbon::parse($pengerjaanSiswa->finished_at)->format('j F Y, \p\u\k\u\l H:i') }}
            </p>
            @if($pengerjaanSiswa->status == "dikerjakan")
                <p
                    class="text-[13px] font-medium md:text-[13.5px] lg:text-sm xl:text-[14.5px] mt-0.5 md:mt-1 leading-relaxed"
                >
                    Status : sudah {{$pengerjaanSiswa->status}}
                </p>
            @else
                <p
                    class="text-[13px] font-medium md:text-[13.5px] lg:text-sm xl:text-[14.5px] mt-0.5 md:mt-1 leading-relaxed"
                >
                    Status : {{$pengerjaanSiswa->status}}
                </p>
            @endif
        </div>
    </div>
</section>

<!-- PENGERJAAN UJIAN -->
<section class="text-black mt-8 xl:mt-12 mb-10">
    <div class="mx-5 sm:mx-8 lg:mx-10 xl:mx-20">
        <form action="{{route("detail-add-penilaian-examination", ["mapelId" => $mapel["mapel_id"], "ujianId" => $ujian->id, "pengerjaanSiswaId" => $pengerjaanSiswa->id, "guruId" => $guru->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            @foreach($data as $index => $item)
                <div class="w-full mt-2 mb-4 bg-[#EEE8A9] shadow-sm border border-black border-opacity-30 rounded-md py-4 px-4 sm:px-5 sm:py-5 md:px-6 md:py-6 lg:px-8 lg:py-7 xl:px-10">
                    <!-- WAKTU DAN NOMOR SOAL -->
                    <div class="flex">
                        <p class="font-bold text-[13px] md:text-sm lg:text-[15px] xl:text-base">
                            {{ $item['pertanyaan']->nomor }}
                        </p>
                    </div>
                    <!-- SOAL -->
                    <input type="hidden" name="jawaban[{{ $index }}][pertanyaan_id]" value="{{ $item['pertanyaan']->id }}">
                    <p class="mt-3 text-[13.5px] md:text-sm lg:text-[15px] xl:text-base">
                        {!! $item['pertanyaan']->pertanyaan !!}
                    </p>
                    <div class="mt-4 text-[13.5px]  md:text-sm lg:text-[15px] xl:text-base">
                        <textarea name="jawaban[{{ $index }}]" placeholder="Jawaban" class=" bg-white w-full text-[13px] md:text-sm lg:text-[15px] h-[100px] border border-black border-opacity-30 rounded-md py-3 px-3" disabled>{{ $item['jawaban'] ? $item['jawaban']->jawaban : '' }}</textarea>
                    </div>
                    <div class="flex mt-4">
                        <div
                            class="text-[12.5px] lg:text-[13px] xl:text-sm font-semibold my-auto"
                        >
                            <p>Poin Soal</p>
                        </div>
                        <div>
                            <input
                                class="ml-3 px-2 py-2 bg-white text-center lg:px-3 xl:py-2.5 mr-4 border-2 border-black border-opacity-20 rounded-md w-[80px] block text-xs lg:text-[13px] xl:text-sm"
                                type="number"
                                id="jawaban[{{ $index }}][poin]"
                                name="jawaban[{{ $index }}][poin]"
                                value="{{ old('jawaban.'.$index.'.poin', $item['jawaban'] ? $item['jawaban']->poin : null) }}"
                                {{ $pengerjaanSiswa->nilai == null ? '' : 'disabled' }}
                            />
                            <input type="hidden" name="previous_jawaban[{{ $index }}][poin]" value="{{ $previousJawaban[$index]['poin'] ?? ($item['jawaban'] ? $item['jawaban']->poin : null) }}">
                        </div>
                        <button type="button" onclick="enableEdit({{ $loop->index }})" id="editButton{{ $loop->index }}" class="bg-[#763500] md:ml-3 py-2 px-3 md:py-2.5 md:px-3.5 rounded-md transition ease-in-out hover:scale-105 duration-300 {{ $pengerjaanSiswa->nilai == null ? 'hidden' : '' }}">
                            <p class="font-semibold text-white text-[12.5px] sm:text-[13px] md:text-[13.5px] lg:text-sm xl:text-[14.5px]">Edit Nilai</p>
                        </button>
                        <script>
                            function enableEdit(index) {
                                document.getElementById('jawaban[' + index + '][poin]').removeAttribute("disabled");
                                document.getElementById("editButton" + index).style.display = "none";
                            }
                        </script>
                    </div>
                </div>
            @endforeach
            <div class="flex mt-5">
                <div
                    class="text-[12.5px] lg:text-[13px] xl:text-sm font-semibold my-auto"
                >
                    <p>Total Nilai</p>
                </div>
                <div>
                    <p
                        class="ml-3 px-2 py-2 text-center lg:px-3 xl:py-2.5 mr-4 border-2 border-black border-opacity-20 rounded-md w-[80px] block text-xs lg:text-[13px] xl:text-sm"
                    >
                        {{ $pengerjaanSiswa->nilai ?? '' }}
                    </p>
                </div>
            </div>
            <div class="mt-5 flex">
                <button type="submit" class="bg-[#02455C] text-white py-2 px-2 md:px-3 lg:py-2.5 lg:px-4 rounded-md font-semibold text-[12.5px] sm:text-[13px] md:text-[13.5px] lg:text-sm xl:text-[14.5px] ml-auto transition hover:scale-105 duration-300 ease-in-out">
                    Submit Nilai
                </button>
            </div>
            <script>
                function enableEdit(index) {
                    document.getElementById('jawaban[' + index + '][poin]').removeAttribute("disabled");
                    document.getElementById("editButton" + index).style.display = "none";
                }
            </script>
        </form>
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
