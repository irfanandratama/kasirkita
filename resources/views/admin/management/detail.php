@extends('layouts.app', ['pageSlug' => 'management'])

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Kasir - {{$cashier->name}}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Akun</a></div>
                <div class="breadcrumb-item"><a href="#">Kasir</a></div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Kasir</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group row align-items-center">
                            <label class="form-control-label col-sm-3 text-md-right">Nama Outlet :</label>
                            <div class="col-sm-6 col-md-9">
                                <h5>{{$outlet->name}}</h5>
                            </div>
                        </div>
                        <div class="form-group row align-items-center">
                            <label for="site-description" class="form-control-label col-sm-3 text-md-right">Alamat :</label>
                            <div class="col-sm-6 col-md-9">
                                <h5>{{ $outlet->address}}</h5>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <h4>Akun Kasir</h4>
                            <div class="col-12 text-right">
                                <a href="{{route('management-outlet.edit', $outlet->id)}}" class="btn btn-icon icon-left btn-light"><i class="fas fa-plus"></i> <span>Tambah Kasir</span></a>
                            </div>
                            <br>
                            <ul class="list-group">
                            @foreach ($cashier as $kasir)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ $kasir->name }}
                                    <span>
                                        <span class="badge badge-success badge-pill">Aktif</span>
                                    </span>
                                </li>
                            @endforeach
                            </ul>
                                </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
