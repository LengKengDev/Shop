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
                {{ $products->appends(['orderBy' => $orderBy, 'orderType' => $orderType])->links() }}
            </div>


        </div>
        <!-- /.col-md-9 -->
    </div>
    <!-- /.container -->
@endsection
