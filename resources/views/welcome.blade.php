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
    {{ Html::style('../assets/Font-Awesome/css/all.min.css') }}
    {{ Html::style('../owlcarousel/assets/owl.carousel.min.css') }}
    {{ Html::style('../owlcarousel/assets/owl.theme.default.min.css') }}
    {{ Html::script('../owlcarousel/jquery.min.js') }}
    {{ Html::script('../owlcarousel/owl.carousel.min.js') }}
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
                        <a class="dropdown-item" href="#get-in-touch">CONTACT</a>
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
                    <li class="li-header-menu nav-item"><a href="#get-in-touch" class="nav-link">CONTACT</a></li>
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
    <div class="banner container-fluid">
        <div class="logo-wicom">
            <img class="img-fluid" src="images/WicomLab400.png" />
        </div>
        <div class="description">
            <p class="text">Phòng thí nghiệm thông tin vô tuyến (WicomLab) là cơ sở nghiên cứu và hướng dẫn tham gia vào việc thiết kế, tích hợp, phân tích và thử nghiệm các thiết bị truyền thông không dây, các mạch điện tử tương tự, mạch số, vi điều khiển và hệ thống thông tin vô tuyến, thông tin thủy âm. Ngoài ra một số lĩnh vực như Internet of Things và Machine Learning cũng được quan tâm nghiên cứu..</p>
            <a href="#news" class="read-more">READ MORE</a>
        </div>
    </div>
    <div class="container-fluid news" id="news">
        <div class="title1 container">
            <p>FROM OUR WEBSITE</p>
            <h3>LATEST NEWS</h3>
        </div>
        <div class="container news-content">
            @if (Auth::check() && (Auth::user()->level==0))
            <div class="add-new-post d-flex justify-content-end"><a href="{{ route('new.create') }}" class="read-new">Add new post<i class="fas fa-plus"></i></a></div>
            @endif
            <div class="row">
                @foreach($news as $new)
                <div class="new col-sm">
                    <div class="new-img">
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
                    </div>
                    <div class="new-des">
                        <h3>{{ $new->tieude }}</h3>
                        <p class="text">{{ $new->tomtat }}</p>
                        {!! html_entity_decode(
                            Html::linkRoute(
                            'new.show',
                            'READ MORE'.'<i class="fas fa-angle-double-right"></i>',
                            [
                                'id' => $new->id,
                            ],
                            [
                                'class' => 'read-new',
                            ]
                            )
                        )
                        !!}
                        @if (Auth::check() && (Auth::user()->level==0))
                        {!! html_entity_decode(
                            Html::linkRoute(
                            'new.edit',
                            '<i class="far fa-edit"></i>',
                            [
                                'id' => $new->id,
                            ],
                            [
                                'class' => 'read-new',
                            ]
                            )
                        )
                        !!}
                        {!! Form::open([
                            'route' => ['new.destroy', $new->id],
                            'method' => 'DELETE',
                            'id' => 'delete-form-' . $new->id,
                            'style' => 'display: none;',
                        ]) !!}

                        {!! Form::close() !!}

                        {!! html_entity_decode(
                            Html::link(
                                null,
                                '<i class="far fa-trash-alt"></i>',
                                [
                                    'class' => 'read-new delete-new',
                                    'data-id' => $new->id,
                                ]
                            )
                        ) !!}
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
            <div class="pagi d-flex justify-content-end">
                {{ $news->links() }}
            </div>
        </div>
    </div>
    <div class="research container-fluid bg-success">
        <div class="title1 container">
            <p>OUR RESEARCH FIELD</p>
            <h3>RESEARCH FIELD</h3>
        </div>
        <div class="container field">
            <div class="row">
                <div class="col-sm col-md-6 field-item">
                    <div class="field-img col-2 float-left p-0">
                        <img class="img-fluid" src="images/wif.png" />
                    </div>
                    <div class="field-des col-10 float-left">
                        <h3>Under Water</h3>
                        <p>Nhóm truyền thông dưới nước</p>
                        <p><strong>Software</strong>: Nghiên cứu các thuật toán xử lý tín hiệu và thiết kế các phần mềm thu phát tín hiệu thông tin thủy âm</p>
                        <p><b>Hardware</b>:Nghiên cứu và thiết kế các mạch thu phát tín hiệu và mạch lọc: LNA, PA, LBF, BWF, HBF...</p>
                    </div>
                </div>
                <div class="col-sm col-md-6 field-item">
                    <div class="field-img col-2 float-left p-0">
                        <img class="img-fluid" src="images/sonar.png" />
                    </div>
                    <div class="field-des col-10 float-left">
                        <h3>Sonar</h3>
                        <p>Nhóm định vị dùng công nghệ sóng âm dưới nước</p>
                        <p><strong>Software</strong>: Nghiên cứu các thuật toán xử lý tín hiệu và thiết kế phần mềm thu phát, hiển thị giám sát định vị vật thể ở dưới nước</p>
                        <p><b>Hardware</b>:Nghiên cứu và thiết kế các mạch thu phát tín hiệu và mạch lọc: LNA, PA, LBF, BWF, HBF...</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm col-md-6 field-item">
                    <div class="field-img col-2 float-left p-0">
                        <img class="img-fluid" src="images/aa.png" />
                    </div>
                    <div class="field-des col-10 float-left">
                        <h3>FPGA</h3>
                        <p>Nhóm thiết kế IC số</p>
                        <p>Nghiên cứu và thiết kế các IC số sử dụng ngôn ngữ bậc cao Verilog/VHDL trên nền tảng công nghệ FPGA</p>
                        <p>Nghiên cứu và ứng dụng các thuật toán xử lý số tín hiệu để tích hợp vào IC số</p>
                    </div>
                </div>
                <div class="col-sm col-md-6 field-item">
                    <div class="field-img col-2 float-left p-0">
                        <img class="img-fluid" src="images/web.png" />
                    </div>
                    <div class="field-des col-10 float-left">
                        <h3>Web/Software</h3>
                        <p>Nhóm web và phần mềm</p>
                        <p>Thiết kế các phần mềm quản lý dự án, quản lý hệ thống phục vụ cho quản lý nhân sự và các dự án của lab</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm col-md-6 field-item">
                    <div class="field-img col-2 float-left p-0">
                        <img class="img-fluid" src="images/ai.png" />
                    </div>
                    <div class="field-des col-10 float-left">
                        <h3>AI</h3>
                        <p>Nhóm trí tuệ nhân tạo</p>
                        <p>Nghiên cứu các thuật toán xử lý ảnh, nhận diện khuôn mặt, nhận diện cử chỉ, hành động...</p>
                    </div>
                </div>
                <div class="col-sm col-md-6 field-item">
                    <div class="field-img col-2 float-left p-0">
                        <img class="img-fluid" src="images/5g.png" />
                    </div>
                    <div class="field-des col-10 float-left">
                        <h3>5G</h3>
                        <p>Nhóm mạng di động thế hệ mới</p>
                        <p>Nghiên cứu các thuật toán xử lý và tối ưu thông tin trong các mạng di động thế hệ mới...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="language container-fluid">
        <div class="title1 container">
            <p>OUR LANGUAGE PROGRAM</p>
            <h3>LANGUAGE PROGRAM</h3>
        </div>
        <div class="container language-carousel">
            <div class="owl-carousel owl-theme">
                <div class="item"><img class="img-fluid" src="images/php.png" /></div>
                <div class="item"><img class="img-fluid" src="images/c++.png" /></div>
                <div class="item"><img class="img-fluid" src="images/css-3.png" /></div>
                <div class="item"><img class="img-fluid" src="images/html.png" /></div>
                <div class="item"><img class="img-fluid" src="images/arm.png" /></div>
                <div class="item"><img class="img-fluid" src="images/fpga.png" /></div>
                <div class="item"><img class="img-fluid" src="images/java.png" /></div>
                <div class="item"><img class="img-fluid" src="images/mysql.png" /></div>
                <div class="item"><img class="img-fluid" src="images/python.png" /></div>
                <div class="item"><img class="img-fluid" src="images/sql.png" /></div>
            </div>
        </div>
    </div>
    <div class="container-fluid member">
        <div class="title1 container">
            <p>OUR MEMBERS</p>
            <h3>LECTURERS</h3>
        </div>
        <div class="container member-list d-flex justify-content-center">
            <div class="row">
                <div class="col-sm-4 col-md lecturer">
                    <div class="img-lecturer d-flex justify-content-center">
                        <img class="img-fluid rounded-circle" src="images/nguyenvanduc.png" />
                    </div>
                    <div class="lecturer-des">
                        <p>PGS.TS. Nguyễn Văn Đức</p>
                        <p>Bộ môn Kỹ thuật thông tin</p>
                    </div>
                </div>
                <div class="col-sm-4 col-md lecturer">
                    <div class="img-lecturer d-flex justify-content-center">
                        <img class="img-fluid rounded-circle" src="images/quockhuong.jpg" />
                    </div>
                    <div class="lecturer-des">
                        <p>TS. Nguyễn Quốc Khương</p>
                        <p>Bộ môn Kỹ thuật thông tin</p>
                    </div>
                </div>
                <div class="w-100 d-sm-none"></div>
                <div class="col-sm-4 col-md lecturer">
                    <div class="img-lecturer d-flex justify-content-center">
                        <img class="img-fluid rounded-circle" src="images/tienhoa.jpg" />
                    </div>
                    <div class="lecturer-des">
                        <p>TS. Nguyễn Tiến Hòa</p>
                        <p>Bộ môn Kỹ thuật thông tin</p>
                    </div>
                </div>
                <div class="col-sm-4 col-md lecturer">
                    <div class="img-lecturer d-flex justify-content-center">
                        <img class="img-fluid rounded-circle" src="images/thunga.jpg" />
                    </div>
                    <div class="lecturer-des">
                        <p>TS. Nguyễn Thu Nga</p>
                        <p>Bộ môn Kỹ thuật thông tin</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid map">
        <div style="overflow:hidden;width: 100%;position: relative;"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.6697908921133!2d105.83971411451368!3d21.005869686010776!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac7798a10a8f%3A0xc2c16f09fd52ff14!2zQzksIELDoWNoIEtob2EsIEhhaSBCw6AgVHLGsG5nLCBIw6AgTuG7mWksIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1559792826726!5m2!1svi!2s" width="100%" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>
            <div style="position: absolute;width: 80%;bottom: 10px;left: 0;right: 0;margin-left: auto;margin-right: auto;color: #000;text-align: center;"><small style="line-height: 1.8;font-size: 2px;background: #fff;">Powered by <a href="https://embedgooglemaps.com/es/">Embedgooglemaps.com/es/</a> & <a href="https://brightononline.ca/">custommappostercom</a></small></div>
            <style>
                #gmap_canvas img {
                    max-width: none !important;
                    background: none !important
                }

            </style>
        </div><br />
    </div>
    <div class="container-fluid get-in-touch" id="get-in-touch">
        <div class="title1 container">
            <h3>Get In Touch</h3>
        </div>
        <div class="col-sm-8 mx-auto connect">
            <form class="needs-validation" action="{{ url('/message/send') }}" method="POST" route="send_mail" novalidate>
            {{ csrf_field() }}    
                <div class="form-inline ">
                    <div class="name-holder col-sm-6">
                        <input type="text" class="form-control" name="name" id="name" required />
                        <div class="placeholder">Name <span class="text-danger">*</span></div>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="email-holder col-sm-6">
                        <input type="text" class="form-control" name="mail" id="mail" required />
                        <div class="placeholder">Email <span class="text-danger">*</span></div>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                </div>
                <div class="form-group message-holder">
                    <input type="textarea" class="form-control" placeholder="Message" name="message" id="message" />
                </div>
                <div class="d-flex justify-content-center"><button type="submit" class="send-message">SEND MESSAGE</button></div>
            </form>
        </div>
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
    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            autoplay: true,
            autoplayTimeout: 2000,
            autoplayHoverPause: true,
            margin: 150,
            nav: false,
            dots: true,
            responsive: {
                0: {
                    items: 1
                },
                576: {
                    items: 3
                },
                768: {
                    items: 4
                },
                1000: {
                    items: 5
                }
            }
        })

    </script>
    <script>
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                var forms = document.getElementsByClassName('needs-validation');
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();

    </script>
    <script type="text/javascript">

        $(document).ready(function() {
            $('.delete-new').click(function() {
                event.preventDefault();
                if (confirm('Are you want to delete this post?')) {
                    var newId = $(this).attr('data-id');
                    $("#delete-form-" + newId).submit();
                }

            })
        })
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
