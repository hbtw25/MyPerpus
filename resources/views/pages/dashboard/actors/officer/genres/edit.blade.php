@extends('pages.dashboard.layouts.main')

@section('title', $title)

@section('additional_links')
@endsection

@section('content')
    <div class="page-title">
        <div class="row">
            <div class="order-last col-12 col-md-6 order-md-1">
                <h3>Edit Genre</h3>
                <p class="text-subtitle text-muted">
                    Edit genre buku di perpustakaan.
                </p>
            </div>
            <div class="order-first col-12 col-md-6 order-md-2">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/dashboard/genres">Genre</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Genre</h4>
            </div>
            <div class="card-body">
                <form class="form" action="/dashboard/genres/{{ $genre->id_kategori }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="mb-1 col-md-6 col-12">
                            <div class="form-group has-icon-left mandatory @error('nama'){{ 'is-invalid' }}@enderror">
                                <label for="nama" class="form-label">nama</label>
                                <div class="position-relative">
                                    <input type="text" class="py-2 form-control" placeholder="e.g. Fiction"
                                        id="nama" name="nama" value="{{ old('nama') ?? $genre->nama }}" />
                                    <div class="form-control-icon">
                                        <i class="py-2 bi bi-pen"></i>
                                    </div>

                                    @error('nama')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-1 col-md-6 col-12">
                            <div
                                class="form-group has-icon-left mandatory @error('deskripsi'){{ 'is-invalid' }}@enderror">
                                <label for="deskripsi" class="form-label">deskripsi</label>
                                <div class="position-relative">
                                    <input type="text" class="py-2 form-control"
                                        placeholder="e.g. Fiction is a form of any work designed to entertain ..."
                                        id="deskripsi" name="deskripsi"
                                        value="{{ old('deskripsi') ?? $genre->deskripsi }}" />
                                    <div class="form-control-icon">
                                        <i class="py-2 bi bi-envelope-paper"></i>
                                    </div>

                                    @error('deskripsi')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="mb-1 btn btn-primary me-1">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('additional_scripts')
@endsection
