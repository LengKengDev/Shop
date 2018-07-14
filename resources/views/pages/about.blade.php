@extends('layouts.app')

@section("title", __("Giới thiệu"))

@section("breadcrumbs")
    {{ Breadcrumbs::render('pages.about') }}
@endsection

@section('body')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                @include("pages.sidebar")
                <div class="col-md-9"><div class="box" id="text-page">
                        <h1 class="text-center">Giới thiệu Công ty</h1>

                        <p class="lead text-center"><a href="{{route('home')}}">Madeinkorea.com.vn</a> là hệ thống đầu tiên và lớn nhất tại Việt Nam chuyên bán sỉ quần áo, mỹ phẩm và nhiều sản phẩm khác sản xuất tại Hàn Quốc.</p>

                        <hr>
                        <p class="text-justify"><a href="{{route('home')}}">Madeinkorea.com.vn</a> là hệ thống đầu tiên và lớn nhất tại Việt Nam chuyên bán sỉ quần áo, mỹ phẩm và nhiều sản phẩm khác sản xuất tại Hàn Quốc. Chúng tôi làm việc trực tiếp với các đối tác là hàng trăm cơ sở chuyên sản xuất và cung cấp các mặt hàng thời trang nam, nữ, trẻ em tại Hàn Quốc vì vậy luôn đảm bảo mang tới Quý khách hàng những sản phẩm thời trang mới nhất, đi đầu xu hướng thị trường với giá tốt nhất. Ngoài lĩnh vực thời trang, chúng tôi còn có hàng trăm sản phẩm chăm sóc sức khỏe và sắc đẹp với rất nhiều thương hiệu nổi tiếng của Hàn Quốc. Tại Hàn Quốc, chúng tôi đã có giấy phép đăng kí kinh doanh chính thức. Đồng thời tại Việt Nam, chúng tôi hiện cũng đang giao dịch với nhiều đối tác kinh doanh uy tín ở các thành phố lớn như Hà Nội, Sài Gòn, và Vũng Tàu. Với vai trò là cầu nối giữa các nhà sản xuất tại Hàn Quốc và các cơ sở kinh doanh tại Việt Nam.
                        </p>
                        <hr>
                        <p class="text-justify">
                            Các sản phẩm quý khách mua tại <a href="{{route('home')}}">Madeinkorea.com.vn</a> được chúng tôi chuyển trực tiếp từ nhà cung cấp tới tay của quý khách mà không thông qua bất kì một trung gian nào để đảm bảo tính minh bạch và đảm bảo quý khách có thể nhận hàng trong thời gian nhanh nhất. Chúng tôi luôn mong muốn mang lại cho quý khách hàng những sản phẩm tốt nhất với giá tốt nhất. Bên cạnh đó, chúng tôi cũng sẵn sàng hỗ trợ, tạo điều kiện có thiện chí hợp tác với những cơ sở kinh doanh mới, những doanh nghiệp vừa và nhỏ để cùng nhau phát triển.
                        </p>

                    </div></div>

            </div>
        </div>
    </div>
@endsection

