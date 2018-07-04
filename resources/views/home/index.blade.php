@extends("layouts.app")

@section("title", __("Trang chủ"))

@section("body")
    {{--Slider--}}
    <div class="container">
        @if(session('register'))
            <div class="col-sm-12">
                <div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert"
                            aria-hidden="true">&times;
                    </button>
                    <strong>{{__("Lời nhắn từ hệ thống")}}</strong> <br>
                    {{__("Bạn đã đăng ký tài khoản thành công.
                    Để KÍCH HOẠT tài khoản vui lòng gửi ảnh CMND xác minh đến email :email .", ['email' => 'sales@madeinkorea.vn'])}}
                    <br>
                    {{__("Nếu có bất kỳ câu hỏi nào vui lòng xem giải đáp tại ")}}
                    <a href="{{route("pages.faq")}}">đây</a>
                </div>
            </div>
        @endif
        <div class="col-md-12">
            <div id="main-slider">
                @foreach(\App\User::find(1)->getMedia('sliders') as $slider)
                    <div class="item">
                        <a href="{{$slider->getCustomProperty('link')}}">
                            <img src="{{$slider->getFullUrl('thumb')}}" alt=""
                                 class="img-responsive">
                        </a>
                    </div>
                @endforeach
            </div>
            <!-- /#main-slider -->
        </div>
    </div>
    {{--ADS--}}
    <div id="advantages">
        <div class="container">
            <div class="same-height-row">
                <div class="col-sm-4">
                    <div class="box same-height clickable">
                        <div class="icon"><i class="fa fa-heart"></i>
                        </div>

                        <h3><a href="#">{{__("Yêu quý khách hàng")}}</a></h3>
                        <p>{{__("Chúng tôi được biết đến như là nhà cung cấp sản phẩm tốt nhất")}}.</p>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="box same-height clickable">
                        <div class="icon"><i class="fa fa-tags"></i>
                        </div>

                        <h3><a href="#">{{__("Giá tốt nhất")}}</a></h3>
                        <p>{{__("Giá cả cạnh tranh luôn là lợi thế của chúng tôi")}}.</p>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="box same-height clickable">
                        <div class="icon"><i class="fa fa-thumbs-up"></i>
                        </div>

                        <h3><a href="#">100% {{__("Hài lòng")}}</a></h3>
                        <p>{{__("Miễn phí đổi trả nếu có bất kỳ vấn đề gì của sản phẩm")}}.</p>
                    </div>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->
    </div>
    <!-- HOT PRODUCT-->
    @foreach(\App\Tag::with(['products', 'products.tags'])->where('show_on_home', 1)->orderBy('position', 'desc')->get() as $tag)
        <div id="hot">

            <div class="box">
                <div class="container">
                    <div class="col-md-12">
                        <h2>{{$tag->title}}</h2>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="product-slider">
                    @foreach($tag->products as $item)
                        <div class="item">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="{{route("products.show", $item)}}">
                                                <img src="{{$item->getFirstMedia("images")->getFullUrl("thumb")}}"
                                                     alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="{{route("products.show", $item)}}">
                                                <img src="{{$item->getFirstMedia("images")->getFullUrl("thumb")}}"
                                                     alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{route("products.show", $item)}}" class="invisible">
                                    <img src="{{$item->getFirstMedia("images")->getFullUrl("thumb")}}"
                                         alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3><a href="{{route("products.show", $item)}}">{{$item->name}}</a></h3>
                                    <p class="price">
                                        @if(Auth::check())
                                            {{money($item->real_price, 'VND')}}
                                            @if ($item->hasSale())
                                                <strike>{{money($item->price, 'VND')}}</strike>
                                            @else
                                                <strike></strike>
                                            @endif
                                        @endif
                                    </p>
                                </div>
                                <?php
                                    $top = 0;
                                ?>
                                @foreach($item->tags()->where('show_on_product', 1)->get() as $tag)
                                    <div class="ribbon" style="top: {{$top}}px">
                                        <div class="theribbon">{{$tag->name}}</div>
                                        <div class="ribbon-background"></div>
                                    </div>
                                <?php $top = $top + 50; ?>
                            @endforeach
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>
                    @endforeach
                </div>
                <!-- /.product-slider -->
            </div>
            <!-- /.container -->

        </div>
    @endforeach

    <!-- BLOG HOMEPAGE-->
    <div class="box text-center" data-animate="fadeInUp">
        <div class="container">
            <div class="col-md-12">
                <h3 class="text-uppercase">{{__("Chúng tôi luôn phục vụ 24/24")}}</h3>

                <p class="lead">{!! __("24 giờ một ngày, 7 ngày trong một tuần. <br>
                Chúng tôi luôn đảm bảo bạn có thể đặt hàng bất kỳ thời gian nào trong ngày. ")!!}</a>
                </p>
            </div>
        </div>
    </div>

@endsection
