@extends('layouts.app')

@section('main-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Profile
            </h1>
            <ol class="breadcrumb">
                <li>
                    {!! html_entity_decode(
                        Html::link(
                            null, 
                            '<i class="fa fa-dashboard"></i> ' . Lang::get('custom.common.home')
                        )
                    )!!}
                <li>User</li>
                <li class="active">Profile</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-4 col-xs-12">
                    <!-- Profile Image -->
                    <div class="box box-primary">
                        <div class="box-body box-profile">
                            <div style="width: 100px; height: 100px; margin: 0 auto" data-toggle="tooltip">
                                <a href="" title="Click to edit avatar">
                                    <img src="{{ asset(config('custom.path_avatar') . $user->avatar) }}" width="100px" height="100px" class="profile-user-img img-circle" data-toggle="tooltip" title="User profile picture" alt="User profile picture">
                                </a>
                            </div>
                            <h3 class="profile-username text-center">
                                {{ $user->name }}
                            </h3>

                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-md-3 col-xs-12">
                                            <b>Email</b>
                                        </div>
                                        <div class="col-md-9 col-xs-12">
                                            <a href="">{{ $user->email }}</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-md-3 col-xs-12">
                                            <b>Phone</b>
                                        </div>
                                        <div class="col-md-9 col-xs-12">
                                            <a href=""> {{ $user->phone }}</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>

                            <!-- Button edit profile -->
                            <a href="{{ route('member.edit', ['id' => $user->id]) }}" class="btn btn-primary btn-block {{ Auth::user()->id == $user->id ? "" : "disabled"}} " id="edit-profile">
                                <i class="far fa-edit"></i> <b>Edit profile</b>
                            </a>
                        </div>
                    </div>

                    <!-- About me box-->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3>Information</h3>
                        </div>

                        <div class="box-body">
                            <strong>
                                <i class="fa fa-book margin-r-5"></i> Education
                            </strong>
                            <p class="text-muted">
                                {{ $user->school }}
                            </p>

                            <strong>
                                <i class="fa fa-book margin-r-5"></i> Organization
                            </strong>
                            <p class="text-muted">
                                {{ $user->organization }}
                            </p>

                            <strong>
                                <i class="fa fa-book margin-r-5"></i> Course
                            </strong>
                            <p class="text-muted">
                                @if ($user->course != 0)
                                    {{ $user->course }}
                                @endif
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-8 col-xs-12">
                    <div class="box box-primary">
                        <div class="box-body box-profile">
                            <table class="table table-bordered table-striped table-hover table-reponsive scroll">
                                <thead>
                                    <tr>
                                        <th>Task</th>
                                        <th>Progress</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($tasks as $task)
                                    <tr>
                                        <td>
                                            {{ $task->text }}
                                        </td>
                                        <td>
                                            {{ ($task->progress)*100 }} %
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('script')
    {!! Html::script('js/task.js') !!}
@endpush
