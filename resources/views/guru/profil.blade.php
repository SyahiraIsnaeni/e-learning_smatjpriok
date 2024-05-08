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
                class="text-white py-2.5 block text-center text-sm hover:text-oren font-bold underline underline-offset-8 decoration-2 decoration-oren"
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
                <p
                    class="hover:text-oren font-bold underline underline-offset-8 decoration-2 decoration-oren"
                >
                    My Profile
                </p>
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

<!-- PROFILE DETAIL -->
<section class="text-black mt-8 md:mt-10 mb-10 xl:mt-12">
    <div class="mx-5 sm:mx-8 lg:mx-10 xl:mx-20 flex flex-col items-center">
        <div
            class="rounded-full w-[70px] sm:w-[80px] md:w-[85px] lg:w-[90px] xl:w-[95px] h-[70px] sm:h-[80px] lg:h-[90px] xl:h-[95px] md:h-[85px] flex border border-black border-opacity-20 bg-gray-200"
        >
            <img
                src="{{asset("images/user.png")}}"
                class="w-[45px] sm:w-[50px] md:w-[55px] lg:w-[60px] xl:w-[65px] mx-auto my-auto opacity-75"
            />
        </div>

        <form action="{{route("edit-profile-guru", $guru->id)}}" method="post" enctype="multipart/form-data" class="mt-8 lg:mt-10 w-full max-w-md">
            @csrf
            <!-- NAMA -->
            <div>
                <label for="nama" class="font-medium">
                    <p
                        class="text-[13.5px] sm:text-sm lg:text-[14.5px] xl:text-base font-medium"
                    >
                        Nama
                    </p>
                    <input
                        class="mt-1.5 xl:mt-2 py-2 xl:py-2.5 px-3 text-[13px] lg:text-[13.5px] xl:text-sm bg-gray-100 border border-black border-opacity-20 shadow-sm rounded-md w-full"
                        type="text"
                        id="nama"
                        name="nama"
                        value="{{$guru->nama}}"
                        readonly
                    />
                </label>
            </div>

            <!-- NIS -->
            <div class="mt-3 sm:mt-3.5 xl:mt-4">
                <label for="nis" class="font-medium">
                    <p
                        class="text-[13.5px] sm:text-sm lg:text-[14.5px] xl:text-base font-medium"
                    >
                        NIP
                    </p>
                    <input
                        class="mt-1.5 xl:mt-2 py-2 xl:py-2.5 px-3 text-[13px] lg:text-[13.5px] xl:text-sm bg-gray-100 border border-black border-opacity-20 shadow-sm rounded-md w-full"
                        type="text"
                        id="nip"
                        name="nip"
                        value="{{$guru->nip}}"
                        readonly
                    />
                </label>
            </div>

            <!-- EMAIL -->
            <div class="mt-3 sm:mt-3.5 xl:mt-4 relative">
                <label for="email" class="font-medium">
                    <p
                        class="text-[13.5px] sm:text-sm lg:text-[14.5px] xl:text-base font-medium"
                    >
                        Email
                    </p>
                    <div class="flex items-center">
                        <input
                            class="mt-1.5 xl:mt-2 py-2 xl:py-2.5 px-3 h-[37px] xl:h-[41px] text-[13px] lg:text-[13.5px] xl:text-sm bg-gray-100 border border-black border-opacity-20 rounded-md w-full pr-10"
                            id="emailDiv"
                            value="{{$guru->email}}"
                            name="email"
                            disabled
                        >
                        <a
                            href=""
                            class="absolute top-7 xl:top-8 right-0 h-full px-4 py-2.5 sm:py-2 xl:py-3 text-xs lg:text-[13px] underline underline-offset-1"
                            id="editEmailBtn"
                        >
                            Edit Email
                        </a>
                    </div>
                </label>
            </div>

            <script>
                // Add an event listener to the edit email button
                document.getElementById('editEmailBtn').addEventListener('click', function(event) {
                    // Prevent the default behavior of the link
                    event.preventDefault();

                    // Get the input field and the edit button
                    const inputField = document.getElementById('emailDiv');
                    const editButton = document.getElementById('editEmailBtn');

                    // Toggle the disabled property of the input field
                    inputField.disabled = !inputField.disabled;

                    // Toggle the text of the edit button
                    editButton.textContent = inputField.disabled ? 'Edit Email' : 'Save Changes';

                    // Toggle the CSS class of the input field
                    if (inputField.disabled) {
                        inputField.classList.remove('enabled');
                    } else {
                        inputField.classList.add('enabled');
                    }
                });

                // Check the initial state of the input field and toggle the CSS class accordingly
                if (document.getElementById('emailDiv').disabled) {
                    document.getElementById('editEmailBtn').textContent = 'Edit Email';
                } else {
                    document.getElementById('emailDiv').classList.add('enabled');
                    document.getElementById('editEmailBtn').textContent = 'Save Changes';
                }
            </script>

            <style>
                .enabled {
                    background-color: white;
                    border-color: black;
                    border-width: 1px;
                    border-style: solid;
                }

                input[disabled] {
                    background-color: #f3f4f6;
                    border-color: #e5e7eb;
                    border-width: 1px;
                    border-style: solid;
                }
            </style>

            <!-- PASSWORD DAN KONFIRMASI PASSWORD -->
            <div>
                <div>
                    <div class="mt-3 sm:mt-3.5 xl:mt-4 relative">
                        <label for="password" class="font-medium">
                            <p
                                class="text-[13.5px] sm:text-sm lg:text-[14.5px] xl:text-base font-medium"
                            >
                                Password
                            </p>
                            <div class="flex items-center">
                                <input
                                    class="mt-1.5 xl:mt-2 py-2 xl:py-2.5 px-3 text-[13px] lg:text-[13.5px] xl:text-sm border border-black border-opacity-20 bg-gray-100 shadow-sm rounded-md w-full pr-10"
                                    id="passwordDiv"
                                    disabled
                                    name="password"
                                >
                                <a
                                    href="javascript:void(0);"
                                    class="absolute top-7 xl:top-8 right-0 h-full px-4 py-2.5 sm:py-2 xl:py-3 text-xs lg:text-[13px] underline underline-offset-1"
                                    id="editPasswordBtn"
                                    onclick="togglePasswordEdit()"
                                >
                                    Edit Password
                                </a>
                            </div>
                        </label>
                    </div>

                    <div class="mt-3 sm:mt-3.5 xl:mt-4 relative">
                        <label for="konfirmasi_password" class="font-medium">
                            <p
                                class="text-[13.5px] sm:text-sm lg:text-[14.5px] xl:text-base font-medium"
                            >
                                Konfirmasi Password
                            </p>
                            <div class="flex items-center">
                                <input
                                    class="mt-1.5 xl:mt-2 py-2 xl:py-2.5 px-3 h-[37px] xl:h-[41px] text-[13px] lg:text-[13.5px] xl:text-sm border border-black border-opacity-20 shadow-sm rounded-md w-full pr-10 editable bg-gray-100"
                                    id="confirmpasswordInput"
                                    type="password"
                                    name="konfirmasiPassword"
                                    disabled
                                />
                            </div>
                        </label>
                    </div>
                    <script>
                        function togglePasswordEdit() {
                            const passwordInput = document.getElementById('passwordDiv');
                            const confirmPasswordInput = document.getElementById('confirmpasswordInput');
                            const editPasswordBtn = document.getElementById('editPasswordBtn');

                            if (passwordInput.disabled) {
                                passwordInput.disabled = false;
                                confirmPasswordInput.disabled = false;
                                editPasswordBtn.textContent = 'Save Password';
                            } else {
                                passwordInput.disabled = true;
                                confirmPasswordInput.disabled = true;
                                editPasswordBtn.textContent = 'Edit Password';
                            }
                        }
                    </script>
                </div>
            </div>

            <!-- SUBMIT -->
            <button class="justify-start mt-7 w-[130px]" type="submit">
                <div
                    class=" bg-biru-tua text-white rounded-md transition ease-in-out hover:-translate-y-1 hover:scale-105 duration-300"
                >
                    <p class="text-sm xl:text-[15px] font-medium py-1.5 xl:py-2 px-3 text-center">Save</p>
                </div>
            </button>

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
