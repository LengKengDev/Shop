@extends('adminlte::page')

@section('title', __("Order :id", ["id" => $order->id]))

@section('content_header')
    <h1>{{__("Orders Management")}}</h1>
    {{ Breadcrumbs::render('admin.orders.edit', $order) }}
@stop

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">{{__("Order #:id", ["id" => $order->id])}}</h3>
                    <div class="box-tools pull-right">
                        <a href="{{route("admin.orders.index")}}" class="btn btn-danger"><i> Quay lại</i></a>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">{{__("Thông tin đơn hàng")}}</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-sm-1"><span
                                                    class="label label-primary">{{__("Ngày tạo")}}</span></div>
                                        <div class="col-sm-2">{{ $order->created_at->diffForHumans() }}
                                            <br>{{$order->created_at}}</div>
                                        <div class="col-sm-1"><span
                                                    class="label label-primary">{{__("Tài khoản")}}</span></div>
                                        <div class="col-sm-2">{{ $order->user->email}}
                                            <br> {{$order->user->name}}</div>
                                        <div class="col-sm-1"><span
                                                    class="label label-primary">{{__("Trạng thái")}}</span></div>
                                        <div class="col-sm-3 order-status">
                                            @switch($order->status)
                                                @case('processing') <div
                                                    class="text-info">Đang kiểm tra</div> @break
                                                @case('approval')  <div
                                                    class="text-warning">Đang xử lý</div> @break
                                                @case('completed') <div
                                                    class="text-success">Hoàn thành</div> @break
                                                @case('reject') <div
                                                    class="text-danger">Từ chối/ Huỷ bỏ</div> @break
                                                @default('new') <div
                                                    class="" style="color: gold">Chưa xử lý</div>
                                            @endswitch
                                        </div>
                                        <div class="col-sm-2">
                                            @if(!in_array($order->status, ['reject', 'completed']))
                                                <form action="{{route('admin.orders.update', $order)}}" method="post">
                                                    {{csrf_field()}}
                                                    @method("PATCH")
                                                    <select name="status" class="form-control">
                                                        <option value="new" {{$order->status == 'new' ? 'selected' : ''}}>Chưa xử lý</option>
                                                        <option value="processing" {{$order->status == 'processing' ? 'selected' : ''}}>Đang kiểm tra</option>
                                                        <option value="approval" {{$order->status == 'approval' ? 'selected' : ''}}>Đang xử lý</option>
                                                        <option value="completed" {{$order->status == 'completed' ? 'selected' : ''}}>Hoàn thành</option>
                                                        <option value="reject" {{$order->status == 'reject' ? 'selected' : ''}}>Từ chối/ Huỷ bỏ</option>
                                                    </select>
                                                    <input type="hidden" name="action" value="update-status">
                                                    <br>
                                                    <button class="btn btn-success btn-block"><i class="fa fa-save"></i> Cập nhật</button>
                                                </form>

                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">{{__("Nội dung đơn hàng")}}</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive" id="basket">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th colspan="2">{{__("Sản phẩm")}}</th>
                                                <th>{{__("Số lượng")}}</th>
                                                <th>{{__("Đơn giá")}}</th>
                                                <th>{{__("Giảm trừ")}}</th>
                                                <th>{{__("Thành tiền")}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($order->items as $item)
                                                <tr>
                                                    <td>
                                                        <a href="{{route("products.show", $item->product)}}">
                                                            <img src="{{$item->product->getFirstMedia("images")->getFullUrl("thumb")}}" alt="{{$item->product->name}}" class="img-responsive img-thumbnail">
                                                        </a>
                                                    </td>
                                                    <td><a href="{{route("products.show", $item->product)}}">{{$item->product->name}} {{$item->option}}</a>
                                                    </td>
                                                    <td>
                                                        {{$item->qty}}
                                                    </td>
                                                    <td>@money($item->price, "VND")</td>
                                                    <td>@money(0, "VND")</td>
                                                    <td>@money($item->price * $item->qty, "VND")</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th colspan="5">{{__("Tổng tiền")}}</th>
                                                <th colspan="2">@money($order->total, "VND")</th>
                                            </tr>
                                            </tfoot>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h3 class="panel-title">{{__("Thông tin người mua")}}</h3>
                                </div>
                                <div class="panel-body">
                                    <h3>{{__("Họ và tên")}}</h3>
                                    <input type="text" class="form-control" value="{{$order->name}} ({{$order->email}})" readonly="true">
                                    <h3>{{__("SDT")}}</h3>
                                    <input type="text" class="form-control" value="{{$order->phone}}" readonly="true">
                                    <h3>{{__("Địa chỉ")}}</h3>
                                    <textarea name="" id="" cols="30"
                                              rows="1" readonly class="form-control">{{$order->address}}</textarea>
                                    <h3>{{__("Note")}}</h3>
                                    <textarea name="" id="" cols="30"
                                              rows="1" readonly class="form-control">{{$order->note}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">

                </div>
            </div>
        </div>
    </div>
@stop

@section("adminlte_js")

@endsection
