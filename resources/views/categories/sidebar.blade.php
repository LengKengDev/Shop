<!-- *** MENUS AND FILTERS *** -->
<div class="panel panel-default sidebar-menu">

    <div class="panel-heading">
        <h3 class="panel-title">Categories</h3>
    </div>

    <div class="panel-body">
        <ul class="nav nav-pills nav-stacked category-menu">
            @foreach(App\Category::mainCategories()->get() as $category)
                <li>
                    <a href="{{route("categories.show", ["category" => $category])}}">
                        {{$category->name}} <span class="badge pull-right">{{$category->childs->count()}}</span>
                    </a>
                    <ul>
                        @foreach($category->childs as $sub)
                            <li><a href="{{route("categories.show", ["category" => $sub])}}">{{$sub->name}}</a></li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>

    </div>
</div>

<div class="banner">
    <a href="#">
        <img src="http://demo.alogs.net/img/banner.jpg" alt="sales 2014" class="img-responsive">
    </a>
</div>
<!-- *** MENUS AND FILTERS END *** -->
