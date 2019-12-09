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
                                    <input v-if="product.product_detail[0].stock > 0" name="imagecheck" type="checkbox" v-model="selected" :value="product"
                                           class="imagecheck-input"/>
                                    <figure class="imagecheck-figure">
                                        <img :src="assets+'/'+product.image"
                                             :title="product.name" class="imagecheck-image">
                                    </figure>
                                    <div class="gradasi"></div>
                                    <div class="carousel-caption d-none d-md-block caption">
                                        <h6>@{{ product.name }}</h6>
                                        <label v-if="product.product_detail[0].stock == 0" class="price" style="color:red;">Stock Kosong</label>
                                        <label v-if="product.product_detail[0].stock > 0"
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
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
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
