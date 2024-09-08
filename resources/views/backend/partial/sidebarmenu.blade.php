<!-- Left Panel -->

<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu"
                aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}"><img
                    src="{{ asset('backend/adminsignuplogin/asset/images/school-logo.jpg') }}" alt="Logo"></a>
            <a class="navbar-brand hidden" href="{{ url('/') }}"><img
                    src="{{ asset('backend/adminsignuplogin/asset/images/school-logo.jpg') }}" alt="Logo"></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="nav-item {{ request()->is('ourschool-admin/dashboard') ? 'active' : '' }}">
                    <a href="{{ url('ourschool-admin/dashboard') }}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard
                    </a>
                </li>
                <li class="nav-item {{ request()->is('ourschool-admin/noticedocument/view') ? 'active' : '' }}">
                    <a href="{{ url('ourschool-admin/noticedocument/view') }}"> <i class="menu-icon fa fa-file-text"></i>Notice
                        Document</a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->

    </nav>
</aside><!-- /#left-panel -->

<!-- Left Panel -->
