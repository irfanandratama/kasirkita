@if (session($key ?? 'success'))
    <div class="alert alert-success alert-dismissible show fade">
        <div class="alert-body">
            <button class="close" data-dismiss="alert">
            <span>&times;</span>
            </button>
            {{ session($key ?? 'success') }}
        </div>
    </div>
@elseif (session($key ?? 'danger'))
    <div class="alert alert-danger alert-dismissible show fade">
        <div class="alert-body">
            <button class="close" data-dismiss="alert">
            <span>&times;</span>
            </button>
            {{ session($key ?? 'danger') }}
        </div>
    </div>
@endif
