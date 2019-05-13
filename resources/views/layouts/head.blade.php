<title>@lang('custom.common.title')</title>
<meta charset="utf-8" />
<meta name="description" content="" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="author" content="Hat Com" />
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- bootstrap -->
{{ Html::style('assets/bootstrap/dist/css/bootstrap.min.css') }}
<!-- fontawesome -->
{{ Html::style('assets/Font-Awesome/css/all.min.css') }}
<!-- owl carousel -->
{{ Html::style('owlcarousel/assets/owl.carousel.min.css') }}
{{ Html::style('owlcarousel/assets/owl.theme.default.min.css') }}
{{ Html::script('owlcarousel/jquery.min.js') }}
{{ Html::script('owlcarousel/owl.carousel.min.js') }}
<!-- less -->
{{ Html::style('css/style.less') }}
{{ Html::script('assets/less/dist/less.min.js') }}
<!-- ionicons -->
{{ Html::style('assets/ionicons/docs/css/ionicons.min.css') }}
<!-- datatables -->
{!! Html::style('assets/datatables.net-dt/css/jquery.dataTables.min.css') !!}
<!-- iCheck -->
{!! Html::style('assets/iCheck/skins/square/_all.css') !!}
<!-- bootstrap -->
{!! Html::style('assets/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') !!}
{!! Html::style('assets/select2/dist/css/select2.min.css') !!}
{!! Html::style('assets/seiyria-bootstrap-slider/dist/css/bootstrap-slider.min.css') !!}
<!-- admin-lte -->
{{ Html::style('assets/admin-lte/dist/css/AdminLTE.min.css') }}
{{ Html::style('assets/admin-lte/dist/css/skins/_all-skins.min.css') }}
{{ Html::style('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic') }}
@stack('style')

