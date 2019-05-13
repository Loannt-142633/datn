@extends('layouts.app')

@push('style')
    {!! Html::style('assets/datatables.net-dt/css/jquery.dataTables.min.css') !!}
@endpush

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
                <li class="active">@lang('custom.common.dashboard')</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3>All Members</h3>
                    <div>
                        <a href="" class="btn btn-success">
                            <i class="fa fa-plus"></i> New Member
                        </a>
                    </div>
                    @include('partials.success')
                </div>
                <div class="box-body">
                    @include('partials.members-table')
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@push('script')
    {!! Html::script('assets/datatables.net/js/jquery.dataTables.min.js') !!}
    <script type="text/javascript">
        $('.datatables').DataTable();

        $(document).ready(function() {

            var userLevel = {{ Auth::user()->level }};

            $('.delete-user').click(function() {
                event.preventDefault();
                if (userLevel == 0) {
                    if (confirm('Are you want to delete this member?')) {
                        var userId = $(this).attr('data-id');
                        $("#delete-form-" + userId).submit();
                    }
                } else {
                    alert('You are not allowed');
                }

            })
        })
    </script>
 @endpush
