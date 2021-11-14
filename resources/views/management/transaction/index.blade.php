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

        <div class="accordion" id="accordion-filter">
            <div class="card">
                <div class="card-header collapsed" id="heading" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <div class="col-12 row">
                        <div class="col-6"><h4>Filter Pencarian</h4></div>
                        <div class="col-6 text-right"><i class="fa" aria-hidden="true"></i></div>
                    </div>
                    
                </div>
                <div class="collapse" id="collapseOne" aria-labelledby="headingOne" data-parent="#accordion-filter">
                    <div class="card-body">
                        <div class="col-12 row">
                            <form class="form col-12" method="POST" action="{{ route('management-transaction.filter') }}">
                                @csrf
                                <div class="form-group mb-5 row">
                                    <div class="col-md-4">
                                        <label>Tanggal dari</label>
                                        <input type="date" class="form-control" id="date-from" name="date-from" placeholder="Cari dari tanggal" autocomplete="off">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Tanggal sampai</label>
                                        <input type="date" class="form-control" id="date-to" name="date-to" placeholder="" autocomplete="off">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Nama Tukang Cukur</label>
                                        <select class="form-control selectric" name='barber_id' required="">
                                            <option disabled selected>Pilih Tukang Cukur</option>
                                            @foreach ($barber as $barber)
                                                <option value={{$barber->id}}>{{$barber->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="search" class="btn btn-icon icon-left btn-primary">
                                        <i class="fas fa-search"></i> Cari
                                    </button>
                                    <button type="submit" name="excel" class="btn btn-icon icon-left btn-success">
                                        <i class="fas fa-file-excel"></i> Unduh Excel
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
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
                            <th>Barber</th>
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
                                {{-- <td class="font-weight-600">{{ $row->barber->name }}</td> --}}
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
                        <div class="col-12 text-center"><h3>Total Pendapatan: {{ $sumIncome }}</h3></div>
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
