@extends('pages.landing-page.layouts.main')

@section('title', $title)

@section('additional_links')
@endsection

@section('content')
    {{-- Cover --}}
    <section class="hidden xl:block">
        {{-- Down Shape --}}
        
        <div class="absolute right-0 -top-[7%] drop-shadow-2xl">
            <img id="down-shape" src="{{ asset('assets/shapes/down-shape.png') }}" alt="Down Shape">
        </div>

        {{-- Up Shape --}}
        <div class="absolute right-0 -top-[7%] drop-shadow-2xl">
            <img id="up-shape" src="{{ asset('assets/shapes/up-shape.png') }}" alt="Down Shape">
        </div>
    </section>

    {{-- Hero --}}
    <div class="grid grid-cols-1 xl:grid-cols-2">
        {{-- Content --}}
        <div>
            <div data-aos="fade-right">

            <h1 class="text-3xl font-extrabold xl:leading-[98px] xl:text-7xl text-center xl:text-start text-midnight-blue">
                Cari & tinjau
                buku <span class="underline text-dodger-blue">favoritmu</span> dengan mudah</h1></div>
              
<div data-aos="fade-up">
            <p class="mt-10 leading-8 text-center xl:text-start xl:w-3/4 text-slate-grey">Mulailah perjalanan literatur seperti
                belum pernah ada sebelumnya
                dengan aplikasi
                perpustakaan revolusioner kami! Memperkenalkan pengalaman yang mulus
                yang melampaui batas-batas tradisional, di mana Anda
                dapat dengan mudah mencari buku favorit Anda.✨</p></div>
                
            <div class="flex justify-center mt-16 xl:block">
                <div data-aos="fade-up">     <a href="{{ auth()->check() ? '/dashboard' : '/login' }}"
                    class="px-12 py-5 font-bold text-white transition-all duration-300 rounded-xl drop-shadow-2xl hover:bg-blue-700 hover:drop-shadow-none bg-dodger-blue">Mulai
                    sekarang →</a></div>
            </div>
        </div>


        {{-- Books --}}

        <div class="relative hidden xl:block">
            <div class="absolute transition-all left-0 top-48">
                <div data-aos="fade-down">
                <img width="210" class="transition-all duration-300 hover:drop-shadow-none rounded-lg drop-shadow-2xl"
                    src="{{ asset('assets/images/Dompet Ayah Sepatu Ibu.png') }}" alt="Dompet Ayah Sepatu Ibu">
                </div>
            </div>
            <div class="absolute transition-all top-0 xl:right-56 min-[1830px]:right-[400px]">
                <div data-aos="fade-down"><img width="150" class="transition-all duration-300 hover:drop-shadow-none rounded-lg drop-shadow-2xl"
                    src="{{ asset('assets/images/Talking to Strangers.png') }}" alt="Talking to Strangers"></div>
            </div>
            <div class="absolute transition-all right-0 top-28">
                <div data-aos="fade-down"> <img width="150"class="transition-all duration-300 hover:drop-shadow-none rounded-lg drop-shadow-2xl"
                    src="{{ asset('assets/images/Laut Bercerita.png') }}" alt="Laut Bercerita"></div>
            </div>

            <div class="absolute transition-all xl:right-40 2xl:right-64 top-[330px]">
               <div data-aos="fade-down"> <img width="110" class="transition-all duration-300 hover:drop-shadow-none rounded-lg drop-shadow-2xl"
                    src="{{ asset('assets/images/The Visual MBA.png') }}" alt="The Visual MBA"></div>
            </div>
        </div>
    </div>

   {{-- Fitur --}}
<div class="relative mt-44">
    <div id="fitur" class="absolute left-0 p-6 -top-32 pb-[100px] bg-transparent"></div>
    <div data-aos="fade-right">

    <h3 class="text-base font-bold tracking-widest lg:text-lg text-dodger-blue">FITUR</h3>
    <h2 class="mt-5 text-3xl font-extrabold tracking-wide lg:text-5xl text-midnight-blue">🤔• Apa yang Bisa Anda Lakukan?</h2></div>
</div>

