<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KasirQ &mdash; Kasir Kita Semua</title>
    <meta name="description" content="Free Bootstrap Theme by uicookies.com">
    <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,500,700">
    <link rel="stylesheet" href="{{ asset('assets/css/styles-merged.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.min.css') }}">
  </head>
  <body>
    
    <!-- Fixed navbar -->
    <!-- navbar-fixed-top  -->
    
    
    <nav class="navbar probootstrap-megamenu navbar-default probootstrap-navbar">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#" title="uiCookies:Inspire" style="background: url({{ asset('assets/img/logo/logo.png') }}) no-repeat left center; background-size:cover; width:218px;">Inspire</a>
        </div>

        <div id="navbar-collapse" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="{{ route('admin.login') }}">Home</a></li>
            {{-- <li><a href="{{ route('admin.register') }}">Team</a></li> --}}
          </ul>
        </div>
      </div>
    </nav>

    @yield('content')

    {{-- <section class="probootstrap-cta">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="probootstrap-animate" data-animate-effect="fadeInRight">Butuh Bantuan</h2>
            <a href="#" role="button" class="btn btn-primary btn-lg btn-ghost probootstrap-animate" data-animate-effect="fadeInLeft">Hubungi Kami</a>
          </div>
        </div>
      </div>
    </section> --}}
    <footer class="probootstrap-footer">
      <div class="container">
        <div class="row">
          
          
          <div class="col-md-6 probootstrap-animate">
            <div class="probootstrap-footer-widget">
              <ul class="probootstrap-footer-social">
                <li><a href="#"><i class="icon-twitter"></i></a></li>
                <li><a href="#"><i class="icon-facebook"></i></a></li>
                <li><a href="#"><i class="icon-github"></i></a></li>
                <li><a href="#"><i class="icon-dribbble"></i></a></li>
                <li><a href="#"><i class="icon-linkedin"></i></a></li>
                <li><a href="#"><i class="icon-youtube"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
        <!-- END row -->
        <div class="row">
          <div class="col-md-12 copyright probootstrap-animate">
            <p><small>KasirQ &copy; {{now()->year}} .</small></p>
          </div>
        </div>
      </div>
    </footer>
    
    <script src="{{ asset('assets/js/scripts.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom.min.js') }}"></script>
  </body>
</html>