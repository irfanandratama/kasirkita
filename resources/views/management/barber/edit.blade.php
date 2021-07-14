@extends('layouts.app', ['pageSlug' => 'editBarber'])

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tukang Cukur - {{$barber->name}}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Akun</a></div>
                <div class="breadcrumb-item"><a href="#">Tukang Cukur</a></div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Tukang Cukur</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('management-barber.update', $barber->id) }}" autocomplete="off">
                            @csrf
                            @method('put')
                            <div class="pl-lg-4">
                                <div class="form-group">
                                    <label>Outlet
                                            <span class="text-danger" data-toggle="tooltip" data-placement="right" title="Tidak boleh kosong ya...">*</span>
                                    </label>
                                    <select class="form-control selectric" name='outlet' required="" autofocus>
                                        <option selected disabled>Pilih Outlet Tukang Cukur</option>
                                        @foreach ($outlet as $cabang)
                                        <option value={{$cabang->id}} {{ ($barber->outlet_id == $cabang->id ? "selected" : "") }}>{{$cabang->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                    <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', $barber->name) }}" required autofocus>
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
                                        <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email', $barber->email) }}" required>
                                    </div>
                                    @include('alerts.feedback', ['field' => 'email'])
                                </div>

                                <div class="text-right">
                                    <button type="submit" class="btn btn-icon icon-left btn-success">
                                        <i class="fas fa-check"></i> Simpan
                                    </button>
                                    <a href="{{route('management-barber.index')}}" class="btn btn-outline-secondary">Batal</a>
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
