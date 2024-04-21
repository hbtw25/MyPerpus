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
                <h3>Review</h3>
                <p class="text-subtitle text-muted">
                    Here are all the reviews made by users for a book.
                </p>
                <hr>
            </div>
            <div class="order-first col-12 col-md-6 order-md-2">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Review</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    {{-- Your Review --}}
    {{-- <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="d-flex flex-column flex-md-row justify-content-between" style="row-gap: 1rem;">
                    <h4>Your Review</h4>

                    <div class="dropdown dropdown-color-icon d-flex justify-content-start">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="export"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="select-all fa-fw fas me-1"></span> Export
                        </button>
                        <div class="dropdown-menu" aria-labelledby="export">
                            <form action="/dashboard/reviews/export" method="POST">
                                @csrf
                                <input type="hidden" name="table" value="your-reviews">
                                <input type="hidden" name="type" value="XLSX">
                                <button type="submit" class="dropdown-item">
                                    <span class="select-all fa-fw far text-light"></span> Excel
                                </button>
                            </form>

                            <form action="/dashboard/reviews/export" method="POST">
                                @csrf
                                <input type="hidden" name="table" value="your-reviews">
                                <input type="hidden" name="type" value="CSV">
                                <button type="submit" class="dropdown-item">
                                    <span class="select-all fa-fw fas text-light"></span> CSV
                                </button>
                            </form>

                            <form action="/dashboard/reviews/export" method="POST">
                                @csrf
                                <input type="hidden" name="table" value="your-reviews">
                                <input type="hidden" name="type" value="HTML">
                                <button type="submit" class="dropdown-item">
                                    <span class="select-all fa-fw fab text-light"></span> HTML
                                </button>
                            </form>

                            <form action="/dashboard/reviews/export" method="POST">
                                @csrf
                                <input type="hidden" name="table" value="your-reviews">
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
                <table class="table table-striped" id="table-your-review">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Review</th>
                            <th>Photo</th>
                            <th>rating</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($yourReviews as $review)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $review->created_at->format('j M Y, \a\t H.i') }}</td>
                                <td>{!! $review->body !!}</td>
                                <td>
                                    @if ($review->photo)
                                        <span class="badge bg-light-warning">Yes</span>
                                    @else
                                        <span class="badge bg-light-dark">No</span>
                                    @endif
                                </td>
                                <td>{{ str_repeat('★', ($review->rating)) }}{{ str_repeat('☆', 5 - ($review->rating)) }}</td>
                                <td>
                                    <div class="d-flex">
                                        <div class="me-2">
                                            <a href="/dashboard/reviews/{{ $review->id_ulasan }}/edit"
                                                class="px-2 pt-2 btn btn-warning">
                                                <span class="select-all fa-fw fa-lg fas"></span>
                                            </a>
                                        </div>

                                        <div class="me-2">
                                            <a class="px-2 pt-2 btn btn-danger" data-confirm-your-review-destroy="true"
                                                data-unique="{{ $review->id_ulasan }}">
                                                <span data-confirm-your-review-destroy="true"
                                                    data-unique="{{ $review->id_ulasan }}"
                                                    class="select-all fa-fw fa-lg fas"></span>
                                            </a>
                                        </div>

                                        <div class="me-2">
                                            <a href="/books/{{ $review->book->id_buku }}" class="px-2 pt-2 btn btn-info">
                                                <span class="select-all fa-fw fa-lg fas"></span>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">
                                    <p class="pt-3 text-center">Gak ada :(</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section> --}}

    {{-- All Review --}}
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="d-flex flex-column flex-md-row justify-content-between" style="row-gap: 1rem;">
                    <h4>All Review</h4>

                    <div class="dropdown dropdown-color-icon d-flex justify-content-start">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="export"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="select-all fa-fw fas me-1"></span> Export
                        </button>
                        <div class="dropdown-menu" aria-labelledby="export">
                            <form action="/dashboard/reviews/export" method="POST">
                                @csrf
                                <input type="hidden" name="table" value="all-of-reviews">
                                <input type="hidden" name="type" value="XLSX">
                                <button type="submit" class="dropdown-item">
                                    <span class="select-all fa-fw far text-light"></span> Excel
                                </button>
                            </form>

                            <form action="/dashboard/reviews/export" method="POST">
                                @csrf
                                <input type="hidden" name="table" value="all-of-reviews">
                                <input type="hidden" name="type" value="CSV">
                                <button type="submit" class="dropdown-item">
                                    <span class="select-all fa-fw fas text-light"></span> CSV
                                </button>
                            </form>

                            <form action="/dashboard/reviews/export" method="POST">
                                @csrf
                                <input type="hidden" name="table" value="all-of-reviews">
                                <input type="hidden" name="type" value="HTML">
                                <button type="submit" class="dropdown-item">
                                    <span class="select-all fa-fw fab text-light"></span> HTML
                                </button>
                            </form>

                            <form action="/dashboard/reviews/export" method="POST">
                                @csrf
                                <input type="hidden" name="table" value="all-of-reviews">
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
                <table class="table table-striped" id="table-review">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>User</th>
                            <th>Date</th>
                            <th>Review</th>
                            <th>Photo</th>
                            <th>Rating</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($reviews as $review)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><a
                                        href="/dashboard/users/{{ $review->user->id_user }}">{{ '@' . $review->user->username }}</a>
                                </td>
                                <td>{{ $review->created_at->format('j M Y, \a\t H.i') }}</td>
                                <td>{!! $review->body !!}</td>
                                <td>
                                    @if ($review->photo)
                                        <span class="badge bg-light-warning">Yes</span>
                                    @else
                                        <span class="badge bg-light-dark">No</span>
                                    @endif
                                </td>
                                <td>{{ str_repeat('★', ($review->rating)) }}{{ str_repeat('☆', 5 - ($review->rating)) }}</td>
                                <td>
                                    <div class="d-flex">
                                        @if ($review->id_user === auth()->user()->id_user)
                                            <div class="me-2">
                                                <a href="/dashboard/reviews/{{ $review->id_ulasan }}/edit"
                                                    class="px-2 pt-2 btn btn-warning">
                                                    <span class="select-all fa-fw fa-lg fas"></span>
                                                </a>
                                            </div>

                                            <div class="me-2">
                                                <a class="px-2 pt-2 btn btn-danger"
                                                    data-confirm-your-review-destroy="true"
                                                    data-unique="{{ $review->id_ulasan }}">
                                                    <span data-confirm-your-review-destroy="true"
                                                        data-unique="{{ $review->id_ulasan }}"
                                                        class="select-all fa-fw fa-lg fas"></span>
                                                </a>
                                            </div>
                                        @endif

                                        <div class="me-2">
                                            <a href="/buku/{{ $review->book->slug }}" class="px-2 pt-2 btn btn-info">
                                                <span class="select-all fa-fw fa-lg fas"></span>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">
                                    <p class="pt-3 text-center">Gak ada :(</p>
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
    @vite('resources/js/components/simple-datatable/dashboard/reviews/datatable.js')
    @include('utils.sweetalert.script')
    @vite('resources/js/components/sweetalert/dashboard/reviews/alert.js')
    @include('sweetalert::alert')
@endsection
