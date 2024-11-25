@extends('layouts.fe-layout')

@section('css-tambahan')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />


<style>
    .swiper-wrapper {
        height: max-content !important;

        width: max-content;
    }

    .swiper-button-next,
    .swiper-button-prev {
        top: 25%;
        z-index: 1000;
    }

    .swiper-button-next {
        right: -0px !important;
    }

    .swiper-button-prev {
        left: 0px !important;
    }

    .swiper-button-prev:after,
    .swiper-rtl .swiper-button-next:after {
        content: "" !important;
    }

    .mySwiper {
        max-width: 320px !important;
        margin: 0 auto !important;
    }

    .swiper-button-next:after,
    .swiper-rtl .swiper-button-prev:after {
        content: "" !important;
    }

    .mySwiper .swiper-slide.swiper-slide-thumb-active>.swiper-slide\:w-16 {
        --tw-scale-x: 1;
        --tw-scale-y: 1;
        transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
    }

    .mySwiper .swiper-slide.swiper-slide-thumb-active>.swiper-slide\:border-indigo-600 {
        --tw-border-opacity: 1;
        border-color: rgb(79 70 229 / var(--tw-border-opacity));
    }

    .teamswiper .swiper-wrapper {
        height: max-content !important;
        padding-bottom: 64px !important;
    }

    .teamswiper .swiper-horizontal>.swiper-scrollbar,
    .teamswiper .swiper-scrollbar.swiper-scrollbar-horizontal {
        max-width: 140px !important;
        height: 3px !important;
        bottom: 25px !important;
        left: 50% !important;
        transform: translateX(-50%) !important;
    }

    .teamswiper .swiper-pagination-fraction {
        bottom: 0 !important;
        padding-top: 16px !important;
    }

    .teamswiper .swiper-slide.swiper-slide-active>.slide\:border-indigo-600 {
        --tw-border-opacity: 1;
        border-color: rgb(79 70 229 / var(--tw-border-opacity));
    }

    .teamswiper .swiper-pagination-total {
        color: rgb(156 163 175) !important;
    }

    .teamswiper .swiper-scrollbar-drag {
        background: rgb(79 70 229);
    }

    .teamswiper .swiper-pagination-fraction {
        bottom: 0 !important;
    }

    .teamswiper .swiper-button-prev:after,
    .teamswiper .swiper-rtl .swiper-button-next:after {
        content: '' !important;
    }

    .teamswiper .swiper-button-prev {
        top: 93% !important;
        left: 35% !important;
        z-index: 100 !important;
    }

    .teamswiper .swiper-button-next {
        top: 93% !important;
        right: 35% !important;
        z-index: 100 !important;
    }

    .teamswiper .swiper-button-next:after,
    .teamswiper .swiper-rtl .swiper-button-prev:after {
        content: '' !important;
    }

    .teamswiper .swiper-button-next svg,
    .teamswiper .swiper-button-prev svg {
        width: 24px !important;
        height: 24px !important;
    }
</style>
@endsection

@section('fe-content')
<section class="py-14 lg:py-24 relative z-0 bg-gray-50">
    @foreach ($aboutHeroSection as $key => $items )
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative text-center">
        <h1
            class="max-w-2xl mx-auto text-center font-manrope font-bold text-4xl  text-gray-900 mb-5 md:text-5xl md:leading-normal">
            {{$items->head_text}}
        </h1>
        <p class="max-w-sm mx-auto text-center text-base font-normal leading-7 text-gray-500 mb-9">{{$items->about}}</p>


    </div>
    @endforeach
</section>

<section class="py-14 lg:py-24 relative">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative ">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-9">
            @if ($aboutCompanySection->first())
            @php
            $data = $aboutCompanySection->first();
            @endphp
            <div class="img-box">

                @if ($data->image_person)
                <img src="{{ asset('images/about/' . $data->image_person) }}" alt="About Us tailwind page"
                    class="max-lg:mx-auto object-cover">
                @else
                No Image
                @endif
            </div>

            <div class="lg:pl-[100px] flex items-center">
                <div class="data w-full">
                    <h2 class="font-manrope font-bold text-4xl lg:text-5xl text-black mb-9 max-lg:text-center relative">
                        {{$data->head_text}} </h2>
                    <p class="font-normal text-xl leading-8 text-gray-500 max-lg:text-center max-w-2xl mx-auto">
                        {{$data->description_text}}
                    </p>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>


