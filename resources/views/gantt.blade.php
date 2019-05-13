<!DOCTYPE html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">

    <script src="codebase/dhtmlxgantt.js"></script>
    <script type="text/javascript" src="codebase/ext/dhtmlxgantt_marker.js"></script>
    <link href="codebase/dhtmlxgantt.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    
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
<div id="gantt_here" style='width:100%; height:100%;'></div>
<input type='button' value='Sort by task name' onclick='gantt.load("gantt_here", begin, end);'>
<script type="text/javascript">
    $(document).ready(function () {
        var holder;
        $.ajax({
            dataType: "json",
            url: 'http://wicom.nt/api/data?dhxr1556951249815=1',
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
    var today = gantt.getMarker(id);
        today.start_date = new Date();
        today.title = date_to_str(today.start_date);
        gantt.updateMarker(id);
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
    
    gantt.config.columns = [
        {name: "text", label: "Task name", tree: true, width: '*'},
        {name: "user_id", label: "Holder", width: 80, align: "center", template: function (item) {
                return byId(gantt.serverList('holderList'), item.user_id)
            }
        },
        {name: "duration", label: "Duration", align: "center"},
        {name: "add", width: 40}
    ];
    
    gantt.config.lightbox.sections = [
        {name: "description", height: 38, map_to: "text", type: "textarea", focus: true},
        {name: "user_id", height: 22, map_to: "user_id", type: "select", options: gantt.serverList("holderList")},
        {name: "time", type: "duration", map_to: "auto"}
    ];
    
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
    }
    });
});

</script>
</body>