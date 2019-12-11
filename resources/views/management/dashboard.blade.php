@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')
<div class="main-content">
    <section class="section">
        <div class="row">
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
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card card-statistic-2">
            <div class="card-icon shadow-primary bg-primary">
                <i class="fas fa-dollar-sign"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                <h4>Pendapatan Bulan ini</h4>
                </div>
                <div class="card-body">
                Rp. {{ number_format($totalMonth, 0, '.', '.') }}
                </div>
                <p class="text-muted text-sm"><small>{{ $transactionInMonth }} Transaksi</small></p>
            </div>
            </div>
        </div>
        </div>
        <div class="row">
        <div class="col-lg-8">
            <div class="card">
            <div class="card-header">
                <h4>
                    Grafik Jumlah Transaksi Seluruh Outlet
                    <span>
                        <select class="form-control selectric">
                            <option disabled>Pilih Periode</option>
                            <option value="{{ $year }}" selected>Tahun {{ $year }}</option>
                            <option value="{{ $year-1 }}">Tahun {{ $year-1 }}</option>
                            <option value="{{ $year-2 }}">Tahun {{ $year-2 }}</option>
                            <option value="{{ $year-3 }}">Tahun {{ $year-3 }}</option>
                        </select>
                    </span>
                </h4>
            </div>
            <div class="card-body">
                <canvas id="myChart" height="158"></canvas>
            </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card gradient-bottom">
            <div class="card-header">
                <h4>Top 5 Product {{ $year }}</h4>
            </div>
            <div class="card-body" id="top-5-scroll">
                <ul class="list-unstyled list-unstyled-border">
                @foreach ($topProduct as $row)
                <li class="media">
                    <img class="mr-3 rounded" width="55" src="{{ asset('assets/img/product/' . $row->product->image) }}" alt="{{ $row->name }}">
                    <div class="media-body">
                    <div class="float-right"><div class="font-weight-600 text-muted text-small">{{ $row->qty }} Stok Terjual</div></div>
                    <div class="media-title"><a href="{{ route('management-product.detail', $row->product_id) }}">{{ $row->product->name }}</a></div>
                    <div class="mt-1">
                        <div class="budget-price">
                        <div class="budget-price-square bg-primary" data-width="{{ $row->cnt/$transactionInYear*100 }}%"></div>
                        <div class="budget-price-label">{{ number_format($row->cnt/$transactionInYear*100) }}%</div>
                        </div>
                        <div class="budget-price">
                        <div class="budget-price-label">{{ $row->cnt }} Transaksi</div>
                        </div>
                    </div>
                    </div>
                </li>
                @endforeach
                </ul>
            </div>
            <div class="card-footer pt-3 d-flex justify-content-center">
                <div class="budget-price justify-content-center">
                    <div class="budget-price-square bg-primary" data-width="20"></div>
                    <div class="budget-price-label">Presentase transaksi</div>
                </div>
            </div>
            </div>
        </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4>Riwayat Transaksi Hari Ini</h4>
                <div class="card-header-action">
                <a href="{{route('management-transaction.index')}}" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive table-invoice">
                <table class="table table-striped">
                    <tr>
                        <th class="text-center">ID Transaksi</th>
                        <th>Customer</th>
                        <th>Outlet</th>
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
                        
                        <td>{{ $row->outlet->name }}</td>
                        <td>{{ $row->created_at->format('H:i') }}</td>
                        <td>Rp. {{ number_format($row->total, 0, '.', '.')}}</td>
                        <td>
                            <a href="{{ route('management-transaction.detail', $row->id) }}" class="btn btn-primary">Detail</a>
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
    </section>
</div>
@endsection
@section('script')
    <script>

    </script>
    <script>
        "use strict";

        var transaksi = {{ json_encode($transactionRecord) }};
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agust", 'Sept', 'Okt', 'Nov', 'Des'],
            datasets: [{
            label: 'Transaksi',
            data: transaksi,
            borderWidth: 2,
            backgroundColor: 'rgba(63,82,227,.8)',
            borderWidth: 0,
            borderColor: 'transparent',
            pointBorderWidth: 0,
            pointRadius: 3.5,
            pointBackgroundColor: 'transparent',
            pointHoverBackgroundColor: 'rgba(63,82,227,.8)',
            }]
        },
        options: {
            legend: {
            display: false
            },
            scales: {
            yAxes: [{
                gridLines: {
                // display: false,
                drawBorder: false,
                color: '#f2f2f2',
                },
                ticks: {
                beginAtZero: true,
                stepSize: 20,
                callback: function(value, index, values) {
                    return '' + value;
                }
                }
            }],
            xAxes: [{
                gridLines: {
                display: false,
                tickMarkLength: 15,
                }
            }]
            },
        }
        });

    </script>
@endsection