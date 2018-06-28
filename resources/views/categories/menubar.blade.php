<div class="box info-bar">
    <div class="row">
        <div class="col-sm-12 col-md-4 products-showing">
            {{__("Hiện")}} <strong>{{$products->count()}}</strong> {{__("trong tổng số")}} <strong>{{$total}}</strong> {{__("sản phẩm")}}
        </div>

        <div class="col-sm-12 col-md-8  products-number-sort">
            <div class="row">
                <form class="form-inline" action="/{{Request::path()}}" method="get" id="filter">
                    <div class="col-sm-6 col-sm-offset-3">
                        <div class="products-sort-by text-right">
                            <strong>{{__("Sắp xếp theo")}}</strong>
                            <select name="orderBy" class="form-control">
                                <option value="id" {{$orderBy == 'id' ? 'selected' : ''}}>{{__("Thời gian")}}</option>
                                <option value="price" {{$orderBy == 'price' ? 'selected' : ''}}>{{__("Giá cả")}}</option>
                                <option value="name" {{$orderBy == 'name' ? 'selected' : ''}}>{{__("Tên")}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="products-sort-by">
                            <select name="orderType" class="form-control">
                                <option value="desc" {{$orderType == 'desc' ? 'selected' : ''}}>{{__("Giảm dần")}}</option>
                                <option value="asc" {{$orderType == 'asc' ? 'selected' : ''}}>{{__("Tăng dần")}}</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@section('js')
    <script>
        $(document).ready(function () {
            $('select').change(function () {
                $('#filter').submit();
            });
        })
    </script>
@endsection
