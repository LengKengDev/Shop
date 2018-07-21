<!-- *** FOOTER ***
_________________________________________________________ -->
<div id="footer" data-animate="fadeInUp">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3">
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

            <div class="col-md-3 col-sm-3">
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

            <div class="col-md-6 col-sm-6">

                <h4 class="text-center">{{__("Địa chỉ liên hệ")}} (<a href="{{route("pages.contact")}}">{{__(" Đến trang liên hệ")}}</a>)</h4>

                @if(!Auth::check())
                    <h4 class="text-center blink_me" style="color: red;">{{__("Để xem được giá bán của sản phẩm, vui lòng đăng ký làm thành viên chính thức")}}
                        <a href="{{route('register')}}">{{ __(" tại đây") }}</a>.</h4>
                @endif

                <div class="row">
                    <div class="col-sm-3">
                        <h5><i class="fa fa-map-marker"></i> Hàn Quốc</h5>
                        <p>Room 302
                            <br>Munbal road 115
                            <br>Pajusi
                            <br>Gunggido
                            <br>
                            <strong>Korea</strong>
                        </p>
                    </div>
                    <div class="col-sm-3">
                        <h5><i class="fa fa-map-marker"></i> Việt Nam</h5>
                        <p>Phòng 105 – B2
                            <br>TT Vĩnh Hồ
                            <br>Quận Đống Đa
                            <br>TP Hà Nội
                            <br>
                            <strong>Việt Nam</strong>
                        </p>
                    </div>
                    <!-- /.col-sm-4 -->
                    <div class="col-sm-6">
                        <h5><i class="fa fa-phone"></i> Kênh liên lạc</h5>
                        <b>Chị Mai Lương – Chị Nguyễn Thương</b> <br> <br>
                        <p>Chat qua Facebook: Eden Korea - made in Korea wholesale
                            <br>		 -> 24/24 h
                        </p>
                        <p>Liên lạc trực tiếp qua zalo, viber: 01239681901
                            <br> 				 -> từ 9h AM đến 5h PM</p>
                        <p>Email: <strong><a href="mailto:madeinkoreabansi@gmail.com">madeinkoreabansi@gmail.com</a></strong></p>
                    </div>
                    <!-- /.col-sm-4 -->

                </div>

                <hr class="hidden-md hidden-lg">

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
