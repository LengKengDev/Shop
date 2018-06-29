@extends('adminlte::page')

@section('title', __("Users Management"))

@section('content_header')
    <h1>{{__("Users Management")}}</h1>
    {{ Breadcrumbs::render('admin.users') }}
@stop

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">{{__("List")}}</h3>
                    <div class="box-tools pull-right">
                        <form action="{{route('admin.users.index')}}" method="get" id="status">
                            <select name="active" class="form-control">
                                <option value="0" {{$status == 0 ? 'selected' : ''}}>Chờ xét duyệt</option>
                                <option value="1" {{$status == 1 ? 'selected' : ''}}>Thành viên chính thức</option>
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
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Created at</th>
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
            $('select[name=active]').change(function () {
                $('form#status').submit();
            });

            $('table').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: '{!! route('admin.api.users.index', ['active' => $status]) !!}',
                columns: [
                    { data: 'id', name: 'id', 'width': '50px' },
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'phone', name: 'phone' },
                    { data: 'active', name: 'active', width: '150px' },
                    { data: 'created_at', name: 'created_at', width: '100px' },
                    { data: 'action', orderable: false, searchable: false},
                ]
            });
        });
    </script>
@endsection
