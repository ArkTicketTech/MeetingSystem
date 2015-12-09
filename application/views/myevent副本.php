<!DOCTYPE html>
<html lang="en">
<head>
    <title id='Description'>日程</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0,user-scalable=no">
    <link rel="stylesheet" href="<?php echo base_url('css/index.css');?>">
    <link rel="stylesheet" href="../../jqwidgets/jqwidgets/styles/jqx.base.css" type="text/css" />
    <script type="text/javascript" src="../../jqwidgets/scripts/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="../../jqwidgets/scripts/demos.js"></script>
    <script type="text/javascript" src="../../jqwidgets/jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src="../../jqwidgets/jqwidgets/jqxbuttons.js"></script>
    <script type="text/javascript" src="../../jqwidgets/jqwidgets/jqxscrollbar.js"></script>
    <script type="text/javascript" src="../../jqwidgets/jqwidgets/jqxpanel.js"></script>
    <script type="text/javascript" src="../../jqwidgets/jqwidgets/jqxdatetimeinput.js"></script>
    <script type="text/javascript" src="../../jqwidgets/jqwidgets/jqxcalendar.js"></script>
    <script type="text/javascript" src="../../jqwidgets/jqwidgets/jqxtooltip.js"></script>
    <script type="text/javascript" src="../../jqwidgets/jqwidgets/globalization/globalize.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            // Create jqxCalendar
            $("#jqxCalendar").jqxCalendar({ width: '100%', height: '220px'});

            $('#Events').css('border', 'none');
            $('#Events').jqxPanel({  height: '250px', width: '90%' });

            $('#jqxCalendar').on('change viewChange', function (event) {
                var date = event.args.date;
                var view = event.args.view;
                var viewFrom = view.from;
                var viewTo = view.to;
                $('#Events').jqxPanel('clearContent');
                if (event.type == 'viewChange') {
                    $('#Events').jqxPanel('prepend', '<div style="margin-top: 5px;">Event Type: viewChange<br/>Date: ' + date + '<br/>View: ' + viewFrom + ' - ' + viewTo + '</div>');
                }
                else {
                    $('#Events').jqxPanel('prepend', '<div style="margin-top: 5px;">Event Type: change<br/>Date: ' + date + '</div>');
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
            <div style='margin-left: 0px; margin-top: 20px; '>
                <div>
                    <span>Events:</span>
                    <div id='Events'>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
