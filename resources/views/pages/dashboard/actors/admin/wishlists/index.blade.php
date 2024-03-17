@extends('pages.dashboard.layouts.main')

@section('title', $title)

@section('additional_links')
    @include('utils.simple-datatable.link')
    @include('utils.sweetalert.link')
@endsection

@section('content')
    <div class="page-title">
        <div class="row">
            <div class="order-last col-12 col-md-6 order-md-1">
                <h3>Wishlist</h3>
                <p class="text-subtitle text-muted">
                    Here are all the wishlists made by users for a book.
                </p>
                <hr>
            </div>
            <div class="order-first col-12 col-md-6 order-md-2">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    {{-- Your Wishlist --}}
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="d-flex flex-column flex-md-row justify-content-between" style="row-gap: 1rem;">
                    <h4>Your Wishlist</h4>

                    <div class="dropdown dropdown-color-icon d-flex justify-content-start">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="export"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="select-all fa-fw fas me-1"></span> Export
                        </button>
                        <div class="dropdown-menu" aria-labelledby="export">
                            <form action="/dashboard/wishlists/export" method="POST">
                                @csrf
                                <input type="hidden" name="table" value="your-wishlists">
                                <input type="hidden" name="type" value="XLSX">
                                <button type="submit" class="dropdown-item">
                                    <span class="select-all fa-fw far text-light"></span> Excel
                                </button>
                            </form>

                            <form action="/dashboard/wishlists/export" method="POST">
                                @csrf
                                <input type="hidden" name="table" value="your-wishlists">
                                <input type="hidden" name="type" value="CSV">
                                <button type="submit" class="dropdown-item">
                                    <span class="select-all fa-fw fas text-light"></span> CSV
                                </button>
                            </form>

                            <form action="/dashboard/wishlists/export" method="POST">
                                @csrf
                                <input type="hidden" name="table" value="your-wishlists">
                                <input type="hidden" name="type" value="HTML">
                                <button type="submit" class="dropdown-item">
                                    <span class="select-all fa-fw fab text-light"></span> HTML
                                </button>
                            </form>

                            <form action="/dashboard/wishlists/export" method="POST">
                                @csrf
                                <input type="hidden" name="table" value="your-wishlists">
                                <input type="hidden" name="type" value="MPDF">
                                <button type="submit" class="dropdown-item">
                                    <span class="select-all fa-fw far text-light"></span> PDF
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table-your-wishlist">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Book</th>
                            <th>Author</th>
                            <th>Genre</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($yourWishlists as $wishlist)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $wishlist->book->judul }}</td>
                                <td>{{ $wishlist->book->penulis }}</td>
                                <td>
                                    @foreach ($wishlist->book->genres as $genre)
                                        {{ $genre->nama }}
                                    @endforeach
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <div class="me-2">
                                            <a class="px-2 pt-2 btn btn-danger" data-confirm-wishlist-destroy="true"
                                                data-unique="{{ $wishlist->id_koleksi }}">
                                                <span data-confirm-wishlist-destroy="true"
                                                    data-unique="{{ $wishlist->id_koleksi }}"
                                                    class="select-all fa-fw fa-lg fas"></span>
                                            </a>
                                        </div>

                                        <div class="me-2">
                                            <a href="/books/{{ $wishlist->book->id_buku }}" class="px-2 pt-2 btn btn-info">
                                                <span class="select-all fa-fw fa-lg fas"></span>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">
                                    <p class="pt-3 text-center">Nothing :(</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    {{-- All Wishlist --}}
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="d-flex flex-column flex-md-row justify-content-between" style="row-gap: 1rem;">
                    <h4>All Wishlist</h4>

                    <div class="dropdown dropdown-color-icon d-flex justify-content-start">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="export"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="select-all fa-fw fas me-1"></span> Export
                        </button>
                        <div class="dropdown-menu" aria-labelledby="export">
                            <form action="/dashboard/wishlists/export" method="POST">
                                @csrf
                                <input type="hidden" name="table" value="all-of-wishlists">
                                <input type="hidden" name="type" value="XLSX">
                                <button type="submit" class="dropdown-item">
                                    <span class="select-all fa-fw far text-light"></span> Excel
                                </button>
                            </form>

                            <form action="/dashboard/wishlists/export" method="POST">
                                @csrf
                                <input type="hidden" name="table" value="all-of-wishlists">
                                <input type="hidden" name="type" value="CSV">
                                <button type="submit" class="dropdown-item">
                                    <span class="select-all fa-fw fas text-light"></span> CSV
                                </button>
                            </form>

                            <form action="/dashboard/wishlists/export" method="POST">
                                @csrf
                                <input type="hidden" name="table" value="all-of-wishlists">
                                <input type="hidden" name="type" value="HTML">
                                <button type="submit" class="dropdown-item">
                                    <span class="select-all fa-fw fab text-light"></span> HTML
                                </button>
                            </form>

                            <form action="/dashboard/wishlists/export" method="POST">
                                @csrf
                                <input type="hidden" name="table" value="all-of-wishlists">
                                <input type="hidden" name="type" value="MPDF">
                                <button type="submit" class="dropdown-item">
                                    <span class="select-all fa-fw far text-light"></span> PDF
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table-wishlist">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>User</th>
                            <th>Book</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($wishlists as $wishlist)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><a
                                        href="/dashboard/users/{{ $wishlist->user->id_user }}">{{ '@' . $wishlist->user->username }}</a>
                                </td>
                                <td>{{ $wishlist->book->judul }}</td>
                                <td>{{ $wishlist->created_at->format('j F Y, \a\t H.i') }}</td>
                                <td>
                                    <div class="d-flex">
                                        @if ($wishlist->id_user === auth()->user()->id_user)
                                            <div class="me-2">
                                                <a class="px-2 pt-2 btn btn-danger" data-confirm-wishlist-destroy="true"
                                                    data-unique="{{ $wishlist->id_koleksi }}">
                                                    <span data-confirm-wishlist-destroy="true"
                                                        data-unique="{{ $wishlist->id_koleksi }}"
                                                        class="select-all fa-fw fa-lg fas"></span>
                                                </a>
                                            </div>
                                        @endif

                                        <div class="me-2">
                                            <a href="/books/{{ $wishlist->book->id_buku }}"
                                                class="px-2 pt-2 btn btn-info">
                                                <span class="select-all fa-fw fa-lg fas"></span>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">
                                    <p class="pt-3 text-center">Nothing :(</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection

@section('additional_scripts')
    @include('utils.simple-datatable.script')
    @vite('resources/js/components/simple-datatable/dashboard/wishlists/datatable.js')
    @include('utils.sweetalert.script')
    @vite('resources/js/components/sweetalert/dashboard/wishlists/alert.js')
    @include('sweetalert::alert')
@endsection
