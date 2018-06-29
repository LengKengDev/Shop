@extends('adminlte::page')

@section('title', __("Tags Management"))

@section('content_header')
    <h1>{{__("Tags Management")}}</h1>
    {{ Breadcrumbs::render('admin.tags.edit', $tag) }}
@stop

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">{{__("Chỉnh sửa tag")}}</h3>
                    <div class="box-tools pull-right">
                        <a href="{{route("admin.tags.index")}}" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-arrow-circle-left"></i> Quay lại</a>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2">
                            <form action="{{route("admin.tags.update", $tag)}}" method="post">
                                {{csrf_field()}}
                                @method("PATCH")
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label>Tag name</label>
                                            <input class="form-control"  placeholder="name tag" type="text"  value="{{ old('name', $tag->name) }}"
                                                   name="name" required>
                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback text-danger" role="alert">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Tag title(Hiển thị khi nó đc show trên home)</label>
                                            <input class="form-control"  placeholder="title tag" type="text"  value="{{ old('title', $tag->title) }}"
                                                   name="title">
                                            @if ($errors->has('title'))
                                                <span class="invalid-feedback text-danger" role="alert">
                                                    <strong>{{ $errors->first('title') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Độ ưu tiên</label>
                                            <input class="form-control"  placeholder="Độ ưu tiên" type="number"  value="{{ old('position', $tag->position) }}"
                                                   name="position" min="1" required>
                                            @if ($errors->has('position'))
                                                <span class="invalid-feedback text-danger" role="alert">
                                                    <strong>{{ $errors->first('position') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Settings</label>
                                            <hr>

                                            <select name="show_on_home">
                                                <option value="1" {{$tag->show_on_home == true ? 'selected' : ''}}>Hiện</option>
                                                <option value="0" {{$tag->show_on_home != true ? 'selected' : ''}}>Ẩn</option>
                                            </select> Show on home page
                                            <hr>

                                            <select name="show_on_product">
                                                <option value="1" {{$tag->show_on_product == true ? 'selected' : ''}}>Hiện</option>
                                                <option value="0" {{$tag->show_on_product != true ? 'selected' : ''}}>Ẩn</option>
                                            </select> Show on product
                                        </div>
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <label>Products</label>
                                            <select name="products[]" class="form-control products" multiple>
                                                @foreach(\App\Product::all() as $product)
                                                    <option value="{{$product->id}}" {{in_array($product->id, $tag->products->pluck('id')->toArray()) ? 'selected' : ''}}>{{$product->sku}}: {{$product->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-sm-4 col-sm-offset-4">
                                        <hr>
                                        <button class="btn btn-success btn-block"><i class="fa fa-fw fa-save"></i> Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
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
            $('select.products').select2({placeholder: "Choose product"});
        })
    </script>
@endsection
