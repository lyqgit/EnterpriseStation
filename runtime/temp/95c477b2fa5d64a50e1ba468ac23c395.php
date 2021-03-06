<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:64:"F:\wamp\www\wlcg/application/admin\view\index\product_class.html";i:1499871625;}*/ ?>
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
<link rel="stylesheet" type="text/css" href="__HUI__/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link type="text/css" rel="stylesheet" href="__HUI__/static/h-ui.admin/css/H-ui.admin.css"/>
<link type="text/css" rel="stylesheet" href="__HUI__/static/h-ui/font/font-awesome.min.css"/>
<!--[if IE 7]>
<link href="http://www.bootcss.com/p/font-awesome/assets/css/font-awesome-ie7.min.css" rel="stylesheet" type="text/css" />
<![endif]-->
<title>分类管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 新闻中心 <span class="c-gray en">&gt;</span> 新闻分类管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="pd-20 text-c">
  <form class="form form-horizontal" action="<?php echo url('admin/product/category_add'); ?>" method="post">
    <div class="row cl">
      <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>上级栏目：</label>
      <div class="formControls col-xs-8 col-sm-9">
        <select class="select" id="sel_Sub" name="pid" style="width:250px">
            <option value="<?php echo $class['category_id']; ?>"><?php echo $class['category_name']; ?></option>
        </select>
        <input class="input-text" name="category_name" style="width:550px" type="text" value="" placeholder="输入分类" ><button type="submit" class="btn btn-success" ><i class="icon-plus"></i> 添加</button>
      </div>
    </div>
  </form>
  <div class="article-class-list cl mt-20">
    <table class="table table-border table-bordered table-hover table-bg">
      <thead>
        <tr class="text-c">
          <th width="25"><input type="checkbox" name="" value=""></th>
          <th width="80">ID</th>
          <th>分类名称</th>
          <th>所属分类</th>
          <th width="70">操作</th>
        </tr>
      </thead>
      <tbody>
        <?php if(is_array($category) || $category instanceof \think\Collection || $category instanceof \think\Paginator): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
          <tr class="text-c">
            <td><input type="checkbox" name="id[]" value=""></td>
            <td><?php echo $vo['category_id']; ?></td>
            <td><?php echo $vo['category_name']; ?></td>
            <td><?php echo $vo['pid_name']; ?></td>
            <td class="f-14 td-manage"><a style="text-decoration:none" class="ml-5" onClick="article_class_edit('分类编辑','<?php echo url('admin/product/category_edit_show',['category_id'=>$vo['category_id']]); ?>','<?php echo $vo['category_id']; ?>')" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a> <a style="text-decoration:none" class="ml-5" onClick="article_class_del(this,'<?php echo $vo['category_id']; ?>')" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
          </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
      </tbody>
    </table>
  </div>
</div>
<script type="text/javascript" src="http://cdn.bootcss.com/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="__HUI__/static/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="__HUI__/static/h-ui.admin/js/H-ui.admin.js"></script>
<script type="text/javascript" src="__HUI__/lib/layer/2.4/layer.js"></script>
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

/*分类-编辑*/
function article_class_edit(title,url,id,w,h){
  layer_show(title,url,w,h);
}
/*分类-删除*/
function article_class_del(obj,id){
  layer.confirm('确认要删除吗？',function(index){
    $.ajax({
      type: 'POST',
      url: '<?php echo url("admin/product/category_del"); ?>',
      data: {'category_id':id},
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