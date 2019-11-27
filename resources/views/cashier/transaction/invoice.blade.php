@extends('layouts.app', ['pageSlug' => ''])

@section('content')
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Pembayaran</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Transaksi</a></div>
              <div class="breadcrumb-item">Pembayaran</div>
            </div>
          </div>

          <div class="section-body">
            <div class="invoice">
              <form action="{{route('cashier-transaction.store')}}" method="post">
                @csrf
                @method('post')
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
                              <p class="text-secondary mb-0"><i>(optional)</i></p>
                            </strong>
                            <input type="text" name="customer_name" class="form-control" placeholder="Customer Name">
                          </address>
                        </div>
                        <div class="col-md-6 text-md-right">
                          <address>
                            <strong>Order Date:</strong><br>
                            {{date('Y-m-d')}}<br><br>
                          </address>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <address>
                            <strong>Cashier :</strong>
                            <p>#{{Auth::user()->id}} | {{Auth::user()->name}}</p>
                          </address>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="row mt-4">
                    <div class="col-md-12">
                      <div class="section-title">Detail Pesanan</div>
                      <input type="hidden" name="item" value="{{$item}}">
                      <p class="section-lead">Semua item tidak bisa dihapus</p>
                      <div class="table-responsive" id="item">
                        <table class="table table-striped table-hover table-md">
                          <tr>
                            <th data-width="40">#</th>
                            <th class="text-center" data-width="40">ID</th>
                            <th>Item</th>
                            <th class="text-center">Harga</th>
                            <th class="text-center">Jumlah</th>
                            <th class="text-right">Total</th>
                          </tr>
                          @foreach ($products as $row)
                          <tr>
                            <td>{{$loop->iteration}}</td>
                            <td class="text-center">#{{$row->item['id']}}</td>
                            <input type="hidden" name="product_id[]" value="{{$row->item['id']}}">
                            <td>{{$row->item['name']}}</td>
                            <td class="text-center harga">Rp. {{ number_format($row->item['price'], 0, '.', '.')}}</td>
                            <td class="text-center qty">{{$row->qty}}</td>
                            <input type="hidden" name="qty[]" value="{{$row->qty}}">
                            <td class="text-right amount" value="{{$row->item['price']*$row->qty}}">Rp. {{ number_format($row->item['price']*$row->qty, 0, '.', '.')}}</td>
                            <input type="hidden" name="amount[]" value="{{$row->item['price']*$row->qty}}">
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
                            <div class="invoice-detail-value" id="total"></div>
                            <input id="totalInput" type="hidden" name="total">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              
                <hr>
                <div class="text-md-right">
                  <div class="float-lg-left mb-lg-0 mb-3">
                    <button type="submit" class="btn btn-primary btn-icon icon-left done"><i class="fas fa-check"></i> Selesai</button>
                  </div>
                  <a href="{{route('cashier-transaction.print')}}" target="_blank" class="btn btn-info btn-icon icon-left"><i class="fas fa-print"></i> Print</a>
                  <a href="{{ URL::previous() }}" class="btn btn-danger btn-icon icon-left cencel"><i class="fas fa-times"></i> Cancel</a>
                </div>
              </form>
            </div>
          </div>
        </section>
      </div>
@endsection
