@extends('layouts.app', ['pageSlug' => 'listCategory'])

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Kategori Produk</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Management</a></div>
                <div class="breadcrumb-item"><a href="#">Produk</a></div>
                <div class="breadcrumb-item">Kategori Produk</div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    <h4>Data Produk</h4>
                    </div>
                    <div class="col-12 text-right">
                        <a href="{{route('management-category-product.create')}}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> <span>Tambah Kategori</span></a>
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
                            <th>Nama Kategori</th>
                            <th>Tanggal Dibuat</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($category_product as $row)                                 
                            <tr>
                            <td class="text-center">{{$loop->iteration}}</td>
                            <td>{{$row->name}}</td>
                            <td>{{ $row->created_at->format('d/m/Y H:i') }}</td>
                            <td>
                                <form action="{{route('management-category-product.delete', $row->id)}}" method="post">
                                    @csrf
                                    @method('delete')

                                    <a href="{{route('management-category-product.edit', $row->id)}}" class="btn btn-icon btn-primary"><i class="fas fa-edit"></i> Ubah</a>
                                    <button type="submit" class="btn btn-icon btn-danger icon-left"></i> Hapus
                                    </button>
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
