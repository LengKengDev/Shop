@extends('adminlte::page')

@section('title', __("Edit :name", ['name' => $category->name]))

@section('content_header')
    <h1>{{__("Categories")}}</h1>
    {{ Breadcrumbs::render('admin.categories.edit', $category) }}
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
                    <h3 class="box-title">{{__("Edit ")}}
                        <i class="fa fa-quote-left fa-fw"></i>
                        {{__(":name", ['name' => $category->name])}}
                        <i class="fa fa-quote-right fa-fw"></i>
                    </h3>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                            <form action="{{route("admin.categories.update", $category)}}" method="POST">
                                @method("PATCH")
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control"  placeholder="Name" type="text" value="{{ $category->name }}"
                                           name="name" required>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <input class="form-control"  placeholder="description" type="text" value="{{ $category->description }}"
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
                                        <option value="" {{$category->parent_id == null ? 'selected' : ''}}>ROOT</option>
                                        @foreach(App\Category::mainCategories()->get() as $c)
                                            <option value="{{$c->id}}" {{$category->parent_id == $c->id ? 'selected' : ''}}>{{$c->name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <hr>
                                    <input type="hidden" name="submit" value="update-info">
                                    <button class="btn btn-success"><i class="fa fa-save fa-fw"></i>{{__("Save")}}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
