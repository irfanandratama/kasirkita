<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  @auth()
    @if (Auth::guard('admin')->check())
    <title>Admin KasirQ &mdash; {{Auth::user()->name}}</title>
    @elseif (Auth::guard('management')->check())
    <title>KasirQ &mdash; {{Auth::user()->business->name}}</title>
    @elseif (Auth::guard('cashier')->check())
    <title>Kasir {{Auth::user()->business->name}} &mdash; {{Auth::user()->name}}</title>
    @endif
  @else
  <title>KasirQ &mdash; Kasir Kita</title>
  @endauth

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset(config('admin_config.theme_name')) }}/assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset(config('admin_config.theme_name')) }}/assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset(config('admin_config.theme_name')) }}/assets/modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="{{ asset(config('admin_config.theme_name')) }}/assets/modules/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="{{ asset(config('admin_config.theme_name')) }}/assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="{{ asset(config('admin_config.theme_name')) }}/assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css">
  <link rel="stylesheet" href="{{ asset(config('admin_config.theme_name')) }}/assets/modules/jquery-selectric/selectric.css">
  <link rel="stylesheet" href="{{ asset(config('admin_config.theme_name')) }}/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
  <link rel="stylesheet" href="{{ asset(config('admin_config.theme_name')) }}/assets/modules/dropzonejs/dropzone.css">
  <link rel="stylesheet" href="{{ asset(config('admin_config.theme_name')) }}/assets/modules/chocolat/dist/css/chocolat.css">
  <link rel="stylesheet" href="{{ asset(config('admin_config.theme_name')) }}/assets/modules/prism/prism.css">

  <link rel="stylesheet" href="{{ asset('css/style.css') }}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset(config('admin_config.theme_name')) }}/assets/css/style.css">
  <link rel="stylesheet" href="{{ asset(config('admin_config.theme_name')) }}/assets/css/components.css">
    @yield ('style')
</head>

<body>
  @auth()
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>
        @include('layouts.navbars.navbar')

        @include('layouts.sidebar')

        @yield('content')
        </div>
    </div>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
    </form>
  @else
    <div id="app">
    @yield('content')
    </div>
  @endauth

  <!-- General JS Scripts -->
  <script src="{{ asset(config('admin_config.theme_name')) }}/assets/modules/jquery.min.js"></script>
  <script src="{{ asset(config('admin_config.theme_name')) }}/assets/modules/jquery.mask.min.js"></script>
  <script src="{{ asset(config('admin_config.theme_name')) }}/assets/modules/popper.js"></script>
  <script src="{{ asset(config('admin_config.theme_name')) }}/assets/modules/tooltip.js"></script>
  <script src="{{ asset(config('admin_config.theme_name')) }}/assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="{{ asset(config('admin_config.theme_name')) }}/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="{{ asset(config('admin_config.theme_name')) }}/assets/modules/moment.min.js"></script>
  <script src="{{ asset(config('admin_config.theme_name')) }}/assets/js/stisla.js"></script>

  <!-- JS Libraies -->
  <script src="{{ asset(config('admin_config.theme_name')) }}/assets/modules/jquery.sparkline.min.js"></script>
  <script src="{{ asset(config('admin_config.theme_name')) }}/assets/modules/chart.min.js"></script>
  <script src="{{ asset(config('admin_config.theme_name')) }}/assets/modules/owlcarousel2/dist/owl.carousel.min.js"></script>
  <script src="{{ asset(config('admin_config.theme_name')) }}/assets/modules/summernote/summernote-bs4.js"></script>
  <script src="{{ asset(config('admin_config.theme_name')) }}/assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
  <script src="{{ asset(config('admin_config.theme_name')) }}/assets/modules/jquery-selectric/jquery.selectric.min.js"></script>
  <script src="{{ asset(config('admin_config.theme_name')) }}/assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js"></script>
  <script src="{{ asset(config('admin_config.theme_name')) }}/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
  <script src="{{ asset(config('admin_config.theme_name')) }}/assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
  <script src="{{ asset(config('admin_config.theme_name')) }}/assets/modules/prism/prism.js"></script>

  <script src="{{ asset(config('admin_config.theme_name')) }}/assets/modules/cleave-js/dist/cleave.min.js"></script>
  <script src="{{ asset(config('admin_config.theme_name')) }}/assets/modules/cleave-js/dist/addons/cleave-phone.us.js"></script>
  <script src="{{ asset(config('admin_config.theme_name')) }}/assets/modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
  <script src="{{ asset(config('admin_config.theme_name')) }}/assets/modules/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script src="{{ asset(config('admin_config.theme_name')) }}/assets/modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
  <script src="{{ asset(config('admin_config.theme_name')) }}/assets/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
  <script src="{{ asset(config('admin_config.theme_name')) }}/assets/modules/select2/dist/js/select2.full.min.js"></script>

  <!-- Page Specific JS File -->
  <script src="{{ asset(config('admin_config.theme_name')) }}/assets/js/page/forms-advanced-forms.js"></script>
  <script src="{{ asset(config('admin_config.theme_name')) }}/assets/js/page/features-post-create.js"></script>
  <script src="{{ asset(config('admin_config.theme_name')) }}/assets/js/page/bootstrap-modal.js"></script>

  <!-- Template JS File -->
  <script src="{{ asset(config('admin_config.theme_name')) }}/assets/js/scripts.js"></script>
  <script src="{{ asset(config('admin_config.theme_name')) }}/assets/js/custom.js"></script>
  @yield ('script')
  <script type="text/javascript">
    $(document).ready(function(){

        // Format mata uang.
        $( '.uang' ).mask('000.000.000.000', {reverse: true});
    })

    function ConfirmDelete()
    {
      var x = confirm("Are you sure you want to delete?");
      if (x)
        return true;
      else
        return false;
    }
  </script>
</body>
</html>
