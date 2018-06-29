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
                        <p class="lead text-center">{{__("Nếu bạn chưa là thành viên? Xin mời ")}}
                            <a href="{{route('register')}}">{{__('đăng ký')}}</a></p>
                        <hr>
                        <div class="card-body">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad dicta eligendi et hic id in ipsa, maxime minus nobis non placeat quas quibusdam rem similique soluta, tenetur veritatis vero voluptatum!</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

