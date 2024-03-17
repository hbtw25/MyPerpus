@extends('pages.dashboard.layouts.main')

@section('title', $title)

@section('additional_links')
    @include('utils.filepond.link')
@endsection

@section('content')
    <div class="page-title">
        <div class="row">
            <div class="order-last col-12 col-md-6 order-md-1">
                <h3>Create User</h3>
                <p class="text-subtitle text-muted">
                    Register users to do things in Tyzals.
                </p>
            </div>
            <div class="order-first col-12 col-md-6 order-md-2">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/dashboard/users">User</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Registration</h4>
            </div>
            <div class="card-body">
                <form class="form" action="/dashboard/users" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="mb-1 col-md-6 col-12">
                            <div class="form-group has-icon-left mandatory @error('nama_lengkap'){{ 'is-invalid' }}@enderror">
                                <label for="nama_lengkap" class="form-label">Full name</label>
                                <div class="position-relative">
                                    <input type="text" class="py-2 form-control" placeholder="e.g. hbtw"
                                        id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap') }}" />
                                    <div class="form-control-icon">
                                        <i class="py-2 bi bi-person"></i>
                                    </div>

                                    @error('nama_lengkap')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="mb-1 col-md-6 col-12">
                            <div class="form-group has-icon-left mandatory @error('username'){{ 'is-invalid' }}@enderror">
                                <label for="username" class="form-label">Username</label>
                                <div class="position-relative">
                                    <input type="text" class="py-2 form-control" placeholder="e.g. hbtw"
                                        id="username" name="username" value="{{ old('username') }}" />
                                    <div class="form-control-icon">
                                        <i class="py-2 bi bi-at"></i>
                                    </div>

                                    @error('username')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-1 col-md-6 col-12">
                            <div class="form-group has-icon-left mandatory @error('email'){{ 'is-invalid' }}@enderror">
                                <label for="email" class="form-label">Email</label>
                                <div class="position-relative">
                                    <input type="email" class="py-2 form-control" id="email" name="email"
                                        value="{{ old('email') }}" placeholder="e.g. hbtw@gmail.com" />
                                    <div class="form-control-icon">
                                        <i class="py-2 bi bi-envelope-paper"></i>
                                    </div>

                                    @error('email')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>





                        <div class="mb-1 col-md-6 col-12">
                            <div class="form-group has-icon-left mandatory @error('alamat'){{ 'is-invalid' }}@enderror">
                                <label for="alamat" class="form-label">alamat</label>
                                <div class="position-relative">
                                    <input type="text" class="py-2 form-control"
                                        placeholder="e.g. Jl. Free Fire Factory, No. 1, Kla Only" id="alamat"
                                        name="alamat" value="{{ old('alamat') }}" />
                                    <div class="form-control-icon">
                                        <i class="py-2 bi bi-house"></i>
                                    </div>

                                    @error('alamat')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>



                        <div class="mb-1 col-md-6 col-12">
                            <div
                                class="form-group has-icon-left mandatory @error('password'){{ 'is-invalid' }}@enderror">
                                <label for="password" class="form-label">Password</label>
                                <div class="flex-row-reverse d-flex align-items-center position-relative" id="wrapper">
                                    <input type="password" class="py-2 mt-1 form-control"
                                        placeholder="e.g. 4kuBu7uhM3dk1t" id="password" name="password"
                                        maxlength="255">
                                    <div class="pt-1 form-control-icon">
                                        <i class="bi bi-key"></i>
                                    </div>
                                </div>

                                @error('password')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-1 col-md-6 col-12">
                            <div
                                class="form-group has-icon-left mandatory @error('password_confirmation'){{ 'is-invalid' }}@enderror">
                                <label for="password-confirmation" class="form-label">Password Confirmation</label>
                                <div class="flex-row-reverse d-flex align-items-center position-relative" id="wrapper">
                                    <input type="password" class="py-2 mt-1 form-control"
                                        placeholder="e.g. 4kuBu7uhM3dk1t" id="password-confirmation"
                                        name="password_confirmation" maxlength="255">
                                    <div class="pt-1 form-control-icon">
                                        <i class="bi bi-key-fill"></i>
                                    </div>
                                </div>

                                @error('password_confirmation')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-1 col-md-6 col-12">
                            <div class="form-group mandatory @error('role'){{ 'is-invalid' }}@enderror">
                                <fieldset>
                                    <label class="form-label">
                                        Role
                                    </label>
                                    <div class="mt-md-2 d-flex">
                                        <div class="form-check me-3">
                                            <input class="form-check-input" type="radio" name="role"
                                                id="role-officer" value="petugas"
                                                @if (old('role') == 'petugas') checked @endif>
                                            <label class="form-check-label form-label" for="role-officer">
                                                petugas
                                            </label>
                                        </div>
                                        <div class="form-check me-3">
                                            <input class="form-check-input" type="radio" name="role"
                                                id="role-reader" value="peminjam"
                                                @if (old('role') == 'peminjam') checked @endif>
                                            <label class="form-check-label form-label" for="role-reader">
                                                peminjam
                                            </label>
                                        </div>
                                    </div>
                                </fieldset>

                                @error('role')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-12">
                            <div class="form-group">
                                <div class="position-relative">
                                    <label id="profile_picture"
                                        class="form-label @error('profile_picture'){{ 'text-danger' }}@enderror">Profile
                                        Picture</label>

                                    <input type="file" class="image-crop-filepond" name="profile_picture"
                                        id="profile_picture" />
                                </div>
                            </div>

                            @error('profile_picture')
                                <div class="invalid-feedback d-block" style="margin-top: -10px">
                                    {{ $message }}
                                </div>
                            @enderror
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
    @include('utils.filepond.script')
    @vite('resources/js/components/filepond/image-crop/photo.js')

    @include('utils.session.forget-error')
@endsection
