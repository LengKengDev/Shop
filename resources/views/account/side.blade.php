<div class="col-md-3">
    <div class="panel panel-default sidebar-menu">

        <div class="panel-heading">
            <h3 class="panel-title">Menu</h3>
        </div>

        <div class="panel-body">

            <ul class="nav nav-pills nav-stacked">
                <li class="{{Route::currentRouteName() == 'account.user' ? 'active' : ''}}">
                    <a href="{{route("account.user")}}"><i class="fa fa-user"></i> {{__("Tài khoản")}}</a>
                </li>
                <li class="{{strpos(Route::currentRouteName(), 'account.orders') !== false ? 'active' : ''}}">
                    <a href="{{route('account.orders.index')}}"><i class="fa fa-list"></i> {{__("Lịch sử đơn hàng")}}</a>
                </li>
                <li>
                    <a href="#" onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> {{__("Đăng xuất")}}</a>
                </li>
            </ul>
        </div>

    </div>
    <!-- /.col-md-3 -->

    <!-- *** CUSTOMER MENU END *** -->
</div>
