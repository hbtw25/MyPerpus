<nav id="navbar" class="fixed top-0 z-50 w-full transition-all duration-300 bg-transparent">
    <div class="px-8 py-5 mx-auto lg:px-[100px]">
        <div class="flex items-center justify-between">
            <div class="flex items-center w-1/2">
                <a href="/" class="flex items-center max-h-full me-28">
                    <img class="h-10" src="{{ asset('assets/logo/high-resolutions/logo-rounded.png') }}" alt="logo">
                    <span id="navbar-logo-text"
                        class="text-lg font-bold text-black transition-all duration-300 ms-4">Tyzals</span>
                </a>

                <div id="navbar-menu"
                    class="absolute top-[80px] right-[2000px] hidden opacity-0 md:static md:block md:opacity-100">
                    <ul class="flex flex-col md:flex-row gap-y-6 md:gap-y-0 md:gap-x-10 text-battleship-grey">
                        @auth
                            <li
                                class="text-base font-medium transition-all duration-300 md:text-sm hover:text-royal-blue @if (Request::is('/')) text-dodger-blue @endif">
                                <a href="/">Home</a>
                            </li>
                            <li
                                class="text-base font-medium transition-all duration-300 md:text-sm hover:text-royal-blue @if (Request::is('books*')) text-dodger-blue @endif">
                                <a href="/books">Books</a>
                            </li>
                            <li
                                class="text-base font-medium transition-all duration-300 md:text-sm hover:text-royal-blue @if (Request::is('genres*')) text-dodger-blue @endif">
                                <a href="/genres">Genres</a>
                            </li>
                        @else
                            <li class="text-base font-medium transition-all duration-300 md:text-sm hover:text-royal-blue">
                                <a href="/#features">Feature</a>
                            </li>
                            <li class="text-base font-medium transition-all duration-300 md:text-sm hover:text-royal-blue">
                                <a href="/#services">Service</a>
                            </li>
                            <li class="text-base font-medium transition-all duration-300 md:text-sm hover:text-royal-blue">
                                <a href="/#reviews">Review</a>
                            </li>
                            <li class="text-base font-medium transition-all duration-300 md:text-sm hover:text-royal-blue">
                                <a href="/#location">Location</a>
                            </li>
                            <div class="relative group">
                                <button class="text-base font-medium transition-all duration-300 md:text-sm hover:text-royal-blue focus:outline-none">
                                    Explore
                                </button>
                                <div class="absolute hidden w-32 mt-2 origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none group-hover:block">
                                    <a href="/books" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">Books</a>
                                    <a href="/genres" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">Genres</a>
                                </div>
                            </div>

                        @endauth
                    </ul>
                </div>
            </div>

            <div class="flex items-center justify-end w-1/2 md:inline-block md:max-w-fit">
                @auth
                    <div class="flex items-center justify-end">
                        <button id="navbar-button-login" data-dropdown-toggle="dropdown"
                            class="inline-flex items-center px-3 py-2 text-sm font-bold text-center text-white transition-all duration-300 rounded-lg outline-none bg-dodger-blue"
                            type="button">Welcome<span class="hidden lg:inline-block">,
                                {{ auth()->user()->full_name }}</span>!
                            <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 4 4 4-4" />
                            </svg>
                        </button>

                        {{-- Dropdown menu --}}
                        <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                            <ul class="py-2 text-sm text-midnight-blue" aria-labelledby="navbar-button-login">
                                <li>
                                    <a href="/dashboard" class="block px-4 py-2 hover:bg-gray-100">Dashboard</a>
                                </li>
                                <li>
                                    <form action="/logout" method="POST">
                                        @csrf

                                        <button type="submit"
                                            class="block w-full px-4 py-2 hover:bg-gray-100 text-start">Sign
                                            out</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                @else
                    <div class="flex items-center">
                        <a id="navbar-button-login" href="/login"
                            class="px-6 py-2 font-bold text-white transition-all duration-300 rounded-lg lg:px-10 bg-dodger-blue">
                            Login
                        </a>
                    </div>
                @endauth

                <div class="flex items-center ms-5" id="button-humberger">
                    <button class="md:hidden" aria-label="Toggle Menu"><svg xmlns="http://www.w3.org/2000/svg"
                            width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-menu">
                            <line x1="4" x2="20" y1="12" y2="12"></line>
                            <line x1="4" x2="20" y1="6" y2="6"></line>
                            <line x1="4" x2="20" y1="18" y2="18"></line>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</nav>
