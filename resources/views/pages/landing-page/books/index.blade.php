@extends('pages.landing-page.layouts.main')

@section('title', $title)

@section('additional_links')
@endsection

@section('content')
    {{-- Breadcrumbs --}}
    <nav class="flex" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
                <a href="/"
                    class="inline-flex items-center text-sm font-medium transition-all duration-300 text-midnight-blue hover:text-dodger-blue">
                    <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                    </svg>
                    Home
                </a>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="w-3 h-3 mx-1 text-gray-400 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="text-sm font-medium text-slate-grey ms-1 md:ms-2">Buku</span>
                </div>
            </li>
        </ol>
    </nav>

    {{-- Content --}}
    <section class="pt-10 min-h-[30vw]">
        <div class="flex flex-col w-full md:w-10/12 lg:w-8/12">
            <h2 class="mt-5 text-3xl font-semibold tracking-wide lg:text-5xl text-midnight-blue">📚• Buku</h2>
            <p class="mt-3 leading-loose text-slate-grey"><span class="text-dodger-blue">Buku-buku</span> membuka pintu-pintu
                menuju <span class="text-dodger-blue">dunia-dunia</span> baru, gagasan, dan perspektif. Mereka mengundang para
                pembaca untuk menjelajahi kedalaman pengalaman manusia dan luasnya alam semesta.</p>
        </div>


        <section class="pt-20">
            <div class="flex flex-col items-start justify-center w-full mb-8 gap-y-6">
                <form class="flex items-center justify-center w-full" action="/buku" method="GET">
                    @if (request('penulis'))
                        <input type="hidden" name="penulis" value="{{ request('penulis') }}">
                    @elseif(request('judul'))
                        <input type="hidden" name="judul" value="{{ request('judul') }}">
                    @elseif(request('tahun_terbit'))
                        <input type="hidden" name="tahun_terbit" value="{{ request('tahun_terbit') }}">
                    @elseif(request('penerbit'))
                        <input type="hidden" name="penerbit" value="{{ request('penerbit') }}">
                    @elseif(request('genre'))
                        <input type="hidden" name="genre" value="{{ request('genre') }}">
                    @endif

                    <div class="relative w-full">
                        <div class="absolute inset-y-0 flex items-center pointer-events-none start-0 ps-3">📑</div>
                        <input type="text" id="simple-search"
                            class="border transition-all placeholder-ash-grey/50 duration-300 outline-none border-pale-silver text-slate-grey text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5"
                            name="search" placeholder="Search a book ..." value="{{ request('search') }}" required
                            autofocus />
                    </div>
                    <button id="search-button" type="submit"
                        class="p-3 text-sm font-medium text-white transition-all duration-300 rounded-lg ms-2 bg-dodger-blue hover:bg-dodger-blue/80 focus:ring-4 focus:outline-none focus:ring-blue-300">
                        <svg width="20" height="20" viewBox="0 0 45 45" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M20.625 35.625C28.9093 35.625 35.625 28.9093 35.625 20.625C35.625 12.3407 28.9093 5.625 20.625 5.625C12.3407 5.625 5.625 12.3407 5.625 20.625C5.625 28.9093 12.3407 35.625 20.625 35.625Z"
                                stroke="white" stroke-width="7" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M39.375 39.375L31.2188 31.2188" stroke="white" stroke-width="7" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                        </svg>
                        <span class="sr-only">Search</span>
                    </button>
                </form>

                {{-- If just "page" on params, don't display --}}
                @if (!empty(request()->all()))
                    <div class="mx-auto text-center">
                        <a href="{{ url()->current([]) }}"
                            class="inline-flex items-center justify-center h-10 px-4 py-3 font-bold text-center text-white transition-colors duration-300 border-2 border-transparent rounded-md disabled:pointer-events-none disabled:opacity-80 hover:bg-dodger-blue/80 lg:px-10 bg-dodger-blue">Reset
                            Filters</a>
                    </div>
                @endif
            </div>

            <div class="flex flex-col gap-y-10">
                @forelse ($books as $book)
                    <div
                        class="p-6 transition-colors border-t-2 shadow-2xl bg-white/60 hover:bg-white rounded-xl shadow-dodger-blue/20 border-t-dodger-blue">
                        <div class="flex flex-wrap items-start -mx-4 lg:items-center">
                            <div class="flex-shrink-0 w-full px-4 mb-6 md:w-5/12 lg:w-3/12 md:mb-0">
                                <a class="relative inline-block w-full" href="/buku/{{ $book->id_buku }}">
                                    @if ($book->cover)
                                        @if (File::exists(public_path('assets/' . $book->cover)))
                                            <img src="{{ asset('assets/' . $book->cover) }}" alt="{{ $book->judul }}"
                                                loading="lazy" decoding="async" class="mx-auto rounded-lg md:mx-0"
                                                width="200" />
                                        @else
                                            <img src="{{ asset('storage/' . $book->cover) }}" alt="{{ $book->judul }}"
                                                loading="lazy" decoding="async" class="mx-auto rounded-lg md:mx-0"
                                                width="200" />
                                        @endif
                                    @else
                                        <img alt="{{ $book->judul }}" loading="lazy" decoding="async"
                                            class="mx-auto rounded-lg md:mx-0" src="{{ asset('assets/no-image-y.png') }}"
                                            width="200">
                                    @endif
                                </a>
                            </div>
                            <div class="w-full px-4 md:w-7/12 lg:w-9/12">
                                <div class="flex flex-wrap items-center -mx-4">
                                    <div class="w-full px-4 lg:w-9/12">
                                        <div class="text-2xl font-semibold">
                                            <a href="/buku/{{ $book->id_buku }}">
                                                <h2
                                                    class="transition-all duration-300 text-midnight-blue hover:text-midnight-blue/60">
                                                    {{ $book->judul }}
                                                </h2>
                                            </a>
                                        </div>
                                        <div class="mt-2 line-clamp-2 text-slate-grey">{!! $book->synopsis !!}</div>
                                        <div class="flex items-center mt-6 text-sm gap-x-6 text-slate-grey">
                                            <div class="flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    class="mr-2 w-4 h-4 md:w-5 md:h-5">
                                                    <rect width="18" height="18" x="3" y="4" rx="2"
                                                        ry="2"></rect>
                                                    <line x1="16" x2="16" y1="2" y2="6">
                                                    </line>
                                                    <line x1="8" x2="8" y1="2" y2="6">
                                                    </line>
                                                    <line x1="3" x2="21" y1="10" y2="10">
                                                    </line>
                                                </svg>
                                                <div class="text-14 lh-1">{{ $book->tahun_terbit }}</div>
                                            </div>
                                            <div class="flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    class="mr-2 w-5 h-5 md:w-5 md:h-5">
                                                    <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"></path>
                                                    <circle cx="12" cy="10" r="3"></circle>
                                                </svg>
                                                <div class="text-14 lh-1">{{ $book->penerbit }}</div>
                                            </div>
                                            <div class="flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="none" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke="currentColor"
                                                    class="mr-2 w-4 h-4 md:w-5 md:h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                                                </svg>
                                                <div class="text-14 lh-1">{{ $book->stock }}</div>
                                            </div>
                                        </div>
                                        <div class="mt-8">
                                            <h3 class="mb-2 text-sm font-semibold tracking-wider uppercase text-sky-cyan">
                                                {{ $book->penulis }}</h3>

                                            <div class="mt-8">
                                                @foreach ($book->genres as $genre)
                                                    <a href="/buku?genre={{ $genre->id_kategori }}">
                                                        <span
                                                            class="transition-all duration-300 hover:bg-dodger-blue hover:text-white bg-blue-100 text-dodger-blue text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300 inline-block mb-2">{{ $genre->nama }}</span>
                                                    </a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between w-full px-4 mt-8 lg:w-3/12 lg:border-l lg:border-dark/5 lg:ml-auto lg:py-10 lg:text-center lg:block lg:mt-0">
                                        @auth
                                            <form action="/buku/{{ $book->id_buku }}/wishlist" method="POST">
                                                @csrf
                                                <button type="submit">
                                                    <div class="text-2xl font-semibold">
                                                        @if ($book->wishlists()->where('id_user', auth()->user()->id_user)->first())
                                                            <input type="hidden" name="id_koleksi" value="{{ $book->wishlists()->firstWhere('id_user', auth()->user()->id_user)->id_koleksi }}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-7 h-7 text-red-500">
                                                                <path d="m11.645 20.91-.007-.003-.022-.012a15.247 15.247 0 0 1-.383-.218 25.18 25.18 0 0 1-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0 1 12 5.052 5.5 5.5 0 0 1 16.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 0 1-4.244 3.17 15.247 15.247 0 0 1-.383.219l-.022.012-.007.004-.003.001a.752.752 0 0 1-.704 0l-.003-.001Z" />
                                                            </svg>
                                                        @else
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-red-500">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                                            </svg>
                                                        @endif
                                                    </div>
                                                </button>
                                            </form>
                                        @endauth
                                        @guest
                                            <a class="inline-flex items-center justify-center h-10 px-4 py-3 font-medium text-center transition-colors duration-300 border-2 border-transparent rounded-md disabled:pointer-events-none disabled:opacity-80 bg-dodger-blue/10 text-dodger-blue hover:bg-dodger-blue/20 lg:mt-4" href="{{ route('login') }}">See Details</a>
                                        @else
                                            <a class="inline-flex items-center justify-center h-10 px-4 py-3 font-medium text-center transition-colors duration-300 border-2 border-transparent rounded-md disabled:pointer-events-none disabled:opacity-80 bg-dodger-blue/10 text-dodger-blue hover:bg-dodger-blue/20 lg:mt-4" href="/buku/{{ $book->slug }}">See Details</a>
                                        @endguest
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- @endif --}}
                @empty
                    <p class="text-xl mt-2 italic text-center">Nothing :(</p>
                @endforelse
            </div>
        </section>

        <div class="row">
            <div class="col d-flex justify-content-center" id="pagin-links">
                {{-- Pagination --}}
                {{ $books->links() }}
            </div>
        </div>
    </section>
@endsection

@section('additional_scripts')
@endsection
