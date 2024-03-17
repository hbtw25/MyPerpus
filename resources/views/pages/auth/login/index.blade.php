@extends('pages.auth.layouts.main')

@section('title', $title)

@section('additional_links')
@endsection

@section('content')
    <section class="flex justify-center">
        <div class="mt-16">
            <div class="flex items-center">
                <img class="mx-auto" src="{{ asset('assets/logo/high-resolutions/logo-rounded.png') }}" alt="Tyzals"
                    width="100">
            </div>

            <div class="flex flex-col p-10 mt-10 bg-white border-t-2 rounded-lg shadow-2xl border-t-dodger-blue">
                {{-- Breadcrumbs --}}
                <nav class="flex" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                        <li class="inline-flex items-center">
                            <a href="/"
                                class="inline-flex items-center text-sm font-medium transition-all duration-300 text-midnight-blue hover:text-dodger-blue">
                                <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 20 20">
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
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                                <span class="text-sm font-medium text-slate-grey ms-1 md:ms-2">Login</span>
                            </div>
                        </li>
                    </ol>
                </nav>

                {{-- Header --}}
                <div class="mt-8">
                    <h3 class="text-xl font-bold text-midnight-blue">Login</h3>
                    <p class="text-slate-grey">Masukan username dan password kamu disini!</p>
                </div>

                {{-- Session --}}
                @if (session()->has('error'))
                    <div id="alert-2"
                        class="flex items-center p-4 text-red-800 rounded-lg mt-7 bg-red-50 dark:bg-gray-800 dark:text-red-400"
                        role="alert">
                        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <div class="text-sm font-medium ms-3">
                            {{ session('error') }}
                        </div>
                        <button type="button"
                            class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                            data-dismiss-target="#alert-2" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                        </button>
                    </div>
                @elseif (session()->has('success'))
                    <div id="alert-3"
                        class="flex items-center p-4 text-green-800 rounded-lg mt-7 bg-green-50 dark:bg-gray-800 dark:text-green-400"
                        role="alert">
                        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <div class="text-sm font-medium ms-3">
                            {{ session('success') }}
                        </div>
                        <button type="button"
                            class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                            data-dismiss-target="#alert-3" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                        </button>
                    </div>
                @endif

                {{-- Form --}}
                <form action="/login" method="POST" class="mt-8">
                    @csrf

                    <div class="mb-5">
                        <label for="username" class="block mb-2 text-sm font-bold text-midnight-blue">Username</label>
                        <input type="text" id="username"
                            class="border placeholder-ash-grey/50 border-pale-silver text-slate-grey text-sm rounded-md transition-all duration-300 outline-none focus:ring-royal-blue focus:border-royal-blue ring-royal-blue block w-full p-2.5"
                            placeholder="e.g. username" name="username" autofocus>

                        @error('username')
                            <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label for="password" class="block mb-2 text-sm font-bold text-midnight-blue">Your
                            password</label>
                        <input type="password" id="password" placeholder="e.g. password anda"
                            class="border placeholder-ash-grey/50 border-pale-silver text-slate-grey text-sm rounded-md transition-all duration-300 outline-none focus:ring-royal-blue focus:border-royal-blue ring-royal-blue block w-full p-2.5"
                            name="password">

                        @error('password')
                            <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-7">
                        <button
                            class="w-full py-3 text-sm font-bold text-white transition-all duration-300 rounded hover:bg-blue-700 bg-dodger-blue"
                            type="submit">Login</button>
                    </div>
                </form>
            </div>

            <div class="mt-12 text-center">
                <p class="text-sm text-slate-grey">Belum punya akun? <a href="/register"
                        class="text-royal-blue">Buat akun disini!</a></p>
            </div>

            @include('pages.auth.layouts.footer')
        </div>
    </section>
@endsection

@section('additional_scripts')
    @include('utils.session.forget-error')
@endsection
