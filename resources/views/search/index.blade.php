@extends("layouts.app")

@section("title", __("Tìm kiếm"))

@section("breadcrumbs")
    {{ Breadcrumbs::render('search') }}
@endsection

@section("body")
    <div class="container">

        <div class="col-md-3">
            @include("categories.sidebar")
        </div>

        <div class="col-md-9">
            <div class="box">
                <h1>{{__("Tìm kiếm")}}</h1>
                @if(strlen($query) > 0)
                    <p>{{__("Bạn vừa tìm kiếm: :query", ['query' => $query])}}</p>
                @endif

                @if($products->count() == 0)
                    <p class="text-center">{{__("Không tìm thấy kết quả nào.")}}</p>
                @endif
            </div>
        @include("categories.products")
        <!-- /.products -->

            <div class="pages">
                {{ $products->appends(['query' => $query])->links() }}
            </div>


        </div>
        <!-- /.col-md-9 -->
    </div>
    <!-- /.container -->
@endsection
