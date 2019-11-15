@extends('layouts.app', ['pageSlug' => 'listProduct'])

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Daftar Produk</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Management</a></div>
                <div class="breadcrumb-item"><a href="#">Produk</a></div>
                <div class="breadcrumb-item">Daftar Produk</div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    <h4>Data Produk</h4>
                    </div>
                    <div class="col-12 text-right">
                        <a href="{{route('management-product.create')}}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> <span>Tambah Produk</span></a>
                    </div>
                    <div class="card-body">
                    @include('alerts.notification')
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                        <thead>                                 
                            <tr>
                            <th class="text-center">
                                #
                            </th>
                            <th>Nama Produk</th>
                            <th>Foto</th>
                            <th>Harga</th>
                            <th>Kategori</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($produk as $row)                              
                            <tr>
                                <td class="text-center">{{$loop->iteration}}</td>
                                <td>{{$row->name}}</td>
                                <td>
                                    <div class="gallery gallery-md">
                                        <div class="gallery-item" data-image="{{ asset('assets/img/product/' . $row->image) }}" data-title="{{$row->name}}"></div>
                                    </div>
                                    
                                </td>
                                <td>Rp. {{ number_format($row->price, 0, '.', '.')}}</td>
                                <td>
                                @if ($row->category_id == '0')
                                    <div class="text-secondary mb-2">Tidak Berkategori</div>
                                @else
                                    <div class="text-primary mb-2">{{$row->category['name']}}</div>
                                @endif
                                </td>
                                <td>
                                    <form action="{{route('management-product.delete', $row->id)}}" method="post" id="delete">
                                        @csrf
                                        @method('delete')
                                        <a href="{{route('management-product.detail', $row->id)}}" class="btn btn-icon btn-info"><i class="fas fa-edit"></i> Detail</a>
                                        <button type="submit" class="btn btn-icon btn-danger icon-left">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
