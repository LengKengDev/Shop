@extends("layouts.app")

@section("title", __("Giỏ hàng của tôi"))

@section("breadcrumbs")
    {{ Breadcrumbs::render('cart.index') }}
@endsection

@section("body")
    <div class="container">
        <div class="col-md-9" id="basket">

            <div class="box">

                <form method="get" action="{{route("checkout.index")}}">

                    <h1>{{__("Giỏ hàng của bạn")}}</h1>
                    <p class="text-muted">{{__("Bạn đang có :num sản phẩm trong giỏ hàng", ['num' => Cart::count()])}} .</p>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th colspan="2">{{__("Sản phẩm")}}</th>
                                    <th>{{__("Số lượng")}}</th>
                                    <th>{{__("Đơn giá")}}</th>
                                    <th>{{__("Giảm trừ")}}</th>
                                    <th colspan="2">{{__("Thành tiền")}}</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach(Cart::content() as $item)
                                <tr>
                                    <td>
                                        <a href="{{route("products.show", $item->model)}}">
                                            <img src="{{$item->model->getFirstMedia("images")->getFullUrl("thumb")}}" alt="{{$item->model->name}}" class="cart-img-thumb img-responsive img-thumbnail">
                                        </a>
                                    </td>
                                    <td><a href="{{route("products.show", $item->model)}}">{{$item->model->name}}</a>
                                    </td>
                                    <td>
                                        <form action=""></form>
                                        <form action="{{route("cart.update", $item->model)}}" method="POST" id="update-{{$item->rowId}}">
                                            <input type="number" value="{{$item->qty}}" class="form-control qty" name="qty" data="update-{{$item->rowId}}">
                                            <input type="hidden" name="rowId" value="{{$item->rowId}}">
                                            @method("PATCH")
                                            {{csrf_field()}}
                                        </form>

                                    </td>
                                    <td>$@money($item->price)</td>
                                    <td>$0.00</td>
                                    <td>$@money($item->subtotal)</td>
                                    <td>
                                        <a href="#" onclick="event.preventDefault();
                                   document.getElementById('{{$item->rowId}}').submit();"><i class="fa fa-trash-o text-danger"></i>
                                        </a>
                                        <div>
                                            <form action=""></form>
                                            <form action="{{route("cart.destroy", $item->model)}}" method="POST" id="{{$item->rowId}}">
                                                {{csrf_field()}}
                                                <input type="hidden" name="rowId" value="{{$item->rowId}}">
                                                @method("DELETE")
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th colspan="5">{{__("Tổng tiền sản phẩm")}}</th>
                                <th colspan="2">${{Cart::subtotal()}}</th>
                            </tr>
                            </tfoot>
                        </table>

                    </div>
                    <!-- /.table-responsive -->

                    <div class="box-footer">
                        <div class="pull-left">
                            <a href="{{route("categories.index")}}" class="btn btn-default"><i class="fa fa-chevron-left"></i> {{__("Tiếp tục mua hàng")}}</a>
                        </div>
                        <div class="pull-right">
                            @if(Cart::count() > 0)
                                <button type="submit" class="btn btn-primary">
                                    {{__("Kiểm tra đơn hàng")}} <i class="fa fa-chevron-right"></i>
                                </button>
                            @endif

                        </div>
                    </div>

                </form>

            </div>
            <!-- /.box -->

        </div>
        <!-- /.col-md-9 -->

        @include("cart.orser_summary")
        <!-- /.col-md-3 -->
    </div>
@endsection

@section("js")
    <script>
        (function(){
            $('.qty').on('change', function() {
                var data = $(this).attr("data");
                $("form#"+data).submit();
            });
        })();
    </script>
@endsection
