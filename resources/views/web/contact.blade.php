@extends('layouts.fe-layout')

@section('fe-content')
<section class="bg-white py-12">
    <div class="container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-8 lg:grid-cols-2">
            <!-- Form Section -->
            <div class="bg-white rounded-lg shadow-lg p-8">
                <h2 class="text-3xl font-bold text-gray-900">Contact Us</h2>
                <p class="mt-2 text-gray-600">
                    Fill in the data for the profile. It will take a couple of minutes.
                    You only need a passport.
                </p>

                <form id="contact-form" class="mt-8 space-y-6" onsubmit="sendMessage(event)">
                    <!-- Kontak Email -->
                    <div class="flex items-center border-b border-gray-300 py-2">
                        <input id="email" type="email" class="ml-4 w-full border-none focus:outline-none focus:ring-0" 
                            placeholder="alex_manager@gmail.com" required />
                    </div>
                
                    <!-- Nomor Telepon -->
                    <div class="flex items-center border-b border-gray-300 py-2">
                        <input id="phone" type="tel" class="ml-4 w-full border-none focus:outline-none focus:ring-0" 
                            placeholder="+62 555 555-1234" required />
                    </div>
                
                    <!-- Tenda Type dan Ukuran -->
                    <div class="flex gap-4">
                        <div class="flex-1">
                            <label for="tenda-type" class="block text-sm font-medium text-gray-700">
                                Type Tenda
                            </label>
                            <select id="tenda-type" 
                                class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 pl-3 pr-10 text-base focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                @foreach ($product as $item )
                                    <option> {{$item->nama_produk}} </option>
                                @endforeach
                                
                            </select>
                        </div>
                
                        <div class="flex-1">
                            <label for="size" class="block text-sm font-medium text-gray-700">
                                Ukuran
                            </label>
                            <input id="size" type="text" 
                                class="mt-1 p-[9px] block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" 
                                placeholder="10 m²" required />
                        </div>
                    </div>
                
                    <!-- Pesan -->
                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700">
                            Pesan
                        </label>
                        <textarea id="message" rows="3" 
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" 
                            placeholder="Write your message here..." required></textarea>
                    </div>
                
                    <!-- Tombol Kirim -->
                    <div>
                        <button type="submit"
                            class="w-full flex items-center justify-center rounded-md bg-indigo-600 py-3 px-4 text-base font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            Send WhatsApp Message
                        </button>
                    </div>
                </form>
                
                <script>
                    function sendMessage(event) {
                        event.preventDefault();
                
                        // Ambil data dari form
                        const email = document.getElementById('email').value;
                        const phone = document.getElementById('phone').value;
                        const tendaType = document.getElementById('tenda-type').value;
                        const size = document.getElementById('size').value;
                        const message = document.getElementById('message').value;
                
                        // Format pesan
const whatsappMessage = `
Hi, Saya ingin bertanya mengenai produk yang Anda tawarkan. Saya tertarik dengan jenis tenda "${tendaType}" dengan
ukuran ${size}.

Berikut detail kontak saya:
Email: ${email}, Nomor Telepon: ${phone}.

Pesan tambahan: "${message}". Mohon informasinya terkait produk ini, ya. Terima kasih banyak! 😊
`.trim();

                
                        // Nomor WhatsApp tujuan (ganti sesuai kebutuhan)
                        const whatsappNumber = "628115133959"; // Pastikan format nomor internasional
                
                        // Buat URL WhatsApp
                        const whatsappURL = `https://wa.me/${whatsappNumber}?text=${encodeURIComponent(whatsappMessage)}`;
                
                        // Redirect ke WhatsApp
                        window.open(whatsappURL, '_blank');
                    }
                </script>
                
                
            </div>

            <!-- Image Section -->
            <div class="flex items-center justify-center">
                <img src="{{asset('images/contact_person.png')}}" alt="Person working on laptop"
                    class="rounded-lg hidden lg:block h-[550px] shadow-lg" />
            </div>
        </div>
    </div>
</section>


@endsection
