@extends('layouts.app', ['pageSlug' => 'detailBarber'])

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Kasir - {{$barber->name}}</h1>
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
                        <div class="form-group row align-items-center">
                            <label class="form-control-label col-sm-3 text-md-right">Nama :</label>
                            <div class="col-sm-6 col-md-9">
                                <h5>{{$barber->name}}</h5>
                            </div>
                        </div>
                        <div class="form-group row align-items-center">
                            <label for="site-description" class="form-control-label col-sm-3 text-md-right">Email :</label>
                            <div class="col-sm-6 col-md-9">
                                <h5>{{ $barber->email}}</h5>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <h4>Toko</h4>
                            <ul class="list-group">
                            @foreach ($outlets as $outlet)
                            @if ($barber->outlet_id == $outlet->id)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ $outlet->name }}
                                    <span>
                                        <span class="badge badge-success badge-pill">Aktif</span>
                                    </span>
                                </li>
                            @endif
                            @endforeach
                            </ul>
                        </div>
                        <div class="form-group">
                            <h4>Bisnis</h4>
                            <ul class="list-group">
                            @foreach ($businesses as $business)
                            @if ($barber->business_id === $business->id)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $business->name }}
                                <span>
                                    <span class="badge badge-success badge-pill">Aktif</span>
                                </span>
                            </li>
                            @endif
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
