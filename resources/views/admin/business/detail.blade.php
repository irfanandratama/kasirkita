@extends('layouts.app', ['pageSlug' => 'business'])

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Kasir - {{$business->name}}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Akun</a></div>
                <div class="breadcrumb-item"><a href="#">Bisnis</a></div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Bisnis</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <h4>Bisnis</h4>
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <h5>{{$business->name}}</h5>
                                </li>
                            </ul>
                        </div>
                        <div class="form-group">
                            <h4>Toko</h4>
                            <ul class="list-group">
                            @foreach ($businessTypes as $businessType)
                            @if ($business->business_type_id == $businessType->id)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ $businessType->name }}
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
