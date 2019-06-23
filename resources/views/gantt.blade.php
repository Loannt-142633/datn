<!DOCTYPE html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <title>@lang('custom.common.title')</title>
    <meta name="description" content="" />
    <meta name="author" content="Hat Com" />
    <meta name="viewport" content="width=device-width; initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    {{ Html::style('../assets/Font-Awesome/css/all.min.css') }}
    <script src="../codebase/dhtmlxgantt.js"></script>
    <script src="../codebase/ext/dhtmlxgantt_tooltip.js"></script>  
    <script type="text/javascript" src="../codebase/ext/dhtmlxgantt_marker.js"></script>
    <link href="codebase/dhtmlxgantt.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <link rel="stylesheet/less" type="text/css" href="../css/style.less" />
    {{ Html::script('../assets/less/dist/less.min.js') }}
    <style type="text/css">
        html, body{
            height:100%;
            padding:0px;
            margin:0px;
            overflow: hidden;
        }
        .today{ 
            background: #ff6666 !important;
        }

    </style>
</head>
<body>
<div class="container-fluid header">
    <div class="row">
        <div class="col-md-2 logo navbar-brand mx-0">
            <a href="{{ url('/') }}">WICOMLAB</a>
        </div>
        <div class="col-sm-10 d-flex justify-content-end">
            <ul class="header-menu nav">
                <li class="li-header-menu nav-item"><a href="{{ url('/') }}" class="nav-link">HOME</a></li>
                @if (Auth::check())
                <li class="li-header-menu nav-item"><a href="{{ url('/home') }}" class="nav-link">MANAGEMENT</a></li>
                @endif
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

<div class="container-fluid chart">
    <div class="container custom-scale d-flex justify-content-center">
        <label><input type="radio" name="scale" value="day" checked/>Day scale</label>
        <label><input type="radio" name="scale" value="week"/>Week scale</label>
        <label><input type="radio" name="scale" value="month"/>Month scale</label>
        <label><input type="radio" name="scale" value="year"/>Year scale</label>
    </div>
    <div id="gantt_here" style='width:100%; height:90%;'></div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        var holder;
        $.ajax({
            dataType: "json",
            url: 'http://wicomlabvn.herokuapp.com/api/data?dhxr1556951249815=1',
            // data: data,
            success: function (data) {
                console.log('gg');
                holder = data['user'];
    console.log(holder);
    var holderList = [];
    holder.forEach( function(element)
    {
        var obj = {};
        obj['key'] = element['id'];
        obj['label'] = element['name'];
        holderList.push(obj);

    });
    console.log('ad');
    console.log(holderList);

    gantt.config.xml_date = "%Y-%m-%d %H:%i:%s";
    gantt.config.step = 1;
    gantt.config.scale_unit= "month";
    gantt.config.date_scale = "%F, %Y";
    gantt.config.subscales = [
        {unit:"week", step:1, date:"%W %M"},
        {unit:"day", step:1, date:"%d %D"}
    ];
    gantt.config.scale_height = 90;
    gantt.config.sort = true;

    var date_to_str = gantt.date.date_to_str(gantt.config.task_date);
    var markerId = gantt.addMarker({
        start_date: new Date(),
        css: "today",
        text: "Now",
        title:date_to_str( new Date())
    });
    setInterval(function(){
    var today = gantt.getMarker(markerId);
        today.start_date = new Date();
        today.title = date_to_str(today.start_date);
        gantt.updateMarker(markerId);
    }, 1000*60);
    
    gantt.serverList("holderList", holderList);

    // end text data
    gantt.config.grid_width = 420;
    gantt.config.row_height = 24;
    gantt.config.grid_resize = true;

 
    gantt.locale.labels.section_holder = "Holder";


    function byId(list, id) {
        for (var i = 0; i < list.length; i++) {
            if (list[i].key == id)
                return list[i].label || "";
        }
        return "";
    }
    //set scale
    function setScaleConfig(level) {
        switch (level) {
            case "day":
                gantt.config.scale_unit = "day";
                gantt.config.step = 1;
                gantt.config.date_scale = "%d %M";
                gantt.templates.date_scale = null;
     
                gantt.config.scale_height = 27;
     
                gantt.config.subscales = [];
                break;
            case "week":
                var weekScaleTemplate = function (date) {
                  var dateToStr = gantt.date.date_to_str("%d %M");
                  var endDate = gantt.date.add(gantt.date.add(date, 1, "week"), -1, "day");
                  return dateToStr(date) + " - " + dateToStr(endDate);
                };
     
                gantt.config.scale_unit = "week";
                gantt.config.step = 1;
                gantt.templates.date_scale = weekScaleTemplate;
     
                gantt.config.scale_height = 50;
     
                gantt.config.subscales = [
                    {unit: "day", step: 1, date: "%D"}
                ];
                break;
            case "month":
                gantt.config.scale_unit = "month";
                gantt.config.date_scale = "%F, %Y";
                gantt.templates.date_scale = null;
     
                gantt.config.scale_height = 50;
     
                gantt.config.subscales = [
                    {unit: "day", step: 1, date: "%j, %D"}
                ];
     
                break;
            case "year":
                gantt.config.scale_unit = "year";
                gantt.config.step = 1;
                gantt.config.date_scale = "%Y";
                gantt.templates.date_scale = null;
     
                gantt.config.min_column_width = 50;
                gantt.config.scale_height = 90;
     
                gantt.config.subscales = [
                    {unit: "month", step: 1, date: "%M"}
                ];
                break;
        }
    }

    //config column
    gantt.config.columns = [
        {name: "text", label: "Task name", tree: true, width: '*'},
        {name: "user_id", label: "Holder", width: 80, align: "center", template: function (item) {
                return byId(gantt.serverList('holderList'), item.user_id)
            }
        },
        {name: "duration", label: "Duration", align: "center"},
        {name: "add", width: 40}
    ];
    //config lightbox
    gantt.config.lightbox.sections = [
        {name: "description", height: 38, map_to: "text", type: "textarea", focus: true},
        {name: "user_id", height: 22, map_to: "user_id", type: "select", options: gantt.serverList("holderList")},
        {name: "time", type: "duration", map_to: "auto"}
    ];
    //config task 
    
    gantt.templates.task_text=function(start,end,task){
    return task.text+", <b> Progress:</b> "+task.progress*100+"%";};
        
    
    var today = new Date();
    console.log(today);
    var begin = new Date(today.getFullYear(), today.getMonth(), today.getDate() - 15);
    var end = new Date(today.getFullYear(), today.getMonth(), today.getDate() + 15);
    console.log(begin); 
    console.log(end);
    gantt.init("gantt_here");
    gantt.load('/api/data');
    

    var dp = new gantt.dataProcessor("/api");
    dp.init(gantt);
    dp.setTransactionMode("REST");
    
    var els = document.querySelectorAll("input[name='scale']");
    for (var i = 0; i < els.length; i++) {
        els[i].onclick = function(e){
            e = e || window.event;
            var el = e.target || e.srcElement;
            var value = el.value;
            setScaleConfig(value);
            gantt.render();
        };
    }
    }
    });    
});

</script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>