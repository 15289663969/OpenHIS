<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <link href="/Upload/groupPic/favicon.ico" rel="shortcut icon">
    <title><?php echo C('TITLE');?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="/Public/his/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Public/his/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/Public/his/vendor/linearicons/style.css">
    <link rel="stylesheet" href="/Public/his/vendor/chartist/css/chartist-custom.css">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="/Public/his/css/main.css?<?php echo time();?>">
    <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
    <link rel="stylesheet" href="/Public/his/css/demo.css?<?php echo time();?>">
    <!-- public -->
    <link rel="stylesheet" href="/Public/his/css/public.css?<?php echo time();?>">

    <!-- ICONS >
    <link rel="apple-touch-icon" sizes="76x76" href="/Public/his/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="__PUBLIC_ROBOT__/img/favicon.png"-->
    <link rel="stylesheet" type="text/css" href="/Public/his/vendor/datetimepicker/jquery.datetimepicker.css"/>

    <script src="/Public/his/vendor/jquery/jquery.min.js"></script>
    <script src="/Public/his/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="/Public/his/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="/Public/his/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
    <script src="/Public/his/vendor/chartist/js/chartist.min.js"></script>
    <script src="/Public/his/scripts/klorofil-common.js"></script>
    <script src="/Public/his/vendor/datetimepicker/jquery.datetimepicker.js"></script>
    <script src="/Public/his/js/public.js?<?php echo time();?>"></script>
    <script src="/Public/his/js/check.form.js?<?php echo time();?>"></script>
    <script src="/Public/his/vendor/layer/layer.js"></script>
    <!--<script src="/Public/his/js/echarts.min.js"></script>-->


</head>
<body>


<!-- WRAPPER -->
    <!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="">
                <ul class="tabBtn clearfix" style="width: 50%; margin: auto;">
                    <li class="on">未就诊</li>
                    <li>已就诊</li>
                </ul>
                <ul class="tabBox panel mt10">
                    <li class="on">
                        <div class="pd10 grayBg2">
                            <div class="fublBox mr10"><span>患者姓名：</span>
                                <input type="text" id="noVisitName" class="form-control form-itmeB" placeholder="">
                            </div>
                            <div class="fublBox mr10">
                                <span>挂号日期：</span>
                                <input type="text" id="noVisitStartTime" class="form-control form-itmeB dateTime startTime" placeholder=""><i class="fa fa-calendar"></i>
                            </div>
                            <div class="fublBox mr10"><span class="mr10">-</span>
                                <input type="text" id="noVisitEndTime" class="form-control form-itmeB dateTime endTime" placeholder=""><i class="fa fa-calendar"></i>
                            </div>
                            <button type="button" id="noVisitSearch" class="btn btn-primary">查询</button>
                        </div>
                        <div class="pd10">
                            <table class="table drugsTable ftc">
                                <thead>
                                <tr>
                                    <th>序号</th>
                                    <th>患者姓名</th>
                                    <th>性别</th>
                                    <th>年龄</th>
                                    <th>电话</th>
                                    <th>挂号时间</th>
                                    <th>挂号类型</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody id="noVisitTbody">

                                </tbody>
                            </table>
                        </div>
                        <div class="paging mt20 mb20 ftc" id="noVisit_pager_box"></div>
                    </li>
                    <li>
                        <div class="pd10 grayBg2">
                            <div class="fublBox mr10"><span>患者姓名：</span>
                                <input type="text" id="visitName" class="form-control form-itmeB" placeholder="">
                            </div>
                            <div class="fublBox mr10">
                                <span>就诊日期：</span>
                                <input type="text" id="visitStartTime" class="form-control form-itmeB dateTime startTime" placeholder=""><i class="fa fa-calendar"></i>
                            </div>
                            <div class="fublBox mr10"><span class="mr10">-</span>
                                <input type="text" id="visitEndTime" class="form-control form-itmeB dateTime endTime" placeholder=""><i class="fa fa-calendar"></i>
                            </div>
                            <button type="button" id="visitSearch" class="btn btn-primary">查询</button>
                        </div>
                        <div class="pd10">
                            <table class="table drugsTable ftc">
                                <thead>
                                <tr>
                                    <th>序号</th>
                                    <th>患者姓名</th>
                                    <th>性别</th>
                                    <th>年龄</th>
                                    <th>电话</th>
                                    <th>就诊时间</th>
                                    <th>挂号类型</th>
                                    <th>支付状态</th>
                                    <!--<th>操作</th>-->
                                </tr>
                                </thead>
                                <tbody id="visitTbody">
                                </tbody>
                            </table>
                        </div>
                        <div class="paging mt20 mb20 ftc" id="visit_pager_box"></div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->
<style>
    #noVisit_pager_box{text-align: center;width: 100%;}
    #visit_pager_box{text-align: center;width: 100%;}
