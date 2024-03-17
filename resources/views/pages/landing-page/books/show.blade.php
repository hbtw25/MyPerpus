@extends('pages.landing-page.layouts.main')

@section('title', $title)

@section('additional_links')
    @include('utils.quill.link')
    @include('utils.filepond.link')
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
            <li class="inline-flex items-center">
                <a href="/books"
                    class="inline-flex items-center text-sm font-medium transition-all duration-300 text-midnight-blue hover:text-dodger-blue">
                    <svg class="w-3 h-3 mx-1 text-gray-400 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="ms-1 md:ms-2">Books</span>
                </a>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="w-3 h-3 mx-1 text-gray-400 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="text-sm font-medium text-slate-grey ms-1 md:ms-2 line-clamp-1">{{ $book->judul }}</span>
                </div>
            </li>
        </ol>
    </nav>

    {{-- Content --}}
    <section class="pt-10">
        <div class="flex flex-col md:flex-row">
            <div class="flex-shrink-0 w-full px-4 mb-6 md:w-5/12 lg:w-3/12 md:mb-0">
                @if ($book->cover)
                    @if (File::exists(public_path('assets/' . $book->cover)))
                        <img class="mx-auto transition-all duration-300 rounded-lg shadow-2xl hover:shadow-none md:mx-0"
                            src="{{ asset('assets/' . $book->cover) }}" alt="{{ $book->judul }}" loading="lazy"
                            decoding="async" width="200" />
                    @else
                        <img class="mx-auto transition-all duration-300 rounded-lg shadow-2xl hover:shadow-none md:mx-0"
                            src="{{ asset('storage/' . $book->cover) }}" alt="{{ $book->judul }}" loading="lazy"
                            decoding="async" width="200" />
                    @endif
                @else
                    <img class="mx-auto transition-all duration-300 rounded-lg md:mx-0" alt="{{ $book->judul }}"
                        loading="lazy" decoding="async" class="mx-auto rounded-lg md:mx-0"
                        src="{{ asset('assets/no-image-y.png') }}" width="200">
                @endif
            </div>

            <div class="w-full px-4 mt-8 md:w-7/12 lg:w-9/12 md:mt-0">
                <h2 class="text-3xl font-semibold tracking-wide text-center md:text-start lg:text-5xl text-midnight-blue">
                    📚• {{ $book->judul }}
                </h2>
                <h3 class="text-3xl font-semibold tracking-wider text-center uppercase md:text-start mt-7 text-sky-cyan">
                    {{ $book->penulis }}</h3>
                <p class="leading-loose mt-7 text-slate-grey">{!! $book->synopsis !!}</p>

                <div class="mt-8 space-y-3">
                    <p class="font-semibold text-midnight-blue">📅 Year: <span
                            class="font-normal">{{ $book->tahun_terbit }}</span></p>
                    <p class="font-semibold text-midnight-blue">🏠 penerbit:
                        <span class="font-normal">{{ $book->penerbit }}</span>
                    </p>
                    <p class="font-semibold text-midnight-blue">📄 Stock: <span
                            class="font-normal">{{ $book->stock }}</span>
                    </p>
                    <p class="font-semibold text-midnight-blue">✏️ Review: <span
                            class="font-normal">{{ $book->reviews->count() }}</span>
                    <p class="font-semibold text-midnight-blue">❤️ Wishlist: <span
                            class="font-normal">{{ $book->wishlists->count() }}</span>
                    </p>
                    <p class="font-semibold text-midnight-blue">Genre:
                        @foreach ($book->genres as $genre)
                            <a href="/books?genre={{ $genre->id_kategori }}">
                                <span
                                    class="transition-all duration-300 hover:bg-dodger-blue hover:text-white bg-blue-100 text-dodger-blue text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300 inline-block mb-2">{{ $genre->nama }}</span>
                            </a>
                        @endforeach
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="pt-20">
        <div class="p-6 transition-colors border-t-2 shadow-2xl rounded-xl border-t-dodger-blue">
            {{-- Your Review --}}
            <div>
                <h2 class="text-3xl font-semibold tracking-wide text-midnight-blue">Your Review</h2>

                <div class="flex flex-col justify-center mt-10 lg:justify-start lg:flex-row">
                    <div class="flex items-center justify-center flex-shrink-0 transition-all rounded-lg lg:w-16 lg:h-16">
                        @if (auth()->user()->profile_picture)
                            @if (File::exists(public_path('assets/' . auth()->user()->profile_picture)))
                                <img src="{{ asset('assets/' . auth()->user()->profile_picture) }}"
                                    alt="{{ auth()->user()->full_name }}" />
                            @else
                                <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}" alt="Avatar">
                            @endif
                        @else
                            <img src="{{ asset('mazer/assets/compiled/jpg/1.jpg') }}" alt="Avatar">
                        @endif
                    </div>
                    <div class="mt-6 lg:mt-0 lg:ml-6 w-full">
                        <h3
                            class="mb-2 text-2xl font-semibold text-center transition-all duration-300 text-midnight-blue hover:text-midnight-blue/60 lg:text-start">
                            {{ auth()->user()->full_name }}</h3>

                        <form class="mt-8" action="/books/{{ $book->id_buku }}/reviewed" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="mb-1">
                                <label for="body" class="block mb-2 text-sm font-bold text-midnight-blue">Review</label>

                                <input id="body" name="body" value="{{ old('body') }}" type="hidden">
                                <div id="editor">
                                    {!! old('body') !!}
                                </div>

                                @error('body')
                                    <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mt-5">
                                <label for="photo"
                                    class="block mb-2 text-sm font-bold text-midnight-blue">Photo</label>

                                <input type="file" class="image-preview-filepond" name="photo" id="photo" />

                                @error('profile_picture')
                                    <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mt-7">
                                <button
                                    class="px-6 py-3 text-sm font-bold text-white transition-all duration-300 rounded hover:bg-blue-700 bg-dodger-blue"
                                    type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <hr class="mt-10">

            {{-- Other's Review --}}
            <div class="mt-6">
                <h2 class="text-3xl font-semibold tracking-wide text-midnight-blue">Other's Review</h2>

                @forelse ($reviews as $review)
                    <div class="border-b border-pale-silver pb-5">
                        <div class="flex flex-col justify-center mt-10 lg:justify-start lg:flex-row">
                            <div
                                class="flex items-center justify-center flex-shrink-0 transition-all rounded-lg lg:w-16 lg:h-16">
                                @if ($review->user->profile_picture)
                                    @if (File::exists(public_path('assets/' . $review->user->profile_picture)))
                                        <img width="60" class="rounded-full"
                                            src="{{ asset('assets/' . $review->user->profile_picture) }}"
                                            alt="User Avatar" alt="User Avatar" />
                                    @else
                                        <img width="60" class="rounded-full"
                                            src="{{ asset('storage/' . $review->user->profile_picture) }}"
                                            alt="User Avatar" />
                                    @endif
                                @else
                                    <img width="60" class="rounded-full"
                                        src="{{ asset('mazer/assets/compiled/jpg/1.jpg') }}" alt="User Avatar" />
                                @endif
                            </div>
                            <div class="mt-6 lg:mt-0 lg:ml-6 w-full">
                                <h3
                                    class="mb-2 text-base font-semibold text-center transition-all duration-300 lg:text-start text-midnight-blue hover:text-midnight-blue/60">
                                    {{ $review->user->nama_lengkap }}</h3>
                                <p class="text-sm text-center lg:text-start text-slate-grey">
                                    {{ $review->created_at->diffForHumans() }}
                                </p>

                                <div class="mt-5 text-slate-grey text-center lg:text-start">{!! $review->body !!}</div>

                                @if ($review->photo)
                                    <div class="mt-2">
                                        <img class="rounded mx-auto lg:mx-0"
                                            src="{{ asset('storage/' . $review->photo) }}" alt="Review's Photo">
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                @empty
                    <div class="my-10">
                        <p class="text-slate-grey italic text-center">There is no review :(</p>
                    </div>
                @endforelse

                <div class="row">
                    <div class="col d-flex justify-content-center" id="pagin-links">
                        {{-- Pagination --}}
                        {{ $reviews->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('additional_scripts')
    @include('utils.quill.script')
    @vite('resources/js/components/quill/dashboard/reviews/editor.js')
    @include('utils.filepond.script')
    @vite('resources/js/components/filepond/image-preview/photo.js')
@endsection
