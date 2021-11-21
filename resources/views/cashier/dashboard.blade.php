@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')
<div class="main-content">
    <section class="section">
        <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card card-statistic-2">
            <div class="card-icon shadow-primary bg-primary">
                <i class="fas fa-store"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                <h4>Kasir {{Auth::user()->business->name ? Auth::user()->business->name : '' }} - {{Auth::user()->outlet->name ? Auth::user()->outlet->name : ''}}</h4>
                </div>
                <div class="card-body">
                {{Auth::user()->name ? Auth::user()->name : ''}}
                </div>
            </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card card-statistic-2">
            <div class="card-icon shadow-primary bg-primary">
                <i class="fas fa-shopping-bag"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                <h4>Transaksi Hari Ini</h4>
                </div>
                <div class="card-body">
                {{ $transaksi->count() }} <label class="text-muted mb-2"><h6>Transaksi</h6></label>
                </div>
            </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card card-statistic-2">
            <div class="card-icon shadow-primary bg-primary">
                <i class="fas fa-dollar-sign"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                <h4>Pendapatan Hari Ini</h4>
                </div>
                <div class="card-body">
                Rp. {{ number_format($totalToday, 0, '.', '.') }}
                </div>
            </div>
            </div>
        </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4>Riwayat Transaksi Hari Ini</h4>
                <div class="card-header-action">
                <a href="{{route('cashier-history.index')}}" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive table-invoice">
                    <table class="table table-striped">
                        <tr>
                            <th class="text-center">ID Transaksi</th>
                            <th>Customer</th>
                            <th>Time</th>
                            <th>Total Pembayaran</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($transaksi as $row)
                        <tr>
                            <td class="text-center"><div class="text-primary mb-2">{{ $row->id }}</div></td>
                            @if ($row->customer_name == '')
                                <td class="font-weight-600 text-secondary">Tanpa Nama</td>
                            @else
                                <td class="font-weight-600">{{ $row->customer_name }}</td>
                            @endif
                            <td>{{ $row->created_at->format('H:i') }}</td>
                            <td>Rp. {{ number_format($row->total, 0, '.', '.')}}</td>
                            <td>
                                <a href="{{ route('cashier-history.detail', $row->id) }}" class="btn btn-primary">Detail</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    @if( $transaksi->isEmpty())
                    <div class="text-center"><label class="text-danger mb-2">&mdash; Belum ada transaksi hari ini &mdash;</label></div>                    
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