</style>
<!-- Javascript -->
<script>
    var _noVisit_page=1;
    var _visit_page=1;
    var d = new Date();
    var today = d.getFullYear()+"-"+(d.getMonth()+1)+"-"+d.getDate();
    $(".dateTime").datetimepicker({
        lang:'ch',
        timepicker:false,
        format:'Y-m-d',
        validateOnBlur:false,
        maxDate:today
    });
    function refund_back(){
        noVisitSearch();
        layer.close(layer_idx);
    }
    $(function() {
        //选项卡切换
        $(document).on('click', '.tabBtn > li', function(){
            $(this).addClass('on').siblings('li').removeClass('on').closest('.tabBtn');
            $(this).closest('.tabBtn').siblings('.tabBox').find('> li').eq($(this).index()).addClass('on').siblings('li').removeClass('on');
        });
        //首次进入页面加载
        $(document).ready(function(){
            getNoVisitList('','','',1);
            getVisitList('','','',1);
        });

        //未就诊列表搜索
        $("#noVisitName").bind('input propertychange', function(){
            noVisitSearch();
        });
        $("#noVisitStartTime").bind('input blur', function(){
            noVisitSearch();
        });
        $("#noVisitEndTime").bind('input blur', function(){
            noVisitSearch();
        });
        $(document).on('#noVisitSearch', 'click', function(){
            noVisitSearch();
        });
        //未就诊列表分页
        $("#noVisit_pager_box").on('click','.item',function () {
            var tag = $(this)[0].tagName.toLowerCase();
            if(tag=='i'){
                if($(this).hasClass('next')){
                    _noVisit_page=parseInt(_noVisit_page)+1;
                }else{
                    _noVisit_page=parseInt(_noVisit_page)-1;
                }
            }else{
                _noVisit_page=parseInt($(this).html());
            }
            var name = $("#noVisitName").val();
            var start_time = $("#noVisitStartTime").val();
            var end_time = $("#noVisitEndTime").val();
            getNoVisitList(name, start_time, end_time, _noVisit_page);
        });

        //就诊列表搜索
        $("#visitName").bind('input propertychange', function(){
            visitSearch();
        });
        $("#visitStartTime").bind('input blur', function(){
            visitSearch();
        });
        $("#visitEndTime").bind('input blur', function(){
            visitSearch();
        });
        $(document).on('#visitSearch', 'click', function(){
            visitSearch();
        });
        //就诊列表分页
        $("#visit_pager_box").on('click','.item',function () {
            var tag = $(this)[0].tagName.toLowerCase();
            if(tag=='i'){
                if($(this).hasClass('next')){
                    _visit_page=parseInt(_visit_page)+1;
                }else{
                    _visit_page=parseInt(_visit_page)-1;
                }
            }else{
                _visit_page=parseInt($(this).html());
            }
            var name = $("#visitName").val();
            var start_time = $("#visitStartTime").val();
            var end_time = $("#visitEndTime").val();
            getVisitList(name, start_time, end_time, _visit_page);
        });

        //退号
        $(document).on('click', '.back', function () {
            var rid = $(this).attr('data-rid');
            var title = '挂号';
            show_page(layer,'/Registration/registrationRefund/registration_id/'+rid,title +' [ 退款 ]','580px','620px');
        });
        function show_page(my_layer,url,title,w,h) {
            w=w||'49%';
            h=h||'90%';

            layer_idx = my_layer.open({
                type: 2,
                title: title,
                shadeClose: true,
                maxmin:true,
                moveOut: true,
                scrollbar:false,
                shade: 0,//0.8
                area: [w,h],
                content: url,
                zIndex: my_layer.zIndex, //重点1
                success: function(layero){
                    my_layer.setTop(layero); //重点2
                }
            });
        }

        //作废
        $(document).on('click', '.invalid', function () {
            var _self = $(this), registration_id = _self.attr('registration_id');
            promptBox('作废后无法就诊，确认作废吗？', function () {
                $.post("<?php echo U('/Registration/Registration_cancel');?>",
                    {'registration_id': registration_id},
                    function (data) {
                        if (data.status == 'success') {
                            noVisitSearch();
                        }
                        remindBox(data.msg);
                    },
                    "json");
            });
        });
    });
    //未就诊列表搜索
    function noVisitSearch() {
        var name = $("#noVisitName").val();
        var start_time = $("#noVisitStartTime").val();
        var end_time = $("#noVisitEndTime").val();
        getNoVisitList(name, start_time, end_time, _noVisit_page);
    }
    //就诊列表搜索
    function visitSearch() {
        var name = $("#visitName").val();
        var start_time = $("#visitStartTime").val();
        var end_time = $("#visitEndTime").val();
        getVisitList(name, start_time, end_time, _visit_page);
    }
    //加载未就诊列表
    function getNoVisitList(name, start_time, end_time, page) {
        $.post("<?php echo U('/Doctor/getVisitList');?>",
            {'name':name,'start_time':start_time,'end_time':end_time,'p':page,'action':'noVisit'},
            function (data) {
                if (data.status == 'success') {
                    if (data.data.count > 0) {
                        var html = '';
                        $.each(data.data.list, function(i, item){
                            var id = i + 1;
                            var sex = '男';
                            if (item.sex == 2) {
                                sex = '女';
                            }
                            var age = '';
                            if (item.birthday) {
                                age = getAge(item.birthday);
                            }
                            html += '<tr>' +
                                '<td>'+id+'</td>' +
                                '<td>';
                            if (!item.name) {
                                html += '';
                            } else {
                                html += item.name;
                            }
                            html += '</td>' +
                                '<td>'+sex+'</td>' +
                                '<td>'+age+'</td>' +
                                '<td>';
                            if (!item.mobile) {
                                html += '';
                            } else {
                                html += item.mobile;
                            }
                            html += '</td>' +
                                '<td>'+timeToDate(new Date(item.create_time * 1000))+'</td>' +
                                '<td>'+item.registeredfee_name+'</td>' +
                                '<td><a href="/index.php/Doctor/index?registration_id='+item.registration_id+'"><button type="button" class="btn btn-success btn-sm">就诊</button></a> '+
                                '<button type="button" class="btn btn-warning btn-sm back" data-rid="'+item.registration_id+'">退号</button> ' +
                                '<button registration_id="'+item.registration_id+'" type="button" class="btn btn-danger btn-sm invalid">作废</button></td></tr>';
                        });
                        _noVisit_page=data.data.page;
                        $("#noVisitTbody").html(html);
                        if(data.data.pager_str.length>0){
                            $("#noVisit_pager_box").html(data.data.pager_str);
                        }else{
                            $("#noVisit_pager_box").html('');
                        }
                    } else {
                        $("#noVisitTbody").html('<tr><td colspan="9" height="30" align="center" class="f_red" >暂无数据</td></tr>');
                        $("#noVisit_pager_box").html('');
                    }
                } else {
                    remindBox(data.msg);
                }
            },
            'json');
    }
    //加载就诊列表
    function getVisitList(name, start_time, end_time, page) {
        $.post("<?php echo U('/Doctor/getVisitList');?>",
            {'name':name,'start_time':start_time,'end_time':end_time,'p':page},
            function (data) {
                if (data.status == 'success') {
                    if (data.data.count > 0) {
                        var html = '';
                        $.each(data.data.list, function(i, item){
                            var id = i + 1;
                            var sex = '男';
                            if (item.sex == 2) {
                                sex = '女';
                            }
                            var age = '';
                            if (item.birthday) {
                                age = getAge(item.birthday);
                            }
                            html += '<tr>' +
                                '<td>'+id+'</td>' +
                                '<td>';
                            if (!item.name) {
                                html += '';
                            } else {
                                html += item.name;
                            }
                            html += '</td>' +
                                '<td>'+sex+'</td>' +
                                '<td>'+age+'</td>' +
                                '<td>';
                            if (!item.mobile) {
                                html += '';
                            } else {
                                html += item.mobile;
                            }
                            html += '</td>' +
                                '<td>'+timeToDate(new Date(item.addtime * 1000))+'</td>' +
                                '<td>';
                            html += item.pkg_registration_id != 0 ? item.registeredfee_name : '';
                            html += '</td><td>';
                            html += item.status == 1 ? '已支付' : '未支付';
                            html += '</td>' +
                                '</tr>';
                        });
                        _visit_page=data.data.page;
                        $("#visitTbody").html(html);
                        if(data.data.pager_str.length>0){
                            $("#visit_pager_box").html(data.data.pager_str);
                        }else{
                            $("#visit_pager_box").html('');
                        }
                    }  else {
                        $("#visitTbody").html('<tr><td colspan="9" height="30" align="center" class="f_red" >暂无数据</td></tr>');
                        $("#visit_pager_box").html('');
                    }
                } else {
                    remindBox(data.msg);
                }
            },
            'json');
    }
    //根据出生日期算出年龄
    function getAge(strBirthday){
        var returnAge;
        var strBirthdayArr=strBirthday.split("-");
        var birthYear = strBirthdayArr[0];
        var birthMonth = strBirthdayArr[1];
        var birthDay = strBirthdayArr[2];

        d = new Date();
        var nowYear = d.getFullYear();
        var nowMonth = d.getMonth() + 1;
        var nowDay = d.getDate();

        if(nowYear == birthYear){
            returnAge = 0;//同年 则为0岁
        }
        else{
            var ageDiff = nowYear - birthYear ; //年之差
            if(ageDiff > 0){
                if(nowMonth == birthMonth) {
                    var dayDiff = nowDay - birthDay;//日之差
                    if(dayDiff < 0)
                    {
                        returnAge = ageDiff - 1;
                    }
                    else
                    {
                        returnAge = ageDiff ;
                    }
                }
                else
                {
                    var monthDiff = nowMonth - birthMonth;//月之差
                    if(monthDiff < 0)
                    {
                        returnAge = ageDiff - 1;
                    }
                    else
                    {
                        returnAge = ageDiff ;
                    }
                }
            }
            else
            {
                returnAge = -1;//返回-1 表示出生日期输入错误 晚于今天
            }
        }

        return returnAge;//返回周岁年龄

    }
</script>
<!-- END WRAPPER -->

<script type="text/javascript">
    if(parent.endLoad){
        parent.endLoad();
    }
</script>
</body>
</html>