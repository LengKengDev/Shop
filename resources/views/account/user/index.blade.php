@extends("layouts.app")

@section("title", __("Tài khoản"))

@section("breadcrumbs")
    {{ Breadcrumbs::render('account') }}
@endsection

@section("body")
    <div class="container">
        @include('account.side')
        <div class="col-md-9">
            <div class="box">
                <h3>{{__("Đổi mật khẩu")}}</h3>
                <form action="{{route('account.user.password')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="password_old">Old password</label>
                                <input class="form-control" id="password_old" type="password" name="password_old" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="password">New password</label>
                                <input class="form-control" id="password_1" type="password" name="password" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="password_confirmation">Retype new password</label>
                                <input class="form-control" id="password_2" type="password" name="password_confirmation" required>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->

                    <div class="col-sm-12 text-center">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save new password</button>
                    </div>
                </form>
                <hr>
                <br>
                <h3>{{__("Thông tin cá nhân")}}</h3>
                <form action="{{route('account.user.update')}}" method="post">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="company">{{__("Họ và tên")}}</label>
                                <input type="text" class="form-control" required name="name" value="{{old('name', Auth::user()->name)}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="street">{{__("Công ty")}}</label>
                                <input type="text" class="form-control" required name="company" value="{{old('company', Auth::user()->company)}}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="company">{{__("Số điện thoại")}}</label>
                                <input type="text" class="form-control" required name="phone" value="{{old('phone', Auth::user()->phone)}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="street">Email</label>
                                <input type="email" class="form-control" readonly name="email" value="{{Auth::user()->email}}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="company">{{__("Địa chỉ")}}</label>
                                <input type="text" class="form-control" required name="address" value="{{old('address', Auth::user()->address)}}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <hr>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> {{__("Cập nhật")}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
