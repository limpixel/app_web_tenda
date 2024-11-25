@extends('layouts.fe-layout')

@section('fe-content')
<!-- Hero Section -->
<section class="relative bg-cover bg-center">
    @foreach ($heroSections as $key => $heroSections)
    <div
        class="absolute inset-0 z-40 flex flex-col justify-end p-4 text-white md:justify-end md:items-start md:left-16 md:bottom-12">
        <h1 class="text-sm md:text-base">{{$heroSections->head_text}}</h1>
        <h2 class="text-2xl font-semibold leading-snug sm:text-3xl md:text-4xl md:leading-tight">
            {{$heroSections->title_text}} <br class="hidden md:block"> 
        </h2>
        <p class="text-sm text_hero_desc mt-2 text-justify sm:text-base md:mt-4 md:text-left">
            {{$heroSections->description}}
        </p>
    </div>
    <div class="w-full h-[50vh] md:h-[70vh] lg:h-[90vh]">
        <img src="{{asset('images/home/hero_section.png')}}" alt="Hero Section Image" class="h-full w-full object-cover">
    </div>
    @endforeach
</section>

<!-- High Demand Type Section -->
<section class="my-32 mx-8 md:px-20 lg:mx-16  lg:px-40 ">
    
    <div class="container mx-auto text-center">
        <div class="my-20">
            <h2 class="text-5xl md:text-3xl font-medium ">High Demand Type</h2>
            <div class="text-base md:text-sm font-base mt-4">It is a long established fact that a reader will be
                distracted by
                the readable content <br> of a page when looking at its layout.</div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2  lg:grid-cols-3 gap-8">

            @if ($homeProduct->count() > 0)
            @foreach ($homeProduct->take(3) as $item)
                <div class="bg-white rounded-lg overflow-hidden">
                    <img src="{{ asset('images/produk/' . $item->image_produk) }}" alt="{{ $item->nama_produk }}"
                        class="w-full h-96 object-cover rounded-lg">
                    <div class="p-4 flex flex-col items-start text-end">
                        <h3 class="text-xl font-semibold">{{ $item->nama_produk }}</h3>
                        <p class="mt-2 text-gray-600">{{ $item->waktu_harian }} Days Rent</p>
                    </div>
                </div>
            @endforeach
        @else
            <p>No products available.</p>
        @endif
        

            

           
        </div>
    </div>
    
</section>

<!-- Easy Booking Section -->
<section class="py-16 mb-7 ">
    @foreach ($HomeEasyBook as $key => $HomeEasyBook )
    <div class="container mx-auto flex flex-col md:flex-row items-center justify-between">
        <div class="md:w-1/2">
            <h2 class="text-5xl tracking-wide font-medium">{{$HomeEasyBook->head_text}}</h2>
            <p class="mt-4 text-gray-600 leading-7">
                {{$HomeEasyBook->description}}
            </p>
            <a href="#" class=" mt-8 inline-block bg-blue-500 text-white py-3 px-12 rounded">Learn More</a>
        </div>
        <img style="width: 600px;" src="{{ asset('images/home/home_easy_booking/' . $HomeEasyBook->image) }}" alt="Booking"
            class=" rounded-lg shadow-md mt-8 md:mt-0">
    </div>
    @endforeach
</section>

<!-- Product Section -->
<section class="bg-gray-50">
    <div class="container mx-auto max-w-[1340px] px-4 py-12 sm:px-6 lg:py-16 xl:py-24">
        <div class="max-w-8xl items-end justify-between sm:flex sm:pr-6 lg:pr-8">
            <div class="flex flex-col gap-4">
                <h2 class="max-w-xl text-4xl font-medium tracking-tight text-gray-900 sm:text-5xl">
                    Our Product
                </h2>

                <p class="text-gray-700 text-base leading-relaxed">
                    It is a long established fact that a reader will be distracted by the
                    readable content of a page when looking at its layout.
                </p>
            </div>

            <div class="mt-8 flex gap-4 lg:mt-0">
                <button aria-label="Previous slide" id="keen-slider-previous"
                    class="rounded-full p-3 text-[#007DFC] transition hover:bg-[#007DFC] hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5 rtl:rotate-180">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                    </svg>
                </button>

                <button aria-label="Next slide" id="keen-slider-next"
                    class="rounded-full border border-[#007DFC] bg-[#007DFC] p-3 text-white">
                    <svg class="w-5 h-5 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                    </svg>
                </button>
            </div>
        </div>

        <div class=" mx-6 mt-8  lg:col-span-2 lg:mx-0">
            <div id="keen-slider" class="keen-slider">
               @foreach ( $homeGetAll as $item)
                <a href="{{route('frontend.contact')}}" class="keen-slider__slide rounded-2xl border-[0.5px]">
                    <blockquote class="flex flex-col justify-between h-full bg-white shadow-sm">
                        <div>
                            <div class="flex gap-0.5 text-green-500">
                                <img src="{{ asset('images/produk/' . $item->image_produk) }}" alt="Tenda Dekorasi"
                                    class="w-full object-cover rounded-t-2xl">
                            </div>
                
                            <div class="mt-2 p-4 sm:p-6 lg:p-8 flex flex-col gap-3">
                                <div class="text-lg font-semibold">{{$item->nama_produk}}</div>
                                <p class="text-black text-lg font-bold">{{ 'Rp' . ' ' . number_format($item->harga, 0, ',', '.') }} / m<sup>2</sup></p>
                
                                <div class="flex items-center gap-2 text-gray-600">
                                    <svg width="24" height="24" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"
                                        class="w-6 h-6">
                                        <path
                                            d="M24 44C33.3888 44 41 36.3888 41 27C41 17.6112 33.3888 10 24 10C14.6112 10 7 17.6112 7 27C7 36.3888 14.6112 44 24 44Z"
                                            fill="none" stroke="#333" stroke-width="4" stroke-linejoin="round" />
                                        <path d="M18 4H30" stroke="#333" stroke-width="4" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M24 19V27" stroke="#333" stroke-width="4" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M32 27H24" stroke="#333" stroke-width="4" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M24 4V8" stroke="#333" stroke-width="4" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                    <div>{{$item->waktu_harian}} Days</div>
                                </div>
                            </div>
                        </div>
                    </blockquote>
                </a>
                @endforeach

               
            </div>
        </div>
    </div>
