@extends('layouts.app')

@section("title", __("Liên hệ"))

@section("breadcrumbs")
    {{ Breadcrumbs::render('pages.contact') }}
@endsection

@section('body')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                @include("pages.sidebar")
                <div class="col-md-9">
                    <div class="box" id="contact">
                        <h1 class="text-center">Liên hệ</h1>

                        <p class="lead text-center">Bạn có tò mò về điều gì đó không?
                            <br> Bạn có vấn đề gì với các sản phẩm của chúng tôi không?
                            <br>Xin vui lòng liên hệ với chúng tôi, chúng tôi đang làm việc cho bạn 24/7.
                        </p>

                        <hr>

                        <div class="row">
                            <div class="col-sm-3">
                                <h3><i class="fa fa-map-marker"></i> Hàn Quốc</h3>
                                <p>Room 302
                                    <br>Munbal road 115
                                    <br>Pajusi
                                    <br>Gunggido
                                    <br>
                                    <strong>Korea</strong>
                                </p>
                            </div>
                            <div class="col-sm-3">
                                <h3><i class="fa fa-map-marker"></i> Việt Nam</h3>
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
                                <h3><i class="fa fa-phone"></i> Kênh liên lạc</h3>
                                <b>Chị Mai Lương – Chị Nguyễn Thương
                                    .</b> <hr>
                                <p>Chat qua Facebook: Ed Eden Korea - made in Korea wholesale
                                    <br>		 -> 24/24 h
                                </p>
                                <p>Liên lạc trực tiếp qua zalo, viber: 01239681901
                                    <br> 				 -> từ 9h AM đến 5h PM</p>
                                <p>Email: <strong><a href="mailto:madeinkoreabansi@gmail.com">madeinkoreabansi@gmail.com</a></strong></p>
                            </div>
                            <!-- /.col-sm-4 -->

                        </div>
                        <!-- /.row -->

                        <hr>
                        <h2>Contact form</h2>

                        <form>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="firstname">Firstname</label>
                                        <input class="form-control" id="firstname" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="lastname">Lastname</label>
                                        <input class="form-control" id="lastname" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input class="form-control" id="email" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="subject">Subject</label>
                                        <input class="form-control" id="subject" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="message">Message</label>
                                        <textarea id="message" class="form-control"></textarea>
                                    </div>
                                </div>

                                <div class="col-sm-12 text-center">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send message</button>

                                </div>
                            </div>
                            <!-- /.row -->
                        </form>


                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

