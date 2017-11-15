<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>
<head>
    <title>基因启示录</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no" />
	<meta name="format-detection" content="telephone=no" />
	<link rel="stylesheet" type="text/css" href="../addons/ewei_shopv2/static/jiyin/css/public.css"/>
	<link rel="stylesheet" type="text/css" href="../addons/ewei_shopv2/static/jiyin/css/index.css"/>
    <script src="../addons/ewei_shopv2/static/jiyin/js/setFontsize.js"></script>
</head>
<body>
	<script type="text/javascript" src="../addons/ewei_shopv2/static/jiyin/js/jquery-1.12.4.min.js"></script>
	<script src="../addons/ewei_shopv2/static/jiyin/js/tools.js"></script>
	<script src='//res.wx.qq.com/open/js/jweixin-1.1.0.js'></script>
	<script language="javascript" src="../addons/ewei_shopv2/static/jiyin/js/require.js"></script>
	<script language="javascript" src="../addons/ewei_shopv2/static/jiyin/js/app/config.js?v=3"></script>
	<script>
		require(['core'],function(modal){modal.init({siteUrl: "<?php  echo $_W['siteroot'];?>",baseUrl: "<?php  echo mobileUrl('ROUTES')?>"})});
	</script>
		<header>
			<a id="show-list" href="javascript:;" class="left fl"><img src="../addons/ewei_shopv2/static/jiyin/img/header_left_icon.png"/></a>
			<a href="<?php  echo  mobileUrl(''); ?>" class="center"><img src="../addons/ewei_shopv2/static/jiyin/img/header_main_bg.png"/></a>
			<a href="<?php  echo  mobileUrl('member/index'); ?>" class="right fr"><img src="../addons/ewei_shopv2/static/jiyin/img/header_right_icon.png"/></a>
		</header>
		<div class="page">
			<div id="mask" class="mask close-side hide" style=" background-color: transparent; z-index: 101;"></div>
			<div id="side-list" class="header-side">
				<div class="top clearfix"><img class="fl close-side" src="../addons/ewei_shopv2/static/jiyin/img/header_left_icon1.png" /></div>
				<div class="text-img"><img src="../addons/ewei_shopv2/static/jiyin/img/header_side_text.png" /></div>
				<ul class="side-link">
					<li onclick="window.location.href='<?php  echo  mobileUrl(''); ?>'">
						<a ><img src="../addons/ewei_shopv2/static/jiyin/img/side_link1.png" />首页</a>
					</li>
					<li onclick="window.location.href='http://jiyin.baimuv.com/app/index.php?i=1&c=entry&id=7&do=detail&m=news'">
						<a  class="waiting" ><img src="../addons/ewei_shopv2/static/jiyin/img/side_link2.png" />检测流程</a>
					</li>
					<li onclick="window.location.href='http://mp.weixin.qq.com/mp/homepage?__biz=MzIzNTU4MTkyOA==&hid=7&sn=f97a3170710d9d4e8ab0d2919a0a2ec7&scene=18#wechat_redirect'">
						<a  class="waiting" ><img src="../addons/ewei_shopv2/static/jiyin/img/side_link3.png" />用户故事</a>
					</li>
					<li onclick="window.location.href='http://jiyin.baimuv.com/app/./index.php?i=1&c=entry&id=8&do=detail&m=news'">
						<a class="waiting"><img src="../addons/ewei_shopv2/static/jiyin/img/side_link4.png" />常见问题</a>
					</li>
				</ul>
			</div>
			<script type="text/javascript">
				/*
				$('.waiting').click(function(){
					Tools.toast('敬请期待.');
				});
				*/
			</script>


