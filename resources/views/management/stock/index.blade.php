@extends('layouts.app', ['pageSlug' => 'stockHistory'])

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Riwayat Stok</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Kasir</a></div>
                <div class="breadcrumb-item"><a href="#">Produk</a></div>
                <div class="breadcrumb-item">Riwayat Stok</div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    <h4>Data Produk</h4>
                    </div>
                    <div class="col-12 text-right">
                        <a href="{{route('management-stock.create')}}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> <span>Tambah Aktifitas</span></a>
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
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>Produk</th>
                            <th>Jenis</th>
                            <th>Kuantitas</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($history as $row)                        
                            <tr>
                                <td class="text-center">{{$loop->iteration}}</td>
                                <td>{{ $row->created_at->format('d/m/Y') }}</td>
                                <td>{{ $row->created_at->format('H:i') }}</td>
                                <td>{{$row->product->name}}</td>
                                <td>
                                    @if ($row->type == 'masuk')
                                    <div class="badge badge-success">{{$row->type}}</div>
                                    @else
                                    <div class="badge badge-danger">{{$row->type}}</div>
                                    @endif
                                </td>
                                <td>{{$row->quantity}}</td>
                                <td>
                                    <a href="{{route('management-stock.detail', $row->id)}}" class="btn btn-icon btn-info"><i class="fas fa-edit"></i> Detail</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        </table>
                        <nav class="mt-4" aria-label="navigation">
                            {{$history->links()}}
                        </nav>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
