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
                <h3>Genre</h3>
                <p class="text-subtitle text-muted">Manage the genre of the books in the library.</p>
                <hr>
                <div class="mb-4">
                    <a href="/dashboard/genres/create" class="px-2 pt-2 btn btn-success me-1">
                        <span class="text-white select-all fa-fw fa-lg fas"></span> Create Genre
                    </a>
                </div>
            </div>
            <div class="order-first col-12 col-md-6 order-md-2">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Genre</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="d-flex flex-column flex-md-row justify-content-between" style="row-gap: 1rem;">
                    <h4>Genre</h4>

                    <div class="mb-3 dropdown dropdown-color-icon d-flex justify-content-start">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="export"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="select-all fa-fw fas me-1"></span> Export
                        </button>
                        <div class="dropdown-menu" aria-labelledby="export">
                            <form action="/dashboard/genres/export" method="POST">
                                @csrf
                                <input type="hidden" name="table" value="all-of-genres">
                                <input type="hidden" name="type" value="XLSX">
                                <button type="submit" class="dropdown-item">
                                    <span class="select-all fa-fw far text-light"></span> Excel
                                </button>
                            </form>

                            <form action="/dashboard/genres/export" method="POST">
                                @csrf
                                <input type="hidden" name="table" value="all-of-genres">
                                <input type="hidden" name="type" value="CSV">
                                <button type="submit" class="dropdown-item">
                                    <span class="select-all fa-fw fas text-light"></span> CSV
                                </button>
                            </form>

                            <form action="/dashboard/genres/export" method="POST">
                                @csrf
                                <input type="hidden" name="table" value="all-of-genres">
                                <input type="hidden" name="type" value="HTML">
                                <button type="submit" class="dropdown-item">
                                    <span class="select-all fa-fw fab text-light"></span> HTML
                                </button>
                            </form>

                            <form action="/dashboard/genres/export" method="POST">
                                @csrf
                                <input type="hidden" name="table" value="all-of-genres">
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
                <table class="table table-striped" id="table-genre">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Desc</th>
                            <th>Book(s)</th>
                            <th>Created</th>
                            <th>Active</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($genres as $genre)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $genre->nama }}</td>
                                <td>{{ $genre->deskripsi }}</td>
                                <td>{{ $genre->books->count() }}</td>
                                <td>
                                    <a
                                        href="/dashboard/users/{{ $genre->createdBy->id_user }}">{{ '@' . $genre->createdBy->username }}</a>
                                </td>
                                <td>
                                    @if ($genre->flag_active == 'Y')
                                        <span class="badge bg-light-success">Y</span>
                                    @else
                                        <span class="badge bg-light-danger">N</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <div class="me-2">
                                            <a href="/dashboard/genres/{{ $genre->id_kategori }}/edit"
                                                class="px-2 pt-2 btn btn-warning">
                                                <span class="select-all fa-fw fa-lg fas"></span>
                                            </a>
                                        </div>

                                        @if ($genre->flag_active === 'Y')
                                            <div class="me-2">
                                                <a class="px-2 pt-2 btn btn-danger" data-confirm-genre-destroy="true"
                                                    data-unique="{{ $genre->id_kategori }}">
                                                    <span data-confirm-genre-destroy="true"
                                                        data-unique="{{ $genre->id_kategori }}"
                                                        class="select-all fa-fw fa-lg fas"></span>
                                                </a>
                                            </div>
                                        @else
                                            <div class="me-2">
                                                <a class="px-2 pt-2 btn btn-success" data-confirm-genre-activate="true"
                                                    data-unique="{{ $genre->id_kategori }}">
                                                    <span data-confirm-genre-activate="true"
                                                        data-unique="{{ $genre->id_kategori }}"
                                                        class="select-all fa-fw fa-lg fas"></span>
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">
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
    @vite('resources/js/components/simple-datatable/dashboard/genres/datatable.js')
    @include('utils.sweetalert.script')
    @vite('resources/js/components/sweetalert/dashboard/genres/alert.js')
    @include('sweetalert::alert')
@endsection
