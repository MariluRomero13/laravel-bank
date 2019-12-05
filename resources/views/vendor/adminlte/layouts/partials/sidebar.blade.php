<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ Gravatar::get(Auth::user()->email) }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p style="overflow: hidden;text-overflow: ellipsis;max-width: 160px;" data-toggle="tooltip" title="{{ Auth::user()->name }}">{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif
        <!-- Sidebar Menu -->
        @if(! Auth::guest())
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MENU</li>
                @if(Auth::user()->role_id == 1)
                    <li><a href="{{ url('home') }}"><i class='fa fa-dashboard'></i><span>Dashboard</span></a></li>
                    <li><a href="{{ url('usuarios') }}"><i class='fa fa-users'></i><span>Usuarios</span></a></li>
                    <li><a href="{{ url('clientes') }}"><i class='fa fa-user-secret'></i><span>Clientes</span></a></li>
                    <li><a href="{{ url('instituciones') }}"><i class='fa fa-university'></i><span>Instituciones</span></a></li>
                    <li><a href="{{ url('tarjetas') }}"><i class='fa fa-credit-card'></i><span>Tarjetas</span></a></li>
                    <li><a href="{{ url('creditos') }}"><i class='fa fa-dollar'></i><span>Créditos</span></a></li>
                    <li><a href="{{ url('buro-credito') }}"><i class='fa fa-book'></i><span>Buro</span></a></li>
                    <li><a href="#"><i class='fa fa-balance-scale'></i><span>Préstamos</span></a></li>
                    <li><a href="{{ url('pagos') }}"><i class='fa fa-money'></i><span>Pagos</span></a></li>
                    <li class="treeview">
                        <a href="#"><i class='fa fa-file'></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="#"><i class='fa fa-circle-o'></i><span>Calcular préstamos</span></a></li>
                            <li><a href="#"><i class='fa fa-circle-o'></i><span>Préstamos clientes</span></a></li>
                            <li><a href="#"><i class='fa fa-circle-o'></i><span>Buro de crédito</span></a></li>
                        </ul>
                    </li>
                @else
                    <li><a href="{{ url('home') }}"><i class='fa fa-dashboard'></i><span>Dashboard</span></a></li>
                    <li><a href="{{ url('cliente-tarjetas') }}"><i class='fa fa-credit-card'></i><span>Tarjetas</span></a></li>
                    <li><a href="{{ url('cliente-creditos') }}"><i class='fa fa-dollar'></i><span>Créditos</span></a></li>
                    <li><a href="{{ url('cliente-prestamos') }}"><i class='fa fa-balance-scale'></i><span>Préstamos</span></a></li>
                    <li><a href="{{ url('cliente-buró') }}"><i class='fa fa-money'></i><span>Buro de crédito</span></a></li>
                @endif
            </ul><!-- /.sidebar-menu -->
        @endif
    </section>
    <!-- /.sidebar -->
</aside>
