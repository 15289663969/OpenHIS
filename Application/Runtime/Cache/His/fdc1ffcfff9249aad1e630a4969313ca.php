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
            <div class="panel mb20  clearfix pd10">
				<span class="tabBtn">
					<button type="button" class="btn btn-primary l">患者档案</button>
					<button type="button" class="btn btn-default l">历史病历</button>
				</span>
                <button type="button" class="btn btn-primary r edit">保存</button>
                <a href="/index.php/Patient/index"><button type="button" class="btn btn-default r mr10">返回</button></a>
            </div>

            <ul class="tabBox clearfix">
                <li class="on">
                    <div class="panel pd10">
                        <h3 class="tit1 ftl"><span class="blue mr10">基本信息</span></h3>
                        <div class="mt20 clearfix">
                            <div class="input-group listSeaForm l" style="width: 30%; margin-right: 1%">
								<span class="input-group-btn">
									<span class="btn">姓名：</span>
								</span>
                                <input class="form-control" name="name" type="text" value="<?php echo ($patientInfo['name']); ?>" maxlength="10 " onkeyup="value=value.replace(/[^\a-zA-Z\u4E00-\u9FA5]/g,'')"
                                       onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\a-zA-Z\u4E00-\u9FA5]/g,''))">
                            </div>
                            <div class="input-group listSeaForm l"  style="width: 22%; margin-right: 1%">
								<span class="input-group-btn">
									<span class="btn">性别：</span>
								</span>
                                <select class="form-control" name="sex" id="sex">
                                    <option value="1" <?php echo $patientInfo['sex'] == 1 ? 'selected' : '';?>>男</option>
                                    <option value="2" <?php echo $patientInfo['sex'] == 2 ? 'selected' : '';?>>女</option>
                                </select>
                            </div>
                            <div class="input-group listSeaForm l" style="width: 24%;">
								<span class="input-group-btn">
									<span class="btn">生日：</span>
								</span>
                                <input class="form-control dateTime" id="birthday" name="birthday" type="text" value="<?php echo ($patientInfo['birthday']); ?>">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <div class="input-group listSeaForm l" style="width: 22%;">
                                <input class="form-control" id="age" type="text" value="<?php echo ($patientInfo['age']); ?>">
                            </div>
                        </div>
                        <div class="mt10 clearfix">
                            <div class="input-group listSeaForm l" style="width: 30%; margin-right: 1%">
								<span class="input-group-btn">
									<span class="btn">身高：</span>
								</span>
                                <input class="form-control" name="height" type="text" value="<?php echo ($fileInfo['height']); ?>" onkeyup="value=value.replace(/[^\d^\.]+/g,'')">
                                <span class="input-group-btn bc" style="padding:0 8px">
									<span class="btn">厘米</span>
								</span>
                            </div>
                            <div class="input-group listSeaForm l"  style="width: 22%; margin-right: 1%">
								<span class="input-group-btn">
									<span class="btn">体重：</span>
								</span>
                                <input class="form-control" name="weight" type="text" value="<?php echo ($fileInfo['weight']); ?>" onkeyup="value=value.replace(/[^\d^\.]+/g,'')">
                                <span class="input-group-btn bc" style="padding:0 8px">
									<span class="btn">公斤</span>
								</span>
                            </div>

                            <div class="input-group listSeaForm l" style="width: 23%; margin-right: 1%">
								<span class="input-group-btn">
									<span class="btn">血型：</span>
								</span>
                                <select class="form-control" name="blood_type" id="blood_type">
                                    <option value="">请选择血型</option>
                                    <option value="1" <?php echo $fileInfo['blood_type'] == 1 ? 'selected' : '';?>>A</option>
                                    <option value="2" <?php echo $fileInfo['blood_type'] == 2 ? 'selected' : '';?>>B</option>
                                    <option value="3" <?php echo $fileInfo['blood_type'] == 3 ? 'selected' : '';?>>AB</option>
                                    <option value="4" <?php echo $fileInfo['blood_type'] == 4 ? 'selected' : '';?>>O</option>
                                </select>
                            </div>
                            <div class="input-group listSeaForm l" style="width: 22%;">
                                <select class="form-control" name="Rh" id="Rh">
                                    <option value="">请选择</option>
                                    <option value="1" <?php echo $fileInfo['Rh'] == 1 ? 'selected' : '';?>>Rh阴性</option>
                                    <option value="2" <?php echo $fileInfo['Rh'] == 2 ? 'selected' : '';?>>阳性</option>
                                </select>
                            </div>
                        </div>
                        <div class="mt10 clearfix">
                            <div class="input-group listSeaForm l" style="width: 24%; margin-right: 1%">
								<span class="input-group-btn">
									<span class="btn">左耳听力：</span>
								</span>
                                <select class="form-control" name="left_ear_hearing" id="left_ear_hearing">
                                    <option value="1" <?php echo $fileInfo['left_ear_hearing'] == 1 ? 'selected' : '';?>>正常</option>
                                    <option value="2" <?php echo $fileInfo['left_ear_hearing'] == 2 ? 'selected' : '';?>>耳聋</option>
                                </select>
                            </div>
                            <div class="input-group listSeaForm l"  style="width: 25%; margin-right: 1%">
								<span class="input-group-btn">
									<span class="btn">右耳听力：</span>
								</span>
                                <select class="form-control" name="right_ear_hearing" id="right_ear_hearing">
                                    <option value="1" <?php echo $fileInfo['right_ear_hearing'] == 1 ? 'selected' : '';?>>正常</option>
                                    <option value="2" <?php echo $fileInfo['right_ear_hearing'] == 2 ? 'selected' : '';?>>耳聋</option>
                                </select>
                            </div>

                            <div class="input-group listSeaForm l" style="width: 24%; margin-right: 1%">
								<span class="input-group-btn">
									<span class="btn">左眼视力：</span>
								</span>
                                <input class="form-control" name="left_version" type="text" value="<?php echo ($fileInfo['left_vision']); ?>" onkeyup="value=value.replace(/[^\d^\.]+/g,'')">
                            </div>
                            <div class="input-group listSeaForm l" style="width: 24%;">
								<span class="input-group-btn">
									<span class="btn">右眼视力：</span>
								</span>
                                <input class="form-control" name="right_version" type="text" value="<?php echo ($fileInfo['right_vision']); ?>" onkeyup="value=value.replace(/[^\d^\.]+/g,'')">
                            </div>
                        </div>
                        <div class="mt10 clearfix">
                            <div class="input-group listSeaForm l" style="width: 20%; margin-right: 1%">
								<span class="input-group-btn">
									<span class="btn">电话：</span>
								</span>
                                <input class="form-control" type="text" value="<?php echo ($patientInfo['mobile']); ?>" disabled>
                            </div>
                            <div class="input-group listSeaForm l"  style="width: 29%; margin-right: 1%">
								<span class="input-group-btn">
									<span class="btn">身份证：</span>
								</span>
                                <input class="form-control" name="id_card" type="text" value="<?php echo ($patientInfo['id_card']); ?>" maxlength="18" onkeyup="value=value.replace(/[^\d^\.]+/g,'')">
                            </div>

                            <div class="input-group listSeaForm l" style="width: 49%;">
								<span class="input-group-btn">
									<span class="btn">住址：</span>
								</span>
                                <input class="form-control" name="address" type="text" value="<?php echo ($patientInfo['address']); ?>" maxlength="100">
                            </div>
                        </div>
                        <div class="mt10 clearfix">
                            <div class="input-group listSeaForm l" style="width: 20%; margin-right: 1%">
								<span class="input-group-btn">
									<span class="btn">紧急联系人：</span>
								</span>
                                <input class="form-control" name="emergency_contact_name" type="text" value="<?php echo ($fileInfo['emergency_contact_name']); ?>" maxlength="10" onkeyup="value=value.replace(/[^\a-zA-Z\u4E00-\u9FA5]/g,'')"
                                       onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\a-zA-Z\u4E00-\u9FA5]/g,''))">
                            </div>
                            <div class="input-group listSeaForm l"  style="width: 29%; margin-right: 1%">
								<span class="input-group-btn">
									<span class="btn">关系：</span>
								</span>
                                <select class="form-control" name="emergency_contact_relation" id="emergency_contact_relation">
                                    <option value="">请选择</option>
                                    <option value="1" <?php echo $fileInfo['emergency_contact_relation'] == 1 ? 'selected' : '';?>>爸爸</option>
                                    <option value="2" <?php echo $fileInfo['emergency_contact_relation'] == 2 ? 'selected' : '';?>>妈妈</option>
                                    <option value="3" <?php echo $fileInfo['emergency_contact_relation'] == 3 ? 'selected' : '';?>>儿子</option>
                                    <option value="4" <?php echo $fileInfo['emergency_contact_relation'] == 4 ? 'selected' : '';?>>女儿</option>
                                    <option value="5" <?php echo $fileInfo['emergency_contact_relation'] == 5 ? 'selected' : '';?>>亲戚</option>
                                    <option value="6" <?php echo $fileInfo['emergency_contact_relation'] == 6 ? 'selected' : '';?>>朋友</option>
                                </select>
                            </div>

                            <div class="input-group listSeaForm l" style="width: 49%;">
								<span class="input-group-btn">
									<span class="btn">紧急联系人电话：</span>
								</span>
                                <input class="form-control" name="emergency_contact_mobile" type="text" value="<?php echo ($fileInfo['emergency_contact_mobile']); ?>" maxlength="11" onkeyup="value=value.replace(/[^\d^\.]+/g,'')">
                            </div>
                        </div>
                        <h3 class="tit1 ftl mt20"><span class="blue mr10">过敏史</span></h3>
                        <div class="mt10 clearfix">
                            <textarea class="form-control" id="allergy_info" name="allergy_info" rows="2" maxlength="500" placeholder=""><?php echo ($patientInfo['allergy_info']); ?></textarea>
                        </div>
                        <h3 class="tit1 ftl mt20"><span class="blue mr10">个人史</span></h3>
                        <div class="mt10 clearfix">
                            <textarea class="form-control" id="personal_info" name="personal_info" rows="2" maxlength="500" placeholder=""><?php echo ($fileInfo['personal_info']); ?></textarea>
                        </div>
                        <h3 class="tit1 ftl mt20"><span class="blue mr10">家族史</span></h3>
                        <div class="mt10 clearfix">
                            <textarea class="form-control" id="family_info" name="family_info" rows="2" maxlength="500" placeholder=""><?php echo ($fileInfo['family_info']); ?></textarea>
                        </div>
                        <input type="hidden" name="pid" value="<?php echo ($patientId); ?>">
                    </div>
                </li>
                <li>
                    <div class="panel panel-profile clearfix">
                        <!-- LEFT COLUMN -->
                        <div class="profile-left">
                            <!-- PROFILE DETAIL -->
                            <div class="profile-detail">
                                <h3 class="panel-title blue pd10">病历</h3>
                                <div class="pd10" style="height: 640px; cursor: pointer; overflow-y: auto;">
                                    <?php if(is_array($careHistoryLists)): foreach($careHistoryLists as $key=>$vo): ?><div class="alert alert-info mb10 history" data-hid="<?php echo ($vo['id']); ?>">
                                            <?php echo (date('Y-m-d H:i',$vo['addtime'])); ?>
                                            <?php echo ($vo['department_name']); ?>
                                            <?php echo ($vo['hospital_name']); ?> -
                                            <?php if($vo['true_name']) { ?>
                                                <?php echo ($vo['true_name']); ?>
                                            <?php } else { ?>
                                                <?php echo ($vo['owner_name']); ?>
                                            <?php } ?>
                                        </div><?php endforeach; endif; ?>
                                </div>
                            </div>
                            <!-- END PROFILE DETAIL -->
                        </div>
                        <!-- END LEFT COLUMN -->
                        <!-- RIGHT COLUMN -->
                        <div class="profile-right" style="height: 700px; overflow-y: auto;">
                            <h3 class="tit1 ftl"><span class="blue">诊断信息</span></h3>
                            <div class="mt10 clearfix">
                                <div class="input-group listSeaForm l" style="width: 40%; margin-right: 1%">
									<span class="input-group-btn">
										<span class="btn">发病日期：</span>
									</span>
                                    <input class="form-control" type="text" disabled value="<?php echo ($careHistory['case_date']); ?>">
                                </div>
                                <div class="input-group listSeaForm l"  style="width: 28%; margin-right: 1%">
									<span class="input-group-btn">
										<span class="btn">接诊类型：</span>
									</span>
                                    <input class="form-control" type="text" value="<?php if($careHistory){if($careHistory['type_id'] == 0){echo '初诊';} elseif($careHistory['type_id'] == 1){echo '复诊';} else {echo '急诊';}} ?>" disabled>
                                </div>

                                <div class="input-group listSeaForm l" style="width: 30%; ">
									<span class="input-group-btn">
										<span class="btn">是否传染：</span>
									</span>
                                    <input class="form-control" type="text" value="<?php if($careHistory){if($careHistory['is_contagious'] == 0){echo '否';} else {echo '是';}} ?>" disabled>
                                </div>
                            </div>
                            <div class=" clearfix">
                                <div class="input-group listSeaForm mt10 l">
									<span class="input-group-btn">
										<span class="btn">主诉：</span>
									</span>
                                    <textarea class="form-control" rows="1" type="text" disabled><?php echo ($careHistory['case_title']); ?></textarea>
                                </div>
                            </div>
                            <h3 class="tit1 ftl mt20"><span class="blue">家族史</span></h3>
                            <div class="mt10 clearfix">
                                <textarea class="form-control" rows="2" maxlength="500" disabled><?php echo ($careHistory['family_info']); ?></textarea>
                            </div>
                            <h3 class="tit1 ftl mt20"><span class="blue">附件</span></h3>
                            <div class="r mt10 headPortraitBox">
                                <input type="file" name="file" id="file" />
                                <a href="">上传</a>
                            </div>
                            <?php if(is_array($careOrderLists)): foreach($careOrderLists as $k=>$careOrder): ?><div class="mt20">
                                    <h3 class="tit1 ftl"><span class="blue">处方<?php echo ($k+1); ?></span></h3>
                                    <table class="table table-bordered ftc mt10">
                                        <thead>
                                        <tr>
                                            <th>序号</th>
                                            <th>药品名</th>
                                            <th>单剂量（g/条）</th>
                                            <th>特殊要求</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php if(is_array($careOrderSubLists)): foreach($careOrderSubLists as $key=>$careOrderSub): if(is_array($careOrderSub)): foreach($careOrderSub as $key=>$orderSub): if($orderSub['fid'] == $careOrder['id']) { ?>
                                                    <tr>
                                                        <td><?php echo ($key+1); ?></td>
                                                        <td><?php echo ($orderSub['goods_name']); ?></td>
                                                        <td><?php echo ($orderSub['single']); ?></td>
                                                        <td><?php echo ($orderSub['tips']); ?></td>
                                                    </tr>
                                                <?php } endforeach; endif; endforeach; endif; ?>
                                        </tbody>
                                    </table>
                                    <div class="ftr">
                                        <div class="fublBox gray2">
                                            <span class="">每 <?php echo ($careOrder['num_a']); ?> 天</span>
                                            <span class="ml10"><?php echo ($careOrder['num_b']); ?> 剂</span>
                                            <span class="ml10">服用 <?php echo ($careOrder['num_c']); ?> 天</span>
                                            <span class="ml10">共 <?php echo ($careOrder['num_d']); ?> 剂</span>
                                        </div>
                                    </div>
                                </div><?php endforeach; endif; ?>
                        </div>
                        <!-- END RIGHT COLUMN -->
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->
<!-- Javascript -->
<script>
    var d = new Date();
    var today = d.getFullYear()+"-"+(d.getMonth()+1)+"-"+d.getDate();
    $(function() {
        //选项卡切换
        $(document).on('click', '.tabBtn > .btn', function(){
            $(this).addClass('btn-primary').removeClass('btn-default').siblings('.btn').addClass('btn-default').removeClass('btn-primary');
            $('.tabBox').find('> li').eq($(this).index()).addClass('on').siblings('li').removeClass('on');
        });
        //计算年龄
        $('#birthday').datetimepicker({
            onChangeDateTime: function (e) {
                var birthday = e.dateFormat('Y-m-d');
                var age = getAge(birthday);
                $("#age").val(age);
            },
            lang:'ch',
            timepicker:false,
            format:'Y-m-d',
            validateOnBlur:false,
            maxDate:today
        });
        $('#birthday').bind('input propertychange', function(){
            if ($(this).val() == '') {
                $("#age").val('');
            }
        });
        //编辑患者档案
        $(document).on('click', '.edit', function(){
            var pid = $(":input[name='pid']").val();
            var name = $(":input[name='name']").val();
            var birthday = $(":input[name='birthday']").val();
            var height = $(":input[name='height']").val();
            var weight = $(":input[name='weight']").val();
            var left_version = $(":input[name='left_version']").val();
            var right_version = $(":input[name='right_version']").val();
            var id_card = $(":input[name='id_card']").val();
            var address = $(":input[name='address']").val();
            var emergency_contact_name = $(":input[name='emergency_contact_name']").val();
            var emergency_contact_mobile = $(":input[name='emergency_contact_mobile']").val();
            var sex = $("#sex option:selected").val();
            var blood_type = $("#blood_type option:selected").val();
            var right_ear_hearing = $("#right_ear_hearing option:selected").val();
            var left_ear_hearing = $("#left_ear_hearing option:selected").val();
            var Rh = $("#Rh option:selected").val();
            var emergency_contact_relation = $("#emergency_contact_relation option:selected").val();
            var allergy_info = $('#allergy_info').val();
            var personal_info = $('#personal_info').val();
            var family_info = $('#family_info').val();
            if (height < 0 || height > 300) { remindBox('身高值范围不正确'); return false;}
            if (weight < 0 || weight > 250) { remindBox('体重值范围不正确'); return false;}
            if (left_version < 0 || left_version > 10) { remindBox('左眼视力值范围不正确'); return false;}
            if (right_version < 0 || right_version > 10) { remindBox('右眼视力值范围不正确'); return false;}
            if (emergency_contact_name.length > 0 && !isChinese(emergency_contact_name)) {remindBox('紧急人姓名必须为汉字');return false;}
            if (!isChinese(name)) {remindBox('姓名必须为汉字');return false;}
            if (emergency_contact_mobile.length > 0 && !isMobile(emergency_contact_mobile)) {remindBox('紧急联系人电话格式不正确');return false;}
            if (id_card.length > 0 && !IdentityCodeValid(id_card)) {return false;}
            $.post("<?php echo U('/Patient/editPatient');?>",
                {'pid':pid,'name':name,'birthday':birthday,'height':height,'weight':weight,'left_version':left_version,'right_version':right_version,
                'id_card':id_card,'address':address,'emergency_contact_name':emergency_contact_name,'emergency_contact_mobile':emergency_contact_mobile,
                'sex':sex,'blood_type':blood_type,'right_ear_hearing':right_ear_hearing,'left_ear_hearing':left_ear_hearing,'Rh':Rh,
                'emergency_contact_relation':emergency_contact_relation,'allergy_info':allergy_info,'personal_info':personal_info,'family_info':family_info},
                function (data) {
                    if (data.status == 'success') {
                        location.reload();
                    }
                    remindBox(data.msg);
                },
            "json");
        });
        //查看病历
        $(document).on('click', '.history', function(){
            var history_id = $(this).attr('data-hid');
            $.post("<?php echo U('/Patient/careHistory');?>",
                { "history_id": history_id},
                function (data) {
                    if (data.status=='success') {
                        var html = '';
                        html += '<div class="profile-right" style="height: 700px; overflow-y: auto;">' +
                            '<h3 class="tit1 ftl"><span class="blue">诊断信息</span></h3>' +
                            '<div class="mt10 clearfix">' +
                            '<div class="input-group listSeaForm l" style="width: 40%; margin-right: 1%">' +
                            '<span class="input-group-btn"><span class="btn">发病日期：</span></span>' +
                            '<input class="form-control" type="text" disabled value="'+data.data.careHistory.case_date+'"></div>' +
                            '<div class="input-group listSeaForm l"  style="width: 28%; margin-right: 1%">' +
                            '<span class="input-group-btn"><span class="btn">接诊类型：</span></span>' +
                            '<input class="form-control" type="text" value="';
                            if (data.data.careHistory.type_id == 0) {
                                html += '初诊';
                            } else if (data.data.careHistory.type_id == 1) {
                                html += '复诊';
                            } else {
                                html += '急诊';
                            }
                        html += '" disabled></div><div class="input-group listSeaForm l" style="width: 30%; ">' +
                            '<span class="input-group-btn"><span class="btn">是否传染：</span></span>' +
                            '<input class="form-control" type="text" value="';
                            if (data.data.careHistory.is_contagious == 0) {
                                html += '否';
                            } else {
                                html += '是';
                            }
                        html += '" disabled></div></div><div class=" clearfix"><div class="input-group listSeaForm mt10 l">' +
                            '<span class="input-group-btn"><span class="btn">主诉：</span></span>' +
                            '<input class="form-control" type="text" value="';
                            if (data.data.careHistory.case_title) {
                                html += data.data.careHistory.case_title;
                            }
                        html += '" disabled></div></div>' +
                            '<h3 class="tit1 ftl mt20"><span class="blue">家族史</span></h3><div class="mt10 clearfix">' +
                            '<textarea class="form-control" rows="2" maxlength="500" disabled>';
                        if (data.data.careHistory.family_info) {
                            html += data.data.careHistory.family_info;
                        }
                        html += '</textarea></div>';
                        html += '<h3 class="tit1 ftl mt20"><span class="blue">附件</span></h3>\n' +
                            '                            <div class="r mt10 headPortraitBox">\n' +
                            '                                <input type="file" name="file" id="file" />\n' +
                            '                                <a href="">上传</a>\n' +
                            '                            </div>';
                        $.each(data.data.careOrderLists,function (i,item) {
                            var oid = i + 1;
                            html += '<div class="mt20"><h3 class="tit1 ftl"><span class="blue">处方'+oid+'</span></h3><table class="table table-bordered ftc mt10"><thead>' +
                                '<tr><th>序号</th><th>药品名</th><th>单剂量（g/条）</th><th>特殊要求</th></tr></thead><tbody>';
                            $.each(data.data.careOrderSubLists,function (key,value) {
                                $.each(value, function(k,vo){
                                    var sid = k + 1;
                                    if (vo.fid == item.id) {
                                        html += '<tr><td>'+sid+'</td><td>'+vo.goods_name+'</td><td>'+vo.single+'</td><td>';
                                        if (vo.tips) {
                                            html += vo.tips;
                                        }
                                        html += '</td>';
                                    }
                                });
                            });
                        html += '</tbody></table><div class="ftr"><div class="fublBox gray2"><span class="">每 '+item.num_a+' 天</span>' +
                            '<span class="ml10"> '+item.num_b+' 剂 </span><span class="ml10">服用 '+item.num_c+' 天</span><span class="ml10"> 共 '+item.num_d+' 剂</span></div></div></div>';
                        });
                        html += '</div>';
                        $(".profile-right").replaceWith(html);
                    } else {
                        remindBox(data.msg);
                    }
                },
                "json");
        });
    });
    //计算年龄
    function getAge(beginStr) {
        var reg = new RegExp(
            /^(\d{1,4})(-|\/)(\d{1,2})\2(\d{1,2})(\s)(\d{1,2})(:)(\d{1,2})(:{0,1})(\d{0,2})$/);

        beginStr+=' 01:01:01';

        var beginArr = beginStr.match(reg);

        var d = new Date();
        var endStr = d.getFullYear()+"-"+(d.getMonth()+1)+"-"+d.getDate()+' '+d.getHours()+':'+d.getMinutes()+':'+d.getSeconds();

        var endArr = endStr.match(reg);

        var days = 0;
        var month = 0;
        var year = 0;

        days = endArr[4] - beginArr[4];
        if (days < 0) {
            month = -1;
            days = 30 + days;
        }

        month = month + (endArr[3] - beginArr[3]);
        if (month < 0) {
            year = -1;
            month = 12 + month;
        }

        year = year + (endArr[1] - beginArr[1]);

        var yearString = year > 0 ? year + "岁" : "";
        var monthString = month > 0 ? month + "月" : "";
        var dayString = days > 0 ? days + "天" : "";

        /*
         * 1 如果岁 大于等于1 那么年龄取 几岁
         * 2 如果 岁等于0 但是月大于1 那么如果天等于0
天小于3天 取小时
         * 例如出生2天 就取 48小时
         */
        var result = "";
        if (year >= 1) {
            result = yearString + monthString + dayString;
        } else {
            if (month >= 1) {
                result = days > 0 ? monthString + dayString : monthString;
            } else {
                var begDate = new Date(beginArr[1], beginArr[3] - 1,
                    beginArr[4], beginArr[6], beginArr[8], beginArr[10]);
                var endDate = new Date(endArr[1], endArr[3] - 1, endArr[4],
                    endArr[6], endArr[8], endArr[10]);

                var between = (endDate.getTime() - begDate.getTime()) / 1000;
                days = Math.floor(between / (24 * 3600));
                var hours = Math.floor(between / 3600 - (days * 24));
                dayString = days > 0 ? days + "天" : "";
                result = days >= 3 ? dayString : days * 24 + hours + "小时";
            }
        }

        return result;
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