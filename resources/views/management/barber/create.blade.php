@extends('layouts.app', ['pageSlug' => 'addBarber'])

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Kasir</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Akun</a></div>
                <div class="breadcrumb-item"><a href="#">Tukang Cukur</a></div>
                <div class="breadcrumb-item">Tambah Tukang Cukur</div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="section-title">Form Tambah Tukang Cukur</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('management-barber-create.store')}}" autocomplete="off">
                            @csrf
                            <div class="pl-lg-4">
                                <div class="form-group">
                                    <label>Outlet
                                            <span class="text-danger" data-toggle="tooltip" data-placement="right" title="Tidak boleh kosong ya...">*</span>
                                    </label>
                                    <select class="form-control selectric" name='outlet' required="" autofocus>
                                        <option selected disabled>Pilih Outlet Tukang Cukur</option>
                                        @foreach ($outlet as $cabang)
                                        <option value={{$cabang->id}}>{{$cabang->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="input-name">Nama Tukang Cukur
                                            <span class="text-danger" data-toggle="tooltip" data-placement="right" title="Tidak boleh kosong ya...">*</span>
                                    </label>        
                                    <input type="text" name="name" id="input-name" class="form-control form-control-alternative" placeholder="Name" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">Email
                                            <span class="text-danger" data-toggle="tooltip" data-placement="right" title="Tidak boleh kosong ya...">*</span>
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                            <i class="fas fa-envelope"></i>
                                            </div>
                                        </div>
                                        <input type="email" name="email" id="input-email" class="form-control form-control-alternative" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label class="form-control-label" for="input-password">Password
                                            <span class="text-danger" data-toggle="tooltip" data-placement="right" title="Tidak boleh kosong ya...">*</span>
                                    </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                <i class="fas fa-lock"></i>
                                                </div>
                                            </div>
                                            <input type="password" name="password" id="input-password" class="form-control form-control-alternative" placeholder="Password" required>
                                        </div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label class="form-control-label" for="input-password-confirmation">Konfirmasi Password
                                            <span class="text-danger" data-toggle="tooltip" data-placement="right" title="Tidak boleh kosong ya...">*</span>
                                    </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                <i class="fas fa-redo"></i>
                                                </div>
                                            </div>
                                            <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control form-control-alternative" placeholder="Konfirmasi Password" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-right">
                                    <button type="submit" class="btn btn-icon icon-left btn-success">
                                        <i class="fas fa-check"></i> Kirim
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
