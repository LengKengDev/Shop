<div class="col-md-3">
    <div class="box" id="order-summary">
        <div class="box-header">
            <h3>Order summary</h3>
        </div>
        <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>

        <div class="table-responsive">
            <table class="table">
                <tbody>
                <tr>
                    <td>Order subtotal</td>
                    <th>${{Cart::subtotal()}}</th>
                </tr>
                <tr class="hidden">
                    <td>Shipping and handling</td>
                    <th>$10.00</th>
                </tr>
                <tr>
                    <td>Tax</td>
                    <th>${{Cart::tax()}}</th>
                </tr>
                <tr class="total">
                    <td>Total</td>
                    <th>${{Cart::total()}}</th>
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
