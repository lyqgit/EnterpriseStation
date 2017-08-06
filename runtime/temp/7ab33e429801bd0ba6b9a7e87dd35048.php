<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"F:\wamp\www\wlcg/application/admin\view\article\article_class_edit.html";i:1499610587;}*/ ?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="http://libs.useso.com/js/html5shiv/3.7/html5shiv.min.js"></script>
<script type="text/javascript" src="http://libs.useso.com/js/respond.js/1.4.2/respond.min.js"></script>
<script type="text/javascript" src="http://cdn.bootcss.com/css3pie/2.0beta1/PIE_IE678.js"></script>
<![endif]-->
<link type="text/css" rel="stylesheet" href="__HUI__/static/h-ui/css/H-ui.css"/>
<link type="text/css" rel="stylesheet" href="__HUI__/static/h-ui.admin/css/H-ui.admin.css"/>
<!--[if IE 7]>
<link href="http://www.bootcss.com/p/font-awesome/assets/css/font-awesome-ie7.min.css" rel="stylesheet" type="text/css" />
<![endif]-->
<title>分类编辑</title>
</head>
<body>
<div class="pd-20">
  <form class="Huiform" action="<?php echo url('admin/article/category_edit'); ?>" method="post">
    上级栏目：
    <select class="select" id="sel_Sub" name="type" style="width:260px">
      <option value="<?php echo $category['category_pid']; ?>"><?php echo $category['category_pid_name']; ?></option>
    </select>
    分类名：<input class="input-text" style="width:270px" type="text" value="<?php echo $category['category_name']; ?>" placeholder="输入分类" name="category_name" id="class-val">
    <input type="hidden" name="category_id" value="<?php echo $category['category_id']; ?>">
    <button type="submit" class="btn btn-success"><i class="icon-save"></i> 保存</button>
  </form>
</div>
<script type="text/javascript" src="http://cdn.bootcss.com/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="__HUI__/static/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="__HUI__/static/h-ui.admin/js/H-ui.admin.js"></script>
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?080836300300be57b7f34f4b3e97d911";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F080836300300be57b7f34f4b3e97d911' type='text/javascript'%3E%3C/script%3E"));
</script>
</body>
</html>