<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Page Heading -->
    <div class="navbar-nav ml-auto">
            @if (Route::currentRouteName() === 'data.index')
        <h1 class="h5 mb-0 font-weight-bold text-primary">Note</h1>
        @else
        <h1 class="h5 mb-0 font-weight-bold text-primary">Data</h1>
        @endif
    </div>

</nav>