<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>@lang('custom.common.title')</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap -->
        {!! Html::style('assets/bootstrap/dist/css/bootstrap.min.css') !!}
        <!-- Ionicons -->
        {!! Html::style('assets/Ionicons/css/ionicons.min.css') !!}
        <!-- Theme style -->
        {!! Html::style('assets/admin-lte/dist/css/AdminLTE.min.css') !!}
        <!-- iCheck -->
        {!! Html::style('assets/iCheck/skins/square/blue.css') !!}
        <!-- Google Font -->
        {!! Html::style('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic') !!}

    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                {!! Html::linkRoute('home', Lang::get('custom.common.title')) !!}
            </div>
            <!-- /.login-logo -->
            <div class="login-box-body">
                <p class="login-box-msg">
                    Register
                </p>

                @if (session('status'))
                    <ul>
                        <li class="text-danger" style="list-style-type: none;">{{ session('status') }}</li>
                    </ul>
                @endif
                {!! Form::open([
                    'method' => 'POST',
                    'route' => 'register'
                ]) !!}

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    {!! Form::text(
                        'name',
                        old('name'),
                        [
                            'id' => 'name',
                            'class' => 'form-control',
                            'required' => 'required',
                            'autofocus' => 'autofocus',
                            'placeholder' => 'Name',
                        ]
                    ) !!}
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    {!! Form::email(
                        'email',
                        old('email'),
                        [
                            'id' => 'email',
                            'class' => 'form-control',
                            'required' => 'required',
                            'placeholder' => 'Email',
                        ]
                    ) !!}

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    {!! Form::password(
                        'password',
                        [
                            'id' => 'password',
                            'class' => 'form-control',
                            'required' => 'required',
                            'placeholder' => 'Password',
                        ]
                    ) !!}

                     @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    {!! Form::password(
                        'password_confirmation',
                        [
                            'id' => 'password-confirmation',
                            'class' => 'form-control',
                            'required' => 'required',
                            'placeholder' => 'Confirmation Password',
                        ]
                    ) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit(
                        'Register',
                        [
                            'class' => 'btn btn-primary',
                        ]
                    ) !!}
                </div>

                {!! Form::close() !!}

            </div>
            <!-- /.login-box-body -->
        </div>
        <!-- /.login-box -->

        <!-- jQuery -->
        {!! Html::script('assets/jquery/dist/jquery.min.js') !!}
        <!-- Bootstrap -->
        {!! Html::script('assets/bootstrap/dist/js/bootstrap.min.js') !!}
        <!-- iCheck -->
        {!! Html::script('assets/iCheck/icheck.min.js') !!}
        <!-- Main js -->
        {!! Html::script('js/admin/main.js') !!}
    </body>
</html>
