<li class="menu-header">Dashboard</li>
<li @if ($pageSlug == 'dashboard') class="active " @endif>
  <a href="{{route('management.dashboard')}}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
</li>

<div class="mt-4 mb-4 p-3 hide-sidebar-mini">
  <a href="" class="btn btn-primary btn-lg btn-block btn-icon-split">
    <i class="fas fa-store"></i> Riwayat Transaksi
  </a>
</div>

<li class="menu-header">Akun</li>
<li>
  <a href="" class="nav-link"><i class="far fa-user"></i><span>Profile</span></a>
</li>
<li @if ($pageSlug == 'listCashier' or $pageSlug == 'addCashier') class="dropdown active" @endif class="dropdown">
  <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users"></i> <span>Kasir</span></a>
  <ul class="dropdown-menu">
    <li @if ($pageSlug == 'listCashier') class="active " @endif>
      <a class="nav-link" href="{{ route('management-cashier.index') }}">Daftar Kasir</a>
    </li>
    <li @if ($pageSlug == 'addCashier') class="active " @endif>
      <a class="nav-link" href="{{ route('management-cashier.create') }}">Tambah Cashier</a>
    </li>
  </ul>
</li>

<li class="menu-header">Produk</li>
<li  @if ($pageSlug == 'listProduct' or $pageSlug == 'addProduct') class="dropdown active" @endif class="dropdown">
  <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-boxes"></i> <span>Produk</span></a>
  <ul class="dropdown-menu">
    <li @if ($pageSlug == 'listProduct') class="active " @endif>
      <a class="nav-link" href="{{route('management-product.index')}}">Daftar Produk</a>
    </li>
    <li @if ($pageSlug == 'addProduct') class="active " @endif>
      <a class="nav-link" href="{{route('management-product.create')}}">Tambah Produk</a>
    </li>
  </ul>
</li>
<li @if ($pageSlug == 'listCategory' or $pageSlug == 'addCategory') class="dropdown active" @endif class="dropdown">
  <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="far fa-folder"></i> <span>Kategori Produk</span></a>
  <ul class="dropdown-menu">
    <li @if ($pageSlug == 'listCategory') class="active " @endif>
      <a class="nav-link" href="{{route('management-category-product.index')}}">Daftar Kategori</a>
    </li>
    <li @if ($pageSlug == 'addCategory') class="active " @endif>
      <a class="nav-link" href="{{route('management-category-product.create')}}">Tambah Kategori</a>
    </li>
  </ul>
</li>

<li class="menu-header">Outlet</li>
<li  @if ($pageSlug == 'listOutlet' or $pageSlug == 'addOutlet') class="dropdown active" @endif class="dropdown">
  <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-store"></i> <span>Outlet</span></a>
  <ul class="dropdown-menu">
    <li @if ($pageSlug == 'listOutlet') class="active " @endif>
      <a class="nav-link" href="{{route('management-outlet.index')}}">Daftar Outlet</a>
    </li>
    <li @if ($pageSlug == 'addOutlet') class="active " @endif>
      <a class="nav-link" href="{{route('management-outlet.create')}}">Tambah Outlet</a>
    </li>
  </ul>
</li>
