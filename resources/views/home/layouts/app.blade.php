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
          <a class="navbar-brand" href="#" title="uiCookies:Inspire">Inspire</a>
        </div>

        <div id="navbar-collapse" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="{{ route('admin.login') }}">Home</a></li>
            <li><a href="#">Team</a></li>
          </ul>
        </div>
      </div>
    </nav>

    @yield('content')

    <section class="probootstrap-cta">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="probootstrap-animate" data-animate-effect="fadeInRight">We'd like to help and talk with you</h2>
            <a href="#" role="button" class="btn btn-primary btn-lg btn-ghost probootstrap-animate" data-animate-effect="fadeInLeft">Contact Us</a>
          </div>
        </div>
      </div>
    </section>
    <footer class="probootstrap-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-4 probootstrap-animate">
                <div class="probootstrap-footer-widget">
                  <h3>Links</h3>
                  <ul>
                    <li><a href="#">Knowledge Base</a></li>
                    <li><a href="#">Career</a></li>
                    <li><a href="#">Press Releases</a></li>
                    <li><a href="#">Terms of services</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-4 probootstrap-animate">
                <div class="probootstrap-footer-widget">
                  <h3>Links</h3>
                  <ul>
                    <li><a href="#">Knowledge Base</a></li>
                    <li><a href="#">Career</a></li>
                    <li><a href="#">Press Releases</a></li>
                    <li><a href="#">Terms of services</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-4 probootstrap-animate">
                <div class="probootstrap-footer-widget">
                  <h3>Links</h3>
                  <ul>
                    <li><a href="#">Knowledge Base</a></li>
                    <li><a href="#">Career</a></li>
                    <li><a href="#">Press Releases</a></li>
                    <li><a href="#">Terms of services</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-md-6 probootstrap-animate">
            <div class="probootstrap-footer-widget">
              <h3>Paragraph</h3>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto provident qui tempore natus quos quibusdam soluta at.</p>
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
            <p><small>&copy; 2017 <a href="#">uiCookies:Inspire</a>. All Rights Reserved. <br> Designed &amp; Developed with <i class="icon icon-heart"></i> by <a href="https://uicookies.com/">uicookies.com</a></small></p>
          </div>
        </div>
      </div>
    </footer>
    
    <script src="{{ asset('assets/js/scripts.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom.min.js') }}"></script>
  </body>
</html>