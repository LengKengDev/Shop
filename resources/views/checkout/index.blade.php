@extends("layouts.app")

@section("title", __("Checkout"))

@section("breadcrumbs")
    {{ Breadcrumbs::render('checkout.index') }}
@endsection

@section("body")
    <div class="container">
        <div class="col-md-9" id="basket">

            <div class="box">

                <form method="POST" action="{{route("checkout.store")}}">
                    {{csrf_field()}}
                    <h2><i class="fa fa-eye fa-fw"></i>Order review</h2>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th colspan="2">Product</th>
                                <th>Quantity</th>
                                <th>Unit price</th>
                                <th>Discount</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(Cart::content() as $item)
                                <tr>
                                    <td>
                                        <a href="{{route("products.show", $item->model)}}">
                                            <img src="{{$item->model->getFirstMedia("images")->getFullUrl("thumb")}}" alt="{{$item->model->name}}" class="img-responsive img-thumbnail">
                                        </a>
                                    </td>
                                    <td><a href="{{route("products.show", $item->model)}}">{{$item->model->name}}</a>
                                    </td>
                                    <td>
                                        {{$item->qty}}
                                    </td>
                                    <td>$@money($item->price)</td>
                                    <td>$0.00</td>
                                    <td>$@money($item->subtotal)</td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th colspan="5">Total</th>
                                <th colspan="2">${{Cart::subtotal()}}</th>
                            </tr>
                            </tfoot>
                        </table>

                    </div>

                    <h2><i class="fa fa-shopping-cart fa-fw"></i>Order information</h2>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="company">Name</label>
                                <input type="text" class="form-control" required name="name" value="{{Auth::user()->name}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="street">Company</label>
                                <input type="text" class="form-control" required name="company" value="{{Auth::user()->company}}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="company">Phone</label>
                                <input type="text" class="form-control" required name="phone" value="{{Auth::user()->phone}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="street">Email</label>
                                <input type="email" class="form-control" required name="email" value="{{Auth::user()->email}}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="company">Address</label>
                                <input type="text" class="form-control" required name="address" value="{{Auth::user()->address}}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="company">Note</label>
                                <textarea class="form-control" name="note"></textarea>
                            </div>
                        </div>
                    </div>

                        <!-- /.row -->
                    <!-- /.table-responsive -->

                    <div class="box-footer">
                        <div class="pull-left">
                            <a href="{{route("cart.index")}}" class="btn btn-default"><i class="fa fa-chevron-left"></i> Back to my cart</a>
                        </div>
                        <div class="pull-right">
                            @if(Cart::count() > 0)
                                <button type="submit" class="btn btn-primary">
                                    Complete <i class="fa fa-check"></i>
                                </button>
                            @endif

                        </div>
                    </div>

                </form>

            </div>
            <!-- /.box -->

        </div>
        <!-- /.col-md-9 -->

    @include("cart.orser_summary")
        <!-- /.col-md-3 -->
    </div>
@endsection
