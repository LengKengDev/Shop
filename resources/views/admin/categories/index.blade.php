@extends('adminlte::page')

@section('title', 'Categories')

@section('content_header')
    <h1>{{__("Categories")}}</h1>
    {{ Breadcrumbs::render('admin.categories') }}
@stop

@section('content')
    <div class="row">
        <div class="col-sm-5">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">{{__("Menu")}}</h3>
                    <div class="box-tools pull-right">
                        @include("admin.categories.add")
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    @include("admin.categories.menu")
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">

                </div>
            </div>
        </div>
    </div>
@stop
