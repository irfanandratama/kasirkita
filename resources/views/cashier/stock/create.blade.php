@extends('layouts.app', ['pageSlug' => 'addActivity'])

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Aktifitas Stok</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Kasir</a></div>
                <div class="breadcrumb-item"><a href="#">Produk</a></div>
                <div class="breadcrumb-item">Tambah Aktifitas Stok</div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Form Tambah Aktifitas Stok</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('cashier-stock.store')}}" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            @method('post')
                            <div class="pl-lg-4">
                                <div class="form-group">
                                    <label>Produk
                                            <span class="text-danger" data-toggle="tooltip" data-placement="right" title="Tidak boleh kosong ya...">*</span>
                                    </label>
                                    <select class="form-control selectric" name='product_id' required="">
                                        <option selected disabled>Pilih Produk</option>
                                        @foreach ($details as $detail)
                                            @if ($detail->product->category->name !== 'Jasa')
                                                <option value="{{$detail->product['id']}}">{{$detail->product['name']}}</option>
                                            @endif
                                            
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label>Jenis Aktifitas
                                            <span class="text-danger" data-toggle="tooltip" data-placement="right" title="Tidak boleh kosong ya...">*</span>
                                    </label>
                                    <select class="form-control selectric" name='type' required="">
                                        <option selected disabled>Pilih Jenis Aktifitas</option>
                                        <option value="masuk">Stok Masuk</option>
                                        <option value="keluar">Stok Keluar</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Kuantitas
                                            <span class="text-danger" data-toggle="tooltip" data-placement="right" title="Tidak boleh kosong ya...">*</span>
                                    </label>
                                    <input name="quantity" type="text" placeholder="Kuantitas Produk" class="form-control" required="">
                                </div>

                                <div class="form-group">
                                    <label>Keterangan
                                            <span class="text-danger" data-toggle="tooltip" data-placement="right" title="Tidak boleh kosong ya...">*</span>
                                    </label>
                                    <textarea class="form-control" name="note" required=""></textarea>
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