</section>

<section class="flex flex-col md:flex-row items-center justify-between p-8 bg-white rounded-lg shadow-lg">
    <div class="md:w-1/2 relative">
        <img class="w-full rounded-lg" src="{{asset('images/home/product_tenda_roder.png')}}" alt="Tent Image">
        <div
            class="absolute bottom-0 lg:z-40 lg:-bottom-10 -right-10 w-80 hidden  lg:w-96 lg:flex items-center mt-6 p-4 bg-white rounded-lg shadow-lg">
            <img class="w-12 sm:w-16 h-12 sm:h-16 rounded-full object-cover"
                src="https://images.pexels.com/photos/2330172/pexels-photo-2330172.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
                alt="Admin Picture">
            <div class="ml-4">
                <div class="flex flex-col gap-[2px]">
                    <h3 class="text-lg sm:text-xl font-semibold text-gray-800">Ahmad Nasyid</h3>
                    <p class="text-gray-600">Admin Operation</p>
                </div>
                <div class="mt-2">
                    <p class="mt-2 text-black font-bold flex gap-2 mb-2">
                        <svg width="20" height="20" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 39H44V24V9H24H4V24V39Z" fill="#3b82f6" stroke="#3b82f6" stroke-width="4"
                                stroke-linejoin="round" />
                            <path d="M4 9L24 24L44 9" stroke="#FFF" stroke-width="4" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M24 9H4V24" stroke="#3b82f6" stroke-width="4" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M44 24V9H24" stroke="#3b82f6" stroke-width="4" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                        <a class="font-medium" href="mailto:admin@gmail.com">admin@gmail.com</a>
                    </p>
                    <p class="flex items-center gap-2">
                        <svg width="20" height="20" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M16.9961 7.68583C17.7227 7.68583 18.3921 8.07985 18.7448 8.71509L21.1912 13.1219C21.5115 13.6989 21.5266 14.3968 21.2314 14.9871L18.8746 19.7008C18.8746 19.7008 19.5576 23.2122 22.416 26.0706C25.2744 28.929 28.7741 29.6002 28.7741 29.6002L33.487 27.2438C34.0777 26.9484 34.7761 26.9637 35.3533 27.2846L39.7726 29.7416C40.4072 30.0945 40.8008 30.7635 40.8008 31.4896L40.8008 36.5631C40.8008 39.1468 38.4009 41.0129 35.9528 40.1868C30.9249 38.4903 23.1202 35.2601 18.1734 30.3132C13.2265 25.3664 9.99631 17.5617 8.29977 12.5338C7.47375 10.0857 9.33984 7.68583 11.9235 7.68583L16.9961 7.68583Z"
                                fill="#3b82f6" stroke="#3b82f6" stroke-width="4" stroke-linejoin="round" />
                        </svg>
                        <a class="font-medium text-base" href="tel:+6180767931">+61 9076 7931</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="md:w-1/2 mt-8 md:mt-0 md:pl-8">
        <h2 class="text-2xl sm:text-3xl font-semibold text-gray-800">Contact with Our Admin For Booking</h2>
        <p class="mt-4 text-gray-600">
            It is a long established fact that a reader will be distracted by the readable content of a page when
            looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution.
        </p>
        <div class="mt-6">
            <a href="#" class="inline-block px-6 py-3 text-white bg-blue-500 rounded-lg shadow-lg hover:bg-blue-600">
                Contact Us
            </a>
        </div>
    </div>
</section>

<!-- Contact Section -->
<div class="bg-white pt-16 relative overflow-hidden">
    <section class="relative bg-cover" style="background-image: url('{{ asset('images/bg-contact.png') }}');">
        <div class="container mx-auto flex flex-col lg:flex-row items-center justify-between py-24">
            <div class="text-white max-w-lg mb-8 lg:mb-0">
                <h1 class="text-4xl font-bold mb-4">Find the Perfect tent for your event</h1>
                <p class="mb-10">
                    It is a long established fact that a reader will be distracted by the readable content of a page
                    when .
                </p>
                <a href="#contact"
                    class="bg-white text-blue-600 py-4 px-8 rounded-lg font-semibold hover:bg-gray-200">Contact
                    Us</a>
            </div>
            <div class="flex-shrink-0 absolute bottom-0 right-0 transform translate-y-1/2 lg:translate-y-0">
                <img src="{{ asset('images/model_contact.png') }}" alt="Model"
                    class="max-w-xs hidden lg:block lg:max-w-[589px] lg:max-h-lg">
            </div>
        </div>
    </section>
</div>

<!-- Tambahkan BotMan Web Widget -->
<script>
    var botmanWidget = {
        frameEndpoint: '/botman/chat',
        introMessage: "👋 Selamat datang di sistem management! Ada yang bisa saya bantu?",
        title: "Bot Tenda",
        mainColor: "#80C4E9",
        buttonText: "Chat dengan Bot",
    };
</script>
<script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>

@endsection