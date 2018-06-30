@extends('layouts.app')

@section("title", __("Điều khoản sử dụng"))

@section("breadcrumbs")
    {{ Breadcrumbs::render('pages.term') }}
@endsection

@section('body')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">

                @include("pages.sidebar")
                <div class="col-md-9">
                    <div class="box">
                        <h1 class=" text-center">{{ __('Điều khoản sử dụng') }}</h1>
                        <p class="lead text-center">{{__("Trước khi tiến hành mua hàng, xin mời đọc nội quy")}}
                            <br>{{__("Nếu bạn chưa là thành viên? Xin mời ")}}
                            <a href="{{route('register')}}">{{__('đăng ký')}}</a></p>
                        <hr>
                        <div class="card-body">
                            <ol class="text-justify">
                                <li>Đây là website kết nối các cơ sở sản xuất bên Hàn Quốc và các thành viên đang kinh doanh tại Việt Nam. Do đặc điểm thời vụ và chuyển biến nhanh của thị trường sỉ bên Hàn Quốc, sản phẩm bạn chọn có thể sẽ không đủ số lượng bạn chọn hoặc hết hàng. Chúng tôi sẽ kiểm tra và thông báo riêng cho bạn về tình hình đặt hàng và tiến hành mua hàng bên Hàn Quốc
                                    <hr>
                                </li>
                                <li><b>Quy định về đổi trả</b> <br>
                                    Vì hàng sẽ được chuyển trực tiếp từ Hàn Quốc về Việt Nam nên sẽ không được đổi trả. Chúng tôi chỉ chịu trách nhiệm cho các sản phẩm bị lỗi hoặc sai lệch so với lệnh đặt mua hàng của bạn.
                                    <hr>
                                </li>
                                <li>Ảnh trên website có thể sẽ có sai lệch 1 chút về màu sắc, chúng tôi khuyên bạn nên chọn những thiết kế có ảnh chụp rõ ràng để tránh việc sai lệch về màu sắc.
                                    <hr></li>
                                <li><b>Quy định về sử dụng hình ảnh trên website
                                    </b><br>
                                    Hình ảnh có sẵn trên website chỉ có thể được sử dụng sau khi bạn đã hoàn thành việc mua sản phẩm đó và được sự đồng ý của chúng tôi. Những trường hợp sử dụng hình ảnh trái phép, chúng tôi xin phép sẽ dừng cung cấp sản phẩm và hủy quyền thành viên đó.
                                    <hr></li>
                            </ol>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

