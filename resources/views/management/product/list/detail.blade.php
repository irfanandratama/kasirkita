@extends('layouts.app', ['pageSlug' => 'listProduct'])

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
        <div class="section-header-back">
            <a href="{{ URL::previous() }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>{{$product->name}}</h1>
        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Management</a></div>
                <div class="breadcrumb-item"><a href="#">Produk</a></div>
                <div class="breadcrumb-item">Detail Produk</div>
        </div>
        </div>

        <div class="section-body">
        <h2 class="section-title">Detail {{$product->name}}</h2>
        <!-- <p class="section-lead">
            You can adjust all general settings here
        </p> -->

        <div id="output-status"></div>
        <div class="row">
            <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills flex-column">
                        <li class="nav-item"><a href="#" class="nav-link active">Data Produk</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Statistik Penjualan</a></li>
                        <!-- <li class="nav-item"><a href="#" class="nav-link">Email</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">System</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Security</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Automation</a></li> -->
                    </ul>
                </div>
            </div>
            </div>
            <div class="col-md-8">
            <form id="setting-form">
                <div class="card" id="settings-card">
                <div class="card-header">
                    <h4>Data Produk</h4>
                </div>
                <div class="col-12 text-right">
                    <a href="{{route('management-product.edit', $product->id)}}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-edit"></i> <span>Ubah Produk</span></a>
                </div>
                <div class="card-body">
                    <!-- <p class="text-muted">General settings such as, site title, site description, address and so on.</p> -->
                    <div class="gallery gallery-fw" data-item-height="300">
                        <div class="gallery-item" data-image="{{ asset('assets/img/product/' . $product->image) }}" data-title="{{$product->name}}"></div>
                    </div>
                    
                    <div class="form-group row align-items-center">
                        <label class="form-control-label col-sm-3 text-md-right">Nama Produk :</label>
                        <div class="col-sm-6 col-md-9">
                            <h5>{{$product->name}}</h5>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label for="site-description" class="form-control-label col-sm-3 text-md-right">Harga :</label>
                        <div class="col-sm-6 col-md-9">
                            <h5>Rp. {{ number_format($product->price, 0, '.', '.')}}</h5>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label for="site-description" class="form-control-label col-sm-3 text-md-right">Kategori :</label>
                        <div class="col-sm-6 col-md-9">
                            <h5>{{$product->category->name}}</h5>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <h4>Outlet yang Tersedia</h4>
                        <ul class="list-group">
                        @foreach ($details as $detail)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $detail->outlet['name'] }}
                                <span>
                                    Stock : 
                                    <span class="badge badge-primary badge-pill">{{ $detail->stock }}</span>
                                </span>
                            </li>
                        @endforeach
                        </ul>
                    </div>
                </div>
                <div class="card-footer bg-whitesmoke text-md-right">
                    <!-- <button class="btn btn-primary" id="save-btn">Save Changes</button>
                    <button class="btn btn-secondary" type="button">Reset</button> -->
                </div>
                </div>
            </form>
            </div>
        </div>
        </div>
    </section>
</div>
@endsection