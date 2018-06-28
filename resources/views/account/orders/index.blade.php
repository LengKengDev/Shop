@extends("layouts.app")

@section("title", __("Lịch sử đơn hàng"))

@section("breadcrumbs")
    {{ Breadcrumbs::render('account.orders') }}
@endsection

@section("body")
    <div class="container">
        @include('account.side')
        <div class="col-md-9">
            <div class="box">
                <h1>{{__("Lịch sử đơn hàng")}}</h1>

                <p class="lead">Your orders on one place.</p>
                <p class="text-muted">If you have any questions, please feel free to <a href="contact.html">contact us</a>, our customer service center is working for you 24/7.</p>

                <hr>

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Date</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <th># {{$order->id}}</th>
                                <td>{{$order->created_at->diffForHumans()}}</td>
                                <td>@money($order->total, 'VND')</td>
                                <td><span class="label label-info">{{ucwords($order->status)}}</span>
                                </td>
                                <td><a href="{{route('account.orders.show', $order)}}" class="btn btn-primary btn-xs">{{__("Chi tiết")}}</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $orders->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
