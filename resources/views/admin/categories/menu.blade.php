<div class=" sidebar-menu">
    <ul class="nav nav-pills nav-stacked category-menu">
        @foreach(App\Category::mainCategories()->get() as $category)
            <li>
                <div href="#">
                    <i class="fa fa-minus"></i> {{$category->position}}. {{$category->name}}
                    <span class="pull-right">
                        <a href="#" class="btn btn-default btn-xs" onclick="event.preventDefault();
                                document.getElementById('up-{{$category->id}}').submit();">
                            <i class="fa fa-arrow-up"></i>
                        </a>
                        <a href="#" class="btn btn-default btn-xs" onclick="event.preventDefault();
                                document.getElementById('down-{{$category->id}}').submit();">
                            <i class="fa fa-arrow-down"></i>
                        </a>
                        <a href="{{route("admin.categories.edit", $category)}}" class="btn btn-xs btn-primary" title="Edit">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="#" class="btn btn-xs btn-danger" title="Delete" onclick="event.preventDefault();
                                document.getElementById('category-{{$category->id}}').submit();">
                            <i class="fa fa-trash"></i>
                        </a>
                    </span>
                    <form action=""></form>
                    <form action="{{route('admin.categories.update', $category)}}" method="POST" id="up-{{$category->id}}" name="up-{{$category->id}}">
                        {{csrf_field()}}
                        @method('PATCH')
                        <input type="hidden" name="update" value="update-position">
                        <input type="hidden" name="action" value="up">
                    </form>

                    <form action="{{route('admin.categories.update', $category)}}" method="POST" id="down-{{$category->id}}">
                        {{csrf_field()}}
                        @method('PATCH')
                        <input type="hidden" name="update" value="update-position">
                        <input type="hidden" name="action" value="down">
                    </form>

                    <form action="{{route("admin.categories.destroy", $category)}}" method="POST" id="category-{{$category->id}}">
                        {{csrf_field()}}
                        @method('DELETE')
                    </form>
                </div>
                <ul>
                    @foreach($category->childs as $sub)
                        <li>
                            <div href="#"><i class="fa fa-minus"></i> {{$sub->position}}. {{$sub->name}}
                                <span class="pull-right">
                                    <a href="#" class="btn btn-default btn-xs" onclick="event.preventDefault();
                                            document.getElementById('up-{{$sub->id}}').submit();">
                                        <i class="fa fa-arrow-up"></i>
                                    </a>
                                    <a href="#" class="btn btn-default btn-xs" onclick="event.preventDefault();
                                            document.getElementById('down-{{$sub->id}}').submit();">
                                        <i class="fa fa-arrow-down"></i>
                                    </a>
                                    <a class="btn btn-xs btn-primary" href="{{route("admin.categories.edit", $sub)}}" title="Edit">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="#" class="btn btn-xs btn-danger" title="Delete" onclick="event.preventDefault();
                                            document.getElementById('category-{{$sub->id}}').submit();">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </span>
                                <form action="{{route('admin.categories.update', $sub)}}" method="POST" id="up-{{$sub->id}}">
                                    {{csrf_field()}}
                                    @method('PATCH')
                                    <input type="hidden" name="update" value="update-position">
                                    <input type="hidden" name="action" value="up">
                                </form>

                                <form action="{{route('admin.categories.update', $sub)}}" method="POST" id="down-{{$sub->id}}">
                                    {{csrf_field()}}
                                    @method('PATCH')
                                    <input type="hidden" name="update" value="update-position">
                                    <input type="hidden" name="action" value="down">
                                </form>

                                <form action="{{route("admin.categories.destroy", $sub)}}" method="POST" id="category-{{$sub->id}}">
                                    {{csrf_field()}}
                                    @method('DELETE')
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>
</div>
