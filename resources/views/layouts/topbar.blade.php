<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Page Heading -->
    <div class="navbar-nav mx-auto">
        @if (Route::currentRouteName() === 'data.index')
            <h1 class="h5 mb-0 font-weight-bold text-primary">NOTE</h1>
        @else
            <h1 class="h5 mb-0 font-weight-bold text-primary">DATA</h1>
        @endif
    </div>

</nav>