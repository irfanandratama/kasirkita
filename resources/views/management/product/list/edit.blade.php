@extends('layouts.app', ['pageSlug' => 'listProduct'])

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Produk</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Akun</a></div>
                <div class="breadcrumb-item"><a href="#">Produk</a></div>
                <div class="breadcrumb-item">Daftar Produk</div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Ubah Data Produk</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('management-product.update', $product->id)}}" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            @method ('put')
                            <div class="pl-lg-4">
                                <div class="form-group">
                                    <label>Nama Produk</label>
                                    <input name="name" type="text" value="{{$product->name}}" class="form-control" required="">
                                </div>
                                <div class="form-group">
                                    <label>Harga Produk (Rp.)</label>
                                    <input name="price" type="text" value="{{$product->price}}" class="form-control uang" required="">
                                </div>
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <select class="form-control selectric" name='category_id' required="">
                                        <option>Pilih Kategori Produk</option>
                                        @foreach ($kategori as $kategori)
                                        <option value={{$kategori->id}} {{ $kategori->id == $product->category_id ? 'selected' : '' }}>{{$kategori->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Foto Produk</label>
                                    <div id="image-preview" class="image-preview" style="background-image:url({{ asset('assets/img/product/' . $product->image) }}); background-size: cover; background-position: center center;">
                                        <label for="image-upload" id="image-label">Choose File</label>
                                        <input class="form-control" type="file" name="image" id="image-upload">
                                    </div>
                                </div>

                                <div class="text-right">
                                    <button type="submit" class="btn btn-icon icon-left btn-success">
                                        <i class="fas fa-check"></i> Simpan
                                    </button>
                                    <a href="{{ URL::previous() }}" class="btn btn-outline-secondary">Batal</a>
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
