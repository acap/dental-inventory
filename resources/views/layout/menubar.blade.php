<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="#">
            <img src="/dentalInventory/public/  images/icon/logo.png" alt="Cool Admin"/>
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
                        <i class="fas fa-table"></i>Client List</a>
                </li>

                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-copy"></i>Pages</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="login.html">Login</a>
                        </li>
                        <li>
                            <a href="register.html">Register</a>
                        </li>
                        <li>
                            <a href="forget-pass.html">Forget Password</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->