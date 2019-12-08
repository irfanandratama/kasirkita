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
                    {{ $transaksi->count() }} <label class="text-muted"><h6>Transaksi</h6></label>
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
                <label class="text-muted"><h6>{{ $transactionInMonth }} Transaksi</h6>
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
                    <div class="media-title">{{ $row->product->name }}</div>
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
                <div class="budget-price-label">Presentase penjualan dari total transaksi</div>
                </div>
            </div>
            </div>
        </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4>Riwayat Transaksi Hari Ini</h4>
                <div class="card-header-action">
                <a href="#" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a>
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
                        <td class="text-center"><div class="text-primary mb-2">{{ $row->id}}</div></td>
                        @if ($row->customer_name == '')
                            <td class="font-weight-600 text-secondary">Tanpa Nama</td>
                        @else
                            <td class="font-weight-600">{{ $row->customer_name }}</td>
                        @endif
                        
                        <td>{{ $row->outlet->name }}</td>
                        <td>{{ $row->created_at->format('H:i') }}</td>
                        <td>Rp. {{ number_format($row->total, 0, '.', '.')}}</td>
                        <td>
                            <a href="#" class="btn btn-primary">Detail</a>
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
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agust", 'Sept', 'Okt', 'Nov', 'Desr'],
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

        var balance_chart = document.getElementById("balance-chart").getContext('2d');

        var balance_chart_bg_color = balance_chart.createLinearGradient(0, 0, 0, 70);
        balance_chart_bg_color.addColorStop(0, 'rgba(63,82,227,.2)');
        balance_chart_bg_color.addColorStop(1, 'rgba(63,82,227,0)');

        var myChart = new Chart(balance_chart, {
        type: 'line',
        data: {
            labels: ['15 days ago', '14 days ago', '13 days ago', '12 days ago', '11 days ago', '10 days ago', '9 days ago', '8 days ago', '7 days ago', '6 days ago', '5 days ago', '4 days ago', '3 days ago', '2 days ago', 'yesterday', 'today'],
            datasets: [{
            label: 'Balance',
            data: [50, 61, 80, 50, 72, 52, 60, 41, 30, 45, 70, 40, 93, 63, 50, 62],
            backgroundColor: balance_chart_bg_color,
            borderWidth: 3,
            borderColor: 'rgba(63,82,227,1)',
            pointBorderWidth: 0,
            pointBorderColor: 'transparent',
            pointRadius: 3,
            pointBackgroundColor: 'transparent',
            pointHoverBackgroundColor: 'rgba(63,82,227,1)',
            }]
        },
        options: {
            layout: {
            padding: {
                bottom: -1,
                left: -1
            }
            },
            legend: {
            display: false
            },
            scales: {
            yAxes: [{
                gridLines: {
                display: false,
                drawBorder: false,
                },
                ticks: {
                beginAtZero: true,
                display: false
                }
            }],
            xAxes: [{
                gridLines: {
                drawBorder: false,
                display: false,
                },
                ticks: {
                display: false
                }
            }]
            },
        }
        });

        var sales_chart = document.getElementById("sales-chart").getContext('2d');

        var sales_chart_bg_color = sales_chart.createLinearGradient(0, 0, 0, 80);
        balance_chart_bg_color.addColorStop(0, 'rgba(63,82,227,.2)');
        balance_chart_bg_color.addColorStop(1, 'rgba(63,82,227,0)');

        var myChart = new Chart(sales_chart, {
        type: 'line',
        data: {
            labels: ['16-07-2018', '17-07-2018', '18-07-2018', '19-07-2018', '20-07-2018', '21-07-2018', '22-07-2018', '23-07-2018', '24-07-2018', '25-07-2018', '26-07-2018', '27-07-2018', '28-07-2018', '29-07-2018', '30-07-2018', '31-07-2018'],
            datasets: [{
            label: 'Sales',
            data: [70, 62, 44, 40, 21, 63, 82, 52, 50, 31, 70, 50, 91, 63, 51, 60],
            borderWidth: 2,
            backgroundColor: balance_chart_bg_color,
            borderWidth: 3,
            borderColor: 'rgba(63,82,227,1)',
            pointBorderWidth: 0,
            pointBorderColor: 'transparent',
            pointRadius: 3,
            pointBackgroundColor: 'transparent',
            pointHoverBackgroundColor: 'rgba(63,82,227,1)',
            }]
        },
        options: {
            layout: {
            padding: {
                bottom: -1,
                left: -1
            }
            },
            legend: {
            display: false
            },
            scales: {
            yAxes: [{
                gridLines: {
                display: false,
                drawBorder: false,
                },
                ticks: {
                beginAtZero: true,
                display: false
                }
            }],
            xAxes: [{
                gridLines: {
                drawBorder: false,
                display: false,
                },
                ticks: {
                display: false
                }
            }]
            },
        }
        });

        $("#products-carousel").owlCarousel({
        items: 3,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 5000,
        loop: true,
        responsive: {
            0: {
            items: 2
            },
            768: {
            items: 2
            },
            1200: {
            items: 3
            }
        }
        });

    </script>
@endsection