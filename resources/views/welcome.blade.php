<!DOCTYPE html>
<html lang="en">

<head>
    <title>@lang('custom.common.title')</title>
    <meta charset="utf-8" />
    <meta name="description" content="" />
    <meta name="author" content="Hat Com" />
    <meta name="viewport" content="width=device-width; initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{ Html::style('assets/bootstrap/dist/css/bootstrap.min.css') }}
    {{ Html::style('assets/Font-Awesome/css/all.min.css') }}
    {{ Html::style('owlcarousel/assets/owl.carousel.min.css') }}
    {{ Html::style('owlcarousel/assets/owl.theme.default.min.css') }}
    {{ Html::script('owlcarousel/jquery.min.js') }}
    {{ Html::script('owlcarousel/owl.carousel.min.js') }}
    <link rel="stylesheet/less" type="text/css" href="css/style.less" />
    {{ Html::script('assets/less/dist/less.min.js') }}
</head>
<body>
    <div class="container-fluid bg-primary">
      <a href="{{ url('/login') }}" class="login">Login</a>
      <a href="{{ url('/register') }}" class="login">Register</a>
    </div>
    <script src="assets/jquery/dist/jquery.slim.min.js"></script>
    <script src="assets/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>
