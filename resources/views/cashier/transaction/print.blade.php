<!DOCTYPE html>
<html>
<head>
    <!-- <link rel="stylesheet" href="{{ asset(config('admin_config.theme_name')) }}/assets/css/struk.css"> -->
    <link rel="stylesheet" href="{{ ltrim(elixir('stisla/assets/css/struk.css'), '/') }}">
    <link rel="stylesheet" href="{{ ltrim(elixir('stisla/assets/modules/bootstrap/css/bootstrap.min.css'), '/') }}">
</head>
<body>
    <div class="container invoice">
        <div class="col-md-12 col-xs-12 invoice-body">
            <div class="title"></div>
            <div class="text-wrapper clearfix">
                <ul>
                    <div class="block col-sm-12 col-xs-12 text-center company-detail">
                        <li>
                            <span class="company-name" style="font-size: 20px"><b>{{$outlet->name}}</b></span><br>
                            <span class="company-address">{{$outlet->address}}</span><br>
                        </li>
                    </div>
                    <div class="invoice-to">
                        <div class="block col-sm-12 col-xs-12">
                            <li>Kasir : {{$cashier->name}} - {{$cashier->id}}</li>
                        </div>
                        <div class="block col-sm-12 col-xs-12">
                            <li class="invoice-date">Dicetak pada: {{date('Y-m-d')}}</li>
                        </div>
                    </div>

                    <hr>

                    <div class="block col-sm-12 col-xs-12">
                        <table class="table table-striped table-hover table-md">
                            <tr>
                            <th data-width="40">#</th>
                            <th>Item</th>
                            <th class="text-center">Harga</th>
                            <th class="text-center">Jumlah</th>
                            <th class="text-right">Total</th>
                            </tr>
                            @foreach ($products as $row)
                            <tr>
                            <td>{{$loop->iteration}}</td>
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

                    <hr>

                    <div class="block col-xs-6 total text-right">
                        <li class="col-sm-9 col-xs-3" style="padding-left: 50px"><b>TOTAL BELANJA</b></li>
                        <li class="col-xs-6"><b>Rp. {{ number_format($total, 0, '.', '.')}}</b></li>
                    </div>

                    <hr>
                    <div class="block col-sm-12 col-xs-12">
                        <li class="notices">
                            NOTICE : <br> Barang yang sudah dibeli tidak dapat tukarkan kembali.
                        </li>
                    </div>
                    <div class="block col-sm-12 col-xs-12 text-center note-invoice">
                        Terima Kasih
                    </div>
                    <div class="invoice-footer col-md-12 col-xs-12"><strong id="get-watermark">Powered by KasirQ</strong></div>=
                </ul>
            </div>
        </div>
    </div>
    <script src="{{ ltrim(elixir('/assets/js/custom.js'), '/') }}"></script>
</body></html>