<section class="py-14 lg:py-24 relative">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative ">
        <div class="grid grid-cols-1 lg:grid-cols-2 lg:gap-9 ">

            @if ($aboutCompanySection->skip(1)->first())
            @php
                $data = $aboutCompanySection->skip(1)->first();
            @endphp
            <div class="lg:pr-24 flex items-center">
                <div class="data w-full">
                    <img src="{{ asset('images/about/' . $data->image_person) }}" alt="About Us tailwind page"
                        class="block lg:hidden mb-9 mx-auto object-cover">
                    <h2 class="font-manrope font-bold text-4xl lg:text-5xl text-black mb-9 max-lg:text-center">{{$data->head_text}}</h2>
                    <p class="font-normal text-xl leading-8 text-gray-500 max-lg:text-center max-w-2xl mx-auto">
                        {{$data->description_text}}
                    </p>
                </div>
            </div>
            
            <div class="img-box ">
                <img src="{{ asset('images/about/' . $data->image_person) }}" alt="About Us tailwind page"
                    class="hidden lg:block object-cover">
            </div>
            @endif
        </div>
    </div>
</section>



<section class=" py-14 lg:py-24 bg-gray-50">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative">
        <div class="mb-16 rounded-full">
            <h2 class="text-4xl font-manrope font-bold text-gray-900 text-center">What our happy user says!</h2>
        </div>

        <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
            <div class="swiper-wrapper">
                
                @foreach ($aboutTestimonySection as $aboutTestimony )
                <div class="swiper-slide">
                    <div class="relative mb-20">
                        <!--Slider Wrapper-->
                        <div class="max-w-max mx-auto lg:max-w-4xl">
                            <p class="text-lg text-gray-500 leading-8 mb-8 text-center">
                                {{$aboutTestimony->testimony_text}}
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
              
            </div>

        </div>
        <div thumbsSlider="" class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="https://htmlcolorcodes.com/assets/images/colors/gray-color-solid-background-1920x1080.png"
                        alt="Emily image"
                        class="mx-auto scale-20 h-10 w-10 transition-all duration-300 swiper-slide:w-16 border rounded-full swiper-slide:border-indigo-600 object-cover" />
                </div>
                <div class="swiper-slide">
                    <img src="https://htmlcolorcodes.com/assets/images/colors/gray-color-solid-background-1920x1080.png"
                        alt="Emily image"
                        class="mx-auto scale-20 h-10 w-10 transition-all duration-300 swiper-slide:w-16 border rounded-full swiper-slide:border-indigo-600 object-cover" />
                </div>
                <div class="swiper-slide">
                    <img src="https://htmlcolorcodes.com/assets/images/colors/gray-color-solid-background-1920x1080.png"
                        alt="Emily image"
                        class="mx-auto scale-20 h-10 w-10 transition-all duration-300 swiper-slide:w-16 border rounded-full swiper-slide:border-indigo-600 object-cover" />
                </div>

            </div>

        </div>

    </div>
</section>



<section class="py-20 ">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="bg-indigo-600 rounded-2xl p-8 xl:p-11">
            <h2 class="font-manrope text-4xl text-white text-center font-bold mb-4">Contact if you interested
            </h2>
            <p class="text-indigo-200 text-center mb-11 max-lg:max-w-2xl mx-auto">Join our community of subscribers
                and receive regular
                updates delivered straight to your inbox. It's quick, easy, and free</p>
            <div
                class="max-w-md mx-auto lg:bg-transparent lg:border border-gray-300 rounded-3xl max-lg:py-3 lg:rounded-full lg:h-12 lg:p-1.5 lg:flex-row gap-6 lg:gap-0 flex-col flex items-center justify-center">
                
                <a href="{{route('frontend.contact')}}"
                    class="py-2 px-5 w-full text-sm bg-indigo-500 shadow-md rounded-full  text-white font-semibold hover:bg-indigo-700 text-center">Subscribe</a>
            </div>
        </div>
    </div>
</section>
@endsection



@section('script-frontend')
<script src="https://cdn.jsdelivr.net/npm/pagedone@1.1.2/src/js/pagedone.js"></script>

<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".mySwiper", {
        loop: true,
        spaceBetween: -10,
        slidesPerView: 3,
        watchSlidesProgress: true,
    });
    var swiper2 = new Swiper(".mySwiper2", {
        loop: true,
        spaceBetween: 32,
        thumbs: {
            swiper: swiper,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
</script>

<script>
    var swiper = new Swiper(".teamswiper", {
        slidesPerView: 1,
        spaceBetween: 32,
        centeredSlides: false,
        slidesPerGroupSkip: 1,
        grabCursor: true,
        loop: true,
        keyboard: {
            enabled: true,
        },
        breakpoints: {
            769: {
                slidesPerView: 2,
                slidesPerGroup: 1,
            },
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        scrollbar: {
            el: ".swiper-scrollbar",
        },
        pagination: {
            el: ".swiper-pagination",
            type: "fraction",
        },
    });
</script>
@endsection