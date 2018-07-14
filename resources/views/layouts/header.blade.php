<!-- TOP -->
<div id="top">
    <div class="container">
        <div class="col-md-6 offer" data-animate="fadeInDown">
            Liên lạc trực tiếp qua zalo, viber: 01239681901: từ 9h AM đến 5h PM
        </div>
        <div class="col-md-6" data-animate="fadeInDown">
            <ul class="menu">
                @if(!Auth::check())
                    <li><a href="{{route('login')}}">{{__("Đăng nhập")}}</a>
                    </li>
                    <li><a href="{{route('register')}}">{{__('Đăng ký')}}</a>
                    </li>
                @else
                    <li><a href="{{route('account.user')}}">{{__("Xin chào")}}, {{Auth::user()->name}}</a></li>
                    @can('manager')
                        <li><a href="{{route('admin.dashboard')}}">{{__("Admin panel")}}</a></li>
                    @endcan
                    <li><a href="#" onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                            {{__("Đăng xuất")}}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                @endif
                <li><a href="{{route("pages.contact")}}">{{__("Liên hệ")}}</a>
                </li>
                <li><a href="{{route('pages.faq')}}">{{__("Câu hỏi thường gặp")}}</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- END TOP -->

<!-- NAVBAR -->
<div class="navbar navbar-default yamm" role="navigation" id="navbar">
    <div class="container">
        <div class="navbar-header">

            <a class="navbar-brand home" href="{{route('home')}}" data-animate-hover="bounce">
                <img src="http://demo.alogs.net/img/logo.png" alt="Obaju logo" class="hidden-xs">
                <img src="img/logo-small.png" alt="Obaju logo" class="visible-xs"><span class="sr-only">Obaju - go to homepage</span>
            </a>
            <div class="navbar-buttons">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <i class="fa fa-align-justify"></i>
                </button>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
                    <span class="sr-only">Toggle search</span>
                    <i class="fa fa-search"></i>
                </button>
                <a class="btn btn-default navbar-toggle" href="{{route("cart.index")}}">
                    <i class="fa fa-shopping-cart"></i>  <span class="hidden-xs">{{Cart::count()}} - {{__("sản phẩm trong giỏ")}}</span>
                </a>
            </div>
        </div>
        <!--/.navbar-header -->

        <div class="navbar-collapse collapse" id="navigation">

            <ul class="nav navbar-nav navbar-left">
                <li><a href="{{route('home')}}">{{__("Trang chủ")}}</a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">{{__("Danh mục sản phẩm")}} <b class="caret"></b></a>
                    <ul class="dropdown-menu header-menu">
                        @foreach(App\Category::mainCategories()->get() as $category)
                            <li>
                                <a href="{{route("categories.show", ["category" => $category])}}">{{$category->name}} <b class="fa fa-caret-right pull-right" style="margin-top: -35px;"></b></a>
                                <ul>
                                    @foreach($category->childs as $sub)
                                        <li><a href="{{route("categories.show", ["category" => $sub])}}">{{$sub->name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li><a href="{{route('pages.about')}}">{{__("Về chúng tôi")}}</a>
            </ul>

        </div>
        <!--/.nav-collapse -->

        <div class="navbar-buttons">

            <div class="navbar-collapse collapse right" id="basket-overview">
                <a href="{{route("cart.index")}}" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span class="hidden-sm">{{Cart::count()}} {{__("sản phẩm trong giỏ")}}</span></a>
            </div>
            <!--/.nav-collapse -->

            <div class="navbar-collapse collapse right" id="search-not-mobile">
                <button type="button" class="btn navbar-btn btn-primary" data-toggle="collapse" data-target="#search">
                    <span class="sr-only">Toggle search</span>
                    <i class="fa fa-search"></i>
                </button>
            </div>

        </div>

        <div class="collapse clearfix" id="search">

            <form class="navbar-form" role="search" action="{{route("search.index")}}">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search" name="query">
                    <span class="input-group-btn">

			<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>

		    </span>
                </div>
            </form>

        </div>
        <!--/.nav-collapse -->

    </div>
    <!-- /.container -->
</div>
<!-- END NAVBAR -->
