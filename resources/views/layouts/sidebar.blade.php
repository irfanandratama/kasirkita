<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
        <a href="index.html">KasirQ</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
        <i class="far fa-smile-wink"></i>
        </div>
        <ul class="sidebar-menu">
        @if (Auth::guard("admin")->check())
            @include('admin.sidebar.sidebar')
        @elseif (Auth::guard("management")->check())
            @include('management.sidebar.sidebar')
        @elseif (Auth::guard("cashier")->check())
            @include('cashier.sidebar.sidebar')
        @else
            <h5>Kosong?</h5>
            <h5>Astaghfirullahaladzim!!</h5>
        @endif
        </ul>
    </aside>
</div>