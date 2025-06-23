@extends('layouts.layout')

@section('user-content')
    <div class="day px-8 lg:px-0 lg:w-5/6 mx-auto my-10">
        <h1 class="font-semibold text-xl border-b py-4">Deal Of The Day</h1>
        <div class="mt-10 w-full h-auto border rounded-lg flex flex-col lg:flex-row justify-between">
            <img class="lg:w-1/2" src="{{ asset('/assets/images/products/shampoo.jpg') }}" alt="" />
            <div class="lg:w-1/2 flex flex-col items-start gap-2 p-4">
                <div class="stars text-yellow-500">
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star-half-outline"></ion-icon>
                </div>
                <h4 class="font-bold text-lg">
                    SHAMPOO, CONDITIONER & FACEWASH PACKS
                </h4>
                <p>
                    Lorem ipsum dolor sit amet consectetur Lorem ipsum dolor dolor sit
                    amet consectetur Lorem ipsum dolor
                </p>
                <div>
                    <strong class="text-red-400 font-bold text-xl">$150.00</strong>
                    <s class="text-xl text-gray-500">$200.00</s>
                </div>
                <button class="bg-red-500 text-white rounded-xl py-2 px-4 text-md font-semibold">
                    ADD TO CART
                </button>
                <h3 class="mt-4 font-semibold text-sm">HURRY UP! OFFER ENDS IN:</h3>
                <div id="reverseTimer" class="flex justify-between items-center gap-4 font-semibold text-sm text-black">
                    <h1 class="flex flex-col items-center justify-center bg-gray-300/20 border shadow-lg p-2 w-12 h-12 rounded-lg"
                        id="days"></h1>
                    <h1 class="flex flex-col items-center justify-center bg-gray-300/20 border shadow-lg p-2 w-12 h-12 rounded-lg"
                        id="hour"></h1>
                    <h1 class="flex flex-col items-center justify-center bg-gray-300/20 border shadow-lg p-2 w-12 h-12 rounded-lg"
                        id="minute"></h1>
                    <h1 class="flex flex-col items-center justify-center bg-gray-300/20 border shadow-lg p-2 w-12 h-12 rounded-lg"
                        id="second"></h1>
                </div>
            </div>
        </div>
    </div>
@endsection
