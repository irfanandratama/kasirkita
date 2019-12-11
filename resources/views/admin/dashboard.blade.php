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
                    {{ number_format($transaksi->count(), 0, '.', '.') }} <label class="text-muted mb-2"><h6>Transaksi</h6></label>
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
                    <h4>Pengunjung Website Hari Ini</h4>
                    </div>
                    <div class="card-body">
                    {{ number_format($visit->count(), 0, '.', '.') }} <label class="text-muted mb-2"><h6>Pengunjung</h6></label>
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
                <h4>Bisnis Mendaftar Hari Ini</h4>
                </div>
                <div class="card-body">
                {{ number_format($business->count(), 0, '.', '.') }} <label class="text-muted mb-2"><h6>Bisnis</h6></label>
                </div>
            </div>
            </div>
        </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4>
                    Grafik Pengunjung dan Pendaftar
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
    </section>
</div>
@endsection
@section('script')
    <script>

    </script>
    <script>
        "use strict";

        var register = {{ json_encode($registerLog) }};
        var visit = {{ json_encode($visitLog) }};
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agust", 'Sept', 'Okt', 'Nov', 'Des'],
            datasets: [{
            label: 'Pengunjung',
            data: visit,
            borderWidth: 2,
            backgroundColor: 'rgba(63,82,227,.8)',
            borderWidth: 0,
            borderColor: 'transparent',
            pointBorderWidth: 0,
            pointRadius: 3.5,
            pointBackgroundColor: 'transparent',
            pointHoverBackgroundColor: 'rgba(63,82,227,.8)',
            },
            {
            label: 'Pendaftar',
            data: register,
            borderWidth: 2,
            backgroundColor: 'rgba(254,86,83,.7)',
            borderWidth: 0,
            borderColor: 'transparent',
            pointBorderWidth: 0 ,
            pointRadius: 3.5,
            pointBackgroundColor: 'transparent',
            pointHoverBackgroundColor: 'rgba(254,86,83,.8)',
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