<div class="mt-[90px] flex flex-col lg:flex-row items-center justify-between text-center  " data-aos="fade-up">
    <div class="flex flex-col items-center justify-center mb-20 lg:w-1/4 lg:mb-0">
        <div class="flex mb-7">
            <div class="p-6 drop-shadow-2xl rounded-3xl bg-dodger-blue">
                <svg width="45" height="45" viewBox="0 0 45 45" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M20.625 35.625C28.9093 35.625 35.625 28.9093 35.625 20.625C35.625 12.3407 28.9093 5.625 20.625 5.625C12.3407 5.625 5.625 12.3407 5.625 20.625C5.625 28.9093 12.3407 35.625 20.625 35.625Z"
                        stroke="white" stroke-width="5" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M39.375 39.375L31.2188 31.2188" stroke="white" stroke-width="5" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </div>
        </div>
        <div class="mb-3">
            
            <h4 class="text-2xl font-bold text-midnight-blue">Cari Buku</h4>
        </div>
        <div>
            <p class="text-center text-slate-grey">Temukan bacaan berikutnya dengan mudah dengan fitur pencarian buku kami yang kuat dan intuitif.</p>
        </div>
    </div>
    <div class="flex flex-col items-center justify-center mb-20 lg:w-1/4 lg:mb-0">
        <div class="flex mb-7">
            <div class="p-6 drop-shadow-2xl rounded-3xl bg-dodger-blue">
                <svg width="45" height="45" viewBox="0 0 45 45" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M38.75 21.9376C38.7565 24.4123 38.1783 26.8536 37.0625 29.0626C35.7396 31.7096 33.7058 33.936 31.189 35.4925C28.6722 37.0489 25.7717 37.8739 22.8125 37.8751C20.3377 37.8815 17.8965 37.3033 15.6875 36.1876L5 39.7501L8.5625 29.0626C7.44675 26.8536 6.86855 24.4123 6.875 21.9376C6.87615 18.9783 7.70115 16.0779 9.2576 13.5611C10.814 11.0443 13.0405 9.01049 15.6875 7.68755C17.8965 6.5718 20.3377 5.9936 22.8125 6.00005H23.75C27.6582 6.21566 31.3495 7.86523 34.1171 10.6329C36.8848 13.4006 38.5344 17.0919 38.75 21.0001V21.9376Z"
                        stroke="white" stroke-width="5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </div>
        </div>
        <div class="mb-3">
            <h4 class="text-2xl font-bold text-midnight-blue">Ulasan Buku</h4>
        </div>
        <div>
            <p class="text-center text-slate-grey">Temukan kritik-kritik yang mendalam dan bagikan pemikiran Anda tentang mahakarya sastra dengan mudah.</p>
        </div>
    </div>
    <div class="flex flex-col items-center justify-center mb-20 lg:w-1/4 lg:mb-0">
        <div class="flex mb-7">
            <div class="p-6 drop-shadow-2xl rounded-3xl bg-dodger-blue">
                <svg width="45" height="45" viewBox="0 0 45 45" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_60_499)">
                        <path
                            d="M38.1712 9.02217C37.2135 8.06406 36.0764 7.30401 34.825 6.78546C33.5735 6.2669 32.2321 6 30.8774 6C29.5228 6 28.1814 6.2669 26.9299 6.78546C25.6784 7.30401 24.5413 8.06406 23.5837 9.02217L21.5962 11.0097L19.6087 9.02217C17.6742 7.08775 15.0506 6.001 12.3149 6.001C9.57923 6.001 6.95559 7.08775 5.02117 9.02217C3.08675 10.9566 2 13.5802 2 16.3159C2 19.0516 3.08675 21.6753 5.02117 23.6097L7.00867 25.5972L21.5962 40.1847L36.1837 25.5972L38.1712 23.6097C39.1293 22.652 39.8893 21.515 40.4079 20.2635C40.9264 19.012 41.1933 17.6706 41.1933 16.3159C41.1933 14.9613 40.9264 13.6199 40.4079 12.3684C39.8893 11.1169 39.1293 9.97984 38.1712 9.02217Z"
                            stroke="white" stroke-width="5" stroke-linecap="round" stroke-linejoin="round" />
                    </g>
                    <defs>
                        <clipPath id="clip0_60_499">
                            <rect width="45" height="45" fill="white" />
                        </clipPath>
                    </defs>
                </svg>
            </div>
        </div>
        <div class="mb-3">
            <h4 class="text-2xl font-bold text-midnight-blue">Daftar Keinginan Buku</h4>
        </div>
        <div>
            <p class="text-center text-slate-grey">Rangkum impian literatur Anda – tambahkan buku ke daftar keinginan untuk petualangan dan penemuan masa depan.</p>
        </div>
    </div>
