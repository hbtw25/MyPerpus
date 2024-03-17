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
                    <span class="text-sm font-medium text-slate-grey ms-1 md:ms-2">Genres</span>
                </div>
            </li>
        </ol>
    </nav>

    {{-- Content --}}
    <section class="pt-10">
        <div class="flex flex-col w-full md:w-10/12 lg:w-8/12">
            <h2 class="mt-5 text-3xl font-semibold tracking-wide lg:text-5xl text-midnight-blue">✏️• Genres</h2>
            <p class="mt-3 leading-loose text-slate-grey">So <span class="text-dodger-blue">many genres</span> available on
                this application. However, you can
                search your favorite genre!</p>
        </div>

        <section class="pt-20">
            <div class="flex flex-col items-start justify-center w-full mb-8 gap-y-6">
                <form class="flex items-center justify-center w-full" action="/genres" method="GET">
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 flex items-center pointer-events-none start-0 ps-3">✏️</div>
                        <input type="text" id="simple-search"
                            class="border transition-all duration-300 outline-none border-pale-silver text-slate-grey text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5"
                            name="search" placeholder="Search a genre ..." value="{{ request('search') }}" required
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
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-x-12 gap-y-12">
                    @forelse ($genres as $genre)
                        <div
                            class="p-6 transition-colors border-t-2 shadow-2xl bg-white/60 hover:bg-white rounded-xl shadow-dodger-blue/20 border-t-dodger-blue">
                            <div class="flex flex-wrap items-start h-full -mx-4 lg:items-center">
                                <div class="w-full px-4">
                                    <div class="flex flex-wrap items-center -mx-4">
                                        <div class="w-full px-4 lg:w-9/12">
                                            <div class="text-2xl font-semibold">
                                                <a href="/books?genre={{ $genre->id_kategori }}">
                                                    <h2
                                                        class="transition-all duration-300 text-midnight-blue hover:text-midnight-blue/60">
                                                        {{ $genre->nama }}
                                                    </h2>
                                                </a>
                                            </div>
                                            <div class="mt-2 text-slate-grey">{{ $genre->deskripsi }}</div>
                                        </div>
                                        <div
                                            class="flex items-center justify-between w-full px-4 mt-8 lg:w-3/12 lg:border-l lg:border-dark/5 lg:ml-auto lg:py-10 lg:text-center lg:block lg:mt-0">
                                            <div class="text-2xl font-semibold">{{ $genre->books->count() }} 📚</div>

                                            <a class="inline-flex items-center justify-center h-10 px-4 py-3 font-medium text-center transition-colors duration-300 border-2 border-transparent rounded-md disabled:pointer-events-none disabled:opacity-80 bg-dodger-blue/10 text-dodger-blue hover:bg-dodger-blue/20 lg:mt-4"
                                                href="/books?genre={{ $genre->id_kategori }}">Search</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-xl font-extrabold text-center">Nothing :(</p>
                    @endforelse
                </div>
            </div>
        </section>

        <div class="row">
            <div class="col d-flex justify-content-center" id="pagin-links">
                {{-- Pagination --}}
                {{ $genres->links() }}
            </div>
        </div>
    </section>
@endsection

@section('additional_scripts')
@endsection
