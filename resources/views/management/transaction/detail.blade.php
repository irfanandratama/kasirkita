@extends('layouts.app', ['pageSlug' => ''])

@section('content')
<div class="main-content">
        <section class="section">
            `<div class="section-header">
                <h1>Detail Transaction #{{ $transaction->id}}</h1>
            </div>

            <div class="section-body">
                <div class="invoice">
                    <div class="invoice-print">
                    <div class="row">
                        <div class="col-lg-12">
                        <div class="invoice-title">
                            <h2>{{Auth::user()->business->name}}</h2>
                            <div class="invoice-number">Order #12345</div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                            <address>
                                <strong >
                                Customer
                                @if ( $transaction->name == '')
                                    <p class="font-weight-600 text-secondary">Tanpa Nama</p>
                                @else
                                    <p class="font-weight-600">{{ $transaction->name }}</p>
                                @endif
                                </strong>
                            </address>
                            </div>
                            <div class="col-md-6 text-md-right">
                            <address>
                                <strong>Order Date:</strong><br>
                                {{ $transaction->created_at->format('d/m/Y H:i') }}<br><br>
                            </address>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                            <address>
                                <strong>Cashier :</strong>
                                <p>#{{ $transaction->cashier->name}} | {{ $transaction->cashier_id }}</p>
                            </address>
                            </div>
                        </div>
                        </div>
                    </div>
                    
                    <div class="row mt-4">
                        <div class="col-md-12">
                        <div class="section-title">Detail Pesanan</div>
                        <p class="section-lead">Semua item tidak bisa dihapus</p>
                        <div class="table-responsive" id="item">
                            <table class="table table-striped table-hover table-md">
                            <tr>
                                <th data-width="40">#</th>
                                <th>Item</th>
                                <th class="text-center">Harga</th>
                                <th class="text-center">Jumlah</th>
                                <th class="text-right">Total</th>
                            </tr>
                            @foreach ($detail as $row)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$row->product->name}}</td>
                                <td class="text-center">Rp. {{ number_format($row->product->price, 0, '.', '.')}}</td>
                                <td class="text-center">{{$row->qty}}</td>
                                <td class="text-right" value="{{$row->product->price*$row->qty}}">Rp. {{ number_format($row->amount, 0, '.', '.')}}</td>
                            </tr>
                            @endforeach 
                            </table>
                        </div>
                        <div class="row mt-4">
                            <div class="col-lg-8">
                            </div>
                            <div class="col-lg-4 text-right">
                            <div class="invoice-detail-item y">
                                <div class="invoice-detail-name">Total</div>
                                <div class="invoice-detail-value">Rp. {{ number_format($transaction->total, 0, '.', '.')}}</div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                
                    <hr>
                    <div class="text-md-right">
                    <a href="{{ URL::previous() }}" class="btn btn-danger btn-icon icon-left"><i class="fas fa-arrow-left"></i> Back</a>
                    </div>
                </div>
            </div>`
        </section>
    </div>
@endsection
