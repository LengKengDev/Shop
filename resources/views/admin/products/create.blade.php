@extends('adminlte::page')

@section('title', 'Add new Product')

@section('content_header')
    <h1>{{__("Product Management")}}</h1>
    {{ Breadcrumbs::render('admin.products.create') }}
@stop

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">{{__("Add new product")}}</h3>
                    <div class="box-tools pull-right">

                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">

                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">

                </div>
            </div>
        </div>
    </div>
@stop