</div>

    {{-- Layanan --}}
<div class="relative mt-[200px] " data-aos="fade-right">
    <div id="layanan" class="absolute left-0 p-6 -top-32 pb-[100px] bg-transparent"></div>
    <h3 class="text-base font-bold tracking-widest lg:text-lg text-dodger-blue">LAYANAN</h3>
    <h2 class="mt-5 text-3xl font-extrabold tracking-wide lg:text-5xl text-midnight-blue">🚀• Layanan untuk Anda</h2>
</div>

<div class="mt-[90px] grid grid-cols-1 lg:grid-cols-2" data-aos="fade-right">
    <div class="flex flex-col items-center justify-center lg:flex-row lg:items-start lg:justify-start order-first mb-12 lg:mb-0 drop-shadow-2xl transition-all duration-300 hover:drop-shadow-none">
        <img class="rounded-lg" src="{{ asset('assets/images/Service.png') }}" alt="Layanan">
    </div>

    <div class="lg:ps-[150px] text-center lg:text-end order-last">
        <h4 class="text-[32px] font-medium text-midnight-blue"><span class="text-dodger-blue">Sewa</span> buku
            favorit Anda <span class="text-dodger-blue">dengan mudah</span> di Tyzals!</h4>
        <p class="mt-10 leading-8 text-slate-grey">Melihat, menyewa, dan mengatur buku favorit Anda belum pernah
            semudah ini. Sebagai perpustakaan digital terintegrasi yang mudah digunakan, Tyzals memungkinkan Anda
            menghabiskan lebih sedikit waktu mengelola pekerjaan Anda dan lebih banyak waktu benar-benar melakukannya!</p>
    </div>
</div>

<div class="mt-[140px] grid grid-cols-1 lg:grid-cols-2" data-aos="fade-left">
    <div class="lg:pe-[150px] text-center lg:text-start order-last lg:order-first">
        <h4 class="text-[32px] font-medium text-midnight-blue">Sewa Buku Cepat: <span
                class="text-dodger-blue">Mendalami</span> Dunia <span class="text-dodger-blue">Literasi</span> dengan
            Cepat
        </h4>
        <p class="mt-10 leading-8 text-slate-grey">Temukan kegembiraan literatur instan. Akses perpustakaan yang
            luas, pinjam bacaan favorit Anda, dan masuk ke dalam cerita-cerita yang memikat dalam hitungan menit.
            Membaca menjadi cepat dan mudah, hanya dalam sekali klik!</p>
    </div>

    <div class="flex flex-col items-center justify-center lg:flex-row lg:items-end lg:justify-end order-first mb-12 lg:order-last drop-shadow-2xl lg:mb-0 transition-all duration-300 hover:drop-shadow-none">
        <img class="rounded-lg" src="{{ asset('assets/images/Reading.png') }}" alt="Layanan">
    </div>
</div>


    @auth
    {{-- Review --}}
    <div class="relative mt-[200px] " data-aos="fade-right">
        <div id="ulasan" class="absolute left-0 p-6 -top-32 pb-[100px] bg-transparent"></div>
        <h3 class="text-base font-bold tracking-widest lg:text-lg text-dodger-blue">ULASAN</h3>
        <h2 class="mt-5 text-3xl font-extrabold tracking-wide lg:text-5xl text-midnight-blue">💬• Ulasan Buku dari Orang Lain</h2>
    </div>
    @else

 <div class="relative mt-[200px]" data-aos="fade-right">
    <div id="profil" class="absolute left-0 p-6 -top-32 pb-[100px] bg-transparent"></div>
    <h3 class="text-base font-bold tracking-widest lg:text-lg text-dodger-blue">Profil</h3>
    <h2 class="mt-5 text-3xl font-extrabold tracking-wide lg:text-5xl text-midnight-blue">💬• Profil sang author</h2>
