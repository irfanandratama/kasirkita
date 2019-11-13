@extends('layouts.app', ['pageSlug' => 'addProduct'])

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Produk</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Akun</a></div>
                <div class="breadcrumb-item"><a href="#">Produk</a></div>
                <div class="breadcrumb-item">Tambah Produk</div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Form Tambah Produk</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('management-product.store')}}" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            <div class="pl-lg-4">
                                <div class="form-group">
                                    <label>Nama Produk</label>
                                    <input name="name" type="text" placeholder="Nama Produk" class="form-control" required="" autofocus>
                                </div>
                                <div class="form-group">
                                    <label>Harga Produk (Rp.)</label>
                                    <input name="price" type="text" placeholder="Harga Produk" class="form-control uang" required="">
                                </div>
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <select class="form-control selectric" name='category_id' required="">
                                        <option disabled selected>Pilih Kategori Produk</option>
                                        @foreach ($kategori as $kategori)
                                        <option value={{$kategori->id}}>{{$kategori->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Foto Produk</label>
                                    <div id="image-preview" class="image-preview">
                                        <label for="image-upload" id="image-label">Choose File</label>
                                        <input class="form-control" type="file" name="image" id="image-upload" required="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Outlet</label>
                                    <select class="form-control selectric" name='outlet[]' required="" multiple="multiple">
                                        <option disabled>Pilih Outlet Produk</option>
                                        @foreach ($outlet as $cabang)
                                        <option value={{$cabang->id}}>{{$cabang->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="text-right">
                                    <button type="submit" class="btn btn-icon icon-left btn-success">
                                        <i class="fas fa-check"></i> Simpan
                                    </button>
                                    <a href="{{route('management-product.index')}}" class="btn btn-outline-secondary">Batal</a>
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
