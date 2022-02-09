@extends('layouts.app', ['pageSlug' => ''])

@section('content')
    <div class="main-content" id="cart_content">
        <section class="section">
            <div class="section-header">
                <h1>Kasir {{Auth::user()->business->name}} &mdash; {{Auth::user()->name}}</h1>
                <div class="section-header-breadcrumb">
                    <a href="" class="badge badge-light">{{Auth::user()->outlet->name}}</a>
                </div>
            </div>
            @include('alerts.notification')
            {{-- @if (@isset($total) && @isset($created_at))
                <button type="button" class="btn btn-primary btn-sm" onClick="printStruk()">Cetak Struk</button>
            @endif --}}
            @isset($total, $created_at, $transaction_num)
                <button type="button" class="btn btn-primary btn-sm" onClick="printStruk()">Cetak Struk</button>
            @endisset
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Produk</h4>
                        </div>
                        <input id="search-product" type="text" v-model="search" placeholder="Search Product">

                        <hr>
                        <div class="card-body produk">

                            <div class="item" v-for="product in products">
                                <label class="imagecheck mb-4 item">
                                    <input v-if="product.product_detail[0].stock > 0 || product.category.name == 'Jasa'" name="imagecheck" type="checkbox" v-model="selected" :value="product"
                                           class="imagecheck-input"/>
                                    <figure class="imagecheck-figure">
                                        <img :src="assets+'/'+product.image"
                                             :title="product.name" class="imagecheck-image">
                                    </figure>
                                    <div class="gradasi"></div>
                                    <div class="carousel-caption d-none d-md-block caption">
                                        <h6>@{{ product.name }}</h6>
                                        <label v-if="product.product_detail[0].stock == 0 && product.category.name !== 'Jasa'" class="price" style="color:red;">Stock Kosong</label>
                                        <label v-if="product.product_detail[0].stock > 0 || product.category.name == 'Jasa'"
                                            class="price">Rp. @{{ product.price}}</label>
                                    </div>
                                </label>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-6 main-wrapper main-wrapper1">
                    <div class="card row">
                        <form method="post" action="{{ route('cashier-transaction.invoice')}}" autocomplete="off"
                              enctype="multipart/form-data">
                            @csrf
                            @method('post')
                            <div class="card-header">
                                <h4>Keranjang</h4>
                                <input id="item" type="text" name="item" class="form-control text-center col-sm-2"
                                       :value="selected.length" readonly>
                            </div>
                            <div class="card-body">
                                <div class="pl-lg-4">
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-icon icon-left btn-success bayar">
                                            <i class="fas fa-check"></i> Pembayaran
                                        </button>
                                        <a class="btn btn-outline-secondary clear" v-on:click="clear">Clear</a>
                                    </div>
                                </div>
                                <hr>
                                <div class="keranjang">
                                    <div v-for="(item, index) in selected" class="form-group row mb-2 dipilih flex">
                                        <label class="col-form-label text-md-left col-12 col-md-3 col-lg-8">
                                            <h6>@{{item.name}}</h6>
                                            @ Rp. @{{item.price}} |
                                            <i class="text-secondary mb-2">Stock : @{{item.product_detail[0].stock}}</i>
                                        </label>
                                        <div class="col-sm-12 col-md-3">
                                            <input type="number" class="form-control currency" name="product[]"
                                                   :value="item.id" style="display :none;">
                                            <input type="number" class="form-control currency jumlah" value="1" min="1"
                                                   :max="item.product_detail.stock" name="qty[]">
                                        </div>
                                        <div>
                                            <a class="btn btn-icon btn-danger delete" v-on:click="removeCart(index)"><i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.min.js"></script>
    <script>
        var app = new Vue({
            el: '#cart_content',
            data: {
                selected: [],
                search: '',
                assets: "{{ asset('assets/img/product/')}}",
                products: []
            },
            methods: {
                removeCart: function (index) {
                    this.selected.splice(index, 1);
                },
                clear: function () {
                    this.selected = []
                }
            },
            watch: {
                search: function (val) {
                    var self = this;
                    axios({
                        method: 'get',
                        url: '{{route('cashier-transaction.data')}}?q='+val,
                        responseType: 'stream'
                    }).then(function (response) {
                        self.products = response.data;
                    });
                }
            },
            created() {
                var self = this;
                axios({
                    method: 'get',
                    url: '{{route('cashier-transaction.data')}}',
                    responseType: 'stream'
                }).then(function (response) {
                    self.products = response.data;
                });
            }
        })
    </script>
@endsection

