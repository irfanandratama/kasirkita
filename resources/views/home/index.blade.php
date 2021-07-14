@extends('home.layouts.app')
@section('content')

<section class="probootstrap-hero" style="background-image: url({{ asset('assets/img/barber.jpg') }})">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 row text-center probootstrap-hero-text pb0 probootstrap-animate" data-animate-effect="fadeIn">
            {{-- <h1>Cukur ya di sini aja!</h1> --}}
            {{-- <p>Nikmati kebebasan mengelola bisnis dari mana saja dengan aplikasi kasir online KasirQ. Mulai sekarang.</p> --}}
            <p>
                <a href="#" class="btn btn-primary btn-lg" role="button" data-toggle="modal" data-target="#loginModal">Masuk</a>
                <a href="#" class="btn btn-primary btn-ghost btn-lg" role="button" data-toggle="modal" data-target="#signupModal">Daftar</a>
            </p>
            </div>
        </div>  
        <div class="row probootstrap-feature-showcase">
            <img src="{{ asset('assets/img/barber2.jpg') }}" alt="Image" class="img-responsive">
        </div>
    </div>
</section>

{{-- <section class="probootstrap-section probootstrap-bg-white probootstrap-zindex-above-showcase">
    <div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 text-center section-heading probootstrap-animate" data-animate-effect="fadeIn">
        <h2>Fitur <img src="{{ asset('assets/img/logo/logo.png') }}" alt="Image" class="img-responsive"></h2>
        <p class="lead">Fitur dari KasirQ dibagi kepada 3 Aktor</p>
        </div>
    </div>
    <!-- END row -->
    <div class="row probootstrap-gutter60">
        <div class="col-md-4 probootstrap-animate" data-animate-effect="fadeInLeft">
        <div class="service text-center">
            <div class="icon"><i class="icon-user2"></i></div>
            <div class="text">
            <h3>Admin</h3>
            <p>Mengelola KasirQ</p>
            </div>  
        </div>
        </div>
        <div class="col-md-4 probootstrap-animate" data-animate-effect="fadeIn">
        <div class="service text-center">
            <div class="icon"><i class="icon-profile-male"></i></div>
            <div class="text">
            <h3>Manager</h3>
            <p>Mengelola Akun Kasir
                <br>Mengelola Outlet
                <br>Mengelola Produk
                <br>Melihat Laporan Harian
                <br>Melihat Laporan Bulanan
                <br>Melihat Laporan Peroutlet
                <br>Rekap Laporan
                <br>Melihat Stok tiap outlet
                <br>Menambah Kategori
            </p>
            </div>
        </div>
        </div>
        <div class="col-md-4 probootstrap-animate" data-animate-effect="fadeInRight">
        <div class="service text-center">
            <div class="icon"><i class="icon-users2"></i></div>
            <div class="text">
            <h3>Kasir</h3>
            <p>Mengelola Transaksi
                <br>Mengelola Stok
                <br>Melihat Laporan Bulanan
                <br>Melihat Keuangan
            </p>
            </div>
        </div>
        </div>
    </div>
    </div>
</section>

<section class="probootstrap-section probootstrap-bg-white probootstrap-zindex-above-showcase">
    <div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 text-center section-heading probootstrap-animate">
        <h2>Fitur Lainnya</h2>
        <p class="lead">KasirQ juga mempunyai fitur yang membantu Aktor dan dikelola sistem.</p>
        </div>
    </div>
    <!-- END row -->
    <div class="row">
        <div class="col-md-7 col-md-push-5 probootstrap-animate"  data-animate-effect="fadeInRight">

        <div class="owl-carousel owl-carousel-fullwidth border-rounded">
            <div class="item">
            <img src="{{ asset('assets/img/img_showcase_1.jpg') }}" alt="">
            </div>
            <div class="item">
            <img src="{{ asset('assets/img/img_showcase_2.png') }}" alt="">
            </div>
            <div class="item">
            <img src="{{ asset('assets/img/img_showcase_3.png') }}" alt="">
            </div>
            <div class="item">
            <img src="{{ asset('assets/img/img_showcase_4.png') }}" alt="">
            </div>
        </div>

        </div>

        <div class="col-md-5 col-md-pull-7">
        <div class="service left-icon probootstrap-animate" data-animate-effect="fadeInLeft">
            <div class="icon"><i class="icon-users"></i></div>
            <div class="text">
            <h3>Multi Level Login</h3>
            <p>Login pada KasirQ dibagi menjadi 3 yaitu Admin, Manager, dan Kasir.</p>
            </div>  
        </div>
        <div class="service left-icon probootstrap-animate" data-animate-effect="fadeInLeft">
            <div class="icon"><i class="icon-presentation"></i></div>
            <div class="text">
            <h3>Laporan</h3>
            <p>KasirQ mengelola data penjualan dan menjadikan laporan.</p>
            </div>
        </div>
        <div class="service left-icon probootstrap-animate" data-animate-effect="fadeInLeft">
            <div class="icon"><i class="icon-presentation"></i></div>
            <div class="text">
            <h3>Grafik Laporan</h3>
            <p>Laporan di Kasir dalam bentuk grafik agar memudahkan untuk melihat naik turun penjualan.</p>
            </div>
        </div>
        </div>
    </div>
    </div>
</section> --}}

