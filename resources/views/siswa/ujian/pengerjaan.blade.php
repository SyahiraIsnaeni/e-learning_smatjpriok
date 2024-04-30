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
        <div>
            <h1 class="font-bold text-lg lg:text-xl xl:text-2xl">
                Ujian {{$ujian['ujian']->judul}}
            </h1>
            <h1
                class="font-medium text-[15px] lg:text-[17px] xl:text-lg mt-1.5 lg:mt-2.5 xl:mt-3"
            >
                {{$mapel["nama_mapel"]}}
            </h1>
        </div>
    </div>
</section>

<!-- PENGERJAAN UJIAN -->
<section class="text-black mt-8 xl:mt-12 mb-10">
    <div class="mx-5 sm:mx-8 lg:mx-10 xl:mx-20">
        <div class="w-full mr-12 xl:mr-16">
            <div
                class="bg-white mb-2 md:w-1/4 lg:mb-3 shadow-sm border border-black border-opacity-30 rounded-md px-4 xl:px-6 py-3 flex"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 512 512"
                    class="w-[20px] h-[23px]"
                >
                    <path
                        d="M256 0a256 256 0 1 1 0 512A256 256 0 1 1 256 0zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z"
                    />
                </svg>
                <p class="countdown ml-2 font-semibold text-[15px] xl:text-base text-right" data-duration="{{ $exam['ujian']->durasi }}">
                    <!-- Placeholder untuk nilai hitung mundur -->
                </p>
            </div>
        </div>
        <form id="examForm" action="{{ route('assign-siswa-examination', ['mapelId' => $mapel["mapel_id"],'pengerjaanSiswaId' => $exam["pengerjaanSiswa"]->id, 'ujianId' => $ujian['ujian']->id, 'siswaId' => $siswa->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @foreach($question as $row)
                <div class="w-full mt-2 mb-4 bg-[#EEE8A9] shadow-sm border border-black border-opacity-30 rounded-md py-4 px-4 sm:px-5 sm:py-5 md:px-6 md:py-6 lg:px-8 lg:py-7 xl:px-10">
                    <!-- WAKTU DAN NOMOR SOAL -->
                    <div class="flex">
                        <p class="font-bold text-[13px] md:text-sm lg:text-[15px] xl:text-base">
                            {{ $row->nomor }}
                        </p>
                    </div>
                    <!-- SOAL -->
                    <input type="hidden" name="pertanyaan[{{ $loop->index }}][pertanyaan_id]" value="{{ $row->id }}">
                    <p class="mt-3 text-[13.5px] md:text-sm lg:text-[15px] xl:text-base">
                        {!! $row->pertanyaan !!}
                    </p>
                    <div class="mt-4 text-[13.5px] md:text-sm lg:text-[15px] xl:text-base">
                        <textarea name="jawaban[{{ $loop->index }}]" placeholder="Jawaban" class="w-full text-[13px] md:text-sm lg:text-[15px] h-[100px] border border-black border-opacity-30 rounded-md py-3 px-3"></textarea>
                    </div>
                </div>
            @endforeach
            <div class="mt-5 flex">
                <button type="submit" class="bg-[#02455C] text-white py-2 px-2 md:px-3 lg:py-2.5 lg:px-4 rounded-md font-semibold text-[12.5px] sm:text-[13px] md:text-[13.5px] lg:text-sm xl:text-[14.5px] ml-auto transition hover:scale-105 duration-300 ease-in-out">
                    Kumpulkan
                </button>
            </div>
        </form>

    </div>
</section>
@include('sweetalert::alert')
<script>
    function countdownTimer() {
        // Ambil elemen countdown
        const countdownElement = document.querySelector('.countdown');

        // Ambil durasi ujian dari atribut data
        const duration = countdownElement.getAttribute('data-duration');

        // Pisahkan durasi menjadi jam, menit, dan detik
        const timeArray = duration.split(':');
        let hours = parseInt(timeArray[0]);
        let minutes = parseInt(timeArray[1]);
        let seconds = parseInt(timeArray[2]);

        // Cek apakah perhitungan waktu sudah pernah dimulai sebelumnya
        const countdownStarted = getCookie('countdownStarted');
        let remainingTime = null;

        if (countdownStarted) {
            // Ambil sisa waktu countdown dari cookie
            remainingTime = parseInt(getCookie('remainingTime'));
        } else {
            // Jika belum dimulai, atur sisa waktu menjadi null
            remainingTime = null;
        }

        // Jika ada sisa waktu yang tersimpan, gunakan sebagai pengganti waktu awal
        if (remainingTime !== null) {
            const remainingSeconds = remainingTime % 60;
            const remainingMinutes = Math.floor(remainingTime / 60) % 60;
            const remainingHours = Math.floor(remainingTime / 3600);

            hours = remainingHours;
            minutes = remainingMinutes;
            seconds = remainingSeconds;
        }

        // Hitung mundur waktu
        const countdownInterval = setInterval(() => {
            if (hours === 0 && minutes === 0 && seconds === 0) {
                // Jika waktu habis, hentikan interval dan tunggu 1 detik sebelum mengirimkan formulir
                clearInterval(countdownInterval);

                // Clear cookies and remove countdownStarted flag
                document.cookie = 'countdownStarted=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;'; // Hapus cookie countdownStarted
                document.cookie = 'remainingTime=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;'; // Hapus cookie remainingTime

                // Submit the form after a short delay
                setTimeout(() => {
                    const form = document.getElementById('examForm');
                    form.submit();
                }, 1000);

                return;
            }

            // Kurangi satu detik dari waktu
            if (seconds === 0) {
                if (minutes === 0) {
                    hours--;
                    minutes = 59;
                } else {
                    minutes--;
                }
                seconds = 59;
            } else {
                seconds--;
            }

            // Simpan sisa waktu countdown dalam cookie
            document.cookie = `remainingTime=${hours * 3600 + minutes * 60 + seconds}; path=/;`;

            // Format waktu dan tampilkan pada elemen countdown
            const formattedHours = hours.toString().padStart(2, '0');
            const formattedMinutes = minutes.toString().padStart(2, '0');
            const formattedSeconds = seconds.toString().padStart(2, '0');
            countdownElement.innerText = `${formattedHours}:${formattedMinutes}:${formattedSeconds}`;
        }, 1000);

        // Set cookie countdownStarted
        document.cookie = 'countdownStarted=true; path=/;';
    }

    window.onload = countdownTimer;

    // Fungsi untuk mendapatkan nilai dari cookie
    function getCookie(name) {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`);
        if (parts.length === 2) return parts.pop().split(';').shift();
    }

</script>
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
