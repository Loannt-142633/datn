@extends('layouts.app')

@section('main-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @lang('custom.common.dashboard')
            </h1>
            <ol class="breadcrumb">
                <li>
                    {!! Html::linkRoute(
                        'member.index',
                        Lang::get('custom.common.members')
                    ) !!}
                </li>
                <li class="active">@lang('custom.common.edit')</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 style="text-align: center;">@lang('custom.common.edit_profile')</h4>
                </div>
                @include('partials.success')
                <div class="box-body">
                    <div class="col-md-10 col-md-offset-1">
                        
                        {!! Form::open([
                            'route' => ['member.update', $user->id],
                            'method' => 'PUT',
                            'enctype' => 'multipart/form-data',
                            'class' => 'form-horizontal row',
                        ]) !!}
                            <div class="col-md-3">
                                <ul>
                                    <li style="list-style: none;">
                                        {!! Html::image(
                                            config('custom.path_avatar') . $user['avatar'],
                                            Lang::get('custom.common.user_image'),
                                            [
                                                'id' => 'user-image',
                                                'class' => 'img img-circle img-rounded img-thumbnail img-responsive',
                                                'with' => '150',
                                                'height' => '150',
                                            ]
                                        ) !!}
                                    </li>
                                    <li style="list-style: none; margin-top: 5px">
                                        {!! html_entity_decode(
                                            Form::label(
                                                'file-upload',
                                                '<i class="fa fa-cloud-upload"></i> ' . Lang::get('custom.common.change_avatar'),
                                                [
                                                    'class' => 'custom-file-upload',
                                                ]
                                            )
                                        ) !!}
                                        {!! Form::file(
                                            'avatar',
                                            [
                                                'id' => 'file-upload',
                                                'accept' => 'image/*',
                                            ]
                                        ) !!}
                                    </li>
                                    <li style="list-style: none;">
                                        <p id="file-name"></p>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group row">
                                    {!! Form::label(
                                        'email',
                                        Lang::get('custom.common.email'),
                                        [
                                            'class' => 'col-sm-3 control-label',
                                        ]
                                    ) !!}
                                    <div class="col-sm-9">
                                        {!! Form::email(
                                            'email',
                                            $user['email'],
                                            [
                                                'class' => 'form-control',
                                                'placeholder' => Lang::get('custom.common.enter_email'),
                                                'required' => 'required',
                                                'disabled' => 'disabled',
                                            ]
                                        ) !!}
                                        @if($errors->first('email'))
                                            <p class="text-danger">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    {!! Form::label(
                                        'name',
                                        Lang::get('custom.common.name'),
                                        [
                                            'class' => 'col-sm-3 control-label',
                                        ]
                                    ) !!}
                                    <div class="col-sm-9">
                                        {!! Form::text(
                                            'name',
                                            $user['name'],
                                            [
                                                'class' => 'form-control',
                                                'placeholder' => Lang::get('custom.common.enter_name'),
                                                'required' => 'required',
                                            ]
                                        ) !!}
                                        @if($errors->first('name'))
                                            <p class="text-danger">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    {!! Form::label(
                                        'phone',
                                        Lang::get('custom.common.phone'),
                                        [
                                            'class' => 'col-sm-3 control-label',
                                        ]
                                    ) !!}
                                    <div class="col-sm-9">
                                        {!! Form::text(
                                            'phone',
                                            $user['phone'],
                                            [
                                                'class' => 'form-control',
                                                'placeholder' => Lang::get('custom.common.enter_phone'),
                                                'required' => 'required',
                                            ]
                                        ) !!}
                                        @if($errors->first('phone'))
                                            <p class="text-danger">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    {!! Form::label(
                                        'school',
                                        Lang::get('custom.common.school'),
                                        [
                                            'class' => 'col-sm-3 control-label',
                                        ]
                                    ) !!}
                                    <div class="col-sm-9">
                                        {!! Form::text(
                                            'school',
                                            $user['school'],
                                            [
                                                'class' => 'form-control',
                                                'placeholder' => Lang::get('custom.common.enter_school'),
                                                'required' => 'required',
                                            ]
                                        ) !!}
                                        @if($errors->first('school'))
                                            <p class="text-danger">
                                                <strong>{{ $errors->first('school') }}</strong>
                                            </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    {!! Form::label(
                                        'organization',
                                        Lang::get('custom.common.organization'),
                                        [
                                            'class' => 'col-sm-3 control-label',
                                        ]
                                    ) !!}
                                    <div class="col-sm-9">
                                        {!! Form::text(
                                            'organization',
                                            $user['organization'],
                                            [
                                                'class' => 'form-control',
                                                'placeholder' => Lang::get('custom.common.enter_organization'),
                                                'required' => 'required',
                                            ]
                                        ) !!}
                                        @if($errors->first('organization'))
                                            <p class="text-danger">
                                                <strong>{{ $errors->first('organization') }}</strong>
                                            </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    {!! Form::label(
                                        'course',
                                        Lang::get('custom.common.course'),
                                        [
                                            'class' => 'col-sm-3 control-label',
                                        ]
                                    ) !!}
                                    <div class="col-sm-9">
                                        {!! Form::number(
                                            'course',
                                            $user['course'],
                                            [
                                                'class' => 'form-control',
                                                'placeholder' => Lang::get('custom.common.enter_course'),
                                                'required' => 'required',
                                            ]
                                        ) !!}
                                        @if($errors->first('course'))
                                            <p class="text-danger">
                                                <strong>{{ $errors->first('course') }}</strong>
                                            </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    {!! Form::label('name', 'password', ['class' => 'col-md-12']) !!}
                                    <div class="col-md-12">
                                        {!! Form::password('password', ['class' => 'form-control form-control-line', 'placeholder' => 'password']) !!}
                                        @if($errors->first('password'))
                                            <p class="text-danger">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('password_confirmation', 'confirm password', ['class' => 'col-md-12']) !!}
                                    <div class="col-md-12">
                                        {!! Form::password('password_confirmation', ['class' => 'form-control form-control-line', 'placeholder' => 'confirm password']) !!}
                                        @if($errors->first('confirm_password'))
                                            <p class="text-danger">
                                                <strong>{{ $errors->first('confirm_password') }}</strong>
                                            </p>
                                        @endif
                                    </div>
                                </div>
                                @if (session('status'))
                                    <div class="alert alert-danger ">{{session('status')}}</div>
                                @endif
                                <div class="form-group row">
                                    <div class="col-md-9 col-md-offset-3">
                                        {!! Form::submit(
                                            Lang::get('custom.common.edit'),
                                            [
                                                'class' => 'btn btn-success',
                                            ]
                                        ) !!}
                                        {!! Html::linkRoute(
                                            'member.show',
                                            Lang::get('custom.common.back'),
                                            [
                                                $user['id'],
                                            ],
                                            [
                                                'class' => 'btn btn-warning',
                                            ]
                                        ) !!}
                                    </div>
                                </div>
                            </div>

                        {!! Form::close() !!}
                    </div>
                                                        
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
