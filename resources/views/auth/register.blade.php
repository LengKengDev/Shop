@extends('layouts.app')

@section("title", __("Đăng ký"))

@section("breadcrumbs")
    {{ Breadcrumbs::render('register') }}
@endsection

@section('body')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8 col-sm-offset-2">
            <div class="box">
                <h1 class="card-header text-center">{{ __('Đăng ký') }}</h1>
                <p class="lead text-center">
                    {{__("Nếu bạn đã là thành viên? Xin mời ")}}
                    <a href="{{route('login')}}">{{__('đăng nhập')}}</a>
                </p>
                <hr>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-right">{{ __('Name') }}</label>

                            <div class="col-md-7">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-7">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-right">{{ __('Password') }}</label>

                            <div class="col-md-7">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-7">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <hr>
                            <div class="col-md-8 col-md-offset-4">
                                <input type="checkbox" required>
                                {!! __('Tôi đồng ý với những :term mà shop cung cấp.', ['term' => "<a href='".route("pages.term")."'>điều khoản</a>"]) !!}
                                <br>
                            </div>
                            <br>
                            <div class="col-md-3 col-md-offset-6">
                                <br>
                                <button type="submit" class="btn btn-primary btn-block">
                                    <i class="fa fa-user-md"></i> {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
