<header class="header w-full">
    <!--! topHeader -->
    <div class="top-header w-screen flex flex-col items-center justify-between border-b">
        <div class="flex w-full items-center justify-between p-4 md:px-20 border-b">
            <div class="icons hidden lg:flex items-center gap-2">
                <a class="text-gray-700 bg-gray-300/50 p-1 rounded-md hover:scale-110 hover:text-white hover:bg-green-500 flex items-center justify-center transition-all"
                    href="#">
                    <ion-icon name="logo-instagram"></ion-icon>
                </a>
                <a class="text-gray-700 bg-gray-300/50 p-1 rounded-md hover:scale-110 hover:text-white hover:bg-green-500 flex items-center justify-center transition-all"
                    href="#">
                    <ion-icon name="logo-linkedin"></ion-icon>
                </a>
                <a class="text-gray-700 bg-gray-300/50 p-1 rounded-md hover:scale-110 hover:text-white hover:bg-green-500 flex items-center justify-center transition-all"
                    href="#">
                    <ion-icon name="logo-github"></ion-icon>
                </a>
            </div>
            <h3 class="text-gray-400 font-semibold text-xs">
                Dukung UMKM Lokal, Belanja Sekarang!
            </h3>
            <div class="select hidden md:flex">
                <select class="mr-2 p-1 px-2 text-sm font-semibold" id="currency">
                    <option value="IDR">IDR Rp</option>
                    <option value="USD">USD $</option>
                </select>
                <select class="mr-2 p-1 px-2 text-sm font-semibold" id="language">
                    <option value="Indonesian">Bahasa Indonesia</option>
                    <option value="English">English</option>
                </select>
            </div>
        </div>
        <div class="gap-4 flex flex-col sm:flex-row w-full items-center justify-between p-6 md:px-24">
            <h1 class="font-semibold text-4xl text-gray-600">UMKM Hub</h1>
            <form class="relative w-full sm:w-3/5">
                <input class="w-full h-full p-2 border rounded-xl" placeholder="Cari produk UMKM..." id="search"
                    type="text" />
                <label class="absolute right-2 top-2" for="search">
                    <i class="fa-solid fa-magnifying-glass cursor-pointer"></i>
                </label>
            </form>
            <div class="icons hidden mr-2 text-3xl md:flex gap-8 text-gray-600">
                {{-- <div class="relative">
                    <ion-icon name="person-outline"></ion-icon>
                </div>
                <div class="relative">
                    <span
                        class="text-xs text-center font-semibold text-white absolute -top-2 -right-2 w-4 h-4 bg-green-500 rounded-full">0</span>
                    <ion-icon name="heart-outline"></ion-icon>
                </div>
                <div class="relative">
                    <span
                        class="text-xs text-center font-semibold text-white absolute -top-2 -right-2 w-4 h-4 bg-green-500 rounded-full">0</span>
                    <ion-icon name="bag-handle-outline"></ion-icon>
                </div> --}}
            </div>
        </div>
    </div>
    <!--! topHeader -->
    <!--? navbar -->
    <div class="desktopNavbar">
        <nav class="my-4 hidden lg:flex justify-center">
            <ul class="desktopNavbarUl flex justify-center items-center gap-12 font-sm font-bold text-gray-600">
                <li class="nav_items relative">
                    <a href="/">BERANDA</a>
                </li>
                <li class="nav_items relative category_nav_item">
                    <a href="#Categories">KATEGORI</a>
                    <ul
                        class="categoriesItem absolute top-10 shadow-lg rounded-xl hidden grid-cols-3 p-4 gap-4 border text-gray-400 font-normal bg-white z-10">
                        <li>
                            <h3 class="border-b py-2 mb-4 text-gray-900 font-semibold">Kuliner</h3>
                            <ul class="flex flex-col items-start gap-2">
                                <li><a href="#">Makanan</a></li>
                                <li><a href="#">Minuman</a></li>
                                <li><a href="#">Oleh-oleh</a></li>
                            </ul>
                        </li>
                        <li>
                            <h3 class="border-b py-2 mb-4 text-gray-900 font-semibold">Fashion</h3>
                            <ul class="flex flex-col items-start gap-2">
                                <li><a href="#">Batik</a></li>
                                <li><a href="#">Pakaian Tradisional</a></li>
                                <li><a href="#">Aksesoris</a></li>
                            </ul>
                        </li>
                        <li>
                            <h3 class="border-b py-2 mb-4 text-gray-900 font-semibold">Kerajinan</h3>
                            <ul class="flex flex-col items-start gap-2">
                                <li><a href="#">Anyaman</a></li>
                                <li><a href="#">Dekorasi Rumah</a></li>
                                <li><a href="#">Keramik</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="nav_items relative">
                    <a href="#Blog">ARTIKEL</a>
                </li>
                <li class="nav_items relative">
                    <a href="#Promo">PROMO</a>
                </li>
                <li class="nav_items relative">
                    <a href="#Kontak">KONTAK</a>
                </li>
            </ul>
        </nav>
    </div>
    <!--? mobile Navbar -->
    <div id="mobileNavbar" class="lg:hidden fixed bottom-0 w-full bg-white shadow-md flex justify-around p-4">
        <a href="/" class="text-gray-600 flex flex-col items-center">
            <ion-icon name="home-outline"></ion-icon>
            <span class="text-xs">Beranda</span>
        </a>
        <button class="text-gray-600 flex flex-col items-center" id="mobileCategoryBtn">
            <ion-icon name="grid-outline"></ion-icon>
            <span class="text-xs">Kategori</span>
        </button>
        <a href="#Promo" class="text-gray-600 flex flex-col items-center">
            <ion-icon name="pricetags-outline"></ion-icon>
            <span class="text-xs">Promo</span>
        </a>
        <a href="#Kontak" class="text-gray-600 flex flex-col items-center">
            <ion-icon name="call-outline"></ion-icon>
            <span class="text-xs">Kontak</span>
        </a>
    </div>
</header>
