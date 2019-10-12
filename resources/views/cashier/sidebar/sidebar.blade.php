<li @if ($pageSlug == 'dashboard') class="active " @endif>
    <a href="{{ route('cashier.dashboard')  }}">
        <i class="tim-icons icon-chart-pie-36"></i>
        <p>{{ __('Kasir') }}</p>
    </a>
</li>
<li>
    <a data-toggle="collapse" href="#laravel-examples" aria-expanded="false">
        <i class="tim-icons icon-single-02" ></i>
        <span class="nav-link-text" >{{ __('Transaksi') }}</span>
        <b class="caret mt-1"></b>
    </a>

    <div  @if ($pageSlug == 'history' or $pageSlug == 'finance') class="collapse show" @endif class="collapse hide" id="laravel-examples">
        <ul class="nav pl-4">
            <li @if ($pageSlug == 'history') class="active " @endif>
                <a href="">
                    <i class="tim-icons icon-single-02"></i>
                    <p>{{ __('History') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'finance') class="active " @endif>
                <a href="">
                    <i class="tim-icons icon-bullet-list-67"></i>
                    <p>{{ __('Finance') }}</p>
                </a>
            </li>
        </ul>
    </div>
</li>
<!-- <li @if ($pageSlug == 'icons') class="active " @endif>
    <a href="">
        <i class="tim-icons icon-atom"></i>
        <p>{{ __('Icons') }}</p>
    </a>
</li>
<li @if ($pageSlug == 'maps') class="active " @endif>
    <a href="">
        <i class="tim-icons icon-pin"></i>
        <p>{{ __('Maps') }}</p>
    </a>
</li>
<li @if ($pageSlug == 'notifications') class="active " @endif>
    <a href="">
        <i class="tim-icons icon-bell-55"></i>
        <p>{{ __('Notifications') }}</p>
    </a>
</li>
<li @if ($pageSlug == 'tables') class="active " @endif>
    <a href="">
        <i class="tim-icons icon-puzzle-10"></i>
        <p>{{ __('Table List') }}</p>
    </a>
</li>
<li @if ($pageSlug == 'typography') class="active " @endif>
    <a href="">
        <i class="tim-icons icon-align-center"></i>
        <p>{{ __('Typography') }}</p>
    </a>
</li>
<li @if ($pageSlug == 'rtl') class="active " @endif>
    <a href="">
        <i class="tim-icons icon-world"></i>
        <p>{{ __('RTL Support') }}</p>
    </a>
</li>
<li class=" {{ $pageSlug == 'upgrade' ? 'active' : '' }}">
    <a href="">
        <i class="tim-icons icon-spaceship"></i>
        <p>{{ __('Upgrade to PRO') }}</p>
    </a>
</li> -->