@extends('adminlte::page')

@section('title', __("Create new category"))

@section('content_header')
    <h1>{{__("Create new category")}}</h1>
    {{ Breadcrumbs::render('admin.categories.create') }}
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
            </div>
        </div>
        <div class="col-sm-7">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">{{__("Create new category")}}
                    </h3>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                            <form action="{{route("admin.categories.store")}}" method="POST">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control"  placeholder="Name" type="text" value="{{ old('name') }}"
                                           name="name" required>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <input class="form-control"  placeholder="description" type="text" value="{{ old('description') }}"
                                           name="description" required>
                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Parent</label>
                                    <select class="form-control" name="parent_id">
                                        <option value="">ROOT</option>
                                        @foreach(App\Category::mainCategories()->get() as $c)
                                            <option value="{{$c->id}}">{{$c->name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('parent_id'))
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $errors->first('parent_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <hr>
                                    <button class="btn btn-success"><i class="fa fa-save fa-fw"></i>{{__("Create")}}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
