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
                href="{{route("dashboard-admin")}}"
                class="text-white py-2.5 block text-center text-sm hover:text-oren"
            >Dashboard</a
            >
            <a
                href="{{route("tutorial-admin")}}"
                class="text-white py-2.5 block text-center text-sm hover:text-oren"
            >Tutorial</a
            >
            <form action="{{ route('logout-admin') }}" method="post" style="display: flex; justify-content: center; align-items: center;">
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
            <a href="{{route("dashboard-admin")}}">
                <p
                    class="hover:text-oren"
                >
                    Dashboard
                </p>
            </a>
            <a href="{{route("tutorial-admin")}}">
                <p class="hover:text-oren">Tutorial</p>
            </a>
            <form action="{{ route('logout-admin') }}" method="post">
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

<!-- TITLE -->
<div class="mx-5 sm:mx-8 lg:mx-10 xl:mx-20 flex">
    <h1 class="font-bold text-lg lg:text-xl xl:text-2xl">Data Siswa</h1>
</div>

<!-- DATA -->
<section class="mt-5 mb-10 xl:mt-8">
    <div class="mx-5 sm:mx-8 lg:mx-10 xl:mx-20">
        <div class="mt-5">
            <form>
                <table class="justify-evenly w-full text-center">
                    <thead>
                    <tr>
                        <th class="border px-1 py-1 md:py-2 border-black bg-[#99AEBB] bg-opacity-55 text-[13.5px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px] font-semibold">Nama</th>
                        <th class="border px-1 py-1 md:py-2 border-black bg-[#99AEBB] bg-opacity-55 text-[13.5px] font-semibold sm:text-sm md:text-[15px] lg:text-base xl:text-[17px]">NIS</th>
                        <th class="border px-1 py-1 md:py-2 border-black bg-[#99AEBB] bg-opacity-55 text-[13.5px] font-semibold sm:text-sm md:text-[15px] lg:text-base xl:text-[17px]">Aksi</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white">
                    @foreach($siswa as $row)
                        <tr class="text-[13px] sm:text-sm md:text-[15px] lg:text-base xl:text-[17px]">
                            <td class="border border-black px-1 py-1 md:py-2">
                                {{$row->nama}}
                            </td>
                            <td class="border border-black px-1 py-1 md:py-2">
                                {{$row->nis}}
                            </td>
                            <td class="border-r border-b border-black px-1 py-1 md:py-2 sm:flex justify-center items-center">
                                <a href="{{route("edit-data-siswa", ["id" => $row->id])}}" class="flex justify-center items-center">
                                    <div class="bg-[#EE982B] rounded-md px-1.5 py-1.5 w-fit hover:scale-105 duration-300 ease-in-out">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="#000" viewBox="0 0 512 512"><path d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"/></svg>
                                    </div>
                                </a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </form>
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
