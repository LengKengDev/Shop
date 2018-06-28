@extends('adminlte::page')

@section('title', 'Products')

@section('content_header')
    <h1>{{__("Product Management")}}</h1>
    {{ Breadcrumbs::render('admin.products') }}
@stop

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">{{__("List")}}</h3>
                    <div class="box-tools pull-right">
                        <a class="btn btn-success btn-sm" href="{{route("admin.products.create")}}">
                            <i class="fa fa-plus"></i> {{__("Add new product")}}
                        </a>
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
                                <th>SKU</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Updated At</th>
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
            $('table').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: '{!! route('admin.api.products.index') !!}',
                columns: [
                    { data: 'id', name: 'id', 'width': '50px' },
                    { data: 'sku', name: 'sku' },
                    { data: 'name', name: 'name' },
                    { data: 'price', name: 'price', width: '100px' },
                    { data: 'qty', name: 'qty', width: '50px' },
                    { data: 'updated_at', name: 'updated_at', width: '150px' },
                    { data: 'action', orderable: false, searchable: false},
                ]
            });
    </script>
@endsection
