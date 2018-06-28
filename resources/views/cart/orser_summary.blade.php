<div class="col-md-3">
    <div class="box" id="order-summary">
        <div class="box-header">
            <h3>{{__("Thông tin đơn hàng")}}</h3>
        </div>
        <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>

        <div class="table-responsive">
            <table class="table">
                <tbody>
                <tr>
                    <td>{{__("Tổng tiền sản phẩm")}}</td>
                    <th>@money(Cart::subtotal(), "VND")</th>
                </tr>
                <tr class="">
                    <td>{{__("Phí ship hàng")}}</td>
                    <th>@money(config("cart.shipping_fee"), "VND")</th>
                </tr>
                <tr>
                    <td>{{__("Thuế")}}</td>
                    <th>@money(Cart::tax(), "VND")</th>
                </tr>
                <tr class="total">
                    <td>{{__("Tổng tiền thanh toán")}}</td>
                    <th>@money(Cart::total() + config("cart.shipping_fee"), "VND")</th>
                </tr>
                </tbody>
            </table>
        </div>

    </div>


    <div class="box hidden">
        <div class="box-header">
            <h4>Coupon code</h4>
        </div>
        <p class="text-muted">If you have a coupon code, please enter it in the box below.</p>
        <form>
            <div class="input-group">

                <input type="text" class="form-control">

                <span class="input-group-btn">

					<button class="btn btn-primary" type="button"><i class="fa fa-gift"></i></button>

				    </span>
            </div>
            <!-- /input-group -->
        </form>
    </div>

</div>
