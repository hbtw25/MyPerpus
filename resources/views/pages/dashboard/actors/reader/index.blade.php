@extends('pages.dashboard.layouts.main')

@section('title', $title)

@section('additional_links')
    @include('utils.sweetalert.link')
@endsection

@section('content')
    <div class="page-title">
        <div class="row">
            <div class="order-last col-12 col-md-8 order-md-1">
                <h2>{{ $greeting }}, {{ auth()->user()->nama_lengkap }}!</h2>
            </div>
            <div class="order-first col-12 col-md-4 order-md-2">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">
                            Dashboard
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    {{-- Entry Point Start --}}
    <div class="mt-4 page-content">
        <section class="row">
            <div class="col-12 col-lg-9">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="px-4 py-4 card-body">
                                <div class="text-center">
                                    <div class="mb-3 avatar avatar-xl">
                                        @if (auth()->user()->profile_picture)
                                            @if (File::exists(public_path('assets/' . auth()->user()->profile_picture)))
                                                <img src="{{ asset('assets/' . auth()->user()->profile_picture) }}"
                                                    alt="{{ auth()->user()->nama_lengkap }}" />
                                            @else
                                                <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}"
                                                    alt="Avatar">
                                            @endif
                                        @else
                                            <img src="{{ asset('mazer/assets/compiled/jpg/1.jpg') }}" alt="Avatar">
                                        @endif
                                    </div>
                                    <div class="name">
                                        <h5 class="font-bold">{{ auth()->user()->nama_lengkap }}</h5>
                                        <h6 class="mb-0 text-muted">
                                            {{ htmlspecialchars('@' . auth()->user()->username) }}
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row user-select-none">
                    <div class="col-6 col-lg-6 col-md-6">
                        <a style="cursor: pointer" onclick="window.location.href='/dashboard/receipts'">
                            <div class="card">
                                <div class="px-4 card-body py-4-5">
                                    <div class="row">
                                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                            <div class="mb-2 stats-icon red">
                                                <i class="iconly-boldMessage"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <h6 class="font-semibold text-muted">
                                                Peminjaman
                                            </h6>
                                            <h6 class="mb-0 font-extrabold">
                                                {{ $receiptsCount }}
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <a style="cursor: pointer" onclick="window.location.href='/dashboard/reviews'">
                            <div class="card">
                                <div class="px-4 card-body py-4-5">
                                    <div class="row">
                                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                            <div class="mb-2 stats-icon purple">
                                                <i class="iconly-boldFolder"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <h6 class="font-semibold text-muted">
                                                Ulasan
                                            </h6>
                                            <h6 class="mb-0 font-extrabold">
                                                {{ $reviewsCount }}
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <a style="cursor: pointer" onclick="window.location.href='/dashboard/wishlists'">
                            <div class="card">
                                <div class="px-4 card-body py-4-5">
                                    <div class="row">
                                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                            <div class="mb-2 stats-icon blue">
                                                <i class="iconly-boldDocument"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <h6 class="font-semibold text-muted">
                                                Koleksi Pribadi
                                            </h6>
                                            <h6 class="mb-0 font-extrabold">
                                                {{ $wishlistsCount }}
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center">Peminjaman Terbaru</h4>
                    </div>
                    <div class="pb-4 card-content">
                        @forelse ($receipts as $receipt)
                            <a href="#" data-bs-toggle="modal"
                                data-bs-target="#receipt-details-{{ $receipt->id_peminjaman }}">
                                <div class="px-4 py-3 recent-message d-flex">
                                    <div class="avatar avatar-lg">
                                        @if ($receipt->user->profile_picture)
                                            @if (File::exists(public_path('assets/' . $receipt->user->profile_picture)))
                                                <img src="{{ asset('assets/' . $receipt->user->profile_picture) }}"
                                                    alt="User Avatar" alt="User Avatar" />
                                            @else
                                                <img src="{{ asset('storage/' . $receipt->user->profile_picture) }}"
                                                    alt="User Avatar" />
                                            @endif
                                        @else
                                            <img src="{{ asset('mazer/assets/compiled/jpg/1.jpg') }}" alt="User Avatar" />
                                        @endif
                                    </div>
                                    <div class="name ms-4">
                                        <h5 class="mb-1">{{ $receipt->book->judul }}</h5>
                                        <h6 class="mb-0 text-muted">
                                            {{ '#' . $receipt->id_peminjaman }}
                                        </h6>
                                    </div>
                                </div>
                            </a>

                            <div class="text-left modal fade" id="receipt-details-{{ $receipt->id_peminjaman }}"
                                tabindex="-1" role="dialog" aria-labelledby="header" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary">
                                            <h5 class="modal-title white" id="header">
                                                #{{ $receipt->id_peminjaman }}</h5>
                                            <span style="cursor: pointer;" class="text-black select-all fa-fw fa-lg fas"
                                                data-bs-dismiss="modal"></span>
                                        </div>
                                        <div class="modal-body">
                                            <p><span class="fw-bold">Peminjam</span>:
                                                {{ $receipt->user->nama_lengkap }}</p>
                                            <p><span class="fw-bold">Buku</span>:
                                                {{ $receipt->book->judul }}</p>
                                            <p><span class="fw-bold">Jumlah</span>:
                                                {{ $receipt->jumlah }}</p>
                                            <p><span class="fw-bold">Dari Tanggal</span>:
                                                {{ $receipt->tanggal_peminjaman->format('j F Y') }}</p>
                                            <p><span class="fw-bold">Sampai Tanggal</span>:
                                                {{ $receipt->tanggal_pengembalian->format('j F Y') }}</p>
                                            <p><span class="fw-bold">Jangka Waktu</span>:
                                                {{ $receipt->tanggal_peminjaman->diff($receipt->tanggal_pengembalian)->format('%a') }}
                                                Hari
                                            </p>
                                            <p><span class="fw-bold">Status</span>:
                                                {{ Str::title($receipt->status) }}</p>

                                            @if ($receipt->status === 'dikembalikan')
                                                <p><span class="fw-bold">Dikembalikan pada</span>:
                                                    {{ $receipt->tanggal_dikembalikan->format('j F Y') }}</p>
                                            @endif
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light-secondary"
                                                data-bs-dismiss="modal">
                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block">Close</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="px-4 py-3 recent-message d-flex">
                                <div class="alert alert-warning w-100" role="alert">
                                    <h4 class="alert-heading text-center">Tidak Ada Peminjaman :(</h4>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">New Review</h3>
                    </div>
                    <div class="card-body">
                        @forelse ($reviews as $review)
                            <a class="text-muted" href="/buku/{{ $review->book->slug }}">
                                <div class="px-4 mb-1">
                                    <div class="p-4 px-0 pb-0">
                                        <div class="d-flex">
                                            <div class="col-3 col-md-1">
                                                <div class="mb-3 avatar avatar-lg w-100">
                                                    @if ($review->user->profile_picture)
                                                        @if (File::exists(public_path('assets/' . $review->user->profile_picture)))
                                                            <img src="{{ asset('assets/' . $review->user->profile_picture) }}"
                                                                alt="User Avatar" alt="User Avatar" />
                                                        @else
                                                            <img src="{{ asset('storage/' . $review->user->profile_picture) }}"
                                                                alt="User Avatar" />
                                                        @endif
                                                    @else
                                                        <img src="{{ asset('mazer/assets/compiled/jpg/1.jpg') }}"
                                                            alt="User Avatar" />
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-11">
                                                <div class="text-start pe-4">
                                                    <span class="mb-0 d-flex">
                                                        <small class="card-subtitle text-muted">
                                                            {{ $review->created_at->format('d F Y, \a\t H:i') }}
                                                            @if ($review->updated_by)
                                                                <span class="fst-italic">(disunting)</span>
                                                            @endif
                                                        </small>
                                                    </span>

                                                    @if ($review->id_user === auth()->user()->id_user)
                                                        <p class="font-bold text-primary">
                                                            {{ $review->user->nama_lengkap }}
                                                        </p>
                                                    @else
                                                        <p class="font-bold">{{ $review->user->nama_lengkap }}</p>
                                                    @endif

                                                    <div class="mb-4">{!! $review->body !!}</div>
                                                </div>
                                            </div>
                                        </div>

                                        @if ($review->photo)
                                            <div class="mb-4">
                                                <a href="{{ asset("storage/$review->photo") }}" target="_blank">
                                                    <div class="attachment-file position-relative">
                                                        <div class="text-center attachment-file-body">
                                                            <i class="far fa-file-alt icon-9x"></i>
                                                        </div>
                                                        <div class="attachment-file-footer">
                                                            <a href="{{ asset("storage/$review->photo") }}"
                                                                target="_blank" class="btn btn-primary">
                                                                <i class="far fas fa-box-open me-2"></i> Buka ini!
                                                            </a>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <hr class="m-0">
                            </a>
                        @empty
                            <div class="alert alert-warning" role="alert">
                                <h4 class="alert-heading">Gak ada Ulasan :(</h4>
                                <p>Tidak ada ulasan.</p>
                            </div>
                        @endforelse
                    </div>
                    <div class="col d-flex justify-content-center" id="pagin-links">
                        {{-- Pagination --}}
                        {{ $reviews->links('vendor.pagination.bootstrap-4') }}
                    </div>
                </div>
            </div>
        </section>
    </div>
    {{-- Entry Point End --}}
@endsection

@section('additional_scripts')
    @include('utils.sweetalert.script')
    @include('sweetalert::alert')
@endsection
