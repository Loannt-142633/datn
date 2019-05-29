<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image" style="float: left;">
                {!! Html::image(
                    config('custom.path_avatar') . Auth::user()->avatar, 
                    'User Image', 
                    [
                        'class' => 'img-circle',
                    ]
                ) !!} 
            </div>
            <div class="pull-left info" style="float: left;">
                <p>{!! Auth::user()->name !!}</p>
            </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">
            <li class="sidebar-item">
                {!! html_entity_decode(
                    Html::linkRoute(
                        'home', 
                        '<i class="fas fa-home"></i> <span>' .  'HOME' . '</span>'
                    )
                ) !!}
            </li>
            <li class="sidebar-item">
                {!! html_entity_decode(
                    Html::linkRoute(
                        'member.index', 
                        '<i class="fa fa-list"></i> <span>' .  Lang::get('custom.nav.member') . '</span>'
                    )
                ) !!}
            </li>
            <li class="sidebar-item">
                {!! html_entity_decode(
                    Html::linkRoute(
                        'chart', 
                        '<i class="fab fa-product-hunt"></i> <span>' . Lang::get('custom.nav.project') . '</span>'
                    )
                ) !!}
            </li>
    </section>
    <!-- /.sidebar -->
</aside>
