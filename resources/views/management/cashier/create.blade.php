@extends('layouts.app', ['pageSlug' => 'addCashier'])

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Kasir</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Akun</a></div>
                <div class="breadcrumb-item"><a href="#">Kasir</a></div>
                <div class="breadcrumb-item">Tambah Kasir</div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Form Tambah Kasir</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('management-cashier-create.store')}}" autocomplete="off">
                            @csrf
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                    <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name') }}" required autofocus>
                                    @include('alerts.feedback', ['field' => 'name'])
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                            <i class="fas fa-envelope"></i>
                                            </div>
                                        </div>
                                        <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email') }}" required>
                                    </div>
                                    @include('alerts.feedback', ['field' => 'email'])
                                </div>
                                <div class="row">
                                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }} col-6">
                                        <label class="form-control-label" for="input-password">{{ __('Password') }}</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                <i class="fas fa-lock"></i>
                                                </div>
                                            </div>
                                            <input type="password" name="password" id="input-password" class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}" value="" required>
                                        </div>
                                        @include('alerts.feedback', ['field' => 'password'])
                                    </div>
                                    <div class="form-group col-6">
                                        <label class="form-control-label" for="input-password-confirmation">{{ __('Confirm Password') }}</label>
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
                                    <a href="{{route('management-cashier.index')}}" class="btn btn-outline-secondary">Batal</a>
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
