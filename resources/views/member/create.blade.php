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
                    {!! html_entity_decode(
                        Html::link(
                            null, 
                            '<i class="fa fa-dashboard"></i> ' . Lang::get('custom.common.home')
                        )
                    )!!}
                </li>
                <li>
                    {!! Html::linkRoute(
                        'member.index',
                        Lang::get('custom.common.members')
                    ) !!}
                </li>
                <li class="active">@lang('custom.common.create')</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 style="text-align: center;">@lang('custom.common.new_member')</h4>
                </div>
                <div class="box-body">
                    {!! Form::open([
                        'route' => 'member.store',
                        'class' => 'col-md-8 col-md-offset-2 form-horizontal'
                    ]) !!}
                        <div class="form-group row">
                            {!! Form::label(
                                'email',
                                Lang::get('custom.common.email'),
                                [
                                    'class' => 'control-label col-sm-4',
                                ]
                            ) !!}
                            <div class="col-sm-6">
                                {!! Form::email(
                                    'email',
                                    old('email'),
                                    [
                                        'class' => 'form-control',
                                        'placeholder' => Lang::get('custom.common.enter_email'),
                                        'required' => 'required',
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
                                    'class' => 'control-label col-sm-4',
                                ]
                            ) !!}
                            <div class="col-sm-6">
                                {!! Form::text(
                                    'name',
                                    old('name'),
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
                                'level',
                                Lang::get('custom.common.permission'),
                                [
                                    'class' => 'control-label col-sm-4',
                                ]
                            ) !!}
                            <div class="col-sm-6">
                                {!! Form::select(
                                    'level',
                                    [
                                        '' => Lang::get('custom.common.sel_per'),
                                        '0' => Lang::get('custom.common.admin'),
                                        '2' => Lang::get('custom.common.member'),
                                    ],
                                    null,
                                    [
                                        'class' => 'form-control',
                                    ]
                                ) !!}
                                @if($errors->first('level'))
                                    <p class="text-danger">
                                        <strong>{{ $errors->first('level') }}</strong>
                                    </p>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 col-sm-offset-4">
                                {!! Form::submit(
                                    Lang::get('custom.common.add'),
                                    [
                                        'class' => 'btn btn-success',
                                    ]
                                ) !!}
                                {!! Html::linkRoute(
                                    'member.store',
                                    Lang::get('custom.common.back'),
                                    [],
                                    [
                                        'class' => 'btn btn-warning',
                                    ]
                                ) !!}
                            </div>
                        </div>

                    {!! Form::close() !!}
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
