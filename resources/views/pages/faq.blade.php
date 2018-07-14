@extends('layouts.app')

@section("title", __("Câu hỏi thường gặp"))

@section("breadcrumbs")
    {{ Breadcrumbs::render('pages.faq') }}
@endsection

@section('body')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                @include("pages.sidebar")
                <div class="col-md-9">
                    <div class="box" id="contact">
                        <h1 class="text-center">{{__("Câu hỏi thường gặp")}}</h1>

                        <p class="lead text-center">Bạn có tò mò về điều gì đó không?
                            <br> Bạn có vấn đề gì với các sản phẩm của chúng tôi không?
                            <br>Xin vui lòng liên hệ với chúng tôi, chúng tôi đang làm việc cho bạn 24/7.
                        </p>

                        <hr>

                        <div class="panel-group" id="accordion">

                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h4 class="panel-title">

                                        <a data-toggle="collapse" data-parent="#accordion" href="#faq1" class="collapsed">

                                            1. Làm cách nào để trở thành viên chính thức của madeinkorea.com.vn?

                                        </a>

                                    </h4>
                                </div>
                                <div id="faq1" class="panel-collapse collapse" style="height: 0px;">
                                    <div class="panel-body">
                                        <p>Muốn đăng kí làm thành viên chính thức bạn phải là 1 đơn vị đang kinh doanh online hoặc offline những sản phẩm nằm trong danh mục những ngành hàng mà chúng tôi đang cung cấp.
                                            .</p>
                                        <p>Đăng kí thành viên: sau khi điền đầy đủ thông tin, bạn nhấn nút đăng ký. Lúc đó yêu cầu được trở thành thành viên chính thức của bạn đã được gửi đến chúng tôi.
                                        </p>
                                        <p>Sau đó bạn liên lạc trực tiếp với chúng tôi qua địa chỉ email: madeinkoreabansi@gmail.com hoặc qua Zalo, hoặc viber 01239681901 và cung cấp một trong những thông tin sau đây để chúng tôi có thể xác nhận quyền thành viên cho bạn:</p>
                                        <ol>
                                            <li>Giấy đăng kí kinh doanh có tên của bạn.</li>
                                            <li>Hoặc minh chứng về việc bạn đang kinh doanh online hoặc offline như trang web, page
                                                .</li>
                                        </ol>
                                        <p>Sau khi xác thực các thông tin trên của các bạn, chúng tôi sẽ hoàn tất bước xác nhận các bạn là thành viên chính thức của madeinkorea.com.vn và gửi thông báo xác nhận qua email cho bạn.
                                        </p>
                                        <p>Trước khi được xác nhận là thành viên chính thức của madeinkorea.com.vn bạn chỉ có thể truy cập với tư cách khách mời, chỉ xem được ảnh, không xem được giá và tiến hành giao dịch hay hưởng các dịch vụ ưu đãi từ chúng tôi.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- /.panel -->

                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h4 class="panel-title">

                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="collapsed">

                                            2. Muốn xem được giá của sản phẩm trên trang web phải làm thế nào?

                                        </a>

                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        Cách duy nhất để xem được giá trên madeinkorea là trở thành thành viên
                                        chính thức của chúng tôi. Các khách hàng muốn mua lẻ, số lượng nhỏ, đơn
                                        vị chúng tôi từ chối cung cấp giá và sản phẩm. Các khách dó chúng tôi sẽ
                                        hướng dẫn cách liên lạc với các thành viên
                                        chính thức để các bạn phục vụ khách hàng một cách nhanh nhất và tốt nhất
                                    </div>
                                </div>
                            </div>
                            <!-- /.panel -->


                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h4 class="panel-title">

                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="collapsed">

                                            3. Muốn duy trì quyền hạn của thành viên chính thức thì phải làm thế nào?

                                        </a>

                                    </h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        -	Khi các bạn đã trở thành thành viên chính thức của madeinkorea.com.vn, các bạn có quyền được biết giá bán buôn chúng tôi cung cấp ra thị trường, được quyền mua số lượng lớn, với giá rất cạnh tranh trên thị trường đồng thời hưởng những ưu đãi hấp dẫn dành cho thành viên của chúng tôi.
                                        <br>
                                        -	Sau 2 tuần kể từ khi được cấp quyền thành viên chính thức, nếu bạn không có giao dịch chúng tôi sẽ hủy quyền thành viên của bạn.
                                        <br>
                                        -	Quyền thành viên chỉ có thể được duy trì tiếp với điều kiện bạn có giao dịch hàng tháng trên website của chúng tôi.
                                        <br>
                                        -	Với các tiêu chí trên, nếu các bạn không đạt được, thì với từng trường hợp cụ thể, chúng tôi sẽ xin phép được dừng cung cấp quyền làm thành viên chính thức của các bạn.

                                    </div>
                                </div>
                            </div>
                            <!-- /.panel -->

                        </div>
                        <!-- /.panel-group -->


                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

