<li class="menu-header">Dashboard</li>
<li @if ($pageSlug == 'dashboard') class="active " @endif>
  <a href="{{route('cashier.dashboard')}}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
</li>

<div class="mt-4 mb-4 p-3 hide-sidebar-mini">
  <a href="{{route('cashier-transaction.index')}}" class="btn btn-primary btn-lg btn-block btn-icon-split">
    <i class="fas fa-store"></i> TRANSAKSI
  </a>
</div>

<li @if ($pageSlug == 'history') class="active " @endif>
    <a class="nav-link" href="{{route('cashier-history.index')}}"><i class="fas fa-history"></i> Riwayat Transaksi</a>
  </li>

<li class="menu-header">Inventori</li>
<li  @if ($pageSlug == 'stockHistory' or $pageSlug == 'addActivity') class="dropdown active" @endif class="dropdown">
  <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-boxes"></i> <span>Kelola Stok</span></a>
  <ul class="dropdown-menu">
    <li @if ($pageSlug == 'stockHistory') class="active " @endif>
      <a class="nav-link" href="{{route('cashier-stock.index')}}">Riwayat Stok</a>
    </li>
    <li @if ($pageSlug == 'addActivity') class="active " @endif>
      <a class="nav-link" href="{{route('cashier-stock.create')}}">Tambah Aktifitas</a>
    </li>
  </ul>
</li>

<!-- <li class="menu-header">Akun</li>
<li>
  <a href="" class="nav-link"><i class="far fa-user"></i><span>Profile</span></a>
</li>
<li @if ($pageSlug == 'listAdmin' or $pageSlug == 'addAdmin') class="dropdown active" @endif class="dropdown">
  <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users-cog"></i> <span>Admin</span></a>
  <ul class="dropdown-menu">
    <li @if ($pageSlug == 'listAdmin') class="active " @endif>
      <a class="nav-link" href="{{route('admin.index')}}">Daftar Admin</a>
    </li>
    <li @if ($pageSlug == 'addAdmin') class="active " @endif>
      <a class="nav-link" href="{{route('admin.create')}}">Tambah Admin</a>
    </li>
  </ul>
</li> -->

<!-- <li class="menu-header">Produk</li>
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
</li> -->