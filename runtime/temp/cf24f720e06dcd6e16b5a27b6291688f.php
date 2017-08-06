<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:60:"F:\wamp\www\wlcg/application/index\view\contact\contact.html";i:1499350372;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>联系我们</title>
		<link type="text/css" rel="stylesheet" href="__PUBLIC__/css/common.css" />
		<link type="text/css" rel="stylesheet" href="__PUBLIC__/css/subpage.css" />
		<link type="text/css" rel="stylesheet" href="__PUBLIC__/css/contact.css" />
		<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=6vvqoVROdWsq64FDVM0kaVO1F65oGOOR"></script>
		<script type="text/javascript" src="__PUBLIC__/js/map.js" language="JavaScript"></script>
	</head>
	<body>
		<div class="header">
			<div class="logo">
				<a href="<?php echo url('index/index/index'); ?>"><img src="__PUBLIC__/img/logo.jpg" alt="图片加载"/></a>
			</div>
			<div class="nav">
				<ul>
					<li><a href="<?php echo url('index/index/index'); ?>">企业首页</a></li>
					<li><a href="<?php echo url('index/about/index'); ?>">关于我们</a></li>
					<li><a href="<?php echo url('index/news/index'); ?>">新闻中心</a></li>
					<li><a href="<?php echo url('index/product/index'); ?>">产品中心</a></li>
					<li><a class="current" href="<?php echo url('index/contact/index'); ?>">联系我们</a></li>
				</ul>
			</div>
		</div>
		<div class="sub_banner">
			<ul>
				<li>
					<a href="pro_details.html">
						<img src="__PUBLIC__/img/banner_01.jpg" alt="图片加载" />
					</a>
                </li>
			</ul>
		</div>
		<div class="content">
			<div class="content_main">
				<div class="location">
					<div class="title">
						<h2>联系我们</h2>
						<h3>contact us</h3>
					</div>
					<ul>
						<li class="current">联系我们</li>
						<li><a href="__PUBLIC__/img/banner_01.jpg">首页</a>  ></li>
						<li>当前位置： </li>
					</ul>
				</div>
				<div class="main_bottom">
					<div class="sidebar">
						<div class="sid_title">
							<h2>公司介绍</h2>
							<h3>Contact us</h3>
						</div>
						<div>
							<ul>
								<li class="current"><a href="#">·<span>与我联系</span>></a></li>
								<li><a href="#">·<span>在线咨询</span>></a></li>
							</ul>
						</div>
					</div>
					<div class="con_main">
						<div class="con_top">
							<form>
								<ul>
									<li>
										<label for="mem_name">姓名：</label>
										<input id="mem_name" type="text" />
									</li>
									<li>
										<label for="tele">电话：</label>
										<input id="tele" type="text" />
									</li>
									<li>
										<label for="mail">邮箱：</label>
										<input id="mail" type="text" />
									</li>
									<li>
										<label for="leave_word">留言：</label>
										<textarea id="leave_word" type="textarea"></textarea>
									</li>
									<li class="con_code">
										<label for="verifi">验证码：</label>
										<input class="code" id="verifi" type="text" />
										<img src="__PUBLIC__/img/contact_code.png" alt="图片加载"/>
										<a href="#">看不清楚，换一张</a>
									</li>
								</ul>
								<div class="button">
									<input type="reset" value="重置" />
									<input type="submit" value="提交" />
								</div>
							</form>
							<div class="con_tel">
								<h2>联系物联</h2>
								<ul>
									<li>物联传感科技有限公司</li>
									<li>地址：南京秣周东路12号3楼</li>
									<li>业务专线：400 928 9228</li>
									<li>海外招商热线：400 889 2891</li>
									<li>邮箱：support@wuliangroup.com</li>
									<li>联系人：张经理</li>
								</ul>
							</div>
						</div>
						<div class="map" id="map"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="footer">
			<div class="main">
				<div class="main_left">
					<ul>
						<li><a href="<?php echo url('index/index/index'); ?>">企业首页</a></li>
						<li><a href="<?php echo url('index/about/index'); ?>">关于我们</a></li>
						<li><a href="<?php echo url('index/news/index'); ?>">新闻中心</a></li>
						<li><a href="<?php echo url('index/product/index'); ?>">产品中心</a></li>
						<li><a class="unborder" href="<?php echo url('index/contact/index'); ?>">联系我们</a></li>
					</ul>
					<p class="footer_tel">400 928 9228</p>
					<span>support@wuliangroup.com</span>
					<p class="copyright">©Copyright 2002-2015 南京物联传感技术有限公司　　苏ICP备09088266号 </p>
				</div>
				<div class="main_right">
					<h2>联系我们</h2>
					<form>
						<ul>
							<li>
								<label for="member_name">姓名：</label>
								<input id="member_name" type="text" />
							</li>
							<li>
								<label for="telephone">电话：</label>
								<input id="telephone" type="text" />
							</li>
						</ul>
						<p>
							<label for="leave word">留言：</label>
							<br />
							<textarea id="leave word" type="textarea"></textarea>
						</p>
						<div class="btn">
							<input type="reset" value="重置" />
							<input type="submit" value="提交" />
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>
