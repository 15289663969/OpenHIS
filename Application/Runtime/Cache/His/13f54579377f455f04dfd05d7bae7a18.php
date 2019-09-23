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
    

<div class="bombBox" id="revisePwdBomb" style="top:111px;left: -4px" >
    <div class="bombContent revisePwdBomb whiteBg" style="min-width:400px;">

        <div class="ftc pd10">
            <div class="input-group listSeaForm wb100">
				<span class="input-group-btn">
					<span class="btn">原始密码：</span>
				</span>
                <input class="form-control" type="password" id="old-password" value="" placeholder="输入旧密码">
            </div>
            <div class="input-group listSeaForm wb100 mt10">
				<span class="input-group-btn">
					<span class="btn">新密码：</span>
				</span>
                <input class="form-control" type="password" value="" id="new-password" placeholder="输入新密码，6~8个字符，可使用字母、数字">
            </div>
            <div class="input-group listSeaForm wb100 mt10">
				<span class="input-group-btn">
					<span class="btn">确认新密码：</span>
				</span>
                <input class="form-control" type="password" value="" id="re-new-password" placeholder="确认新密码">
            </div>
            <a class="btn btn-primary determine wb100 mt20 saveRevisePwd">保存</a>
        </div>
    </div>

</div>
<!-- 修改密码弹框 end -->
<script>
    $(function () {
        $(".saveRevisePwd").click(function () {
            var old_password = $.trim($("#old-password").val());
            var new_password = $.trim($("#new-password").val());
            var re_new_password = $.trim($("#re-new-password").val());
            if(old_password==''){
                remindBox('原密码不能为空');
                $('#old-password').focus();
                return false;
            }
            if(new_password==''){
                remindBox('请输入新密码');
                $('#new-password').focus();
                return false;
            }
            if(re_new_password==''){
                remindBox('请重复输入新密码');
                $('#re-new-password').focus();
                return false;
            }
            if(re_new_password!==new_password){
                remindBox('两次输入的密码不一致');
                return false;
            }
            if(new_password==old_password){
                remindBox('旧密码不能和新密码一致');
                return false;
            }
            if(!is_password(new_password)){
                remindBox('输入的新密码需要6~8个字符并且不能是特殊字符');
                return false;
            }

            $.post('<?php echo U("Index/editPassword");?>',{old_password:old_password,new_password:new_password},function (data) {
                if(data.status=='success'){
                    remindBox('修改成功');
                    parent.layer.closeAll();
                }else{
                    remindBox(data.msg);
                }

            })


        })
    })
</script>
<!-- END WRAPPER -->

<script type="text/javascript">
    if(parent.endLoad){
        parent.endLoad();
    }
</script>
</body>
</html>