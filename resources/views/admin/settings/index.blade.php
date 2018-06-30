@extends('adminlte::page')

@section('title', __("Settings"))

@section('content_header')
    <h1>{{__("Settings")}}</h1>
    {{ Breadcrumbs::render('admin.settings') }}
@stop

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">{{__("Settings")}}</h3>
                    <div class="box-tools pull-right">
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">

                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <form action="{{route('admin.settings.update')}}" method="POST">
                        {{csrf_field()}}
                        @method('PATCH')

                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-3">
                                <div class="form-group">
                                    <label>Shop name</label>
                                    <input class="form-control"  placeholder="name" type="text"  value="{{ setting('app_name', config('app.name')) }}"
                                           name="app_name" required>
                                </div>
                                <div class="form-group">
                                    <label>Keyword</label>
                                    <input class="form-control"  placeholder="keywords" type="text"  value="{{ setting('app_keywords', '') }}"
                                           name="app_keywords" required>
                                </div>
                                <div class="form-group">
                                    <label>Keyword</label>
                                    <textarea name="app_description" id="" cols="30" class="form-control" placeholder="description"
                                              rows="2" required>{{ setting('app_description', '') }}</textarea>
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
