@extends('pages.dashboard.layouts.main')

@section('title', $title)

@section('additional_links')
    @include('utils.quill.link')
    @include('utils.filepond.link')
@endsection

@section('content')
    <div class="page-title">
        <div class="row">
            <div class="order-last col-12 col-md-6 order-md-1">
                <h3>Review</h3>
                <p class="text-subtitle text-muted">Make edits for a review.</p>
                <hr>
            </div>
            <div class="order-first col-12 col-md-6 order-md-2">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/dashboard/reviews">Review</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Review</h4>
            </div>
            <div class="card-body">
                <form class="form" action="/dashboard/reviews/1" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="mb-1 col-12">
                            <div class="form-group mandatory is-invalid">
                                <div class="position-relative">
                                    <label for="body" class="form-label">Review</label>

                                    <input id="body" name="body" value="{{ old('body') }}" type="hidden">
                                    <div id="editor">
                                        {!! old('body') !!}
                                    </div>

                                    <div class="invalid-feedback d-block">
                                        Error message
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-12">
                            <div class="form-group">
                                <div class="position-relative">
                                    <label for="photo" class="form-label text-danger">Photo</label>

                                    <input type="file" class="image-preview-filepond" name="photo" id="photo" />
                                </div>
                            </div>

                            <div class="invalid-feedback d-block" style="margin-top: -10px">
                                Error message
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
    @vite('resources/js/components/quill/dashboard/reviews/editor.js')
    @include('utils.filepond.script')
    @vite('resources/js/components/filepond/image-preview/photo.js')
@endsection
