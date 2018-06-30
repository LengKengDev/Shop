@extends('adminlte::page')

@section('title', __("Settings"))

@section('content_header')
    <h1>{{__("Settings")}}</h1>
    {{ Breadcrumbs::render('admin.settings.slider') }}
@stop

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">{{__("Slider")}}</h3>
                    <div class="box-tools pull-right">
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form action="{{route('admin.settings.slider.store')}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <div class="col-sm-6 col-sm-offset-3">
                            <div class="form-group">
                                <label>Image</label>
                                <input  placeholder="name" type="file"
                                        name="image" required>
                            </div>
                            <div class="form-group">
                                <label>Link</label>
                                <input class="form-control"  placeholder="name" type="text"
                                       name="link" required value="#">
                            </div>
                            <div class="form-group">
                                <hr>
                                <button class="btn btn-success"><i class="fa fa-fw fa-save"></i> Save</button>
                            </div>
                        </div>


                    </form>
                </div>
            </div>

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">{{__("Current Slider")}}</h3>
                    <div class="box-tools pull-right">
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    @foreach($sliders as $slider)
                        <div class="col-sm-3">
                            <h1 class="text-center">Vị trí {{$loop->index + 1}}</h1>
                            <img src="{{$slider->getFullUrl('thumb')}}" alt="" class="img-responsive img-thumbnail">
                            <hr>
                            <h3>Link</h3>
                            <input type="text" readonly value="{{$slider->getCustomProperty('link')}}" class="form-control">
                            <hr>
                            <a href="#" class="btn btn-danger" onclick="event.preventDefault();document.getElementById('slider-{{$slider->id}}').submit()"><i class="fa fa-trash fa-fw"></i> Delete</a>
                            <form action="{{route("admin.settings.slider.destroy")}}" method="POST" id="slider-{{$slider->id}}">
                                {{csrf_field()}}
                                @method("DELETE")
                                <input type="hidden" name="id" value="{{$slider->id}}">
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
@stop

@section("adminlte_js")

@endsection
