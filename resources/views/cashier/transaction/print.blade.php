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
                    <div class="block  col-xs-12 text-center company-detail">
                        <li>
                            <span class="company-name" style="font-size: 20px"><b>NAMA USAHA</b></span><br>
                            <span class="company-address">Jl. Sana Sini 79 Jember</span><br>
                            <span class="company-phone">(123) 456-789</span><br>
                            <span class="company-email">namausaha@gmail.com</span>
                        </li>
                    </div>
                    <div class="invoice-to">
                        <div class="block  col-xs-12">
                            <li>Kasir :</li>
                        </div>
                        <div class="block  col-xs-12">
                            <li class="invoice-cashier">Nama Kasir</li>
                        </div>
                        <div class="block  col-xs-12">
                            <li class="invoice-id" style="font-size: 16px"><b>ORDER 1234</b></li>
                        </div>
                        <div class="block  col-xs-12">
                            <li class="invoice-date">Dicetak pada: 01/10/2018 15:30 WIB</li>
                        </div>
                    </div>

                    <hr>

                    <div class="block  col-xs-12">
                        <li class="col-sm-1 col-xs-1 no-padding">1</li>
                        <li class="col-sm-8 col-xs-8 no-padding">Item 1</li>
                        <li class="col-sm-3 col-xs-3 text-right">6,000</li>
                    </div>

                    <div class="block  col-xs-12">
                        <li class="col-sm-1 col-xs-1 no-padding">5</li>
                        <li class="col-sm-8 col-xs-8 no-padding">Item 2</li>
                        <li class="col-sm-3 col-xs-3 text-right">150,000</li>
                    </div>

                    <div class="block  col-xs-12">
                        <li class="col-sm-1 col-xs-1 no-padding">4</li>
                        <li class="col-sm-8 col-xs-8 no-padding">Item 3</li>
                        <li class="col-sm-3 col-xs-3 text-right">80,000</li>
                    </div>

                    <div class="block  col-xs-12">
                        <li class="col-sm-1 col-xs-1 no-padding">2</li>
                        <li class="col-sm-8 col-xs-8 no-padding">Item 4</li>
                        <li class="col-sm-3 col-xs-3 text-right">80,000</li>
                    </div>

                    <hr>

                    <div class="block  col-xs-12">
                        <li class=" col-xs-12" style="padding-left: 150px">SUBTOTAL</li>
                        <li class="col-sm-3 col-xs-3">306,000</li>
                    </div>

                    <div class="block  col-xs-12">
                        <li class="col-sm-9 col-xs-9" style="padding-left: 150px">PAJAK (10%)</li>
                        <li class="col-sm-3 col-xs-3">30,600</li>
                    </div>

                    <div class="block  col-xs-12">
                        <li class="col-sm-9 col-xs-9" style="padding-left: 200px"><b>TOTAL BELANJA</b></li>
                        <li class="col-sm-3 col-xs-3"><b>336,600</b></li>
                    </div>

                    <hr>

                    <div class="block  col-xs-12">
                        <li class="col-sm-9 col-xs-9" style="padding-left: 200px">Tunai</li>
                        <li class="col-sm-3 col-xs-t">350,000</li>
                    </div>

                    <div class="block  col-xs-12">
                        <li class="col-sm-9 col-xs-9" style="padding-left: 200px">Kembali</li>
                        <li class="col-sm-3 col-xs-3">13,400</li>
                    </div>
                    <div class="block  col-xs-12">
                        <li class="notices">
                            NOTICE : <br> Barang yang sudah dibeli tidak dapat tukarkan kembali.
                        </li>
                    </div>
                    <div class="block  col-xs-12 text-center note-invoice">
                        Terima Kasih
                    </div>
                    <div class="invoice-footer col-md-12 col-xs-12"><strong id="get-watermark">Powered by</strong></div>
                    <div class="img-receipt">
                        <img class="img-responsive" src="logo.png">
                    </div>
                </ul>
            </div>
        </div>
    </div>
</body></html>