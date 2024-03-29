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
    <script src="/Public/his/vendor/three/three.min.js"></script>
    <!--<script src="/Public/his/js/echarts.min.js"></script>-->


</head>
<body>


<!-- WRAPPER -->
    <!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="pd10 panel mb20">
                <div class="fublBox mr10"><span>科室名称：</span>
                    <input type="text" name="search" class="form-control form-itmeB" placeholder="">
                </div>
                <button type="button" class="btn btn-primary search">查询</button>
                <button type="button" class="btn btn-primary r departmentAdd">新增</button>
            </div>
            <div class="panel">
                <div class="pd10">
                    <table class="table ftc">
                        <thead>
                        <tr>
                            <th>序号</th>
                            <th>科室名称</th>
                            <th>科室编号</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody id="tbodyApp"></tbody>
                    </table>
                </div>
                <div class="paging l mt10" id="department_pager_box"></div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->
<!-- 添加科室弹框 start -->
<div class="bombBox" id="departmentAddBomb" style="display: none;">
    <div class="promptBox bombContent departmentAddBomb">
        <div class="bombTit">添加科室<i class="fa fa-remove"></i></div>
        <div class="ftc">
            <div class="fublBox mt20"><span>科室名称：</span>
                <input type="text" name="department_name" class="form-control form-itmeB" placeholder="">
            </div>
        </div>
        <div class="pd10">
            <a class="btn btn-primary determine wb100 add">保存</a>
        </div>
    </div>
    <a><div class="bombMask"></div></a>
</div>
<!-- 添加科室弹框 end -->
<!-- 科室编辑弹框 start -->
<div class="bombBox" id="departmentEditBomb" style="display: none;">
    <div class="promptBox bombContent departmentEditBomb">
        <div class="bombTit">编辑科室<i class="fa fa-remove"></i></div>
        <div class="ftc">
            <div class="fublBox mt20"><span>科室名称：</span>
                <input type="text" name="department_name" class="form-control form-itmeB" placeholder="" value="">
            </div>
            <input type="hidden" name="did" value="">
        </div>
        <div class="pd10">
            <a class="btn btn-primary determine wb100 edit">保存</a>
        </div>
    </div>
    <a><div class="bombMask"></div></a>
</div>
<!-- 科室编辑弹框 end -->
<style>
    #department_pager_box{text-align: center;width: 100%;}
</style>
<!-- Javascript -->
<script>
    var _department_page=1;
    $('.dateTime').datetimepicker({
        lang:'ch',
        timepicker:false,
        format:'Y-m-d'
    });
    $(function() {
        //进入页面加载
        $(document).ready(function(){
            getLists('',1);
        });
        //搜索
        $(":input[name='search']").bind('input propertychange', function() {
            var search = $(":input[name='search']").val();
            getLists(search, _department_page);
        });
        $(document).on('click', '.search', function(){
            var search = $(":input[name='search']").val();
            getLists(search, 1);
        });
        //科室列表分页
        $("#department_pager_box").on('click','.item',function () {
            var tag = $(this)[0].tagName.toLowerCase();
            if(tag=='i'){
                if($(this).hasClass('next')){
                    _department_page=parseInt(_department_page)+1;
                }else{
                    _department_page=parseInt(_department_page)-1;
                }
            }else{
                _department_page=parseInt($(this).html());
            }
            var search=$(":input[name='search']").val();
            getLists(search,_department_page);
        });
        //科室添加弹框
        $(document).on('click', '.departmentAdd', function () {
            $('#departmentAddBomb').show(0);
            // 取消或者关闭
            $('#departmentAddBomb .bombMask, #departmentAddBomb .fa-remove').one('click', function(event) {
                $(this).closest('#departmentAddBomb').fadeOut();
                $('body').removeAttr('style');
            });
        });
        //添加科室
        $(document).on('click', '.add', function(){
            var departmentName = $("#departmentAddBomb :input[name='department_name']").val();
            alert("<?php echo U('/Department/addDepartment');?>");
            $.post("<?php echo U('/Department/addDepartment');?>",
                { "department_name": departmentName},
                function (data) {
                    if (data.status=='success') {
                        getLists('',_department_page);
                        $('#departmentAddBomb').fadeOut();
                        $("#departmentAddBomb :input[name='department_name']").val('');
                    }
                    remindBox(data.msg);
                },
                "json");
        });
        //科室编辑弹框
        $(document).on('click', '.departmentEdit', function () {
            $("#departmentEditBomb :input[name='department_name']").val($(this).attr('data-name'));
            $("#departmentEditBomb :input[name='did']").val($(this).attr('data-did'));
            $('#departmentEditBomb').show(0);
            // 取消或者关闭
            $('#departmentEditBomb .bombMask, #departmentEditBomb .fa-remove').one('click', function(event) {
                $(this).closest('#departmentEditBomb').hide(0);
                $('body').removeAttr('style');
            });
        });
        //编辑科室
        $(document).on('click', '.edit', function(){
            var departmentName = $("#departmentEditBomb :input[name='department_name']").val();
            var did = $("#departmentEditBomb :input[name='did']").val();
            $.post("<?php echo U('/Department/editDepartment');?>",
                { "department_name": departmentName,'did':did},
                function (data) {
                    if (data.status=='success') {
                        $("#"+did).html(departmentName);
                        $("#edit"+did).attr('data-name', departmentName);
                        $('#departmentEditBomb').hide(0);
                    }
                    remindBox(data.msg);
                },
                "json");
        });
        //删除科室
        $(document).on('click', '.departmentDelete', function() {
            var search = $(":input[name='search']").val();
            var did = $(this).attr('data-did');
            promptBox('是否确定删除？', function () {
                $.post("<?php echo U('/Department/deleteDepartment');?>",
                    {'did': did},
                    function (data) {
                        if (data.status == 'success') {
                            getLists(search, _department_page);
                        }
                        remindBox(data.msg);
                    },
                    "json");
            });
        });
    });
    //搜索加载列表
    function getLists(search, page) {
        $.post("<?php echo U('/Department/index');?>",
            { "search": search, 'p':page, 'pagesize':10},
            function (data) {
                if (data.status=='success') {
                    if (data.data.count > 0) {
                        var html = '';
                        $.each(data.data.list,function (i,item) {
                            var id = i + 1;
                            html += '<tr>' +
                                '<td>'+id+'</td>' +
                                '<td id="'+item.did+'">'+item.department_name+'</td>' +
                                '<td>'+item.department_number+'</td>' +
                                '<td>' +
                                '<button type="button" class="btn btn-primary btn-sm mr10 departmentEdit" data-did="'+item.did+'" data-name="'+item.department_name+'" id="edit'+item.did+'">编辑</button>' +
                                '<button type="button" class="btn btn-default btn-sm returnBtn departmentDelete" data-did="'+item.did+'">删除</button>' +
                                '</td>' +
                                '</tr>';
                        });
                        _department_page=data.data.page;
                        $("#tbodyApp").html(html);
                        if(data.data.pager_str.length>0){
                            $("#department_pager_box").html(data.data.pager_str);
                        }else{
                            $("#department_pager_box").html('');
                        }
                    } else {
                        $("#tbodyApp").html('<tr><td colspan="7" height="30" align="center" class="f_red" >暂无数据</td></tr>');
                        $("#department_pager_box").html('');
                    }
                } else {
                    remindBox(data.msg);
                }
            },
            "json");
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