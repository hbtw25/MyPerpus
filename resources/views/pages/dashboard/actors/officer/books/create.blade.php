@extends('pages.dashboard.layouts.main')

@section('title', $title)

@section('additional_links')
    @include('utils.quill.link')
    @include('utils.filepond.link')
    @include('utils.choices.link')
    @include('sweetalert::alert')
@endsection

@section('content')
    <div class="page-title">
        <div class="row">
            <div class="order-last col-12 col-md-6 order-md-1">
                <h3>Buat Buku</h3>
                <p class="text-subtitle text-muted">
                    Buat buku baru di perpustakaan.
                </p>
            </div>
            <div class="order-first col-12 col-md-6 order-md-2">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/dashboard/books">Buku</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Buat</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Book</h4>
            </div>
            <div class="card-body">
                @if ($errors->has('slug_error'))
                <div class="alert alert-danger">
                    {{ $errors->first('slug_error') }}
                </div>
            @endif
                <form class="form" action="/dashboard/books" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="mb-1 col-md-6 col-12">
                            <div class="form-group has-icon-left mandatory @error('judul'){{ 'is-invalid' }}@enderror">
                                <label for="judul" class="form-label">judul</label>
                                <div class="position-relative">
                                    <input type="text" class="py-2 form-control" placeholder="e.g. The Midnight Library"
                                        id="judul" name="judul" value="{{ old('judul') }}" />
                                    <div class="form-control-icon">
                                        <i class="py-2 bi bi-pen"></i>
                                    </div>

                                    @error('judul')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-1 col-md-6 col-12">
                            <div class="form-group has-icon-left mandatory @error('penulis'){{ 'is-invalid' }}@enderror">
                                <label for="penulis" class="form-label">penulis</label>
                                <div class="position-relative">
                                    <input type="text" class="py-2 form-control" placeholder="e.g. Matt Haig"
                                        id="penulis" name="penulis" value="{{ old('penulis') }}" />
                                    <div class="form-control-icon">
                                        <i class="py-2 bi bi-person"></i>
                                    </div>

                                    @error('penulis')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-1 col-md-6 col-12">
                            <div class="form-group has-icon-left mandatory @error('penerbit'){{ 'is-invalid' }}@enderror">
                                <label for="penerbit" class="form-label">penerbit</label>
                                <div class="position-relative">
                                    <input type="text" class="py-2 form-control" placeholder="e.g. Penguin Books"
                                        id="penerbit" name="penerbit" value="{{ old('penerbit') }}" />
                                    <div class="form-control-icon">
                                        <i class="py-2 bi bi-globe"></i>
                                    </div>

                                    @error('penerbit')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-1 col-md-6 col-12">
                            <div
                                class="form-group has-icon-left mandatory @error('tahun_terbit'){{ 'is-invalid' }}@enderror">
                                <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                                <div class="position-relative">
                                    <input type="text" class="py-2 form-control" id="tahun_terbit"
                                        name="tahun_terbit" value="{{ old('tahun_terbit') }}" placeholder="e.g. 2020"
                                        min="1901" max="{{ now()->year }}" maxlength="4" />
                                    <div class="form-control-icon">
                                        <i class="py-2 bi bi-calendar-date"></i>
                                    </div>

                                    @error('tahun_terbit')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-1 col-12">
                            <div class="form-group has-icon-left mandatory @error('stock'){{ 'is-invalid' }}@enderror">
                                <label for="stock" class="form-label">Stock</label>
                                <div class="position-relative">
                                    <input type="text" class="py-2 form-control" id="stock" name="stock"
                                        value="{{ old('stock') }}" placeholder="e.g. 10" min="0" max="1000"
                                        maxlength="4" />
                                    <div class="form-control-icon">
                                        <i class="py-2 bi bi-bar-chart"></i>
                                    </div>

                                    @error('stock')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-1 col-12">
                            <div class="form-group has-icon-left mandatory @error('genres'){{ 'is-invalid' }}@enderror">
                                <label for="genres" class="form-label">Genre</label>
                                <div class="position-relative">
                                    <select id="genres" class="choices form-select multiple-remove"
                                        multiple="multiple" name="genres[]">
                                        <option placeholder>Silakan pilih genrenya...</option>

                                        @foreach ($genres as $genre)
                                            <option value="{{ $genre->id_kategori }}"
                                                @if (old('genres')) @foreach (old('genres') as $oldGenre)
                                                        @if ($oldGenre == $genre->id_kategori)
                                                        selected @endif
                                                @endforeach
                                        @endif
                                        >{{ $genre->nama }}</option>
                                        @endforeach
                                    </select>

                                    @error('genres')
                                        <div style="margin-top: -20px" class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-12">
                            <div class="form-group">
                                <div class="position-relative">
                                    <label id="cover"
                                        class="form-label @error('cover'){{ 'text-danger' }}@enderror">Cover</label>

                                    <input type="file" class="image-preview-filepond" name="cover"
                                        id="cover" />
                                </div>
                            </div>

                            @error('cover')
                                <div class="invalid-feedback d-block" style="margin-top: -10px">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-1 col-12">
                            <div class="form-group mandatory @error('synopsis'){{ 'is-invalid' }}@enderror">
                                <div class="position-relative">
                                    <label class="form-label">Synopsis</label>

                                    <input id="synopsis" name="synopsis" value="{{ old('synopsis') }}" type="hidden">
                                    <div id="editor">
                                        {!! old('synopsis') !!}
                                    </div>

                                    @error('synopsis')
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
    @include('utils.quill.script')
    @vite('resources/js/components/quill/dashboard/books/editor.js')
    @include('utils.filepond.script')
    @vite('resources/js/components/filepond/image-preview/photo.js')
    @include('utils.choices.script')
@endsection
