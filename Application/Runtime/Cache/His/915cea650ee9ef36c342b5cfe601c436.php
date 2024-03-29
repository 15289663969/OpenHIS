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
    <script src="/Public/his/vendor/layer/layer.js"></script>
<!-- MAIN -->
<div class="main">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">
			<div class="">
				<ul class="tabBox panel mt10">
					<li class="on">
						<div class="pd10 grayBg2">
							<div class="fublBox mr10"><span>关键词：</span>
								<input type="text" class="form-control form-itmeB" placeholder="姓名或手机号" id="kw" />
							</div>
							<div class="fublBox mr10"><span>状态：</span>
								<!--:0未支付，1已支付，2确认收款，3申请退款，4已退款,5部分支付,6完成交易-->
								<select class="form-control form-itmeB" id="status" onchange="initPage();">
									<option value="999">全部</option>
									<option value="0">未收费</option>
									<option value="1">未发药</option>
									<option value="4">已退款</option>
									<option value="6">已完成</option>
								</select>
							</div>
							<button type="button" class="btn btn-primary" onclick="initPage();">查询</button>
						</div>
						<div class="pd10">
							<table class="table drugsTable ftc">
								<thead>
									<tr>
										<th width="50">序号</th>
										<th width="120">门诊编号</th>
										<th>患者姓名</th>
										<th width="50">性别</th>
										<th width="50">年龄</th>
										<th width="80">电话</th>
										<th >医生姓名</th>
										<th width="150">就诊日期</th>
										<th width="100">状态</th>
										<th width="100">金额(元)</th>
										<th width="180">操作</th>
									</tr>
								</thead>
								<tbody id="main_box">
									<tr>
										<td colspan="10"> 加载中...</td>
									</tr>

								</tbody>
							</table>
						</div>
						<div class="paging mt20 mb20 ftc" id="page_str">...
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->

