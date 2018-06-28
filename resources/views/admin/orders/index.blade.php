@extends('adminlte::page')

@section('title', __("Orders Management"))

@section('content_header')
    <h1>{{__("Orders Management")}}</h1>
    {{ Breadcrumbs::render('admin.orders') }}
@stop

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">{{__("List")}}</h3>
                    <div class="box-tools pull-right">
                        <form action="{{route('admin.orders.index')}}" method="get" id="status">
                            <select name="status" class="form-control">
                                <option value="new" {{$status == 'new' ? 'selected' : ''}}>Chưa xử lý</option>
                                <option value="processing" {{$status == 'processing' ? 'selected' : ''}}>Đang kiểm tra</option>
                                <option value="approval" {{$status == 'approval' ? 'selected' : ''}}>Đang xử lý</option>
                                <option value="completed" {{$status == 'completed' ? 'selected' : ''}}>Hoàn thành</option>
                                <option value="reject" {{$status == 'reject' ? 'selected' : ''}}>Từ chối/ Huỷ bỏ</option>
                            </select>
                        </form>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped display table-bordered responsive no-wrap" width="99%">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                        </table>
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
    <script>
        $(document).ready(function () {
            $('select[name=status]').change(function () {
                $('form#status').submit();
            });

            $('table').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: '{!! route('admin.api.orders.index', ['status' => $status]) !!}',
                columns: [
                    { data: 'id', name: 'id', 'width': '50px' },
                    { data: 'user.name', name: 'user.name' },
                    { data: 'total', name: 'total', width: '100px' },
                    { data: 'status', name: 'status', width: '50px' },
                    { data: 'created_at', name: 'created_at', width: '100px' },
                    { data: 'updated_at', name: 'updated_at', width: '100px' },
                    { data: 'action', orderable: false, searchable: false},
                ]
            });
        });
    </script>
@endsection
