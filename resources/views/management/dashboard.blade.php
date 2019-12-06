@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')
<div class="main-content">
    <section class="section">
        <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card card-statistic-2">
            <div class="card-stats">
                <div class="card-stats-title">Order Statistics - 
                <div class="dropdown d-inline">
                    <a class="font-weight-600 dropdown-toggle" data-toggle="dropdown" href="#" id="orders-month">August</a>
                    <ul class="dropdown-menu dropdown-menu-sm">
                    <li class="dropdown-title">Select Month</li>
                    <li><a href="#" class="dropdown-item">January</a></li>
                    <li><a href="#" class="dropdown-item">February</a></li>
                    <li><a href="#" class="dropdown-item">March</a></li>
                    <li><a href="#" class="dropdown-item">April</a></li>
                    <li><a href="#" class="dropdown-item">May</a></li>
                    <li><a href="#" class="dropdown-item">June</a></li>
                    <li><a href="#" class="dropdown-item">July</a></li>
                    <li><a href="#" class="dropdown-item active">August</a></li>
                    <li><a href="#" class="dropdown-item">September</a></li>
                    <li><a href="#" class="dropdown-item">October</a></li>
                    <li><a href="#" class="dropdown-item">November</a></li>
                    <li><a href="#" class="dropdown-item">December</a></li>
                    </ul>
                </div>
                </div>
                <div class="card-stats-items">
                <div class="card-stats-item">
                    <div class="card-stats-item-count">24</div>
                    <div class="card-stats-item-label">Pending</div>
                </div>
                <div class="card-stats-item">
                    <div class="card-stats-item-count">12</div>
                    <div class="card-stats-item-label">Shipping</div>
                </div>
                <div class="card-stats-item">
                    <div class="card-stats-item-count">23</div>
                    <div class="card-stats-item-label">Completed</div>
                </div>
                </div>
            </div>
            <div class="card-icon shadow-primary bg-primary">
                <i class="fas fa-archive"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                <h4>Total Orders</h4>
                </div>
                <div class="card-body">
                59
                </div>
            </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card card-statistic-2">
            <div class="card-chart">
                <canvas id="balance-chart" height="80"></canvas>
            </div>
            <div class="card-icon shadow-primary bg-primary">
                <i class="fas fa-dollar-sign"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                <h4>Pendapatan Hari Ini</h4>
                </div>
                <div class="card-body">
                Rp. {{ number_format($total, 0, '.', '.') }}
                </div>
            </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card card-statistic-2">
            <div class="card-chart">
                <canvas id="sales-chart" height="80"></canvas>
            </div>
            <div class="card-icon shadow-primary bg-primary">
                <i class="fas fa-shopping-bag"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                <h4>Sales</h4>
                </div>
                <div class="card-body">
                4,732
                </div>
            </div>
            </div>
        </div>
        </div>
        <div class="row">
        <div class="col-lg-8">
            <div class="card">
            <div class="card-header">
                <h4>Budget vs Sales</h4>
            </div>
            <div class="card-body">
                <canvas id="myChart" height="158"></canvas>
            </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card gradient-bottom">
            <div class="card-header">
                <h4>Top 5 Products</h4>
                <div class="card-header-action dropdown">
                <a href="#" data-toggle="dropdown" class="btn btn-danger dropdown-toggle">Month</a>
                <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                    <li class="dropdown-title">Select Period</li>
                    <li><a href="#" class="dropdown-item">Today</a></li>
                    <li><a href="#" class="dropdown-item">Week</a></li>
                    <li><a href="#" class="dropdown-item active">Month</a></li>
                    <li><a href="#" class="dropdown-item">This Year</a></li>
                </ul>
                </div>
            </div>
            <div class="card-body" id="top-5-scroll">
                <ul class="list-unstyled list-unstyled-border">
                <li class="media">
                    <img class="mr-3 rounded" width="55" src="{{ asset(config('admin_config.theme_name')) }}/assets/img/products/product-3-50.png" alt="product">
                    <div class="media-body">
                    <div class="float-right"><div class="font-weight-600 text-muted text-small">86 Sales</div></div>
                    <div class="media-title">oPhone S9 Limited</div>
                    <div class="mt-1">
                        <div class="budget-price">
                        <div class="budget-price-square bg-primary" data-width="64%"></div>
                        <div class="budget-price-label">$68,714</div>
                        </div>
                        <div class="budget-price">
                        <div class="budget-price-square bg-danger" data-width="43%"></div>
                        <div class="budget-price-label">$38,700</div>
                        </div>
                    </div>
                    </div>
                </li>
                <li class="media">
                    <img class="mr-3 rounded" width="55" src="{{ asset(config('admin_config.theme_name')) }}/assets/img/products/product-4-50.png" alt="product">
                    <div class="media-body">
                    <div class="float-right"><div class="font-weight-600 text-muted text-small">67 Sales</div></div>
                    <div class="media-title">iBook Pro 2018</div>
                    <div class="mt-1">
                        <div class="budget-price">
                        <div class="budget-price-square bg-primary" data-width="84%"></div>
                        <div class="budget-price-label">$107,133</div>
                        </div>
                        <div class="budget-price">
                        <div class="budget-price-square bg-danger" data-width="60%"></div>
                        <div class="budget-price-label">$91,455</div>
                        </div>
                    </div>
                    </div>
                </li>
                <li class="media">
                    <img class="mr-3 rounded" width="55" src="{{ asset(config('admin_config.theme_name')) }}/assets/img/products/product-1-50.png" alt="product">
                    <div class="media-body">
                    <div class="float-right"><div class="font-weight-600 text-muted text-small">63 Sales</div></div>
                    <div class="media-title">Headphone Blitz</div>
                    <div class="mt-1">
                        <div class="budget-price">
                        <div class="budget-price-square bg-primary" data-width="34%"></div>
                        <div class="budget-price-label">$3,717</div>
                        </div>
                        <div class="budget-price">
                        <div class="budget-price-square bg-danger" data-width="28%"></div>
                        <div class="budget-price-label">$2,835</div>
                        </div>
                    </div>
                    </div>
                </li>
                <li class="media">
                    <img class="mr-3 rounded" width="55" src="{{ asset(config('admin_config.theme_name')) }}/assets/img/products/product-3-50.png" alt="product">
                    <div class="media-body">
                    <div class="float-right"><div class="font-weight-600 text-muted text-small">28 Sales</div></div>
                    <div class="media-title">oPhone X Lite</div>
                    <div class="mt-1">
                        <div class="budget-price">
                        <div class="budget-price-square bg-primary" data-width="45%"></div>
                        <div class="budget-price-label">$13,972</div>
                        </div>
                        <div class="budget-price">
                        <div class="budget-price-square bg-danger" data-width="30%"></div>
                        <div class="budget-price-label">$9,660</div>
                        </div>
                    </div>
                    </div>
                </li>
                <li class="media">
                    <img class="mr-3 rounded" width="55" src="{{ asset(config('admin_config.theme_name')) }}/assets/img/products/product-5-50.png" alt="product">
                    <div class="media-body">
                    <div class="float-right"><div class="font-weight-600 text-muted text-small">19 Sales</div></div>
                    <div class="media-title">Old Camera</div>
                    <div class="mt-1">
                        <div class="budget-price">
                        <div class="budget-price-square bg-primary" data-width="35%"></div>
                        <div class="budget-price-label">$7,391</div>
                        </div>
                        <div class="budget-price">
                        <div class="budget-price-square bg-danger" data-width="28%"></div>
                        <div class="budget-price-label">$5,472</div>
                        </div>
                    </div>
                    </div>
                </li>
                </ul>
            </div>
            <div class="card-footer pt-3 d-flex justify-content-center">
                <div class="budget-price justify-content-center">
                <div class="budget-price-square bg-primary" data-width="20"></div>
                <div class="budget-price-label">Selling Price</div>
                </div>
                <div class="budget-price justify-content-center">
                <div class="budget-price-square bg-danger" data-width="20"></div>
                <div class="budget-price-label">Budget Price</div>
                </div>
            </div>
            </div>
        </div>
        </div>
        <div class="row">
        <div class="col-md-6">
            <div class="card">
            <div class="card-header">
                <h4>Best Products</h4>
            </div>
            <div class="card-body">
                <div class="owl-carousel owl-theme" id="products-carousel">
                <div>
                    <div class="product-item pb-3">
                    <div class="product-image">
                        <img alt="image" src="{{ asset(config('admin_config.theme_name')) }}/assets/img/products/product-4-50.png" class="img-fluid">
                    </div>
                    <div class="product-details">
                        <div class="product-name">iBook Pro 2018</div>
                        <div class="product-review">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        </div>
                        <div class="text-muted text-small">67 Sales</div>
                        <div class="product-cta">
                        <a href="#" class="btn btn-primary">Detail</a>
                        </div>
                    </div>  
                    </div>
                </div>
                <div>
                    <div class="product-item">
                    <div class="product-image">
                        <img alt="image" src="{{ asset(config('admin_config.theme_name')) }}/assets/img/products/product-3-50.png" class="img-fluid">
                    </div>
                    <div class="product-details">
                        <div class="product-name">oPhone S9 Limited</div>
                        <div class="product-review">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half"></i>
                        </div>
                        <div class="text-muted text-small">86 Sales</div>
                        <div class="product-cta">
                        <a href="#" class="btn btn-primary">Detail</a>
                        </div>
                    </div>  
                    </div>
                </div>
                <div>
                    <div class="product-item">
                    <div class="product-image">
                        <img alt="image" src="{{ asset(config('admin_config.theme_name')) }}/assets/img/products/product-1-50.png" class="img-fluid">
                    </div>
                    <div class="product-details">
                        <div class="product-name">Headphone Blitz</div>
                        <div class="product-review">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        </div>
                        <div class="text-muted text-small">63 Sales</div>
                        <div class="product-cta">
                        <a href="#" class="btn btn-primary">Detail</a>
                        </div>
                    </div>  
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
            <div class="card-header">
                <h4>Top Countries</h4>
            </div>
            <div class="card-body">
                <div class="row">
                <div class="col-sm-6">
                    <div class="text-title mb-2">July</div>
                    <ul class="list-unstyled list-unstyled-border list-unstyled-noborder mb-0">
                    <li class="media">
                        <img class="img-fluid mt-1 img-shadow" src="{{ asset(config('admin_config.theme_name')) }}/assets/modules/flag-icon-css/flags/4x3/id.svg" alt="image" width="40">
                        <div class="media-body ml-3">
                        <div class="media-title">Indonesia</div>
                        <div class="text-small text-muted">3,282 <i class="fas fa-caret-down text-danger"></i></div>
                        </div>
                    </li>
                    <li class="media">
                        <img class="img-fluid mt-1 img-shadow" src="{{ asset(config('admin_config.theme_name')) }}/assets/modules/flag-icon-css/flags/4x3/my.svg" alt="image" width="40">
                        <div class="media-body ml-3">
                        <div class="media-title">Malaysia</div>
                        <div class="text-small text-muted">2,976 <i class="fas fa-caret-down text-danger"></i></div>
                        </div>
                    </li>
                    <li class="media">
                        <img class="img-fluid mt-1 img-shadow" src="{{ asset(config('admin_config.theme_name')) }}/assets/modules/flag-icon-css/flags/4x3/us.svg" alt="image" width="40">
                        <div class="media-body ml-3">
                        <div class="media-title">United States</div>
                        <div class="text-small text-muted">1,576 <i class="fas fa-caret-up text-success"></i></div>
                        </div>
                    </li>
                    </ul>
                </div>
                <div class="col-sm-6 mt-sm-0 mt-4">
                    <div class="text-title mb-2">August</div>
                    <ul class="list-unstyled list-unstyled-border list-unstyled-noborder mb-0">
                    <li class="media">
                        <img class="img-fluid mt-1 img-shadow" src="{{ asset(config('admin_config.theme_name')) }}/assets/modules/flag-icon-css/flags/4x3/id.svg" alt="image" width="40">
                        <div class="media-body ml-3">
                        <div class="media-title">Indonesia</div>
                        <div class="text-small text-muted">3,486 <i class="fas fa-caret-up text-success"></i></div>
                        </div>
                    </li>
                    <li class="media">
                        <img class="img-fluid mt-1 img-shadow" src="{{ asset(config('admin_config.theme_name')) }}/assets/modules/flag-icon-css/flags/4x3/ps.svg" alt="image" width="40">
                        <div class="media-body ml-3">
                        <div class="media-title">Palestine</div>
                        <div class="text-small text-muted">3,182 <i class="fas fa-caret-up text-success"></i></div>
                        </div>
                    </li>
                    <li class="media">
                        <img class="img-fluid mt-1 img-shadow" src="{{ asset(config('admin_config.theme_name')) }}/assets/modules/flag-icon-css/flags/4x3/de.svg" alt="image" width="40">
                        <div class="media-body ml-3">
                        <div class="media-title">Germany</div>
                        <div class="text-small text-muted">2,317 <i class="fas fa-caret-down text-danger"></i></div>
                        </div>
                    </li>
                    </ul>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
        <div class="row">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">
                <h4>Invoices</h4>
                <div class="card-header-action">
                <a href="#" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive table-invoice">
                <table class="table table-striped">
                    <tr>
                    <th>Invoice ID</th>
                    <th>Customer</th>
                    <th>Status</th>
                    <th>Due Date</th>
                    <th>Action</th>
                    </tr>
                    <tr>
                    <td><a href="#">INV-87239</a></td>
                    <td class="font-weight-600">Kusnadi</td>
                    <td><div class="badge badge-warning">Unpaid</div></td>
                    <td>July 19, 2018</td>
                    <td>
                        <a href="#" class="btn btn-primary">Detail</a>
                    </td>
                    </tr>
                    <tr>
                    <td><a href="#">INV-48574</a></td>
                    <td class="font-weight-600">Hasan Basri</td>
                    <td><div class="badge badge-success">Paid</div></td>
                    <td>July 21, 2018</td>
                    <td>
                        <a href="#" class="btn btn-primary">Detail</a>
                    </td>
                    </tr>
                    <tr>
                    <td><a href="#">INV-76824</a></td>
                    <td class="font-weight-600">Muhamad Nuruzzaki</td>
                    <td><div class="badge badge-warning">Unpaid</div></td>
                    <td>July 22, 2018</td>
                    <td>
                        <a href="#" class="btn btn-primary">Detail</a>
                    </td>
                    </tr>
                    <tr>
                    <td><a href="#">INV-84990</a></td>
                    <td class="font-weight-600">Agung Ardiansyah</td>
                    <td><div class="badge badge-warning">Unpaid</div></td>
                    <td>July 22, 2018</td>
                    <td>
                        <a href="#" class="btn btn-primary">Detail</a>
                    </td>
                    </tr>
                    <tr>
                    <td><a href="#">INV-87320</a></td>
                    <td class="font-weight-600">Ardian Rahardiansyah</td>
                    <td><div class="badge badge-success">Paid</div></td>
                    <td>July 28, 2018</td>
                    <td>
                        <a href="#" class="btn btn-primary">Detail</a>
                    </td>
                    </tr>
                </table>
                </div>
            </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-hero">
            <div class="card-header">
                <div class="card-icon">
                <i class="far fa-question-circle"></i>
                </div>
                <h4>14</h4>
                <div class="card-description">Customers need help</div>
            </div>
            <div class="card-body p-0">
                <div class="tickets-list">
                <a href="#" class="ticket-item">
                    <div class="ticket-title">
                    <h4>My order hasn't arrived yet</h4>
                    </div>
                    <div class="ticket-info">
                    <div>Laila Tazkiah</div>
                    <div class="bullet"></div>
                    <div class="text-primary">1 min ago</div>
                    </div>
                </a>
                <a href="#" class="ticket-item">
                    <div class="ticket-title">
                    <h4>Please cancel my order</h4>
                    </div>
                    <div class="ticket-info">
                    <div>Rizal Fakhri</div>
                    <div class="bullet"></div>
                    <div>2 hours ago</div>
                    </div>
                </a>
                <a href="#" class="ticket-item">
                    <div class="ticket-title">
                    <h4>Do you see my mother?</h4>
                    </div>
                    <div class="ticket-info">
                    <div>Syahdan Ubaidillah</div>
                    <div class="bullet"></div>
                    <div>6 hours ago</div>
                    </div>
                </a>
                <a href="features-tickets.html" class="ticket-item ticket-more">
                    View All <i class="fas fa-chevron-right"></i>
                </a>
                </div>
            </div>
            </div>
        </div>
        </div>
    </section>
</div>
@endsection
@section('script')
    <script>
        "use strict";

        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["January", "February", "March", "April", "May", "June", "July", "August"],
            datasets: [{
            label: 'Sales',
            data: [3200, 1800, 4305, 3022, 6310, 5120, 5880, 6154],
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
            label: 'Budget',
            data: [2207, 3403, 2200, 5025, 2302, 4208, 3880, 4880],
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
                stepSize: 1500,
                callback: function(value, index, values) {
                    return '$' + value;
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