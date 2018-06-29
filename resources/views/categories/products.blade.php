<div class="row products">
    @foreach($products as $product)
        <div class="col-md-4 col-sm-6">
            <div class="product">
                <div class="flip-container">
                    <div class="flipper">
                        <div class="front">
                            <a href="{{route("products.show", ['product' => $product])}}">
                                <img src="{{$product->getFirstMedia("images")->getFullUrl("thumb")}}"
                                     alt="" class="img-responsive">
                            </a>
                        </div>
                        <div class="back">
                            <a href="{{route("products.show", ['product' => $product])}}">
                                <img src="{{$product->getFirstMedia("images")->getFullUrl("thumb")}}"
                                     alt="" class="img-responsive">
                            </a>
                        </div>
                    </div>
                </div>
                <a href="{{route("products.show", ['product' => $product])}}" class="invisible">
                    <img src="{{$product->getFirstMedia("images")->getFullUrl("thumb")}}"
                         alt="" class="img-responsive">
                </a>
                <div class="text">
                    <h3><a href="{{route("products.show", ['product' => $product])}}">{{$product->name}}</a></h3>
                    <p class="price">@money($product->price, 'VND')</p>
                    <p class="buttons">
                        <a href="{{route("products.show", ['product' => $product])}}"
                           class="btn btn-default btn-block"><i class="fa fa-eye fa-fw"></i>{{__("Xem chi tiết sản phẩm")}}</a>
                    </p>
                </div>
                <!-- /.text -->
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
            <!-- /.product -->
        </div>
        <!-- /.col-md-4 -->
    @endforeach
</div>
