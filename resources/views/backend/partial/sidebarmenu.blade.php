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
                    <a href="{{ url('ourschool-admin/noticedocument/view') }}"> <i
                            class="menu-icon fa fa-file-text"></i>Notice
                        Document</a>
                </li>
                <li class="nav-item {{ request()->is('ourschool-admin/teacher-login-signup-info/view') ? 'active' : '' }}">
                    <a href="{{ url('ourschool-admin/teacher-login-signup-info/view') }}"> <i class="menu-icon fa fa-sign-in" aria-hidden="true"></i>Teacher Account</a>
                </li>
                <li class="nav-item {{ request()->is('ourschool-admin/teacher/another/view') ? 'active' : '' }}">
                    <a href="{{ url('ourschool-admin/teacher/another/view') }}"> <i class="menu-icon fa fa-user"></i>Teacher Info & Form - 1</a>
                </li>
                <li class="nav-item {{ request()->is('ourschool-admin/teacher/view') ? 'active' : '' }}">
                    <a href="{{ url('ourschool-admin/teacher/view') }}"> <i class="menu-icon fa fa-user"></i>Teacher Info & Form - 2</a>
                </li>
                <li class="nav-item {{ request()->is('ourschool-admin/class-number/view') ? 'active' : '' }}">
                    <a href="{{ url('ourschool-admin/class-number/view') }}"> <i class="menu-icon fa fa-book"></i>Class Level</a>
                </li>
                <li class="nav-item {{ request()->is('ourschool-admin/class-section/view') ? 'active' : '' }}">
                    <a href="{{ url('ourschool-admin/class-section/view') }}"> <i class="menu-icon fa fa-file"></i>Class Section</a>
                </li>
                <li class="nav-item {{ request()->is('ourschool-admin/class-record/view') ? 'active' : '' }}">
                    <a href="{{ url('ourschool-admin/class-record/view') }}"> <i class="menu-icon fa fa-youtube-play"></i>Class Video Link</a>
                </li>
                <li class="nav-item {{ request()->is('ourschool-admin/lecture-note-file/view') ? 'active' : '' }}">
                    <a href="{{ url('ourschool-admin/lecture-note-file/view') }}"> <i class="menu-icon fa fa-files-o"></i>Lecture/Note</a>
                </li>

            </ul>
        </div><!-- /.navbar-collapse -->

    </nav>
</aside><!-- /#left-panel -->

<!-- Left Panel -->