</div>
@endauth
    <div class="mt-[90px] lg:flex lg:items-center space-y-16 lg:space-y-0 lg:gap-x-14 " data-aos="fade-up">
        @auth
        @if ($reviews->count() >= 3)
            @foreach ($reviews as $review)
                <div  style="cursor: pointer" onclick="window.location.href='/books/{{ $review->book->id_buku }}'"
                    class="flex flex-col items-center justify-center flex-1 p-10 transition-all duration-300 bg-white border rounded-lg shadow-xl lg:w-1/4 hover:shadow-none border-pale-silver">
                    <div class="flex mb-4">
                        <div class="p-6 rounded-3xl">
                            @if ($review->user->profile_picture)
                                @if (File::exists(public_path('assets/' . $review->user->profile_picture)))
                                    <img class="rounded-full"
                                        src="{{ asset('assets/' . $review->user->profile_picture) }}"
                                        alt="{{ $review->user->nama_lengkap }}" loading="lazy" decoding="async"
                                        width="150px" />
                                @else
                                    <img class="rounded-full"
                                        src="{{ asset('storage/' . $review->user->profile_picture) }}"
                                        alt="{{ $review->user->nama_lengkap }}" loading="lazy" decoding="async"
                                        width="150px" />
                                @endif

                            @else
                                <img class="rounded-full" alt="{{ $review->user->nama_lengkap }}" loading="lazy"
                                    decoding="async" src="{{ asset('mazer/assets/compiled/jpg/1.jpg') }}"
                                    width="150px">
                            @endif
                        </div>
                    </div>
                    <div class="mb-6">
                        <p class="text-base line-clamp-2 tracking-wide text-center text-slate-grey">
                            {!! $review->body !!}
                        </p>
                    </div>
                    <div class="mb-4">
                        <p class="text-base tracking-wide text-center text-sky-cyan">{{ $review->user->nama_lengkap }}
                        </p>
                    </div>
                    <div>
                        <p class="text-base tracking-wide text-center text-midnight-blue">
                            {{ ucwords($review->user->role) }}</p>
                    </div>
                </div>
            @endforeach
            @endauth
        @else
            <div
                class="flex flex-col items-center justify-center flex-1 p-10 transition-all duration-300 bg-white border rounded-lg shadow-xl lg:w-1/4 hover:shadow-none border-pale-silver" data-aos="fade-up">
                <div class="flex mb-4">
                    <div class="p-6 rounded-3xl">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQMQfBTWtqsOWZteEOsuCyVK-sN1iiMoAhwKA&usqp=CAU" alt="hbtw hbtw">
                    </div>
                </div>
                <div class="mb-6">
                    <p class="text-base tracking-wide text-center text-slate-grey">Immersive storytelling!
                        An enriching literary experience
                        worth savoring and sharing.</p>
                </div>
                <div class="mb-4">
                    <p class="text-base tracking-wide text-center text-sky-cyan">HARSYA BRAHMANTYO WIBOWO</p>
                </div>
                <div>
                    <p class="text-base tracking-wide text-center text-midnight-blue">FULLSTACK DEVELOPER</p>
                </div>
            </div>
        @endif
    </div>

    {{-- Location --}}
    <div class="relative mt-[200px]" data-aos="fade-right">
        <div id="lokasi" class="absolute left-0 p-6 -top-32 pb-[100px] bg-transparent"></div>
        <h3 class="text-base font-bold tracking-widest lg:text-lg text-dodger-blue">LOKASI</h3>
        <h2 class="mt-5 text-3xl font-extrabold tracking-wide lg:text-5xl text-midnight-blue">🗺• Lokasi Perpustakaan Kami</h2>
    </div>


    <div class="mt-[90px] flex items-center gap-x-14" data-aos="fade-up">
        <div
            class="flex flex-col items-center justify-center flex-1 w-1/4 transition-all duration-300 bg-white border rounded-lg shadow-xl hover:shadow-none border-pale-silver">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.5485007469065!2d106.83576837418218!3d-6.191115160654661!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f43ed58a394b%3A0x52eb0c276d813909!2sTaman%20Ismail%20Marzuki!5e0!3m2!1sid!2sid!4v1707287088468!5m2!1sid!2sid"
                width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
    <script>   
        AOS.init(); 
   </script>
@endsection

@section('additional_scripts')
@endsection
