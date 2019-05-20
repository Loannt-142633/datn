<!DOCTYPE html>
<html lang="en">

<head>
    <title>@lang('custom.common.title')</title>
    <meta charset="utf-8" />
    <meta name="description" content="" />
    <meta name="author" content="Hat Com" />
    <meta name="viewport" content="width=device-width; initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    {{ Html::style('assets/Font-Awesome/css/all.min.css') }}
    {{ Html::style('owlcarousel/assets/owl.carousel.min.css') }}
    {{ Html::style('owlcarousel/assets/owl.theme.default.min.css') }}
    {{ Html::script('owlcarousel/jquery.min.js') }}
    {{ Html::script('owlcarousel/owl.carousel.min.js') }}
    <link rel="stylesheet/less" type="text/css" href="../css/style.less" />
    {{ Html::script('../assets/less/dist/less.min.js') }}
</head>

<body>
    <div class="container-fluid header">
        <div class="row">
            <div class="col-md-2 logo navbar-brand mx-0">
                <a href="{{ url('/') }}">WICOMLAB</a>
                <div class="dropdown float-right res-menu">
                    <a href="#" id="navbardrop" data-toggle="dropdown"><i class="fas fa-bars"></i></a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ url('/') }}">HOME</a>
                        <a class="dropdown-item" href="{{ url('/home') }}">MANAGEMENT</a>
                        <a class="dropdown-item" href="#contact">CONTACT</a>
                        <a class="dropdown-item" href="{{ url('/login') }}">LOG IN</a>
                        {!! Html::linkRoute(
                        'logout',
                        'LOG OUT',
                        null,
                        [
                        'class' => 'nav-link',
                        'onclick' => 'event.preventDefault();document.getElementById("logout-form").submit();'
                        ]
                        ) !!}
                        {!! Form::open([
                        'id' => 'logout-form',
                        'method' => 'POST',
                        'route' => 'logout',
                        'style' => 'display: none;'
                        ]
                        ) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <div class="col-sm-10 d-flex justify-content-end">
                <ul class="header-menu nav">
                    <li class="li-header-menu nav-item"><a href="{{ url('/') }}" class="nav-link">HOME</a></li>
                    @if (Auth::check())
                    <li class="li-header-menu nav-item"><a href="{{ url('/home') }}" class="nav-link">MANAGEMENT</a></li>
                    @endif
                    <li class="li-header-menu nav-item"><a href="#contact" class="nav-link">CONTACT</a></li>
                    @if (Auth::check())
                    <li class="li-header-menu nav-item">
                        {!! html_entity_decode(
                        Html::linkRoute(
                        'member.show',
                        '<i class="far fa-user"></i> ' . Auth::user()->name
                        ,
                        [
                        'id' => Auth::user()->id,
                        ],
                        [
                        'class' => 'nav-link',
                        ]
                        )
                        ) !!}
                    </li>
                    <li class="li-header-menu nav-item">
                        {!! Html::linkRoute(
                        'logout',
                        'LOG OUT',
                        null,
                        [
                        'class' => 'nav-link',
                        'onclick' => 'event.preventDefault();document.getElementById("logout-form").submit();'
                        ]
                        ) !!}
                        {!! Form::open([
                        'id' => 'logout-form',
                        'method' => 'POST',
                        'route' => 'logout',
                        'style' => 'display: none;'
                        ]
                        ) !!}
                        {!! Form::close() !!}
                    </li>
                    @else
                    <li class="li-header-menu nav-item"><a href="{{ url('/login') }}" class="nav-link">LOG IN</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
    <div class="container content-detail">
        <div class="row">
            <!-- Post Content Column -->
            <div class="col-lg-8">
                <!-- Title -->
                <h1 class="mt-4" style="color: green;">{{ $new->tieude }}</h1>
                <!-- Author -->
                
                <hr>
                <!-- Date/Time -->
                <p>Posted on .{{ $new->created_at->toDayDateTimeString() }}</p>
                <hr>
                <!-- Preview Image -->
                {!! html_entity_decode(
                    Html::linkRoute(
                        'new.show',
                        Html::image(
                            config('custom.path_hinh') .$new->hinh,
                            'New Image',
                            [
                                'class' => 'img-fluid',
                            ]
                            ),
                        [
                            'id' => $new->id,
                        ]
                    )
                ) !!}
                <hr>
                <!-- Post Content -->
                <p class="lead">{{ $new->tomtat }}</p>
                
                <p>{{ $new->noidung }}</p>
                
                <hr>
                <!-- Comments Form -->
                <div class="card my-4">
                    <h5 class="card-header">Leave a Comment:</h5>
                    <div class="card-body">
                        <form role="form" method="post" action="{{ route('new.update',[$new->id]) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                            <div class="form-group">
                                <textarea class="form-control" rows="3" name="comment"></textarea>
                            </div>
                            <button type="submit" class="btn" style="background-color: green; color: white;" name="cmtbtn">Thêm bình luận</button>
                        </form>
                    </div>
                </div>
                <!-- Single Comment -->
                @foreach( $cmts as $cmt)
                <div class="media mb-4">
                    
                    {!! Html::image(
                        config('custom.path_avatar') . $cmt->avatar,
                        'user img',
                        [
                            'class' => 'img img-circle img-responsive rounded-circle',
                            'with' => '50',
                            'height' => '50',
                        ]
                    ) !!}
                    <div class="media-body">
                        <h5 class="mt-0 ml-1">{{ $cmt->name }}
                            <small style="font-size: 70%;">{{ $cmt->created_at }}</small>
                        </h5>
                        <p class="chat">{{ $cmt->noi_dung_cmt }}</p>
                    </div>
                    
                </div>
                @endforeach
                <!-- Comment with nested comments -->
            </div>
            <!-- Sidebar Widgets Column -->
            <div class="col-md-4">
                <!-- Search Widget -->
                <div class="card my-4">
                    <h5 class="card-header">Search</h5>
                    <div class="card-body">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                                <button class="btn" style="background-color: green;" type="button">Go!</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <div class="container-fluid">
        <div class="row contact">
            <div class="col-md-3 address">
                <div class="float-left pin">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <div class="float-left addr">
                    <p><span class="pin1 "><i class="fas fa-map-marker-alt"></i></span>421 Room, C9 Building, HaNoi University of Science and Technology</p>
                </div>
            </div>
            <div class="col-md-6 logo">
                <h3>WICOMLAB</h3>
            </div>
            <div class="col-md-3 policy">
                <p>Copyright &copy; Lnt.</p>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
