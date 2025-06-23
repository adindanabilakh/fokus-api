@extends('layouts.layout')

@section('user-content')
    <!-- !banner -->
    {{-- <div class="banner mt-10 lg:-mt-4 flex items-center justify-center">
        <div class="swiper swiper-js">
            <div class="swiper-wrapper h-64 lg:h-96 w-full lg:w-5/6 relative" id="swiperSlide"></div>

            <div class="swiper-scrollbar"></div>
        </div>
    </div> --}}
    <!--todo Title Categories  -->
    {{-- <div class="flex items-center justify-center mt-10">
        <div class="swiper categories_swiper">
            <div class="swiper-wrapper relative gap-4" id="titlecategories"></div>

            <div class="swiper-scrollbar"></div>
        </div>
    </div> --}}

    <!--? Products and categories  -->
    <section class="w-full min-h-auto px-8 lg:px-0 lg:w-5/6 mx-auto mt-16 flex gap-8">
        <aside class="sticky top-0 hidden lg:flex flex-col lg:w-1/4 max-h-screen">
            <div class="aside_section overflow-y-auto">
                <div class="categories w-full rounded-xl px-4 bg-white border shadow-lg">
                    <h1 class="text-xl font-semibold mb-4">CATEGORY</h1>
                    <div class="border-b pb-3 text-lg text-gray-600">
                        <details>
                            <div class="flex justify-between items-baseline text-sm">
                                <a href="#">Shirt</a>
                                <span>300</span>
                            </div>
                            <div class="flex justify-between items-baseline text-sm">
                                <a href="#">Shorts & Jeans</a>
                                <span>30</span>
                            </div>
                            <div class="flex justify-between items-baseline text-sm">
                                <a href="#">Jacket</a>
                                <span>50</span>
                            </div>
                            <div class="flex justify-between items-baseline text-sm">
                                <a href="#">Dress & Frock</a>
                                <span>120</span>
                            </div>
                            <summary>
                                <div class="flex items-center gap-2">
                                    Clothes
                                    <img class="w-4 h-4" src="./assets/images/icons/dress.svg" alt="productPicture" />
                                </div>
                            </summary>
                        </details>
                    </div>
                    <div class="border-b pb-3 text-lg text-gray-600">
                        <details>
                            <div class="flex justify-between items-baseline text-sm">
                                <a href="#">Sports</a>
                                <span>300</span>
                            </div>
                            <div class="flex justify-between items-baseline text-sm">
                                <a href="#">Formal</a>
                                <span>30</span>
                            </div>
                            <div class="flex justify-between items-baseline text-sm">
                                <a href="#">Casual</a>
                                <span>50</span>
                            </div>
                            <div class="flex justify-between items-baseline text-sm">
                                <a href="#">Safety Shoes</a>
                                <span>120</span>
                            </div>
                            <summary>
                                <div class="flex items-center gap-2">
                                    Footwear
                                    <img class="w-4 h-4" src="./assets/images/icons/shoes.svg" alt="productPicture" />
                                </div>
                            </summary>
                        </details>
                    </div>
                    <div class="border-b pb-3 text-lg text-gray-600">
                        <details>
                            <div class="flex justify-between items-baseline text-sm">
                                <a href="#">Earrings</a>
                                <span>300</span>
                            </div>
                            <div class="flex justify-between items-baseline text-sm">
                                <a href="#">Couple Rings</a>
                                <span>30</span>
                            </div>
                            <div class="flex justify-between items-baseline text-sm">
                                <a href="#">Necklace</a>
                                <span>50</span>
                            </div>
                            <summary>
                                <div class="flex items-center gap-2">
                                    Jewelry
                                    <img class="w-4 h-4" src="./assets/images/icons/jewelry.svg" alt="productPicture" />
                                </div>
                            </summary>
                        </details>
                    </div>
                    <div class="border-b pb-3 text-lg text-gray-600">
                        <details>
                            <div class="flex justify-between items-baseline text-sm">
                                <a href="#">Clothes Perfume</a>
                                <span>300</span>
                            </div>
                            <div class="flex justify-between items-baseline text-sm">
                                <a href="#">Deodorant</a>
                                <span>30</span>
                            </div>
                            <div class="flex justify-between items-baseline text-sm">
                                <a href="#">Jacket</a>
                                <span>50</span>
                            </div>
                            <div class="flex justify-between items-baseline text-sm">
                                <a href="#">Dress & Frock</a>
                                <span>120</span>
                            </div>
                            <summary>
                                <div class="flex items-center gap-2">
                                    Perfume
                                    <img class="w-4 h-4" src="./assets/images/icons/perfume.svg" alt="productPicture" />
                                </div>
                            </summary>
                        </details>
                    </div>
                    <div class="border-b pb-3 text-lg text-gray-600">
                        <details>
                            <div class="flex justify-between items-baseline text-sm">
                                <a href="#">Shampoo</a>
                                <span>300</span>
                            </div>
                            <div class="flex justify-between items-baseline text-sm">
                                <a href="#">Sunscreen</a>
                                <span>30</span>
                            </div>
                            <div class="flex justify-between items-baseline text-sm">
                                <a href="#">Body Wash</a>
                                <span>50</span>
                            </div>
                            <div class="flex justify-between items-baseline text-sm">
                                <a href="#">Makeup Kit</a>
                                <span>120</span>
                            </div>
                            <summary>
                                <div class="flex items-center gap-2">
                                    Cosmetics
                                    <img class="w-4 h-4" src="./assets/images/icons/cosmetics.svg" alt="productPicture" />
                                </div>
                            </summary>
                        </details>
                    </div>
                    <div class="border-b pb-3 text-lg text-gray-600">
                        <details>
                            <div class="flex justify-between items-baseline text-sm">
                                <a href="#">Sunglasses</a>
                                <span>23</span>
                            </div>
                            <div class="flex justify-between items-baseline text-sm">
                                <a href="#">Lenses</a>
                                <span>53</span>
                            </div>
                            <summary>
                                <div class="flex items-center gap-2">
                                    Glasses
                                    <img class="w-4 h-4" src="./assets/images/icons/glasses.svg" alt="productPicture" />
                                </div>
                            </summary>
                        </details>
                    </div>
                    <div class="border-b pb-3 text-lg text-gray-600">
                        <details>
                            <div class="flex justify-between items-baseline text-sm">
                                <a href="#">Wallet</a>
                                <span>300</span>
                            </div>
                            <div class="flex justify-between items-baseline text-sm">
                                <a href="#">Purse</a>
                                <span>30</span>
                            </div>
                            <div class="flex justify-between items-baseline text-sm">
                                <a href="#">Gym Backpack</a>
                                <span>50</span>
                            </div>
                            <div class="flex justify-between items-baseline text-sm">
                                <a href="#">Shopping Bag</a>
                                <span>120</span>
                            </div>
                            <summary>
                                <div class="flex items-center gap-2">
                                    Bags
                                    <img class="w-4 h-4" src="./assets/images/icons/bag.svg" alt="productPicture" />
                                </div>
                            </summary>
                        </details>
                    </div>
                </div>

                <div class="bestsellers w-72 h-auto mt-10 flex flex-col items-start justify-start gap-4">
                    <h2 class="text-lg font-semibold">BEST SELLERS</h2>
                    <div class="flex items-center justify-start gap-2">
                        <div class="w-20 h-20 p-2 border shadow-lg bg-gray-300/20 rounded-md">
                            <img class="w-full h-full" src="./assets/images/products/1.jpg" alt="" />
                        </div>
                        <div class="text-gray-700">
                            <h4 class="text-gray-900">Baby Fabric Shoes</h4>
                            <div class="stars text-yellow-500">
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star-half-outline"></ion-icon>
                            </div>
                            <div class="flex items-center justify-start gap-4">
                                <s class="text-gray-500">$14.00</s> <strong>$7.00</strong>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-start gap-2">
                        <div class="w-20 h-20 p-2 border shadow-lg bg-gray-300/20 rounded-md">
                            <img class="w-full h-full" src="./assets/images/products/2.jpg" alt="" />
                        </div>
                        <div class="text-gray-700">
                            <h4 class="text-gray-900">Men's Hoodies T-Shirt</h4>
                            <div class="stars text-yellow-500">
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star-half-outline"></ion-icon>
                                <ion-icon name="star-outline"></ion-icon>
                            </div>
                            <div class="flex items-center justify-start gap-4">
                                <s class="text-gray-500">$5.00</s> <strong>$2.00</strong>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-start gap-2">
                        <div class="w-20 h-20 p-2 border shadow-lg bg-gray-300/20 rounded-md">
                            <img class="w-full h-full" src="./assets/images/products/3.jpg" alt="" />
                        </div>
                        <div class="text-gray-700">
                            <h4 class="text-gray-900">Girls T-Shirt</h4>
                            <div class="stars text-yellow-500">
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star-half-outline"></ion-icon>
                                <ion-icon name="star-outline"></ion-icon>
                                <ion-icon name="star-outline"></ion-icon>
                            </div>
                            <div class="flex items-center justify-start gap-4">
                                <s class="text-gray-500">$10.00</s> <strong>$5.00</strong>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-start gap-2">
                        <div class="w-20 h-20 p-2 border shadow-lg bg-gray-300/20 rounded-md">
                            <img class="w-full h-full" src="./assets/images/products/4.jpg" alt="" />
                        </div>
                        <div class="text-gray-700">
                            <h4 class="text-gray-900">Woolen Hat For Men</h4>
                            <div class="stars text-yellow-500">
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star-half-outline"></ion-icon>
                            </div>
                            <div class="flex items-center justify-start gap-4">
                                <s class="text-gray-500">$24.00</s> <strong>$17.00</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </aside>

        <div class="products w-full lg:w-3/4 flex flex-col">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                <!-- Kategori: Produk Terbaru -->
                <div class="NewArrivals flex flex-col gap-4">
                    <h1 class="text-xl font-semibold border-b pb-4">Produk Terbaru</h1>
                    <div class="grid grid-cols-1 gap-4">
                        <a href="#"
                            class="flex items-center p-4 bg-white border shadow rounded-lg hover:shadow-lg transition">
                            <img class="w-16 h-16 object-cover rounded-md" src="./assets/images/products/kopi.jpg"
                                alt="Kopi Arabika" />
                            <div class="ml-4">
                                <h4 class="font-bold text-gray-900 text-sm">Kopi Arabika Gayo</h4>
                                <h4 class="text-xs text-gray-600">Minuman</h4>
                                <div class="flex items-center gap-2 mt-1">
                                    <strong class="text-red-400">Rp 35.000</strong>
                                    <s class="text-gray-500 text-xs">Rp 50.000</s>
                                </div>
                            </div>
                        </a>

                        <a href="#"
                            class="flex items-center p-4 bg-white border shadow rounded-lg hover:shadow-lg transition">
                            <img class="w-16 h-16 object-cover rounded-md" src="./assets/images/products/keripik.jpg"
                                alt="Keripik Pisang" />
                            <div class="ml-4">
                                <h4 class="font-bold text-gray-900 text-sm">Keripik Pisang Manis</h4>
                                <h4 class="text-xs text-gray-600">Makanan</h4>
                                <div class="flex items-center gap-2 mt-1">
                                    <strong class="text-red-400">Rp 18.000</strong>
                                    <s class="text-gray-500 text-xs">Rp 22.000</s>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Kategori: Lagi Tren -->
                <div class="Trending flex flex-col gap-4">
                    <h1 class="text-xl font-semibold border-b pb-4">Lagi Tren</h1>
                    <div class="grid grid-cols-1 gap-4">
                        <a href="#"
                            class="flex items-center p-4 bg-white border shadow rounded-lg hover:shadow-lg transition">
                            <img class="w-16 h-16 object-cover rounded-md" src="./assets/images/products/anyaman.jpg"
                                alt="Tas Anyaman" />
                            <div class="ml-4">
                                <h4 class="font-bold text-gray-900 text-sm">Tas Anyaman Rotan</h4>
                                <h4 class="text-xs text-gray-600">Kerajinan</h4>
                                <div class="flex items-center gap-2 mt-1">
                                    <strong class="text-red-400">Rp 120.000</strong>
                                    <s class="text-gray-500 text-xs">Rp 150.000</s>
                                </div>
                            </div>
                        </a>

                        <a href="#"
                            class="flex items-center p-4 bg-white border shadow rounded-lg hover:shadow-lg transition">
                            <img class="w-16 h-16 object-cover rounded-md" src="./assets/images/products/batik.jpg"
                                alt="Batik Tulis" />
                            <div class="ml-4">
                                <h4 class="font-bold text-gray-900 text-sm">Batik Tulis Handmade</h4>
                                <h4 class="text-xs text-gray-600">Fashion</h4>
                                <div class="flex items-center gap-2 mt-1">
                                    <strong class="text-red-400">Rp 250.000</strong>
                                    <s class="text-gray-500 text-xs">Rp 300.000</s>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Kategori: Paling Laris -->
                <div class="TopRated flex flex-col gap-4">
                    <h1 class="text-xl font-semibold border-b pb-4">Paling Laris</h1>
                    <div class="grid grid-cols-1 gap-4">
                        <a href="#"
                            class="flex items-center p-4 bg-white border shadow rounded-lg hover:shadow-lg transition">
                            <img class="w-16 h-16 object-cover rounded-md" src="./assets/images/products/jam.jpg"
                                alt="Jam Kayu" />
                            <div class="ml-4">
                                <h4 class="font-bold text-gray-900 text-sm">Jam Tangan Kayu</h4>
                                <h4 class="text-xs text-gray-600">Aksesoris</h4>
                                <div class="flex items-center gap-2 mt-1">
                                    <strong class="text-red-400">Rp 180.000</strong>
                                    <s class="text-gray-500 text-xs">Rp 220.000</s>
                                </div>
                            </div>
                        </a>

                        <a href="#"
                            class="flex items-center p-4 bg-white border shadow rounded-lg hover:shadow-lg transition">
                            <img class="w-16 h-16 object-cover rounded-md" src="./assets/images/products/sabun.jpg"
                                alt="Sabun Herbal" />
                            <div class="ml-4">
                                <h4 class="font-bold text-gray-900 text-sm">Sabun Herbal Organik</h4>
                                <h4 class="text-xs text-gray-600">Kesehatan</h4>
                                <div class="flex items-center gap-2 mt-1">
                                    <strong class="text-red-400">Rp 35.000</strong>
                                    <s class="text-gray-500 text-xs">Rp 50.000</s>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <div class="mt-10 w-full px-8 lg:px-0 lg:w-5/6 mx-auto flex flex-wrap lg:flex-nowrap flex-col lg:flex-row gap-8 mb-20">
        <div class="testimonial w-full lg:w-2/6">
            <h1 class="text-xl font-semibold border-b pb-4 mb-8">Testimonial</h1>
            <div style="height: 23rem" class="w-full border rounded-xl flex flex-col items-center justify-center p-4">
                <img class="w-20 h-20 rounded-full" src="./assets/images/testimonial-1.jpg" alt="testimonial" />
                <h2 class="text-lg font-bold text-gray-600">ALAN DOE</h2>
                <h5 class="text-md">CEO & Founder Invision</h5>
                <img class="w-6 h-6 my-4" src="./assets/images/icons/quotes.svg" alt="quotes" />
                <p class="text-sm w-4/5 mx-auto text-center">
                    Lorem ipsum dolor sit amet consectetur Lorem ipsum dolor dolor sit
                    amet.
                </p>
            </div>
        </div>

        <div class="w-full lg:w-3/6 rounded-lg flex items-center justify-center"
            style="background-image: url('./assets/images/cta-banner.jpg')">
            <div class="flex flex-col items-center justify-center p-8 gap-4 bg-gray-100/70 rounded-lg w-3/4">
                <button class="bg-gray-900 text-white p-2 rounded-lg">
                    25% DISCOUNT
                </button>
                <h1 class="w-56 text-4xl font-bold text-center text-gray-800">
                    Summer Collection
                </h1>
                <h5 class="text-lg font-semibold text-gray-500">Starting @ $10</h5>
                <button class="text-lg font-semibold text-gray-500">SHOP NOW</button>
            </div>
        </div>

        <div class="OurServices w-full lg:w-2/6">
            <h1 class="text-xl font-semibold border-b pb-4 mb-8">Our Services</h1>
            <div style="height: 23rem"
                class="w-full border rounded-xl flex flex-wrap justify-between lg:flex-col items-center lg:justify-center p-4 lg:px-8 lg:gap-8">
                <div class="w-1/2 lg:w-full flex justify-center lg:justify-between items-center gap-2">
                    <ion-icon class="text-red-500 text-4xl" name="boat-outline"></ion-icon>
                    <div>
                        <h3 class="font-semibold text-gray-700">Worldwide Delivery</h3>
                        <p class="text-xs text-gray-600">For Order Over $100</p>
                    </div>
                </div>

                <div class="w-1/2 lg:w-full flex justify-center lg:justify-between items-center gap-2">
                    <ion-icon class="text-red-500 text-4xl" name="rocket-outline"></ion-icon>
                    <div>
                        <h3 class="font-semibold text-gray-700">Worldwide Delivery</h3>
                        <p class="text-xs text-gray-600">For Order Over $100</p>
                    </div>
                </div>

                <div class="w-1/2 lg:w-full flex justify-center lg:justify-between items-center gap-2">
                    <ion-icon class="text-red-500 text-4xl" name="call-outline"></ion-icon>
                    <div>
                        <h3 class="font-semibold text-gray-700">Worldwide Delivery</h3>
                        <p class="text-xs text-gray-600">For Order Over $100</p>
                    </div>
                </div>

                <div class="w-1/2 lg:w-full flex justify-center lg:justify-between items-center gap-2">
                    <ion-icon class="text-red-500 text-4xl" name="arrow-undo-outline"></ion-icon>
                    <div>
                        <h3 class="font-semibold text-gray-700">Worldwide Delivery</h3>
                        <p class="text-xs text-gray-600">For Order Over $100</p>
                    </div>
                </div>

                <div class="w-1/2 lg:w-full flex justify-center lg:justify-between items-center gap-2">
                    <ion-icon class="text-red-500 text-4xl" name="ticket-outline"></ion-icon>
                    <div>
                        <h3 class="font-semibold text-gray-700">Worldwide Delivery</h3>
                        <p class="text-xs text-gray-600">For Order Over $100</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="w-full mx-auto flex my-10">
        <div class="swiper blog_swiper">
            <div class="swiper-wrapper" id="blog_swiper"></div>

            <div class="swiper-scrollbar"></div>
        </div>
    </div>
@endsection
