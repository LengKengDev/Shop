@extends("layouts.app")

@section("title", $product->name)

@section("breadcrumbs")
    {{ Breadcrumbs::render('products.show', $product) }}
@endsection

@section("body")
    <div class="container">

        <div class="col-md-3">
            @include("categories.sidebar")
        </div>

        <div class="col-md-9">

            <div class="row" id="productMain">
                <div class="col-sm-6">
                    <div id="mainImage">
                        <img src="{{$product->getFirstMediaUrl("images")}}" alt="" class="img-responsive">
                    </div>
                    <?php
                        $top = 0;
                    ?>
                    @foreach($product->tags()->where('show_on_product', 1)->get() as $tag)
                        <div class="ribbon" style="top: {{$top}}px">
                            <div class="theribbon">{{$tag->name}}</div>
                            <div class="ribbon-background"></div>
                        </div>
                        <?php $top = $top + 50; ?>
                    @endforeach

                </div>
                <div class="col-sm-6">
                    <div class="box">
                        <h1 class="text-center">{{$product->name}}</h1>
                        <p class="goToDescription"><p href="#details" class="scroll-to">{{$product->summary}}</p>
                        </p>
                        <div class="text-center">
                            @if(in_array($product->status, ['inStock', 'outOfStock']))
                                <p class="price">
                                    @if(Auth::check())
                                        @money($product->real_price, "VND")
                                        @if($product->hasSale())
                                            <strike>@money($product->price, "VND")</strike>
                                        @endif
                                        <small>/ {{$product->unit ?: 'Cái'}}</small>
                                    @else
                                        {{__("Bạn muốn xem giá?")}}<a href="{{route("login")}}"><br>{{__("Hãy đăng nhập")}}</a>
                                    @endif
                                </p>
                                <form action="{{route("cart.store")}}" method="POST" id="product-{{$product->id}}">
                                    {{csrf_field()}}
                                    @foreach($product->options as $option)
                                        <hr>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-2 text-right"><label>{{$option->name}}</label></div>
                                                <div class="col-sm-10 text-left">
                                                    <input type="hidden" name="option[{{$option->id}}][name]" value="{{$option->name}}">
                                                    @foreach($option->values as $value)
                                                        <input type="radio" name="option[{{$option->id}}][value]" required value="{{$value->value}}" style="margin-left: 20px"> {{$value->value}}
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <input type="hidden" value="{{$product->id}}" name="id">
                                    <hr>
                                    <div class="input-group">
                                        <input type="number" class="form-control" placeholder="Qty" name="qty"
                                               value="{{old('qty', $product->minimum_unit)}}"
                                               required min="{{$product->minimum_unit}}" step="{{$product->qty_per_unit}}">
                                        <span class="input-group-btn">
                                            <button class="btn btn-primary" type="submit">
                                                <i class="fa fa-shopping-cart"></i> {{__("Thêm vào giỏ hàng")}}
                                            </button>
                                        </span>
                                    </div><!-- /input-group -->

                                </form>
                            @elseif(in_array($product->status, ['contact']))
                                <a href="#" class="btn btn-">{{__("Liên hệ")}}</a>
                            @elseif(in_array($product->status, ['deactive']))
                                <a href="#" class="btn btn-danger">{{__("Ngừng kinh doanh")}}</a>
                            @endif
                        </div>
                    </div>

                    <div class="row" id="thumbs">
                        @foreach($product->getMedia("images") as $media)
                            <div class="col-xs-4">
                                <a href="{{$media->getFullUrl()}}" class="thumb">
                                    <img src="{{$media->getFullUrl("thumb")}}" alt="" class="img-responsive">
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>


            <div class="box" id="details">
                <p>
                <h3>{{__("Thông tin sản phẩm")}}</h3>
                <hr>

                <p>{!!  $product->description !!}</p>
                <hr>
                <div class="social">
                    <h4>{{__("Chia sẻ sản phẩm tới bạn bè")}}</h4>
                    <p>
                        <a href="#" class="external facebook" data-animate-hover="pulse"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="external gplus" data-animate-hover="pulse"><i class="fa fa-google-plus"></i></a>
                        <a href="#" class="external twitter" data-animate-hover="pulse"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="email" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                    </p>
                </div>
            </div>

            <div class="row same-height-row">
                <div class="col-md-3 col-sm-6">
                    <div class="box same-height">
                        <h3>{{__("Những sản phẩm bạn có thể thích")}}</h3>
                    </div>
                </div>
                @if ($product->categories->first->parent == null)
                    @foreach(App\Product::subCategoriesProducts($product->categories->first)->take(3) as $item)
                        <div class="col-md-3 col-sm-6">
                            <div class="product same-height">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="{{route("products.show", ['product' => $item])}}">
                                                <img src="" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="{{route("products.show", ['product' => $item])}}">
                                                <img src="{{$item->getFirstMedia("images")->getFullUrl("thumb")}}" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{route("products.show", ['product' => $item])}}" class="invisible">
                                    <img src="{{$item->getFirstMedia("images")->getFullUrl("thumb")}}" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3>{{$item->name}}</h3>
                                    <p class="price">@money($item->price, 'VND')</p>
                                </div>
                            </div>
                            <!-- /.product -->
                        </div>
                    @endforeach
                @else
                    @foreach($product->categories->first()->products->take(3) as $item)
                        <div class="col-md-3 col-sm-6">
                            <div class="product same-height">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="{{route("products.show", ['product' => $item])}}">
                                                <img src="{{$item->getFirstMedia("images")->getFullUrl("thumb")}}" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="{{route("products.show", ['product' => $item])}}">
                                                <img src="{{$item->getFirstMedia("images")->getFullUrl("thumb")}}" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{route("products.show", ['product' => $item])}}" class="invisible">
                                    <img src="{{$item->getFirstMedia("images")->getFullUrl("thumb")}}" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3>{{$item->name}}</h3>
                                    <p class="price">@money($product->price)</p>
                                </div>
                            </div>
                            <!-- /.product -->
                        </div>
                    @endforeach
                @endif

            </div>

            <div class="row same-height-row">
                <div class="col-md-3 col-sm-6">
                    <div class="box same-height">
                        <h3>{{__("Những sản phẩm đã xem")}}</h3>
                    </div>
                </div>

            </div>

        </div>
        <!-- /.col-md-9 -->
    </div>
    <!-- /.container -->
@endsection
