<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p style="overflow: hidden;text-overflow: ellipsis;max-width: 160px;" data-toggle="tooltip" title="{{ Auth::user()->name }}">{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MENU</li>
            <li><a href="{{ url('home') }}"><i class='fa fa-dashboard'></i><span>Dashboard</span></a></li>
            <li><a href="{{ url('usuarios') }}"><i class='fa fa-users'></i><span>Usuarios</span></a></li>
            <li><a href="#"><i class='fa fa-user-secret'></i><span>Clientes</span></a></li>
            <li><a href="#"><i class='fa fa-university'></i><span>Instituciones</span></a></li>
            <li class="treeview">
                <a href="#"><i class='fa fa-file'></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class='fa fa-circle-o'></i><span>Prestamos</span></a></li>
                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
