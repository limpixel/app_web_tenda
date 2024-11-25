@extends('layouts.fe-layout')


@section('fe-content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold">Our Product</h1>

    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <!-- Filter Section -->
        <div class="bg-white p-4 rounded-lg shadow-md">
            <h2 class="font-semibold mb-4">Select Date</h2>

            <div class="mb-6">
                <input type="date" class="border p-2 w-full rounded mb-2" value="2024-08-23">
                <button class="bg-gray-200 p-2 w-full rounded">Today</button>
            </div>

            <div class="mb-6">
                <h3 class="font-semibold mb-2">Duration</h3>
                <div class="space-y-2">
                    <label class="flex items-center">
                        <input type="checkbox" class="form-checkbox" checked>
                        <span class="ml-2">Less Than 1 Day</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" class="form-checkbox">
                        <span class="ml-2">1 Day</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" class="form-checkbox">
                        <span class="ml-2">2 - 4 Day</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" class="form-checkbox">
                        <span class="ml-2">5 - 7 Day</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" class="form-checkbox">
                        <span class="ml-2">8 - 10 More Day</span>
                    </label>
                </div>
            </div>

            <div class="mb-6">
                <h3 class="font-semibold mb-2">Type</h3>
                <div class="space-y-2">
                    <label class="flex items-center">
                        <input type="checkbox" class="form-checkbox" checked>
                        <span class="ml-2">Decoration</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" class="form-checkbox">
                        <span class="ml-2">Semi Dekorasi</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" class="form-checkbox">
                        <span class="ml-2">Standard</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" class="form-checkbox">
                        <span class="ml-2">Sarnavill</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" class="form-checkbox">
                        <span class="ml-2">Roder</span>
                    </label>
                </div>
            </div>

            <div class="mb-6">
                <h3 class="font-semibold mb-2">Satuan</h3>
                <div class="space-y-2">
                    <label class="flex items-center">
                        <input type="checkbox" class="form-checkbox" checked>
                        <span class="ml-2">Meter (m²)</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" class="form-checkbox">
                        <span class="ml-2">Tenda</span>
                    </label>
                </div>
            </div>

            <div class="mb-6">
                <h3 class="font-semibold mb-2">Size</h3>
                <div class="space-y-2">
                    <label class="flex items-center">
                        <input type="checkbox" class="form-checkbox" checked>
                        <span class="ml-2">&lt; 5 - 6 m²</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" class="form-checkbox">
                        <span class="ml-2">5 - 8 m²</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" class="form-checkbox">
                        <span class="ml-2">10 m²</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" class="form-checkbox">
                        <span class="ml-2">15 m²</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" class="form-checkbox">
                        <span class="ml-2">&gt; 20 m²</span>
                    </label>
                </div>
            </div>
        </div>

        <!-- Product Section -->
        <div class="col-span-3">
            <div class="flex justify-between items-center mb-4">
                <input type="text" placeholder="Search..." class="border p-2 rounded-lg w-1/4">
                <button class="bg-gray-200 p-2 rounded ml-2">Today</button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <!-- Product Card -->
                @foreach ($produk as $items )
                <div class="bg-white p-4 rounded-lg shadow-md">
                    <div class="relative">
                        <img src="{{ asset('images/produk/' . $items->image_produk) }}"  alt="Tenda Standard"
                            class="rounded-lg h-72 w-full">
                        <div class="absolute top-2 left-2 flex items-center gap-2">
                            <span
                                class="flex items-center gap-2  bg-white border-[1.2px] border-[#9E9E9E]/50 text-xs px-2 py-[4.5px] rounded">
                                <?xml style="color: yellow;" version="1.0" encoding="UTF-8"?>
                                <svg width="14" height="14" viewBox="0 0 48 48" fill="#FFDE4D"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M23.9986 5L17.8856 17.4776L4 19.4911L14.0589 29.3251L11.6544 43L23.9986 36.4192L36.3454 43L33.9586 29.3251L44 19.4911L30.1913 17.4776L23.9986 5Z"
                                        fill="#FFDE4D" stroke="#FFDE4D" stroke-width="4" stroke-linejoin="round" />
                                </svg>
                                <div class="">
                                    4.8 <span class="text-black/40">( 108 )</span>
                                </div>
                            </span>
                            <span class=" left-28 bg-[#DFF2DE] text-[#E4003A] text-xs px-2 py-[4.5px] rounded">Available
                                Now</span>
                        </div>
                    </div>

                    <div class="mt-4">
                        <div class="flex justify-between py-2 border-b-[1.5px] ">
                            <h3 class="font-semibold">{{$items->nama_produk}}</h3>
                            <p class="text-gray-500"><td>{{ 'Rp' . ' ' . number_format($items->harga, 0, ',', '.') }}</td>  / m²</p>
                        </div>

                        <div class="mt-1 grid grid-cols-2 gap-y-6 gap-x-4 py-4">
                            <span class="text-gray-700 flex items-center gap-2 ">
                                <?xml version="1.0" encoding="UTF-8"?><svg width="20" height="20" viewBox="0 0 48 48"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M44 14L24 4L4 14V34L24 44L44 34V14Z" stroke="#333" stroke-width="4"
                                        stroke-linejoin="round" />
                                    <path d="M4 14L24 24" stroke="#333" stroke-width="4" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M24 44V24" stroke="#333" stroke-width="4" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M44 14L24 24" stroke="#333" stroke-width="4" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M34 9L14 19" stroke="#333" stroke-width="4" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                                {{$items->tipe_produk}}
                            </span>
                            <span class="text-gray-700 flex items-center gap-2 ">
                                <?xml version="1.0" encoding="UTF-8"?><svg width="20" height="20" viewBox="0 0 48 48"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M33 6H42V15" stroke="#333" stroke-width="4" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M42 33V42H33" stroke="#333" stroke-width="4" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M15 42H6V33" stroke="#333" stroke-width="4" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M6 15V6H15" stroke="#333" stroke-width="4" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                                {{$items->ukuran}} m²
                            </span>
                            <span class="text-gray-700 flex items-center gap-2">
                                <?xml version="1.0" encoding="UTF-8"?><svg width="20" height="20" viewBox="0 0 48 48"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="24" cy="28" r="16" fill="none" stroke="#333" stroke-width="4" />
                                    <path d="M28 4L20 4" stroke="#333" stroke-width="4" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M24 4V12" stroke="#333" stroke-width="4" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M35 16L38 13" stroke="#333" stroke-width="4" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M24 28V22" stroke="#333" stroke-width="4" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M24 28H18" stroke="#333" stroke-width="4" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                                {{$items->waktu_harian}} Days
                            </span>
                        </div>


                    </div>
                </div>
                @endforeach

                


            </div>
        </div>
    </div>
</div>
@endsection

@section('css-tambahan')

@endsection