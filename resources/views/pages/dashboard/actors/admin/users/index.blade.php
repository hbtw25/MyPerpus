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
                <h3>User</h3>
                <p class="text-subtitle text-muted">The entire data of each user.</p>
                <hr>
                <div class="mb-4">
                    <a href="/dashboard/users/create" class="px-2 pt-2 btn btn-success me-1">
                        <span class="text-white select-all fa-fw fa-lg fas"></span> Registration
                    </a>
                </div>
            </div>
            <div class="order-first col-12 col-md-6 order-md-2">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">User</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="d-flex flex-column flex-md-row justify-content-between" style="row-gap: 1rem;">
                    <h3>User</h3>

                    <div class="dropdown dropdown-color-icon mb-3 d-flex justify-content-start">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="export"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="fa-fw select-all fas me-1"></span> Export
                        </button>
                        <div class="dropdown-menu" aria-labelledby="export">
                            <form action="/dashboard/users/export" method="POST">
                                @csrf
                                <input type="hidden" name="table" value="all-of-users">
                                <input type="hidden" name="type" value="XLSX">
                                <button type="submit" class="dropdown-item">
                                    <span class="fa-fw select-all far text-light"></span> Excel
                                </button>
                            </form>

                            <form action="/dashboard/users/export" method="POST">
                                @csrf
                                <input type="hidden" name="table" value="all-of-users">
                                <input type="hidden" name="type" value="CSV">
                                <button type="submit" class="dropdown-item">
                                    <span class="fa-fw select-all fas text-light"></span> CSV
                                </button>
                            </form>

                            <form action="/dashboard/users/export" method="POST">
                                @csrf
                                <input type="hidden" name="table" value="all-of-users">
                                <input type="hidden" name="type" value="HTML">
                                <button type="submit" class="dropdown-item">
                                    <span class="fa-fw select-all fab text-light"></span> HTML
                                </button>
                            </form>

                            <form action="/dashboard/users/export" method="POST">
                                @csrf
                                <input type="hidden" name="table" value="all-of-users">
                                <input type="hidden" name="type" value="MPDF">
                                <button type="submit" class="dropdown-item">
                                    <span class="fa-fw select-all far text-light"></span> PDF
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table-user">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Data</th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @if ($user->profile_picture)
                                        @if (File::exists(public_path('assets/' . $user->profile_picture)))
                                            <img class="rounded" width="100"
                                                src="{{ asset('assets/' . $user->profile_picture) }}" alt="User Avatar"
                                                alt="User Avatar" />
                                        @else
                                            <img class="rounded" width="100"
                                                src="{{ asset('storage/' . $user->profile_picture) }}" alt="User Avatar" />
                                        @endif
                                    @else
                                        <img class="rounded" width="100"
                                            src="{{ asset('mazer/assets/compiled/jpg/1.jpg') }}" alt="User Avatar" />
                                    @endif
                                </td>
                                <td>{{ $user->nama_lengkap }}</td>
                                <td>{{ $user->created_at->format('j F Y, \a\t H.i') }}</td>
                                <td>
                                    @if ($user->role == 'admin')
                                        <span class="badge bg-info">Admin</span>
                                    @elseif ($user->role == 'petugas')
                                        <span class="badge bg-warning">petugas</span>
                                    @elseif($user->role == 'peminjam')
                                        <span class="badge bg-success">peminjam</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($user->flag_active == 'Y')
                                        <span class="badge bg-light-success">Active</span>
                                    @else
                                        <span class="badge bg-light-danger">Non-active</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($user->createdBy)
                                        <a
                                            href="/dashboard/users/{{ $user->createdBy->id_user }}">{{ '@' . $user->createdBy->username }}</a>
                                    @else
                                        <p>{{ $user->created_by }}</p>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex">
                                        @if ($user->role != 'admin')
                                            <div class="me-2">
                                                <a href="/dashboard/users/{{ $user->id_user }}/edit"
                                                    class="px-2 pt-2 btn btn-warning">
                                                    <span class="select-all fa-fw fa-lg fas"></span>
                                                </a>
                                            </div>
                                        @endif

                                        @if ($user->flag_active == 'Y' and $user->role != 'admin')
                                            <div class="me-2">
                                                <a class="px-2 pt-2 btn btn-danger" data-confirm-user-destroy="true"
                                                    data-unique="{{ $user->id_user }}">
                                                    <span data-confirm-user-destroy="true"
                                                        data-unique="{{ $user->id_user }}"
                                                        class="select-all fa-fw fa-lg fas"></span>
                                                </a>
                                            </div>
                                        @elseif($user->flag_active == 'N' and $user->role != 'admin')
                                            <div class="me-2">
                                                <a class="px-2 pt-2 btn btn-success" data-confirm-user-activate="true"
                                                    data-unique="{{ $user->id_user }}">
                                                    <span data-confirm-user-activate="true"
                                                        data-unique="{{ $user->id_user }}"
                                                        class="select-all fa-fw fa-lg fas"></span>
                                                </a>
                                            </div>
                                        @endif

                                        <div class="me-2">
                                            <a href="/dashboard/users/{{ $user->id_user }}"
                                                class="px-2 pt-2 btn btn-info">
                                                <span class="select-all fa-fw fa-lg fas"></span>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8">
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
    @vite('resources/js/components/simple-datatable/dashboard/users/datatable.js')
    @include('utils.sweetalert.script')
    @vite('resources/js/components/sweetalert/dashboard/users/alert.js')
@endsection
