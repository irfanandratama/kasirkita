@extends('layouts.app', ['pageSlug' => 'addAdmin'])

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Admin</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Akun</a></div>
                <div class="breadcrumb-item"><a href="#">Admin</a></div>
                <div class="breadcrumb-item">Tambah Admin</div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Form Tambah Admin</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="" autocomplete="off">
                            @csrf
                            <div class="pl-lg-4">
                                <div class="form-group">
                                    <label>Nama Admin</label>
                                    <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name') }}" required autofocus>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                            <i class="fas fa-envelope"></i>
                                            </div>
                                        </div>
                                        <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email') }}" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label>Password</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                <i class="fas fa-lock"></i>
                                                </div>
                                            </div>
                                            <input type="password" name="password" id="input-password" class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}" value="" required>
                                        </div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Confirm Password</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                <i class="fas fa-redo"></i>
                                                </div>
                                            </div>
                                            <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control form-control-alternative" placeholder="{{ __('Confirm Password') }}" value="" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-right">
                                    <button type="submit" class="btn btn-icon icon-left btn-success">
                                        <i class="fas fa-check"></i> Kirim
                                    </button>
                                    <a href="{{route('admin.index')}}" class="btn btn-outline-secondary">Batal</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
