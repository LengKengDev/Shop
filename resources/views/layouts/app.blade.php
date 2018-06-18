<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield("title", config("app.name")) - {{ config("app.name") }}</title>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
        <div id="content">
        @yield("body")
        </div>
        @include("layouts.footer")
    </div>
    <script src="{{ mix("js/app.js") }}"></script>
    @yield("js")
</body>
</html>
