@extends('layouts.app', ['pageSlug' => 'addCategory'])

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Kategori Produk</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Produk</a></div>
                <div class="breadcrumb-item"><a href="#">Kategori Produk</a></div>
                <div class="breadcrumb-item">Tambah Kategori</div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Form Tambah Kategori</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('management-category-product.store')}}" autocomplete="off">
                            @csrf
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">Nama Kategori</label>
                                    <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name') }}" required autofocus>
                                    @include('alerts.feedback', ['field' => 'name'])
                                </div>

                                <div class="text-right">
                                    <button type="submit" class="btn btn-icon icon-left btn-success">
                                        <i class="fas fa-check"></i> Simpan
                                    </button>
                                    <a href="{{route('management-category-product.index')}}" class="btn btn-outline-secondary">Batal</a>
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
