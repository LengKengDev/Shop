<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield("title", config("app.name")) - {{ setting('app_name', config("app.name")) }}</title>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {!! SEO::generate() !!}

    <link rel="stylesheet" href="{{ mix("css/app.css") }}">
    @yield("css")
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    @include("layouts.header")
    <div id="all">
        <div class="container">
            <div class="col-sm-12">
                @yield("breadcrumbs")
            </div>
        </div>
        <div id="content">
        @yield("body")
        </div>
        @include("layouts.footer")
    </div>
    <script src="{{ mix("js/app.js") }}"></script>
    @yield("js")
    @toastr_render
</body>
</html>
