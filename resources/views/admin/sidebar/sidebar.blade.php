<li class="menu-header">Dashboard</li>
<li @if ($pageSlug == 'dashboard') class="active " @endif>
  <a href="{{route('admin.dashboard')}}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
</li>

<li class="menu-header">Akun</li>
<li @if ($pageSlug == 'listAdmin' or $pageSlug == 'addAdmin') class="dropdown active" @endif class="dropdown">
  <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users-cog"></i> <span>Akun Admin</span></a>
  <ul class="dropdown-menu">
    <li @if ($pageSlug == 'listAdmin') class="active " @endif>
      <a class="nav-link" href="{{route('admin.index')}}">Daftar Admin</a>
    </li>
    <li @if ($pageSlug == 'addAdmin') class="active " @endif>
      <a class="nav-link" href="{{route('admin.create')}}">Tambah Admin</a>
    </li>
  </ul>
</li>

<li @if ($pageSlug == 'listManagement' or $pageSlug == 'addManagement' or $pageSlug == 'management') class="dropdown active " @endif class="dropdown">
  <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users-cog"></i><span>Akun Manajemen</span></a>
  <ul class="dropdown-menu">
    <li @if ($pageSlug == 'listManagement') class="active " @endif>
      <a class="nav-link" href="{{route('admin-management.index')}}">Daftar Manajemen</a>
    </li>
    <li @if ($pageSlug == 'addManagement') class="active " @endif>
      <a class="nav-link" href="{{route('admin-management.create')}}">Tambah Manajemen</a>
    </li>
  </ul>
</li>

<li @if ($pageSlug == 'cashier') class="active " @endif>
  <a href="{{route('admin-cashier.index')}}" class="nav-link"><i class="fas fa-user"></i><span>Akun Kasir</span></a>
</li>

<li @if ($pageSlug == 'listBarber') class="active " @endif>
  <a href="{{route('admin-barber.index')}}" class="nav-link"><i class="fas fa-user"></i><span>Akun Tukang Cukur</span></a>
</li>

<li class="menu-header">Bisnis</li>
<li @if ($pageSlug == 'business') class="active " @endif>
  <a href="{{route('admin-business.index')}}" class="nav-link"><i class="fas fa-store"></i><span>Daftar Bisnis</span></a>
</li>


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