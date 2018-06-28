@extends("layouts.app")

@section("title", __("Lịch sử đơn hàng"))

@section("breadcrumbs")
    {{ Breadcrumbs::render('account.orders.show', $order) }}
@endsection

@section("body")
    <div class="container">
        @include('account.side')
        <div class="col-md-9">
            <div class="box">
                <h1>Order #1735</h1>
                <hr>
                <p class="lead">{!! __("Đơn hàng số #:id được tạo lúc <strong>:time</strong>. Trạng thái hiện tại <strong>:status</strong>.", [
                    'id' => $order->id,
                    'time' => $order->created_at,
                    'status' => ucwords($order->status)
                ]) !!}</p>
                <p class="text-muted">If you have any questions, please feel free to <a href="contact.html">contact us</a>, our customer service center is working for you 24/7.</p>

                <hr>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th colspan="2">Product</th>
                            <th>Quantity</th>
                            <th>Unit price</th>
                            <th>Discount</th>
                            <th>Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($order->items as $item)
                            <tr>
                                <td>
                                    <a href="#">
                                        <img src="{{$item->product->getFirstMedia('images')->getFullUrl('thumb')}}" alt="{{$item->product->name}}" height="50px">
                                    </a>
                                </td>
                                <td><a href="{{route('products.show', $item->product)}}">{{$item->product->name}}</a>
                                </td>
                                <td>{{$item->qty}}</td>
                                <td>@money($item->price, "VND")</td>
                                <td>@money(0, "VND")</td>
                                <td>@money($item->price * $item->qty, "VND")</td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th colspan="5" class="text-right">Order subtotal</th>
                            <th>@money($order->subtotal, "VND")</th>
                        </tr>
                        <tr>
                            <th colspan="5" class="text-right">Shipping and handling</th>
                            <th>@money($order->shipping, "VND")</th>
                        </tr>
                        <tr>
                            <th colspan="5" class="text-right">Tax</th>
                            <th>@money($order->tax, "VND")</th>
                        </tr>
                        <tr>
                            <th colspan="5" class="text-right">Total</th>
                            <th>@money($order->total, "VND")</th>
                        </tr>
                        </tfoot>
                    </table>

                </div>
                <!-- /.table-responsive -->

                <div class="row addresses">
                    <div class="col-md-12">
                        <h2>Note</h2>
                        <hr>
                        <p> {{$order->note}}</p>
                    </div>
                    <div class="col-md-6">
                        <h2>Invoice info</h2>
                        <hr>
                        <p> <i class="fa fa-user fa-fw"></i> {{$order->user->name}}
                            <br><i class="fa fa-phone fa-fw"></i> {{$order->user->phone}}
                            <br><i class="fa fa-building fa-fw"></i> {{$order->user->company}}
                            <br><i class="fa fa-map fa-fw"></i> {{$order->user->address}}</p>
                    </div>
                    <div class="col-md-6">
                        <h2>Shipping info</h2>
                        <hr>
                        <p><i class="fa fa-user fa-fw"></i> {{$order->name}}
                            <br><i class="fa fa-phone fa-fw"></i> {{$order->phone}}
                            <br><i class="fa fa-building fa-fw"></i> {{$order->company}}
                            <br><i class="fa fa-map fa-fw"></i> {{$order->address}}
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
