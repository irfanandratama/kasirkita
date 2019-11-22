@extends('layouts.app', ['pageSlug' => ''])

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Kasir {{Auth::user()->business->name}} &mdash; {{Auth::user()->name}}</h1>
            <div class="section-header-breadcrumb">
                <a href="" class="badge badge-light">{{Auth::user()->outlet->name}}</a>
            </div>
        </div>
        @include('alerts.notification')
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Produk</h4>
                    </div>
                    <hr>
                    <div class="card-body produk">
                        @foreach ($produk as $row)
                        <div class="item">
                            <label class="imagecheck mb-4 item">
                                @if ($row->stock == '0')
                                    <input name="imagecheck" type="hidden" value="{{ $row->product->id}}" productname="{{ $row->product->name}}" stock="{{ $row->stock}}" price="{{ $row->product->price}}" class="imagecheck-input"/>
                                    <figure class="imagecheck-figure">
                                        <img src="{{ asset('assets/img/product/' . $row->product['image']) }}" title="{{ $row->product->name }}" class="imagecheck-image">
                                    </figure>
                                    <div class="gradasi"></div>
                                    <div class="carousel-caption d-none d-md-block caption">
                                        <h6>{{ $row->product->name }}</h6>
                                        @if ($row->stock == '0')
                                            <label class="price" style="color:red;">Stock Kosong</label>
                                        @else
                                            <label class="price">Rp. {{ number_format($row->product['price'], 0, '.', '.')}}</label>
                                        @endif
                                    </div>
                                @else
                                    <input name="imagecheck" type="checkbox" value="{{ $row->product->id}}" productname="{{ $row->product->name}}" stock="{{ $row->stock}}" price="{{ $row->product->price}}" class="imagecheck-input"/>
                                    <figure class="imagecheck-figure">
                                        <img src="{{ asset('assets/img/product/' . $row->product['image']) }}" title="{{ $row->product->name }}" class="imagecheck-image">
                                    </figure>
                                    <div class="gradasi"></div>
                                    <div class="carousel-caption d-none d-md-block caption">
                                        <h6>{{ $row->product->name }}</h6>
                                        <label class="price">Rp. {{ number_format($row->product['price'], 0, '.', '.')}}</label>
                                    </div>
                                @endif
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-6 main-wrapper main-wrapper1">
                <div class="card row">
                    <form method="post" action="{{ route('cashier-transaction.invoice')}}" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                        <div class="card-header">
                            <h4>Keranjang</h4>
                            <input id="item"  type="text" name="item" class="form-control text-center col-sm-2" value="0" min="0" readonly>
                        </div>
                        <div class="card-body">
                            <div class="pl-lg-4">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-icon icon-left btn-success bayar">
                                        <i class="fas fa-check"></i> Pembayaran
                                    </button>
                                    <a class="btn btn-outline-secondary clear">Clear</a>
                                </div>
                            </div>
                            <hr>
                            <div class="keranjang"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
