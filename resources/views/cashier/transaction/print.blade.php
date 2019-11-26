@extends('')

@section('page_title', '')

@section('css_link')
<style type="text/css">
    @import url('https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300&display=swap');

* {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
div {
    display: block;
}

body {
    font-family: "Open Sans Condensed";
    font-size: 16px;
    line-height: 1.42857143;
    color: #333;
    background-color: #fff;
}
html {
    -ms-text-size-adjust: 100%;
    -webkit-text-size-adjust: 100%;
    -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
    color: -internal-root-color;
}

*:before, *:after {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
*:before, *:after {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}

@media (max-width: 991px) {
    .container.invoice {
        width: auto;
    }
}

.container.invoice {
    width: 402px;
    margin: 0 auto;
    padding: 0px;
}

.container {
    padding: 15px 25px;
}

.invoice-body {
    padding-top: 20px;
    background: #fff;
    box-shadow: 0 6px 12px 0 rgba(0, 0, 0, 0.07);
}

.img-receipt {
    width: 90px;
    border-radius: 4px;
    margin: 0 auto;
}

.img-receipt img {
    filter: grayscale(100);
}
.img-responsive {
    display: block;
    max-width: 100%;
    height: auto;
}
img {
    border: 0;
    vertical-align: middle;
}
.container.invoice .text-wrapper {
    padding: 25px 15px;
}
.text-wrapper {
    padding: 25px 25px;
}
.text-wrapper ul {
    list-style: none;
    padding: 0px;
    margin: 0px;
}
ul {
    margin-top: 0;
    margin-bottom: 10px;
}
.text-wrapper ul .block {
    display: block;
    padding: 6px 0px;
}
.invoice .company-detail {
    padding-left: 50px !important;
    padding-right: 50px !important;
    margin-bottom: 20px;
}
.container .company-detail {
    margin-bottom: 35px;
}
.text-center {
    text-align: center;
}
.text-wrapper ul li {
    display: inline-block;
    /*font-size: 14px;*/
    color: #6b777e;
}
.company-detail li {
    width: 70%;
    font-size: 14px;
}
.container .invoice-to {
    text-align: right;
    font-size: 14px;
}
.container .invoice-to .block {
    padding-top: 0px;
    padding-bottom: 3px;
}
.text-wrapper ul .block {
    display: block;
    padding: 6px 0px;
}
.invoice .text-wrapper ul .line {
    margin: 7px 0px;
}
.text-wrapper ul .line {
    border-bottom: 1px solid #aaa;
    margin: 20px 0px;
}
.no-padding {
    padding: 0px;
}
.text-wrapper ul li.text-right {
    text-align: right;
}
.container .note-invoice {
    margin-top: 25px;
}
.container .invoice-footer {
    margin-top: 25px;
}
.text-wrapper .invoice-footer {
    color: #6b777e;
    text-align: center;
    font-size: 13px;
}
.invoice-footer {
    margin-top: 20px;
    margin-bottom: 5px;
}
.notices {
    padding-left: 6px;
    border-left: 6px solid #6b777e;
    font-size: 14px"
}


.col-xs-1, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9, .col-xs-10, 
.col-xs-11, .col-xs-12 {
  float: left;
}
.col-xs-12 {
  width: 100%;
}
.col-xs-11 {
  width: 91.66666667%;
}
.col-xs-10 {
  width: 83.33333333%;
}
.col-xs-9 {
  width: 75%;
}
.col-xs-8 {
  width: 66.66666667%;
}
.col-xs-7 {
  width: 58.33333333%;
}
.col-xs-6 {
  width: 50%;
}
.col-xs-5 {
  width: 41.66666667%;
}
.col-xs-4 {
  width: 33.33333333%;
}
.col-xs-3 {
  width: 25%;
}
.col-xs-2 {
  width: 16.66666667%;
}
.col-xs-1 {
  width: 8.33333333%;
}
</style>
@endsection

@section('content')

<div class="container invoice">
    <div class="col-md-12 col-xs-12 invoice-body">
        <div class="title"></div>
        <div class="text-wrapper clearfix">
            <ul>
                <div class="block col-sm-12 col-xs-12 text-center company-detail">
                    <li>
                        <span class="company-name" style="font-size: 20px"><b>NAMA USAHA</b></span><br>
                        <span class="company-address">Jl. Sana Sini 79 Jember</span><br>
                        <span class="company-phone">(123) 456-789</span><br>
                        <span class="company-email">namausaha@gmail.com</span>
                    </li>
                </div>
                <div class="invoice-to">
                    <div class="block col-sm-12 col-xs-12">
                        <li>Kasir :</li>
                    </div>
                    <div class="block col-sm-12 col-xs-12">
                        <li class="invoice-cashier">Nama Kasir</li>
                    </div>
                    <div class="block col-sm-12 col-xs-12">
                        <li class="invoice-id" style="font-size: 16px"><b>ORDER 1234</b></li>
                    </div>
                    <div class="block col-sm-12 col-xs-12">
                        <li class="invoice-date">Dicetak pada: 01/10/2018 15:30 WIB</li>
                    </div>
                </div>

                <div class="line col-sm-12 col-xs-12"></div>

                <div class="block col-sm-12 col-xs-12">
                    <li class="col-sm-1 col-xs-1 no-padding">1</li>
                    <li class="col-sm-8 col-xs-8 no-padding">Item 1</li>
                    <li class="col-sm-3 col-xs-3 text-right">6,000</li>
                </div>

                <div class="block col-sm-12 col-xs-12">
                    <li class="col-sm-1 col-xs-1 no-padding">5</li>
                    <li class="col-sm-8 col-xs-8 no-padding">Item 2</li>
                    <li class="col-sm-3 col-xs-3 text-right">150,000</li>
                </div>

                <div class="block col-sm-12 col-xs-12">
                    <li class="col-sm-1 col-xs-1 no-padding">4</li>
                    <li class="col-sm-8 col-xs-8 no-padding">Item 3</li>
                    <li class="col-sm-3 col-xs-3 text-right">80,000</li>
                </div>

                <div class="block col-sm-12 col-xs-12">
                    <li class="col-sm-1 col-xs-1 no-padding">2</li>
                    <li class="col-sm-8 col-xs-8 no-padding">Item 4</li>
                    <li class="col-sm-3 col-xs-3 text-right">80,000</li>
                </div>

                <div class="line col-sm-12 col-xs-12"></div>

                <div class="block col-sm-12 col-xs-12">
                    <li class="col-sm-9 col-xs-9 text-right" style="padding-left: 150px">SUBTOTAL</li>
                    <li class="col-sm-3 col-xs-3 text-right">306,000</li>
                </div>

                <div class="block col-sm-12 col-xs-12">
                    <li class="col-sm-9 col-xs-9 text-right" style="padding-left: 150px">PAJAK (10%)</li>
                    <li class="col-sm-3 col-xs-3 text-right">30,600</li>
                </div>

                <div class="block col-sm-12 col-xs-12">
                    <li class="col-sm-9 col-xs-9 text-right" style="padding-left: 200px"><b>TOTAL BELANJA</b></li>
                    <li class="col-sm-3 col-xs-3 text-right"><b>336,600</b></li>
                </div>

                <div class="line col-sm-12 col-xs-12"></div>

                <div class="block col-sm-12 col-xs-12">
                    <li class="col-sm-9 col-xs-9 text-right" style="padding-left: 200px">Tunai</li>
                    <li class="col-sm-3 col-xs-3 text-right">350,000</li>
                </div>

                <div class="block col-sm-12 col-xs-12">
                    <li class="col-sm-9 col-xs-9 text-right" style="padding-left: 200px">Kembali</li>
                    <li class="col-sm-3 col-xs-3 text-right">13,400</li>
                </div>
                <div class="block col-sm-12 col-xs-12">
                    <li class="notices">
                        NOTICE : <br> Barang yang sudah dibeli tidak dapat tukarkan kembali.
                    </li>
                </div>
                <div class="block col-sm-12 col-xs-12 text-center note-invoice">
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

@endsection

@section('script')

@endsection