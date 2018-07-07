@extends('adminlte::page')

@section('title', __("Import products"))

@section('content_header')
    <h1>{{__("Import products")}}</h1>
    {{ Breadcrumbs::render('admin.import') }}
@stop

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">{{__("Import products")}}</h3>
                    <div class="box-tools pull-right">
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">

                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <form action="{{route('admin.import.store')}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-3">
                                <div class="form-group">
                                    <label>File excel</label>
                                    <br>
                                    <input  placeholder="file" type="file"  value=""
                                           name="file" required>
                                </div>

                                <div class="form-group">
                                    <hr>
                                    <button class="btn btn-success btn-lg"><i class="fa fa-fw fa-save"></i> Save</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section("adminlte_js")

@endsection
