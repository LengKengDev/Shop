@extends("layouts.app")

@section("title", __("Trang chủ"))

@section("body")
    {{--Slider--}}
    <div class="container">
        <div class="col-md-12">
            <div id="main-slider">
                <div class="item">
                    <img src="http://demo.alogs.net/img/main-slider1.jpg" alt=""
                         class="img-responsive">
                </div>
                <div class="item">
                    <img class="img-responsive"
                         src="http://demo.alogs.net/img/main-slider2.jpg"
                         alt="">
                </div>
                <div class="item">
                    <img class="img-responsive"
                         src="http://demo.alogs.net/img/main-slider3.jpg"
                         alt="">
                </div>
                <div class="item">
                    <img class="img-responsive"
                         src="http://demo.alogs.net/img/main-slider4.jpg"
                         alt="">
                </div>
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
    <div id="hot">

        <div class="box">
            <div class="container">
                <div class="col-md-12">
                    <h2>{{__("Sản phẩm HOT")}}</h2>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="product-slider">
                @foreach(App\Product::hotProducts()->get() as $item)
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
                                <p class="price">$1{{$item->price}}</p>
                            </div>
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

    <!-- BLOG HOMEPAGE-->
    <div class="box text-center" data-animate="fadeInUp">
        <div class="container">
            <div class="col-md-12">
                <h3 class="text-uppercase">From our blog</h3>

                <p class="lead">What's new in the world of fashion? <a
                            href="blog.html">Check our blog!</a>
                </p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="col-md-12" data-animate="fadeInUp">

            <div id="blog-homepage" class="row">
                <div class="col-sm-6">
                    <div class="post">
                        <h4><a href="post.html">Fashion now</a></h4>
                        <p class="author-category">By <a href="#">John Slim</a> in <a href="">Fashion and style</a>
                        </p>
                        <hr>
                        <p class="intro">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean
                            ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                        <p class="read-more"><a href="post.html" class="btn btn-primary">Continue reading</a>
                        </p>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="post">
                        <h4><a href="post.html">Who is who - example blog post</a></h4>
                        <p class="author-category">By <a href="#">John Slim</a> in <a href="">About Minimal</a>
                        </p>
                        <hr>
                        <p class="intro">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean
                            ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                        <p class="read-more"><a href="post.html" class="btn btn-primary">Continue reading</a>
                        </p>
                    </div>

                </div>

            </div>
            <!-- /#blog-homepage -->
        </div>
    </div>

@endsection
