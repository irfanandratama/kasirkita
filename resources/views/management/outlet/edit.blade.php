@extends('layouts.app', ['pageSlug' => 'listOutlet'])

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Outlet</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Akun</a></div>
                <div class="breadcrumb-item"><a href="#">Outlet</a></div>
                <div class="breadcrumb-item">Daftar Outlet</div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Ubah Data Outlet</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('management-outlet.update', $outlet->id)}}" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="pl-lg-4">
                                <div class="form-group">
                                    <label>Nama Outlet</label>
                                    <input name="name" type="text" placeholder="Nama Outlet" class="form-control" required="" value="{{ $outlet->name }}">
                                </div>
                                <div class="form-group">
                                    <label>Alamat Outlet</label>
                                    <input name="address" type="text" placeholder="Alamat" class="form-control" required="" value="{{ $outlet->address }}">
                                </div>

                                <div class="text-right">
                                    <button type="submit" class="btn btn-icon icon-left btn-success">
                                        <i class="fas fa-check"></i> Simpan
                                    </button>
                                    <a href="{{route('management-outlet.index')}}" class="btn btn-outline-secondary">Batal</a>
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
