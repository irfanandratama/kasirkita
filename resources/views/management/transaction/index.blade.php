@extends('layouts.app', ['pageSlug' => ''])

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Riwayat Transaksi</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Management</a></div>
                <div class="breadcrumb-item">Riwayat Transaksi</div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    <h4>Data Transaksi</h4>
                    </div>
                    <div class="card-body">
                    @include('alerts.notification')
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                        <thead>                                 
                            <tr>
                            <th class="text-center">
                                ID Transaksi
                            </th>
                            <th>Customer</th>
                            <th class="text-center">Outlet</th>
                            <th>Waktu</th>
                            <th>Total Pembayaran</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($transaction as $row)                                 
                            <tr>
                                <td class="text-center"><div class="text-primary mb-2">{{ $row->id}}</div></td>
                                @if ($row->customer_name == '')
                                    <td class="font-weight-600 text-secondary">Tanpa Nama</td>
                                @else
                                    <td class="font-weight-600">{{ $row->customer_name }}</td>
                                @endif
                                
                                <td class="text-center">
                                    <a href="{{ route('management-outlet.detail', $row->outlet_id) }}" class="text-primary">{{ $row->outlet->name }}</a>
                                </td>
                                <td>{{ $row->created_at->format('Y-M-d H:i') }}</td>
                                <td>Rp. {{ number_format($row->total, 0, '.', '.')}}</td>
                                <td>
                                    <a href="{{ route('management-transaction.detail', $row->id) }}" class="btn btn-primary">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        </table>
                        <nav class="mt-4" aria-label="navigation">
                            {{$transaction->links()}}
                        </nav>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
