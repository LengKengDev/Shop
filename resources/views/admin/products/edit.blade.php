@extends('adminlte::page')

@section('title', __("Edit product :name", ['name' => $product->name]))

@section('content_header')
    <h1>{{__("Product Management")}}</h1>
    {{ Breadcrumbs::render('admin.products.edit', $product) }}
@stop

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">{{__("Edit product :name", ['name' => $product->name])}}</h3>
                    <div class="box-tools pull-right">

                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form action="{{route('admin.products.update', $product)}}" method="post" id="new-product" enctype="multipart/form-data">
                        <div style="text-align:center; width:100%; padding:30px;">

                            <a href="{{route("admin.products.index")}}" class="btn btn-danger btn-lg"><i class="fa fa-backward"></i> Back</a>
                            <button class="btn btn-success btn-lg" style="margin-left: 50px"><i class="fa fa-fw fa-save"></i>Update</button>
                        </div>
                        @method("PATCH")
                        {{csrf_field()}}
                        <hr>
                        <div class="row">
                            <div class="col-sm-7">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control"  placeholder="Name" type="text" value="{{ $product->name }}"
                                                   name="name" required>
                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>SKU</label>
                                            <input class="form-control"  placeholder="SKU" type="text" value="{{ $product->sku }}"
                                                   name="sku">
                                            @if ($errors->has('sku'))
                                                <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $errors->first('sku') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select name="status" id="" required class="form-control">
                                                <option value="">--Choose--</option>
                                                <option value="inStock" {{$product->status == 'inStock' ? 'selected' : ''}}>In Stock</option>
                                                <option value="outOfStock" {{$product->status == 'outOfStock' ? 'selected' : ''}}>Out of stock</option>
                                                <option value="contact" {{$product->status == 'contact' ? 'selected' : ''}}>Contact</option>
                                                <option value="stop" {{$product->status == 'stop' ? 'selected' : ''}}>Stop</option>
                                            </select>
                                            @if ($errors->has('status'))
                                                <span class="invalid-feedback text-danger" role="alert">
                                                    <strong>{{ $errors->first('status') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Price (VND)</label>
                                            <input class="form-control"  placeholder="Price" type="number" value="{{ $product->price }}"
                                                   name="price" required min="0">
                                            @if ($errors->has('price'))
                                                <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $errors->first('price') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Sale price (VND)</label>
                                            <input class="form-control"  placeholder="Sale price" type="number" value="{{ $product->sale_price }}"
                                                   name="sale_price" min="0">
                                            @if ($errors->has('sale_price'))
                                                <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $errors->first('sale_price') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Quantity</label>
                                            <input class="form-control"  placeholder="quantity" type="number" value="{{ $product->qty }}"
                                                   name="qty" required min="0">
                                            @if ($errors->has('qty'))
                                                <span class="invalid-feedback text-danger" role="alert">
                                                    <strong>{{ $errors->first('qty') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Quantity per unit</label>
                                            <input class="form-control"  placeholder="qty per unit" type="number" value="{{ $product->qty_per_unit }}"
                                                   name="qty_per_unit" required min="1">
                                            @if ($errors->has('qty_per_unit'))
                                                <span class="invalid-feedback text-danger" role="alert">
                                                    <strong>{{ $errors->first('qty_per_unit') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Minimum unit</label>
                                            <input class="form-control"  placeholder="Minimum unit" type="number" value="{{ $product->minimum_unit }}"
                                                   name="minimum_unit" required min="1">
                                            @if ($errors->has('minimum_unit'))
                                                <span class="invalid-feedback text-danger" role="alert">
                                                    <strong>{{ $errors->first('minimum_unit') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label>Summary</label>
                                    <textarea name="summary" id="" cols="30"
                                              rows="2" required class="form-control">{{$product->summary}}</textarea>
                                    @if ($errors->has('summary'))
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $errors->first('summary') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" id="editor" cols="30"
                                              rows="20" class="form-control">{!! $product->description !!}</textarea>
                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="categories form-control" name="categories[]" multiple="multiple" required>
                                        @foreach(App\Category::mainCategories()->get() as $category)
                                            <optgroup label="{{$category->name}}">
                                                @foreach($category->childs as $sub)
                                                    <option value="{{$sub->id}}" {{in_array($sub->id, $product->categories->pluck('id')->toArray() ?? []) ? 'selected' : ''}}>{{$sub->name}}</option>
                                                @endforeach
                                            </optgroup>
                                        @endforeach
                                    </select>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label>Variants</label><a class="btn-add-option pull-right" href="#"><i class="fa fa-plus"></i> Add option</a>
                                    <div class="options">
                                        @foreach($product->options as $option)
                                            <div class="row" id="option-{{$option->id}}">
                                                <div class="col-sm-4 col-sm-offset-1">
                                                    <div class="form-group">
                                                        <label>Option</label>
                                                        <input class="form-control" placeholder="option" value="{{$option->name}}" name="options[{{$option->id}}][option]" required="" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <a href="#" class="btn-add-value" data-id="{{$option->id}}"><i class="fa fa-fw fa-plus"></i> <label for="">Add value</label></a>
                                                    <a href="#" class="btn-remove-option" data-id="{{$option->id}}"><i class="fa fa-fw fa-trash text-danger"></i> </a>
                                                    <div class="values-{{$option->id}}">
                                                        @foreach($option->values as $value)
                                                            <div class="row value-{{$value->id}}">
                                                                <div class="col-sm-10">
                                                                    <input class="form-control" name="options[{{$option->id}}][values][]" placeholder="value" type="text" value="{{$value->value}}"> <br>
                                                                </div>
                                                                <div class="col-sm-2">
                                                                    <a href="#" class="btn-remove-value" data-id="{{$value->id}}" title="Remove value"><i class="fa fa-trash text-danger"></i></a>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label>Images</label> <a class="btn-add-image pull-right" href="#"><i class="fa fa-plus"></i> Add new image</a>
                                    <div class="images-delete hidden"></div>
                                    <div class="images">
                                        @foreach($product->getMedia('images') as $media)
                                            <div class="img-demo" id="img-{{$media->id}}">
                                                <img src="{{$media->getFullUrl('thumb')}}" alt="" class="img-demo">
                                                <a href="#" title="Delete" class="text-danger btn-delete-image" data-id="{{$media->id}}"><i class="fa fa-trash fa-2x"></i></a>
                                            </div>
                                        @endforeach
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">

                </div>
            </div>
        </div>
    </div>
@stop

@section("adminlte_js")
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
    <script>
        $(document).ready(function () {
            function generateGuid() {
                var result, i, j;
                result = '';
                for(j=0; j<32; j++) {
                    if( j == 8 || j == 12|| j == 16|| j == 20)
                        result = result + '-';
                    i = Math.floor(Math.random()*16).toString(16).toUpperCase();
                    result = result + i;
                }
                return result;
            }

            $('.btn-add-image').click(function () {
                var id = generateGuid();
                var html = "<div class=\"input row\" id=\"input-"+id+"\">\n" +
                " <div class=\"col-sm-1\">\n" +
                "    <img src=\"http://via.placeholder.com/50x50\" alt=\"\" id=\"img-"+id+"\">\n" +
                " </div>\n" +
                " <div class=\"col-sm-10\">\n" +
                "    <input type=\"file\" data-target=\"img-"+id+"\" name=\"images[]\" required>\n" +
                " </div>\n" +
                " <div>\n" +
                "    <span class=\"btn btn-danger btn-delete\" data-id=\""+id+"\"><i class=\"fa fa-trash\"></i></span>\n" +
                " </div>\n" +
                "</div>";

                $('.images').append($(html));
            });

            $('.btn-add-option').click(function () {
                var id = generateGuid();
                var html = "<div class=\"row\" id=\"option-"+id+"\">\n" +
                    "        <div class=\"col-sm-4 col-sm-offset-1\">\n" +
                    "            <div class=\"form-group\">\n" +
                    "                <label>Option</label>\n" +
                    "                <input class=\"form-control\"  placeholder=\"option\" type=\"text\" value=\"\"\n" +
                    "                       name=\"options["+id+"][option]\" required>\n" +
                    "            </div>\n" +
                    "        </div>\n" +
                    "        <div class=\"col-sm-6\">\n" +
                    "            <a href=\"#\" class=\"btn-add-value\" data-id=\""+id+"\"><i class=\"fa fa-fw fa-plus\"></i> <label for=''>Add value</label></a>\n" +
                    "            <a href=\"#\" class=\"btn-remove-option\" data-id=\""+id+"\"><i class=\"fa fa-fw fa-trash text-danger\"></i> </a>" +
                    "            <div class='values-"+id+"'></div>" +
                    "       </div>\n" +
                    "    </div>";

                $('.options').append($(html));
            });

            $(document).on('click', '.btn-add-value', function () {
                var id = $(this).attr('data-id');
                var gid = generateGuid();
                var html = "<div class='row value-"+gid+"'>" +
                    "  <div class='col-sm-10'>" +
                    "    <input type='text' class='form-control' name='options["+id+"][values][]' placeholder='value'> <br>" +
                    "  </div>" +
                    "  <div class='col-sm-2'>" +
                    "    <a href='#' class='btn-remove-value' data-id='"+gid+"' title='Remove value'><i class='fa fa-trash text-danger'></i></a>" +
                    "  </div>"+
                    "</div>";

                $('.values-'+id).append($(html));
            });

            $(document).on('click', '.btn-delete', function () {
                var id = "#input-"+$(this).attr('data-id');
                $(id).remove();
            });

            $(document).on('click', '.btn-remove-value', function () {
                var id = ".value-"+$(this).attr('data-id');
                $(id).remove();
            });

            $(document).on('click', '.btn-remove-option', function () {
                var id = "#option-"+$(this).attr('data-id');
                $(id).remove();
            });

            $('.btn-delete-image').click(function () {
                var id = $(this).attr('data-id');
                var html = "<input name='delete[]' type='hidden' value='"+id+"'/>";
                $('.images-delete').append($(html));
                $("#img-"+id).remove();
            });

            $(document).on('change', 'input[type=file]', function () {
                var input = this;
                var url = $(this).val();
                var imgId = "#" + $(this).attr('data-target');
                var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
                if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg"))
                {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $(imgId).attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
                else
                {
                    $(imgId).attr('src', 'http://via.placeholder.com/50x50');
                }
            });

            $('#upload').change(function(){
                var input = this;
                var url = $(this).val();
                var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
                if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg"))
                {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#img').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
                else
                {
                    $('#img').attr('src', '/assets/no_preview.png');
                }
            });

            $('.categories').select2({placeholder: "Choose categories"});

            var editor_config = {
                path_absolute : "/",
                selector: "textarea#editor",
                plugins: [
                    "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                    "searchreplace wordcount visualblocks visualchars code fullscreen",
                    "insertdatetime media nonbreaking save table contextmenu directionality",
                    "emoticons template paste textcolor colorpicker textpattern"
                ],
                toolbar: "insertfile undo redo | styleselect | fontselect bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
                relative_urls: false,
                file_browser_callback : function(field_name, url, type, win) {
                    var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                    var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

                    var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
                    if (type == 'image') {
                        cmsURL = cmsURL + "&type=Images";
                    } else {
                        cmsURL = cmsURL + "&type=Files";
                    }

                    tinyMCE.activeEditor.windowManager.open({
                        file : cmsURL,
                        title : "{{config("app.name")}} files",
                        width : x * 0.8,
                        height : y * 0.8,
                        resizable : "yes",
                        close_previous : "no"
                    });
                }
            };

            tinymce.init(editor_config);
        });
    </script>
@endsection
