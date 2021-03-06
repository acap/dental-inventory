<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="#">
            <img src="{{asset('/images/icon/logo.png')}}" alt="HAHAHA"/>
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li class="active has-sub">
                    <a href="{{url('/dashboard')}}" href="#">
                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                </li>
                <li>
                    <a href="{{url('/orders/list')}}">
                        <i class="fas fa-chart-bar"></i>Order</a>
                </li>
                <li>
                    <a href="{{url('/stocks/list')}}">
                        <i class="fas fa-table"></i>Stock</a>
                </li>
                <li>
                    <a href="{{url('/stockCodes/list')}}">
                        <i class="fas fa-table"></i>Stock Code</a>
                </li>
                <li>
                    <a href="{{url('/clients/list')}}">
                        <i class="fas fa-table"></i>Client</a>
                </li>
                <li>
                    <a href="{{url('/calendars/calendar')}}">
                        <i class="fas fa-table"></i>Calendar</a>
                </li>
                <li>
                    <a href="{{url('/ownerConfigurations/detail')}}">
                        <i class="fas fa-table"></i>Config</a>
                </li>
                <li>
                    <a href="{{url('/vendors/list')}}">
                        <i class="fas fa-table"></i>Vendor</a>
                </li>
                <li>
                    <a href="{{url('/deliveries/list')}}">
                        <i class="fas fa-table"></i>Delivery Order</a>
                </li>

            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->
