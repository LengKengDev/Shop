@extends("layouts.app")

@section("title", $category->name)

@section("breadcrumbs")
    @if($category->parent != null)
        {{ Breadcrumbs::render('categories.show2', $category) }}
    @else
        {{ Breadcrumbs::render('categories.show1', $category) }}
    @endif
@endsection

@section("body")
    <div class="container">

        <div class="col-md-3">
            @include("categories.sidebar")
        </div>

        <div class="col-md-9">
            <div class="box">
                <h2>{{$category->name}}</h2>
                <p>{{$category->description}}</p>
            </div>

        @include("categories.menubar")

        @include("categories.products")
        <!-- /.products -->

            <div class="pages">

                <ul class="pagination">
                    <li><a href="#">&laquo;</a>
                    </li>
                    <li class="active"><a href="#">1</a>
                    </li>
                    <li><a href="#">2</a>
                    </li>
                    <li><a href="#">3</a>
                    </li>
                    <li><a href="#">4</a>
                    </li>
                    <li><a href="#">5</a>
                    </li>
                    <li><a href="#">&raquo;</a>
                    </li>
                </ul>
            </div>


        </div>
        <!-- /.col-md-9 -->
    </div>
    <!-- /.container -->
@endsection