<style>

	.pay_status{padding: 6px 8px;}
	.pay_status_0{background: #FF0000;color:#FFFFFF;}
	.pay_status_4{background: #c5c5c5;color:#8d9093;}
	.pay_status_1{background:#0CA818;color: #FFFFFF;}

	#main_box .on{background: #F0F0F0;}
	.btn_show_io{cursor: pointer;}

</style>

<script>
	var _registration_page = 1,is_iframe=self!=top?true:false,W,H;
	var layer_idx=0;
	var layer_idx_loading=0;
    var my_layer;
    if(is_iframe){
        my_layer = parent.layer;
    }else{
        my_layer = layer;
    }
    var pay_layer_idx=0;
    var DATA=[];

$(function() {

    $("#main_box").on("mouseover mouseout",'tr',function(event){
        if(event.type == "mouseover"){
            //鼠标悬浮
            $(this).addClass('on');
        }else if(event.type == "mouseout"){
            //鼠标离开
            $(this).removeClass('on');
        }
    });

    //挂号列表翻页
    $("#page_str").on('click','.item',function () {
        var tag = $(this)[0].tagName.toLowerCase();
        if(tag=='i'){
            if($(this).hasClass('next')){
                _registration_page=parseInt(_registration_page)+1;
            }else{
                _registration_page=parseInt(_registration_page)-1;
            }
        }else{
            _registration_page=parseInt($(this).html());
        }
        getPkgList(_registration_page);
    });

    $("#main_box").on('click','.btn_show_io',function () {

		//var status = $(this).data('status');
		var title = $(this).data('title');
		/*if(status==0){
		    my_layer.msg('未支付状态');
		    return false;
		}*/
		var pkg_id = $(this).data('pkg_id');

        show_page(my_layer,'/Doctor/pkgIO/pkg_id/'+pkg_id,title +' [ 交易信息 ]','580px','420px');
    });


    W = $(window).width()-100;

    H = $(window).height()-100;

    initPage();
});

function initPage() {

    getPkgList(1);

}

function pay_back(pkg_id) {

	var h='<a href="javascript:done('+pkg_id+');" class="btn btn-success btn-sm">发药</a>  ';
    h+='<a href="javascript:refund('+pkg_id+');" class="btn btn-warning btn-sm">退款</a>';

    $('#item_ctl_'+pkg_id).html(h);
    $('#item_status_'+pkg_id).html('<span class="pay_status pay_status_1">已支付</span>');

    if(parent.layer)parent.layer.closeAll();
    layer.close(pay_layer_idx);
    //layer.close(layer_idx);
}

function pay(id,title) {
    var a = $("#item_amount_"+id).html();

    if(a.length==0||parseFloat(a)==0){
        my_layer.msg('金额为0，无需收费！');

        return false;
    }

    pay_layer_idx = layer.open({
        type: 2,
        title: title +' [ 收费 ]',
        shadeClose: true,
        maxmin:true,
        moveOut: true,
        scrollbar:false,
        shade: 0,//0.8
        area: ['780px','600px'],
        content: '/Doctor/pkgPay/pkg_id/'+id,
        zIndex: my_layer.zIndex, //重点1
        success: function(layero){
            my_layer.setTop(layero); //重点2
        },
		cancel: function(index, layero){
            //parent.layer.close(index)
            //询问框
            parent.layer.confirm('现金是否到账？', {title:'系统提示',
                btn: ['已到账','待支付'] //按钮
            }, function(){
                //保存
                save_pay_do();
            }, function(){
                layer.close(pay_layer_idx);
            });

            /*if(confirm('确定要关闭么')){ //只有当点击confirm框的确定时，该层才会关闭
                layer.close(index)
            }*/
            return false;
        }

    });

    //show_page(layer,'/Doctor/pkgPay/pkg_id/'+id,title +' [ 收费 ]','780px','600px');
}

    function save_pay_do() {
		var F = $("#layui-layer-iframe"+pay_layer_idx);//.contents().find("#pay_cash").val();
        var cash = F.contents().find("#pay_cash").val();
        var ol = F.contents().find("#pay_ol_input").val();

        /*console.log(cash);
        console.log(ol);
        console.log(DATA);


        return false;*/
        
        
        if(ol.length==0)ol=0;
        if(cash.length==0)cash=0;


        if(parseFloat(ol)+parseFloat(cash)<DATA.pkg_amount){
            //console.log('ol:%o,cash:%o,amount:%o',ol,cash,DATA.pkg_amount);
            return false;
        }

        $.post('/Doctor/payOrder',{pkg_id:DATA.pkg_id,ol:ol,cash:cash,pkg_status:DATA.pkg_status,registration_id:DATA.registration_id},function (res) {
            if(res.status==0){
                //if(parent.pay_back) {
                pay_back(DATA.pkg_id);
                /*}else{
                    pay_back(DATA.pkg_id);
                }*/

            }else{
                alert(res.msg);
            }
        });
    }

function done(id,title) {

    //询问框
    my_layer.confirm('确定执行发药操作？此操作不可恢复',{icon: 0, title:'系统提示',btn: ['确定','取消']

        ,zIndex: my_layer.zIndex, //重点1
        success: function(layero){
            my_layer.setTop(layero); //重点2
        }
	}, function(idx){

        my_layer.close(idx);
        layer_loading();
        $.post('/Doctor/pkgDone',{pkg_id:id},function (res) {
			layer_close_loading();
			if(res.status == 0) {
                layer_close_all();
                my_layer.msg('操作成功');//, {offset: 'rt'}

                $('#item_ctl_'+id).html('');
                $('#item_status_'+id).html('<span class="pay_status pay_status_6">完成交易</span>');
				//setTimeout(layer_close_all,2000);
            }else{
                layer_msg(res.msg);
			}
        });

    });

}

function layer_close_all() {
    my_layer.closeAll();
}

function detail(id,title) {

    show_page(my_layer,'/Doctor/pkgShow/pkg_id/'+id,title+' [ 详情]','1250px','90%');
}

function refund(id,title) {
    show_page(layer,'/Doctor/pkgRefund/pkg_id/'+id,title +' [ 退款 ]','580px','620px');
}


function refund_back(pkg_id,status) {
    var c,s;

    if(status==4){
        c='';
        s = '<span class="pay_status pay_status_4">已退款</span>';
    }else{
        c='<a href="javascript:refund('+pkg_id+',\'再次退款\');" class="btn btn-warning btn-sm">退款</a>';
        s = '<span class="pay_status pay_status_7">分部退款</span>';
    }

    $('#item_ctl_'+pkg_id).html(c);
    $('#item_status_'+pkg_id).html(s);

    layer.close(layer_idx);
}

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


function getPkgList(p) {

    $.post('/Doctor/getPkgList',{p:p,status:$("#status").val(),kw:$("#kw").val(),doctor_id:'all'},function (res) {
		if(res.status==0){
			var h='',page_str='';

		    if(res.data.num>0){
                $.each(res.data.list,function (i,n) {
                    h+='<tr>\n' +
                        '<td>'+n.id+'</td>\n' +
                        '<td>' +
						'<a href="javascript:detail('+n.id+',\''+n.name+'--'+n.add_date+'\');" title="点击查看详情">' +n.order_code+
						'</a>'+'</td>\n' +
                        '<td>'+n.name+'</td>\n' +
                        '<td>'+n.sex_str+'</td>\n' +
                        '<td>'+n.age[0]+'</td>\n' +
                        '<td>'+n.mobile+'</td>\n' +
                        '<td>'+(n.true_name?n.true_name:n.owner_name)+'</td>\n' +
                        '<td>'+n.add_date+'</td>\n' +
                        '<td id="item_status_'+n.id+'" ' +
						' data-pkg_id="'+n.id+'" ' +
						' data-title="'+n.name+'--'+n.add_date+'" ' +
						' data-status="'+n.status+'" ' +
						' title="点击查看交易详情" ' +
						' class="btn_show_io" ' +
						'><span class="pay_status pay_status_'+n.status+'">'+n.status_str+'</span></td>\n' +
                        '<td style="font-weight: bold;" id="item_amount_'+n.id+'">'+n.amount+'</td>\n' +
                        '<td align="right" id="item_ctl_'+n.id+'">';
					switch (n.status){
						case '0':
                            h+='<a href="javascript:pay('+n.id+',\''+n.name+'--'+n.add_date+'\');" class="btn btn-primary btn-sm">收费</a>';
						    break;
						case '7':
                            h+='<a href="javascript:refund('+n.id+',\''+n.name+'--'+n.add_date+'\');" class="btn btn-warning btn-sm">退款</a>';
						    break;
						case '5':
                            h+='<a href="javascript:pay('+n.id+',\''+n.name+'--'+n.add_date+'\');" class="btn btn-primary btn-sm">收费</a>  ';
                            h+='<a href="javascript:refund('+n.id+',\''+n.name+'--'+n.add_date+'\');" class="btn btn-warning btn-sm">退款</a>';
						    break;
						case '1':
                            h+='<a href="javascript:done('+n.id+',\''+n.name+'--'+n.add_date+'\');" class="btn btn-success btn-sm">发药</a>  ';
                            h+='<a href="javascript:refund('+n.id+',\''+n.name+'--'+n.add_date+'\');" class="btn btn-warning btn-sm">退款</a>';
						    break;
						default:

					}

                    h+='</td>\n' +
                        '</tr>';
                });
                page_str = res.data.page_str;
			}else{
		        h='<tr>\n' +
                    '<td colspan="10"> 暂无数据</td>\n' +
                    '</tr>';

			}

		    $("#main_box").html(h);

		    $("#page_str").html(page_str);
		}else{
		    alert(res.msg);
		}
    });
}


function layer_loading(msg) {
    msg = msg||'加载中';
    //加载层-风格4
    layer_idx_loading = my_layer.msg(msg+'...', {
        icon: 16,
        time:0
        ,shade: 0.65
    });
}


function layer_close_loading() {
    my_layer.close(layer_idx_loading);
}

function layer_msg(msg) {
    my_layer.msg(msg, {
        time: 20000, //20s后自动关闭
        btn: ['确 定']
    });
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