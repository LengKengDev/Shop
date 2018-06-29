@extends('adminlte::page')

@section('title', __("Users Management"))

@section('content_header')
    <h1>{{__("Users Management")}}</h1>
    {{ Breadcrumbs::render('admin.users.show', $user) }}
@stop

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">{{__("User info")}}</h3>
                    <div class="box-tools pull-right">
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="col-md-6">
                        <h2>User information</h2>
                        <hr>
                        <p> <i class="fa fa-user fa-fw"></i> {{$user->name}}
                            <br><i class="fa fa-phone fa-fw"></i> {{$user->phone}}
                            <br><i class="fa fa-building fa-fw"></i> {{$user->company}}
                            <br><i class="fa fa-map fa-fw"></i> {{$user->address}}</p>
                    </div>
                    <div class="col-sm-6">
                        <h2>Orders History</h2>
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
                                        <td><a target="_blank" href="{{route('admin.orders.edit', $order)}}" class="btn btn-primary btn-xs">{{__("Chi tiết")}}</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $orders->links() }}
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
