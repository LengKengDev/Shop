<!-- *** FOOTER ***
_________________________________________________________ -->
<div id="footer" data-animate="fadeInUp">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <h4>Các thông tin hữu ích</h4>

                <ul>
                    <li><a href="{{route("pages.about")}}">{{__("Về chúng tôi")}}</a>
                    </li>
                    <li><a href="{{route("pages.term")}}">{{__("Điều khoản sử dụng")}}</a>
                    </li>
                    <li><a href="{{route("pages.faq")}}">{{__("Câu hỏi thường gặp")}}</a>
                    </li>
                    <li><a href="{{route("pages.contact")}}">{{__("Liên hệ")}}</a>
                    </li>
                </ul>

                <hr class="hidden-md hidden-lg hidden-sm">

            </div>
            <!-- /.col-md-3 -->

            <div class="col-md-6 col-sm-6">
                <div class="col-sm-12">

                    <h4>{{__("Khu vực cho khách hàng")}}</h4>

                    <ul>
                        <li><a href="{{route("login")}}">{{__("Đăng nhập")}}</a>
                        </li>
                        <li><a href="{{route("register")}}">{{__("Đăng ký")}}</a>
                        </li>
                    </ul>

                    <hr class="hidden-md hidden-lg hidden-sm">

                </div>
            </div>
            <!-- /.col-md-3 -->

            <div class="col-md-3 col-sm-6 hidden">

                <h4>{{__("Địa chỉ liên hệ")}}</h4>

                <p><strong>{{setting("app_name", config("app.name"))}}</strong>
                    <br>13/25 New Avenue
                    <br>New Heaven
                    <br>45Y 73J
                    <br>England
                    <br>
                    <strong>Great Britain</strong>
                </p>

                <a href="{{route("pages.contact")}}">{{__("Đến trang liên hệ")}}</a>

                <hr class="hidden-md hidden-lg">

            </div>
            <!-- /.col-md-3 -->



            <div class="col-md-3 col-sm-6 hidden">

                <h4>Get the news</h4>

                <p class="text-muted">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>

                <form>
                    <div class="input-group">

                        <input type="text" class="form-control">

                        <span class="input-group-btn">

			    <button class="btn btn-default" type="button">Subscribe!</button>

			</span>

                    </div>
                    <!-- /input-group -->
                </form>

                <hr>

                <h4>Stay in touch</h4>

                <p class="social">
                    <a href="#" class="facebook external" data-animate-hover="shake"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="twitter external" data-animate-hover="shake"><i class="fa fa-twitter"></i></a>
                    <a href="#" class="instagram external" data-animate-hover="shake"><i class="fa fa-instagram"></i></a>
                    <a href="#" class="gplus external" data-animate-hover="shake"><i class="fa fa-google-plus"></i></a>
                    <a href="#" class="email external" data-animate-hover="shake"><i class="fa fa-envelope"></i></a>
                </p>


            </div>
            <!-- /.col-md-3 -->

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
</div>
<!-- /#footer -->

<!-- *** FOOTER END *** -->




<!-- *** COPYRIGHT ***
_________________________________________________________ -->
<div id="copyright">
    <div class="container">
        <div class="col-md-6">
            <p class="pull-left">© {{date("Y")}} {{setting('app_name', config('app.name'))}}.</p>

        </div>
        <div class="col-md-6">
            <p class="pull-right">Developed by <a href="https://fb.com/ohmygodvt95">LK</a>
            </p>
        </div>
    </div>
</div>
<!-- *** COPYRIGHT END *** -->
