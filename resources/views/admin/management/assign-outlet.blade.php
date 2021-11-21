@extends('layouts.app', ['pageSlug' => 'assignOutletManagement'])

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Manajemen - {{$management->name}}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Akun</a></div>
                <div class="breadcrumb-item"><a href="#">Manajemen</a></div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Form Assign Outlet Manajemen</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('admin-management.assign-new', $management->id)}}" autocomplete="off">
                            @csrf
                            <div class="pl-lg-4">
                                <div class="form-group row align-items-center">
                                    <label class="form-control-label col-sm-3 text-md-right">Nama Manajemen :</label>
                                    <div class="col-sm-6 col-md-9">
                                        <h5>{{$management->name}}</h5>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="site-description" class="form-control-label col-sm-3 text-md-right">Bisnis : </label>
                                    <ul class="list-group">
                                    @foreach ($businesses as $business)
                                    @if ($management->business_id === $business->id)
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
                                <div class="form-group">
                                    <label>Outlet
                                            <span class="text-danger" data-toggle="tooltip" data-placement="right" title="Tidak boleh kosong ya...">*</span>
                                    </label>
                                    <select class="form-control selectric" name='outlet_id' required="" autofocus>
                                        <option selected disabled>Pilih Outlet Kasir</option>
                                        @foreach ($outlet as $cabang)
                                        <option value={{$cabang->id}}>{{$cabang->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-icon icon-left btn-success">
                                        <i class="fas fa-check"></i> Kirim
                                    </button>
                                    <a href="{{route('admin-management.index')}}" class="btn btn-outline-secondary">Batal</a>
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
