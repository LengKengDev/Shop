@extends("layouts.app")

@section("title", __("Categories"))

@section("breadcrumbs")
    {{ Breadcrumbs::render('categories') }}
@endsection

@section("body")
    <div class="container">

        <div class="col-md-3">
            @include("categories.sidebar")
        </div>

        <div class="col-md-9">
            <div class="box">
                <h1>Categories</h1>
                <p>In our shop offer wide selection of the best products we have found and carefully selected worldwide.</p>
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
