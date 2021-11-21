@extends('layouts.app', ['pageSlug' => 'stockHistory'])

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ URL::previous() }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>{{ $history->created_at->format('d/m/Y (H:i)') }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Inventori</a></div>
                <div class="breadcrumb-item"><a href="#">Kelola Stok</a></div>
                <div class="breadcrumb-item">Detail Aktifitas</div>
            </div>
        </div>

        <div class="section-body">
        <h2 class="section-title">Detail Aktifitas</h2>
        <!-- <p class="section-lead">
            You can adjust all general settings here
        </p> -->

        <div id="output-status"></div>
        <div class="row">
            <div class="col-md-12">
            <form id="setting-form">
                <div class="card" id="settings-card">
                    <div class="card-header">
                        <div class="col-sm-6">
                            @if ($history->type == 'masuk')
                                <h5 class="badge badge-success">Stok Masuk</h5>
                            @else
                                <h5 class="badge badge-danger">Stok Keluar</h5>
                            @endif
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Subjek</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-user"></i>
                                    </div>
                                </div>
                                <p class="form-control">{{$history->cashier ? $history->cashier->name : 'Diisi oleh manajemen'}}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Produk</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-box-open"></i>
                                    </div>
                                </div>
                                <p class="form-control">{{$history->product->name}}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Kuantitas</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-boxes"></i>
                                    </div>
                                </div>
                                @if ($history->type == 'masuk')
                                    <p class="form-control">+ {{$history->quantity}}</p>
                                @else
                                    <p class="form-control">- {{$history->quantity}}</p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Catatan</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-sticky-note"></i>
                                    </div>
                                </div>
                                <p class="form-control">{{$history->note}}</p>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            </form>
            </div>
        </div>
        </div>
    </section>
</div>
@endsection