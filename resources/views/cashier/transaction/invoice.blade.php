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
                        <div class="invoice-number">Order #{{ date('Ymd')  }}-{{ $todayTransaction + 1 }}</div>
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
                        <div class="col-md-6 text-md-right">
                          <address>
                            <strong>Barber :</strong><br>
                              <select class="form-control selectric" name='barber' required autofocus>
                                  <option selected disabled>Pilih Tukang Cukur</option>
                                  @foreach ($barber as $barb)
                                    <option value={{$barb->id}}>{{$barb->name}}</option>
                                  @endforeach
                              </select>
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
                  <a href="{{ URL::previous() }}" class="btn btn-danger btn-icon icon-left cencel"><i class="fas fa-times"></i> Cancel</a>
                </div>
              </form>
            </div>
          </div>
        </section>
      </div>
@endsection

{{-- @section('script')
<script src="{{ asset('assets/js/qz-tray.js') }}"></script>
<script>
// qz.websocket.connect().then(function() {
//   // alert("Connected!");
//   qz.printers.find().then(function(data) {
//       var list = '';
//       for(var i = 0; i < data.length; i++) {
//          list += "&nbsp; " + data[i] + "<br/>";
//      }
//      alert("<strong>Available printers:</strong><br/>" + list);
//   }).catch(function(e) { console.error(e); });
// });


qz.websocket.connect().then(function() { 
   return qz.printers.find("POS-E58");              // Pass the printer name into the next Promise
}).then(function(printer) {
  var config = qz.configs.create("POS-E58");

  var data = [
   '\x1B' + '\x40',          // init
   '\x1B' + '\x61' + '\x31', // center align
   'Beverly Hills, CA  90210' + '\x0A',
   '\x0A',                   // line break
   'www.qz.io' + '\x0A',     // text and line break
   '\x0A',                   // line break
   '\x0A',                   // line break
   'May 18, 2016 10:30 AM' + '\x0A',
   '\x0A',                   // line break
   '\x0A',                   // line break    
   '\x0A',
   'Transaction # 123456 Register: 3' + '\x0A',
   '\x0A',
   '\x0A',
   '\x0A',
   '\x1B' + '\x61' + '\x30', // left align
   'Baklava (Qty 4)       9.00' + '\x1B' + '\x74' + '\x13' + '\xAA', //print special char symbol after numeric
   '\x0A',
   'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX' + '\x0A',       
   '\x1B' + '\x45' + '\x0D', // bold on
   'Here\'s some bold text!',
   '\x1B' + '\x45' + '\x0A', // bold off
   '\x0A' + '\x0A',
   '\x1B' + '\x61' + '\x32', // right align
   '\x1B' + '\x21' + '\x30', // em mode on
   'DRINK ME',
   '\x1B' + '\x21' + '\x0A' + '\x1B' + '\x45' + '\x0A', // em mode off
   '\x0A' + '\x0A',
   '\x1B' + '\x61' + '\x30', // left align
   '------------------------------------------' + '\x0A',
   '\x1B' + '\x4D' + '\x31', // small text
   'EAT ME' + '\x0A',
   '\x1B' + '\x4D' + '\x30', // normal text
   '------------------------------------------' + '\x0A',
   'normal text',
   '\x1B' + '\x61' + '\x30', // left align
   '\x0A' + '\x0A' + '\x0A' + '\x0A' + '\x0A' + '\x0A' + '\x0A',
   '\x1B' + '\x69',          // cut paper (old syntax)
// '\x1D' + '\x56'  + '\x00' // full cut (new syntax)
// '\x1D' + '\x56'  + '\x30' // full cut (new syntax)
// '\x1D' + '\x56'  + '\x01' // partial cut (new syntax)
// '\x1D' + '\x56'  + '\x31' // partial cut (new syntax)
   '\x10' + '\x14' + '\x01' + '\x00' + '\x05',  // Generate Pulse to kick-out cash drawer**
                                                // **for legacy drawer cable CD-005A.  Research before using.
];

qz.print(config, data).catch(function(e) { console.error(e); });
}).catch(function(e) { console.error(e); });

</script>

@endsection --}}
