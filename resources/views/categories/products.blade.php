<div class="row products">
    @for($i = 1; $i<=9 ; $i++)
        <div class="col-md-4 col-sm-6">
            <div class="product">
                <div class="flip-container">
                    <div class="flipper">
                        <div class="front">
                            <a href="detail.html">
                                <img src="http://demo.alogs.net/img/product1_2.jpg" alt="" class="img-responsive">
                            </a>
                        </div>
                        <div class="back">
                            <a href="detail.html">
                                <img src="http://demo.alogs.net/img/product1_2.jpg" alt="" class="img-responsive">
                            </a>
                        </div>
                    </div>
                </div>
                <a href="detail.html" class="invisible">
                    <img src="http://demo.alogs.net/img/product1_2.jpg" alt="" class="img-responsive">
                </a>
                <div class="text">
                    <h3><a href="detail.html">Fur coat with {{$i}}</a></h3>
                    <p class="price">$143.00</p>
                    <p class="buttons">
                        <a href="detail.html" class="btn btn-default btn-block"><i class="fa fa-eye fa-fw"></i>View detail</a>
                    </p>
                </div>
                <!-- /.text -->
            </div>
            <!-- /.product -->
        </div>
        <!-- /.col-md-4 -->
    @endfor
</div>
