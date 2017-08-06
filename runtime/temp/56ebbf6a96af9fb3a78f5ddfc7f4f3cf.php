<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:62:"F:\wamp\www\wlcg/application/admin\view\index\product_add.html";i:1499762429;}*/ ?>
<!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="Bookmark" href="/favicon.ico" >
<link rel="Shortcut Icon" href="__HUI__/favicon.ico" />
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

<title>新增文章 - 资讯管理 - H-ui.admin v3.0</title>
<meta name="keywords" content="H-ui.admin v3.0,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v3.0，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
<article class="page-container">
	<form class="form form-horizontal" action="<?php echo url('admin/product/add'); ?>" enctype="multipart/form-data" method="post">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>产品名称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="articletitle" name="title">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>产品类型：</label>
			<div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
				<select name="type" class="select">
					<?php if(is_array($category) || $category instanceof \think\Collection || $category instanceof \think\Paginator): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
						<option value="<?php echo $v['category_id']; ?>"><?php echo $v['category_name']; ?></option>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</select>
				</span>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">产品描述：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<textarea name="abstract" cols="" rows="" class="textarea"  placeholder="说点什么...最少输入10个字符" datatype="*10-100" dragonfly="true" nullmsg="备注不能为空！"></textarea>
				<p class="textarea-numberbar"><em class="textarea-length">0</em>/200</p>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">产品创建时间：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="<?php echo $time; ?>" placeholder="" name="time">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">上传图片：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<div class="uploader-thum-container">
					<span class="btn-upload form-group">
					  <input class="input-text upload-url radius" type="text" name="uploadfile-1" id="uploadfile-1" readonly><a href="javascript:void();" class="btn btn-primary radius"><i class="iconfont">&#xf0020;</i> 浏览文件</a>
					  <input type="file" multiple name="image" class="input-file">
					</span>
				</div>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">产品内容：</label>
			<div class="formControls col-xs-8 col-sm-9"> 
				<script id="editor" type="text/plain" style="width:100%;height:400px;"></script> 
			</div>
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				<input class="btn btn-primary radius" type="submit" value="提交">
				<button onClick="removeIframe();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
			</div>
		</div>
	</form>
</article>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="__HUI__/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="__HUI__/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="__HUI__/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="__HUI__/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer /作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="__HUI__/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="__HUI__/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="__HUI__/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="__HUI__/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript" src="__HUI__/lib/webuploader/0.1.5/webuploader.min.js"></script>
<script type="text/javascript" src="__HUI__/lib/ueditor/1.4.3/ueditor.config.js"></script>
<script type="text/javascript" src="__HUI__/lib/ueditor/1.4.3/ueditor.all.min.js"> </script>
<script type="text/javascript" src="__HUI__/lib/ueditor/1.4.3/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript">
$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	
	//表单验证
	$("#form-article-add").validate({
		rules:{
			articletitle:{
				required:true,
			},
			articletype:{
				required:true,
			},
			abstract:{
				required:true,
			},
			author:{
				required:true,
			},

		},
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		submitHandler:function(form){
			//$(form).ajaxSubmit();
			var index = parent.layer.getFrameIndex(window.name);
			//parent.$('.btn-refresh').click();
			parent.layer.close(index);
		}
	});
	

	
	var ue = UE.getEditor('editor');
	
});
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>