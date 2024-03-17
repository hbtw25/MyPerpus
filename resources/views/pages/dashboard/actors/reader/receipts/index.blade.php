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
                <h3>Receipt</h3>
                <p class="text-subtitle text-muted">This is a list of all receipts that have been made by the admin or
                    officer.
                </p>
                <hr>
                <div class="mb-4">
                    <a href="/dashboard/receipts/create" class="px-2 pt-2 btn btn-success me-1">
                        <span class="text-white select-all fa-fw fa-lg fas"></span> Create Receipt
                    </a>
                </div>
            </div>
            <div class="order-first col-12 col-md-6 order-md-2">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Receipt</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="d-flex flex-column flex-md-row justify-content-between" style="row-gap: 1rem;">
                    <h4>Receipt</h4>

                    <div class="dropdown dropdown-color-icon d-flex justify-content-start">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="export"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="select-all fa-fw fas me-1"></span> Export
                        </button>
                        <div class="dropdown-menu" aria-labelledby="export">
                            <form action="/dashboard/receipts/export" method="POST">
                                @csrf
                                <input type="hidden" name="table" value="all-of-receipts">
                                <input type="hidden" name="type" value="XLSX">
                                <button type="submit" class="dropdown-item">
                                    <span class="select-all fa-fw far text-light"></span> Excel
                                </button>
                            </form>

                            <form action="/dashboard/receipts/export" method="POST">
                                @csrf
                                <input type="hidden" name="table" value="all-of-receipts">
                                <input type="hidden" name="type" value="CSV">
                                <button type="submit" class="dropdown-item">
                                    <span class="select-all fa-fw fas text-light"></span> CSV
                                </button>
                            </form>

                            <form action="/dashboard/receipts/export" method="POST">
                                @csrf
                                <input type="hidden" name="table" value="all-of-receipts">
                                <input type="hidden" name="type" value="HTML">
                                <button type="submit" class="dropdown-item">
                                    <span class="select-all fa-fw fab text-light"></span> HTML
                                </button>
                            </form>

                            <form action="/dashboard/receipts/export" method="POST">
                                @csrf
                                <input type="hidden" name="table" value="all-of-receipts">
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
                <table class="table table-striped" id="table-receipt">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Reader</th>
                            <th>Book</th>
                            <th>jumlah</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($receipts as $receipt)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $receipt->user->nama_lengkap }}</td>
                                <td>{{ $receipt->book->judul }}</td>
                                <td>{{ $receipt->jumlah }}</td>
                                <td>
                                    <span
                                        class="badge @if ($receipt->status === 'dikembalikan') {{ 'bg-success' }}
                                        @elseif($receipt->status === 'dipinjam') {{ 'bg-warning' }}
                                        @elseif($receipt->status === 'terlambat') {{ 'bg-danger' }} @endif">{{ Str::title($receipt->status) }}</span>
                                </td>
                                <td>{{ $receipt->tanggal_peminjaman->format('j M Y') }} to {{ $receipt->tanggal_pengembalian->format('j M Y') }}
                                </td>
                                <td>
                                    <div class="d-flex">
                                        @if ($receipt->status === 'dipinjam' || $receipt->status === 'terlambat')
                                            {{-- <div class="me-2">
                                                <a class="px-2 pt-2 btn btn-success" data-confirm-book-returned="true"
                                                    data-unique="{{ $receipt->id_peminjaman }}">
                                                    <span data-confirm-book-returned="true"
                                                        data-unique="{{ $receipt->id_peminjaman }}"
                                                        class="select-all fa-fw fa-lg fas"></span>
                                                </a>
                                            </div> --}}
                                        @endif

                                        <div class="me-2">
                                            <a data-bs-toggle="modal"
                                                data-bs-target="#receipt-details-{{ $receipt->id_peminjaman }}"
                                                class="px-2 pt-2 btn btn-info">
                                                <span class="select-all fa-fw fa-lg fas"></span>
                                            </a>

                                            <div class="text-left modal fade"
                                                id="receipt-details-{{ $receipt->id_peminjaman }}" tabindex="-1"
                                                role="dialog" aria-labelledby="header" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                    role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-primary">
                                                            <h5 class="modal-title white" id="header">
                                                                #{{ $receipt->id_peminjaman }}</h5>
                                                            <span style="cursor: pointer;"
                                                                class="text-black select-all fa-fw fa-lg fas"
                                                                data-bs-dismiss="modal"></span>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p><span class="fw-bold">Reader</span>:
                                                                {{ $receipt->user->nama_lengkap }}</p>
                                                            <p><span class="fw-bold">Reader's status</span>:
                                                                @if ($receipt->user->flag_active == 'Y')
                                                                    Active
                                                                @else
                                                                    Non-active
                                                                @endif
                                                            </p>
                                                            <p><span class="fw-bold">Book</span>:
                                                                {{ $receipt->book->judul }}</p>
                                                            <p><span class="fw-bold">jumlah</span>:
                                                                {{ $receipt->jumlah }}</p>
                                                            <p><span class="fw-bold">From time</span>:
                                                                {{ $receipt->tanggal_peminjaman->format('j F Y') }}</p>
                                                            <p><span class="fw-bold">To time</span>:
                                                                {{ $receipt->tanggal_pengembalian->format('j F Y') }}</p>
                                                            <p><span class="fw-bold">Time range</span>:
                                                                {{ $receipt->tanggal_peminjaman->diff($receipt->tanggal_pengembalian)->format('%a') }}
                                                                day(s)
                                                            </p>
                                                            <p><span class="fw-bold">Time left</span>:
                                                                @if (now() >= $receipt->tanggal_pengembalian)
                                                                    0 day
                                                                @else
                                                                    {{ $receipt->tanggal_pengembalian->diffInDays(now()) }}
                                                                @endif
                                                            </p>
                                                            <p><span class="fw-bold">Status</span>:
                                                                {{ Str::title($receipt->status) }}</p>

                                                            @if ($receipt->status === 'dikembalikan')
                                                                <p><span class="fw-bold">Returned at</span>:
                                                                    {{ $receipt->tanggal_dikembalikan->format('j F Y') }}</p>
                                                            @endif
                                                            <p><span class="fw-bold">Receiptment is created by</span>:
                                                                {{ $receipt->createdBy->nama_lengkap }}
                                                            </p>
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
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">
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
    @vite('resources/js/components/simple-datatable/dashboard/receipts/datatable.js')
    @include('utils.sweetalert.script')
    @vite('resources/js/components/sweetalert/dashboard/receipts/alert.js')
    @include('sweetalert::alert')
@endsection
