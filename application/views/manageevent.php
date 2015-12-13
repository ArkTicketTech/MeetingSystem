<!DOCTYPE html>
<html lang="en">
<head>
    <title id='Description'>日程</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0,user-scalable=no">
    <link rel="stylesheet" href="<?php echo base_url('css/index.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('jqwidgets/jqwidgets/styles/jqx.base.css');?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url('css/font-awesome.min.css');?>" type="text/css" />
    <script type="text/javascript" src="<?php echo base_url('jqwidgets/scripts/jquery-1.11.1.min.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('jqwidgets/scripts/demos.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('jqwidgets/jqwidgets/jqxcore.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('jqwidgets/jqwidgets/jqxbuttons.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('jqwidgets/jqwidgets/jqxscrollbar.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('jqwidgets/jqwidgets/jqxpanel.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('jqwidgets/jqwidgets/jqxdatetimeinput.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('jqwidgets/jqwidgets/jqxcalendar.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('jqwidgets/jqwidgets/jqxtooltip.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('jqwidgets/jqwidgets/globalization/globalize.js');?>"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            // Create jqxCalendar
            $("#jqxCalendar").jqxCalendar({ width: '100%', height: '220px'});

            $('#Events').css('border', 'none');
            $('#Events').jqxPanel({  height: '0px', width: '100%' });

            $('#jqxCalendar').on('change viewChange', function (event) {
                var date = event.args.date;
                var view = event.args.view;
                var viewFrom = view.from;
                var viewTo = view.to;
                var temp = {};
                var outtype = ["会议","其他","外出"];
                if (event.type == 'viewChange') {
                    //$('#Events').jqxPanel('prepend', '<div style="margin-top: 5px;">Event Type: viewChange<br/>Date: ' + date + '<br/>View: ' + viewFrom + ' - ' + viewTo + '</div>');
                    tempdate = new Date(viewFrom);
                    temp = {
                        "date" : viewFrom,
                    };
                    $.ajax({
                         type: "post", 
                         data: temp,
                         url: "<?php echo base_url('event/getmanageevent')?>",
                         success: function(result){
                            //alert(result);
                            console.log(result);
                            var dataset = $.parseJSON(result);
                            $("#Events").html("");
                            $.each(dataset, function(index) {
                                $("<tr><td>"+dataset[index].uname+"</td><td>"+dataset[index].ebt+"~"+dataset[index].eet+"</td><td>"+outtype[dataset[index].etype]+"</td></tr>").appendTo($("#Events"));
                            });
                         }
                    });
                }
                else {
                    //$('#Events').jqxPanel('prepend', '<div style="margin-top: 5px;">Event Type: change<br/>Date: ' + date + '</div>');
                    //date = date.replace(/-/g,"/");
                    tempdate = new Date(date);
                    temp = {
                        "date" : date,
                    };

                    $.ajax({
                         type: "post", 
                         data: temp,
                         url: "<?php echo base_url('event/getmanageevent')?>",
                         success: function(result){
                            //alert(result);
                            console.log(result);
                            var dataset = $.parseJSON(result);
                            $("#Events").html("");
                            $.each(dataset, function(index) {
                                $("<tr><td>"+dataset[index].uname+"</td><td>"+dataset[index].ebt+"~"+dataset[index].eet+"</td><td>"+outtype[dataset[index].etype]+"</td></tr>").appendTo($("#Events"));
                            });
                         }
                    });
                }
            });
         });
    </script>
</head>
<body class='default' style="width: 100%;overflow: hidden;">
    <div id='jqxWidget'>
        <div>
            <div style='margin-top: 3px;' id='jqxCalendar' sytle="margin-left:auto;margin-right:auto;">
            </div>
        </div>
    </div>
    <table id='Events' style="width:100%;">
    </table>
</body>
</html>
