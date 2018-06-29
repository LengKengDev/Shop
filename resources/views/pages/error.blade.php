@extends('layouts.app')

@section("title", __("404 Not Found"))

@section("breadcrumbs")
    {{ Breadcrumbs::render('pages.error') }}
@endsection

@section('body')
    <div class="container">
        <div class="row" id="error-page">
            <div class="col-sm-12">
                <div class="col-sm-12">
                    <div class="box">

                        <p class="text-center">
                            <img src="img/logo.png" alt="Obaju template">
                        </p>

                        <h3>We are sorry - this page is not here anymore</h3>
                        <h4 class="text-muted">Error 404 - Page not found</h4>

                        <p class="text-center">To continue please use the <strong>Search form</strong> or <strong>Menu</strong> above.</p>

                        <p class="buttons"><a href="{{route("home")}}" class="btn btn-primary"><i class="fa fa-home"></i> Go to Homepage</a>
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

