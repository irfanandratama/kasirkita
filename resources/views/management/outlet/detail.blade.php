@extends('layouts.app', ['pageSlug' => 'listOutlet'])

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ URL::previous() }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>{{$outlet->name}}</h1>
            <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Management</a></div>
                <div class="breadcrumb-item"><a href="#">Outlet</a></div>
                <div class="breadcrumb-item">Detail Outlet</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Detail {{$outlet->name}}</h2>
        </div>
        <div class="card">
            <div class="card-body">
                <div id="accordion">
                    <div class="accordion">
                        <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-1" aria-expanded="true">
                            <h4>Data Outlet</h4>
                        </div>
                        <div class="accordion-body collapse show" id="panel-body-1" data-parent="#accordion">
                            <div class="mb-0">
                                <div class="text-right">
                                    <a href="{{route('management-outlet.edit', $outlet->id)}}" class="btn btn-icon icon-left btn-light"><i class="fas fa-edit"></i> <span>Ubah Data Outlet</span></a>
                                </div>
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

                    <div class="accordion">
                        <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-2">
                            <h4>Stock Product</h4>
                        </div>
                        <div class="accordion-body collapse" id="panel-body-2" data-parent="#accordion">
                            <ul class="list-group">
                            @foreach ($product as $produk)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ $produk->product->name }}
                                    <span>
                                        Stock : 
                                        @if ($produk->stock == 0)
                                        <span class="badge badge-danger badge-pill">{{$produk->stock}}</span>
                                        @else
                                        <span class="badge badge-primary badge-pill">{{$produk->stock}}</span>
                                        @endif
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