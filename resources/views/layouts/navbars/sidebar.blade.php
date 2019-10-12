<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            @if (Auth::guard("admin")->check())
                <a href="#" class="simple-text logo-normal"><strong>{{ __('Admin') }}</strong>   |   KasirQ</a>
            @elseif (Auth::guard("management")->check())
                <a href="#" class="simple-text logo-normal"><strong>{{ __('Management') }}</strong> |   {{ __('Nama Bisnis') }}</a>
            @endif
        </div>
        <ul class="nav">
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
    </div>
</div>