@isset($total, $created_at, $transaction_num)
        <script src="{{ asset('assets/js/qz-tray.js') }}"></script>
        <script>
            qz.security.setCertificatePromise(function(resolve, reject) {
                //Preferred method - from server
                fetch("{{asset('assets/signing/override.crt')}}", {cache: 'no-store', headers: {'Content-Type': 'text/plain'}})
                    .then(function(data) { data.ok ? resolve(data.text()) : reject(data.text()); });
            });
            qz.security.setSignatureAlgorithm("SHA512"); // Since 2.1
            qz.security.setSignaturePromise(function(toSign) {
                return function(resolve, reject) {
                    //Preferred method - from server
        //            fetch("/secure/url/for/sign-message?request=" + toSign, {cache: 'no-store', headers: {'Content-Type': 'text/plain'}})
        //              .then(function(data) { data.ok ? resolve(data.text()) : reject(data.text()); });
                    $.post("{{asset('assets/signing/sign-message.php')}}", {request: toSign}).then(resolve, reject);


                    //Alternate method - unsigned
                    // resolve(); // remove this line in live environment
                };
            });
        </script>
        <script>
            function printStruk() {
                

                qz.websocket.connect().then(function() { 
                    return qz.printers.find("POS-E58");              // Pass the printer name into the next Promise
                    }).then(function(printer) {
                        var config = qz.configs.create("POS-E58");

                        var data = [
                            '\x1B' + '\x40',          // init
                            '\x0A',                   // line break
                            '\x1B' + '\x61' + '\x31', // center align
                            '{{$outlet->name}}' + '\x0A',
                            '{{$outlet->address}}' + '\x0A',     // text and line break
                            '{{$created_at}}' + '\x0A',
                            '\x0A',                   // line break
                            '\x0A',                   // line break    
                            '\x1B' + '\x61' + '\x32', // right align
                            'Transaction # {{$transaction_num}}' + '\x0A',
                            '\x1B' + '\x61' + '\x30', // left align
                            'Cashier:          {{$cashier->name}}' + '\x0A',
                            'Barber:          {{$barber->name}}' + '\x0A',
                            '\x1B' + '\x61' + '\x31', // center align
                            '--------------------------------', '\x0A',
                            '\x1B' + '\x61' + '\x30', // left align
                            @foreach ($products as $product)
                                '{{$product->item["name"]}}',
                                '\x0A',
                                'x{{$product->qty}}........................{{$product->item["price"]}}',
                                '\x0A',
                            @endforeach
                            // 'Baklava (Qty 4)       9.00' + '\x1B' + '\x74' + '\x13' + '\xAA', //print special char symbol after numeric
                            // '\x0A',
                            '================================' + '\x0A', 
                            '\x1B' + '\x61' + '\x32', // right align
                            'Total      {{$total}}' + '\x0A',
                            'Bayar      {{$bayar}}' + '\x0A',
                            'Kembali      {{$kembali}}' + '\x0A',
                            '\x1B' + '\x61' + '\x31', // center align 
                            '--------------------------------', '\x0A',     
                            '\x1B' + '\x45' + '\x0D', // bold on
                            'Terima kasih' + '\x0A',
                            'Apabila ada kritik dan saran, bisa menghubungi kami langsung melalui toko.',
                            '\x1B' + '\x45' + '\x0A', // bold off
                            '\x0A' + '\x0A',
                            '\x0A',
                            // '\x1B' + '\x61' + '\x32', // right align
                            // '\x1B' + '\x21' + '\x30', // em mode on
                            // 'DRINK ME',
                            // '\x1B' + '\x21' + '\x0A' + '\x1B' + '\x45' + '\x0A', // em mode off
                            // '\x0A' + '\x0A',
                            // '\x1B' + '\x61' + '\x30', // left align
                            // '------------------------------------' + '\x0A',
                            // '\x1B' + '\x4D' + '\x31', // small text
                            // 'EAT ME' + '\x0A',
                            // '\x1B' + '\x4D' + '\x30', // normal text
                            // '------------------------------------------' + '\x0A',
                            // 'normal text',
                            // '\x1B' + '\x61' + '\x30', // left align
                            // '\x0A' + '\x0A' + '\x0A' + '\x0A' + '\x0A' + '\x0A' + '\x0A',
                            '\x1B' + '\x69',          // cut paper (old syntax)
                            // '\x1D' + '\x56'  + '\x00' // full cut (new syntax)
                            // '\x1D' + '\x56'  + '\x30' // full cut (new syntax)
                            // '\x1D' + '\x56'  + '\x01' // partial cut (new syntax)
                            // '\x1D' + '\x56'  + '\x31' // partial cut (new syntax)
                            '\x10' + '\x14' + '\x01' + '\x00' + '\x05',  // Generate Pulse to kick-out cash drawer**
                            // **for legacy drawer cable CD-005A.  Research before using.
                        ];

                    qz.print(config, data).then(function(){
                        if (qz.websocket.isActive()) {
                            qz.websocket.disconnect().then(function() {
                                
                            }).catch(function (e) { console.error(e); });
                        }
                    }).catch(function(e) { console.error(e); });

                }).catch(function(e) { console.error(e); });
            }
        </script>
@endisset
