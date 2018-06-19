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

                {{ $products->links() }}
            </div>


        </div>
        <!-- /.col-md-9 -->
    </div>
    <!-- /.container -->
@endsection
