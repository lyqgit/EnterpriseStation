<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:64:"F:\wamp\www\wlcg/application/admin\view\index\feedback_list.html";i:1499760855;}*/ ?>
﻿<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="__HUI__/lib/html5shiv.js"></script>
<script type="text/javascript" src="__HUI__/lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="__HUI__/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="__HUI__/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="__HUI__/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="__HUI__/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="__HUI__/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="__HUI__/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->

<title>意见反馈</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 评论管理 <span class="c-gray en">&gt;</span> 意见反馈 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<form action="<?php echo url('admin/message/del_all'); ?>" method="post">
		<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><button href="javascript:;" type="submit" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</button> </span> <span class="r">共有数据：<strong><?php echo count($message); ?></strong> 条</span> </div>
		<div class="mt-20">
			<table class="table table-border table-bordered table-hover table-bg table-sort">
				<thead>
					<tr class="text-c">
						<th width="25"><input type="checkbox" name="" value=""></th>
						<th width="60">ID</th>
						<th width="100">姓名</th>
						<th width="160">电话</th>
						<th width="200">邮箱</th>
						<th>留言内容</th>
						<th width="100">操作</th>
					</tr>
				</thead>
				<tbody>
					<?php if(is_array($message) || $message instanceof \think\Collection || $message instanceof \think\Paginator): $i = 0; $__LIST__ = $message;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
						<tr class="text-c">
							<td><input type="checkbox" value="<?php echo $vo['message_id']; ?>" name="id[]"></td>
							<td><?php echo $vo['message_id']; ?></td>
							<td><?php echo $vo['message_name']; ?></td>
							<td><?php echo $vo['message_tel']; ?></td>
							<td><?php echo $vo['message_mail']; ?></td>
							<td class="text-l"><?php echo $vo['message_word']; ?></td>
							<td class="td-manage"> <a title="删除" href="javascript:;" onclick="member_del(this,'<?php echo $vo['message_id']; ?>')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
						</tr>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</tbody>
			</table>
		</div>
	</form>
</div>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="__HUI__/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="__HUI__/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="__HUI__/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="__HUI__/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer /作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="__HUI__/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="__HUI__/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="__HUI__/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
$(function(){
	$('.table-sort').dataTable({
		"aaSorting": [[ 1, "desc" ]],//默认第几个排序
		"bStateSave": true,//状态保存
		"aoColumnDefs": [
		  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
		  //{"orderable":false,"aTargets":[0,2,4]}// 制定列不参与排序
		]
	});

});

/*用户-删除*/
function member_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '<?php echo url("admin/message/del"); ?>',
			data: {'message_id':id},
			dataType: 'json',
			success: function(data){
				$(obj).parents("tr").remove();
				layer.msg('已删除!',{icon:1,time:1000});
			},
			error:function(data) {
				console.log(data.msg);
			},
		});		
	});
}
</script>
</body>
</html>