<!-- Modal login -->
<div class="modal fadeInUp probootstrap-animated" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="vertical-alignment-helper">
    <div class="modal-dialog modal-md vertical-align-center">
        <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-cross"></i></button>
        <div class="probootstrap-modal-flex">
            <div class="probootstrap-modal-figure" style="background-image: url({{ asset('assets/img/modal_bg.jpg') }}"></div>
            <div class="probootstrap-modal-content">

            <h3>Pilih Jenis Akun</h3>

            <div class="form-group text-left">
                <div class="row">
                    <div class="col-md-6">
                    <a class="btn btn-primary btn-block" href="{{ route('admin.login') }}">Admin</a>
                    </div>
                </div>
            </div>

            <div class="form-group text-left">
                <div class="row">
                    <div class="col-md-6">
                    <a class="btn btn-primary btn-block" href="{{ route('management.login') }}">Management</a>
                    </div>
                </div>
            </div>

            <div class="form-group text-left">
                <div class="row">
                    <div class="col-md-6">
                    <a class="btn btn-primary btn-block" href="{{ route('cashier.login') }}">Cashier</a>
                    </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>
<!-- END modal login -->

<!-- Modal signup -->
<div class="modal fadeInUp probootstrap-animated" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="vertical-alignment-helper">
    <div class="modal-dialog modal-md vertical-align-center">
        <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-cross"></i></button>
        <div class="probootstrap-modal-flex">
            <div class="probootstrap-modal-figure" style="background-image: url({{ asset('assets/img/modal_bg.jpg')}}"></div>
            <div class="probootstrap-modal-content">
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form class="probootstrap-form" method="POST" action="{{ route('daftar') }}">
                {{ csrf_field() }}
                <span><b>Daftar Akun</b></span>
                <div class="form-group" data-validate = "Nama wajib diisi.">
                    <input type="text" class="form-control" name="name" placeholder="Nama Lengkap">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <input type="tel" pattern="^\d{12}$" class="form-control" name="phone" placeholder="Nomor Handphone">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                <span><b>Informasi Usaha</b></span>
                <div class="form-group">
                    <input type="text" name="businessName" class="form-control" placeholder="Nama Usaha">
                </div>
                <div class="form-group">
                    <select name="business_type_id" id="" class="form-control">
                        <option value="">Jenis Usaha</option>
                        @foreach($businessType as $row)
                        <option value="{{$row->id}}">
                            {{$row->name}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group clearfix mb40">
                    <label for="remember" class="probootstrap-remember">
                    <input type="checkbox" id="remember"> Remember Me
                    </label>
                </div>
                <div class="form-group text-left">
                    <div class="row">
                        <div class="col-md-6">
                        <input type="submit" class="btn btn-primary btn-block" value="Sign Up">
                        </div>
                    </div>
                </div>
            </form>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>
    <!-- END modal signup -->
@endsection