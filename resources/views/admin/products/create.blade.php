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
                    <form action="{{route('admin.products.store')}}" method="post" id="new-product" enctype="multipart/form-data">
                        <div style="text-align:center; width:100%; padding:30px;">

                            <a href="{{route("admin.products.index")}}" class="btn btn-danger btn-lg"><i class="fa fa-backward"></i> Back</a>
                            <button class="btn btn-success btn-lg" style="margin-left: 50px"><i class="fa fa-fw fa-save"></i>Save</button>
                        </div>

                        {{csrf_field()}}
                        <hr>
                        <div class="row">
                            <div class="col-sm-7">
                                <div class="row">
                                    <div class="col-sm-8">
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
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>SKU</label>
                                            <input class="form-control"  placeholder="SKU" type="text" value="{{ old('sku') }}"
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
                                                <option value="inStock" {{old('status' == 'inStock' ? 'selected' : '')}}>In Stock</option>
                                                <option value="outOfStock" {{old('status' == 'outOfStock' ? 'selected' : '')}}>Out of stock</option>
                                                <option value="contact" {{old('status' == 'contact' ? 'selected' : '')}}>Contact</option>
                                                <option value="stop" {{old('status' == 'stop' ? 'selected' : '')}}>Stop</option>
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
                                            <input class="form-control"  placeholder="Price" type="number" value="{{ old('price', 0) }}"
                                                   name="price" required min="0">
                                            @if ($errors->has('price'))
                                                <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $errors->first('price') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Sale price (VND)</label>
                                            <input class="form-control"  placeholder="Sale price" type="number" value="{{ old('sale_price', 0) }}"
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
                                            <input class="form-control"  placeholder="quantity" type="number" value="{{ old('qty', 1) }}"
                                                   name="qty" required min="0">
                                            @if ($errors->has('qty'))
                                                <span class="invalid-feedback text-danger" role="alert">
                                                    <strong>{{ $errors->first('qty') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label>Unit label</label>
                                            <input class="form-control"  placeholder="unit" type="text" value="{{ old('unit', "Cái") }}"
                                                   name="unit" required>
                                            @if ($errors->has('unit'))
                                                <span class="invalid-feedback text-danger" role="alert">
                                                    <strong>{{ $errors->first('unit') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label>Quantity per inc</label>
                                            <input class="form-control"  placeholder="qty per inc" type="number" value="{{ old('qty_per_unit', 1) }}"
                                                   name="qty_per_unit" required min="1">
                                            @if ($errors->has('qty_per_unit'))
                                                <span class="invalid-feedback text-danger" role="alert">
                                                    <strong>{{ $errors->first('qty_per_unit') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Minimum unit</label>
                                            <input class="form-control"  placeholder="Minimum unit" type="number" value="{{ old('minimum_unit', 1) }}"
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
                                              rows="2" required class="form-control">{{old('summary')}}</textarea>
                                    @if ($errors->has('summary'))
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $errors->first('summary') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" id="editor" cols="30"
                                              rows="20" class="form-control">{!! old('description') !!}</textarea>
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
                                                    <option value="{{$sub->id}}" {{in_array($sub->id, old('categories') ?? []) ? 'selected' : ''}}>{{$sub->name}}</option>
                                                @endforeach
                                            </optgroup>
                                        @endforeach
                                    </select>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label>Variants</label><a class="btn-add-option pull-right" href="#"><i class="fa fa-plus"></i> Add option</a>
                                    <div class="options"></div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label>Images</label> <a class="btn-add-image pull-right" href="#"><i class="fa fa-plus"></i> Add new image</a>
                                    <div class="images">
                                        <div class="input row" id="input-1">
                                            <div class="col-sm-1">
                                                <img src="{{old('images[0][]', 'http://via.placeholder.com/50x50')}}" alt="" id="img-1">
                                            </div>
                                            <div class="col-sm-10">
                                                <input type="file" data-target="img-1" name="images[]" required>
                                            </div>
                                        </div>
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
