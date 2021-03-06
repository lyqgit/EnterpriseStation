<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:60:"F:\wamp\www\wlcg/application/admin\view\index\power_add.html";i:1499691729;}*/ ?>
﻿<!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="Bookmark" href="/favicon.ico" >
<link rel="Shortcut Icon" href="/favicon.ico" />
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
<!--/meta 作为公共模版分离出去-->

<title>新建网站角色 - 管理员管理 - H-ui.admin v3.0</title>
<meta name="keywords" content="H-ui.admin v3.0,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v3.0，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
<article class="page-container">
	<form action="" method="post" class="form form-horizontal" id="form-admin-role-add">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>角色名称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="roleName" name="role">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">权限设置：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<dl class="permission-list">
					<dt>
						<label>
							网站栏目
						</label>
					</dt>
					<dd>
						<?php if(is_array($class) || $class instanceof \think\Collection || $class instanceof \think\Paginator): $i = 0; $__LIST__ = $class;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
						<dl class="cl permission-list2">
							<dt>
								<label class="">
									<?php echo $vo['col_name']; ?>
								</label>
							</dt>
							<dd>
								<label class="">
									<input type="radio" checked value="1" name="<?php echo $vo['col_name']; ?>">
									显示
								</label>
								<label class="">
									<input type="radio" value="0" name="<?php echo $vo['col_name']; ?>">
									不显示
								</label>
							</dd>
						</dl>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</dd>
				</dl>
			</div>
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
				<button type="submit" class="btn btn-success radius" id="admin-role-save"><i class="icon-ok"></i> 确定</button>
			</div>
		</div>
	</form>
</article>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="__HUI__/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="__HUI__/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="__HUI__/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="__HUI__/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="__HUI__/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="__HUI__/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="__HUI__/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript">
$(function(){
	$("#form-admin-role-add").validate({
		rules:{
			roleName:{
				required:true,
			},
		},
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		submitHandler:function(form){
			$(form).ajaxSubmit({
				type: 'post',
				url: "<?php echo url('admin/admin/power_add'); ?>" ,
				success: function(data){
					if(data){
						layer.msg('添加成功!',{icon:1,time:1000});
					}else{
						layer.msg('角色名称重复!',{icon:1,time:1000});
					}

				},
				error: function(XmlHttpRequest, textStatus, errorThrown){
					layer.msg('error!',{icon:1,time:1000});
				}
			});
			setTimeout(function(){
				var index = parent.layer.getFrameIndex(window.name);
				parent.$('.btn-success').click();
				parent.layer.close(index);
			},1000)
		}
	});
});
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>