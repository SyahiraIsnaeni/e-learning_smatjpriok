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
                class="text-white py-2.5 block text-center text-sm hover:text-oren "
            >Dashboard</a
            >
            <a
                href="{{route("course-siswa", $siswa->id)}}"
                class="text-white py-2.5 block text-center text-sm hover:text-oren font-bold underline underline-offset-8 decoration-2 decoration-oren"
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
                <p
                    class="hover:text-oren "
                >
                    Dashboard
                </p>
            </a>
            <a href="{{route("course-siswa", $siswa->id)}}">
                <p class="hover:text-oren font-bold underline underline-offset-8 decoration-2 decoration-oren">My Courses</p>
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

<!-- COURSES -->
<section class="font-learn text-black mt-7 mb-10 xl:mt-12">
    <div class="mx-5 sm:mx-8 lg:mx-10 xl:mx-20">
        <h1 class="font-bold text-lg lg:text-xl xl:text-2xl">My Courses</h1>
        <div class="lg:mt-8 xl:mt-10 mt-6">
            <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 xl:gap-6">
                @foreach($mapels as $mapel)
                <a href="{{route("course-siswa-detail", ['mapelId' => $mapel['mapel_id'], 'siswaId' => $siswa->id])}}">
                    <div
                        class="rounded-md border border-black border-opacity-30 transition ease-in-out hover:-translate-y-1 duration-300 hover:shadow-lg"
                    >
                        <div class="rounded-t-md w-full h-[140px]"></div>
                        <div
                            class="flex px-3.5 lg:px-5 py-3.5 w-full border-t border-t-black border-opacity-30"
                        >
                            <div class="w-2/3">
                                <h1 class="text-[15px] xl:text-base font-medium">
                                    {{ $mapel['nama_mapel'] }}
                                </h1>
                                <p class="mt-1.5 text-[13.5px] xl:text-sm">{{ $mapel['nama_guru'] }}</p>
                            </div>

                            <div class="w-1/3 text-[13.5px] xl:text-sm font-medium">
                                <p class="text-end">{{ $mapel['nama_kelas'] }}</p>
                            </div>

                        </div>
                    </div>
                </a>
                @endforeach
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            var colors = ['#8C3E44', '#8E7258', '#EE982B', '#00A791'];
                            var elements = document.querySelectorAll('.rounded-t-md');

                            elements.forEach(function(element) {
                                var randomColor = colors[Math.floor(Math.random() * colors.length)];
                                element.style.backgroundColor = randomColor;
                            });
                        });
                    </script>
            </div>
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
