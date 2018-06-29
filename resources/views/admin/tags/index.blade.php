@extends('adminlte::page')

@section('title', __("Tags Management"))

@section('content_header')
    <h1>{{__("Tags Management")}}</h1>
    {{ Breadcrumbs::render('admin.tags') }}
@stop

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">{{__("List")}}</h3>
                    <div class="box-tools pull-right">
                        <a href="{{route("admin.tags.create")}}" class="btn btn-success btn-sm"><i class="fa fa-fw fa-plus"></i> Thêm tag mới</a>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Title</th>
                            <th>Show on home</th>
                            <th>Show on product</th>
                            <th>Products</th>
                            <th>Updated at</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach(\App\Tag::all() as $tag)
                                <tr>
                                    <td>{{$tag->id}}</td>
                                    <td>{{$tag->name}}</td>
                                    <td>{{$tag->title}}</td>
                                    <td>
                                        @if($tag->show_on_home == true)
                                            <i class="fa fa-check text-success"></i>
                                        @else
                                            <i class="fa fa-close text-danger"></i>
                                        @endif
                                    </td>
                                    <td>
                                        @if($tag->show_on_product == true)
                                            <i class="fa fa-check text-success"></i>
                                        @else
                                            <i class="fa fa-close text-danger"></i>
                                        @endif
                                    </td>
                                    <td>{{$tag->products()->count()}}</td>
                                    <td>{{$tag->updated_at->diffForHumans()}}</td>
                                    <td>
                                        <a href="{{route('admin.tags.edit', $tag)}}" class="btn btn-primary btn-sm"> <i class="fa fa-fw fa-edit"></i> </a>
                                        <a href="#" class="btn btn-danger btn-sm" onclick="event.preventDefault();document.getElementById('delete-{{$tag->id}}').submit()"><i class="fa fa-trash"></i></a>
                                        <form action="{{route("admin.tags.destroy", $tag)}}" method="POST" id="delete-{{$tag->id}}">
                                            {{csrf_field()}}
                                            @method("DELETE")
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
