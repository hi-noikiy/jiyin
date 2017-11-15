<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html lang="zh-cn">
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php  if(isset($title)) $_W['page']['title'] = $title?><?php  if(!empty($_W['page']['title'])) { ?><?php  echo $_W['page']['title'];?> - <?php  } ?><?php  if(empty($_W['page']['copyright']['sitename'])) { ?><?php  if(IMS_FAMILY != 'x') { ?>微信公众号管理系统<?php  } ?><?php  } else { ?><?php  echo $_W['page']['copyright']['sitename'];?><?php  } ?></title>
	<meta name="keywords" content="<?php  if(empty($_W['page']['copyright']['keywords'])) { ?><?php  if(IMS_FAMILY != 'x') { ?>微信号营销平台,微信,微信公众平台<?php  } ?><?php  } else { ?><?php  echo $_W['page']['copyright']['keywords'];?><?php  } ?>" />
	<meta name="description" content="<?php  if(empty($_W['page']['copyright']['description'])) { ?><?php  if(IMS_FAMILY != 'x') { ?>国内最完善移动网站及移动互联网技术解决方案。<?php  } ?><?php  } else { ?><?php  echo $_W['page']['copyright']['description'];?><?php  } ?>" />
	<link rel="shortcut icon" href="<?php  echo $_W['siteroot'];?><?php  echo $_W['config']['upload']['attachdir'];?>/<?php  if(!empty($_W['setting']['copyright']['icon'])) { ?><?php  echo $_W['setting']['copyright']['icon'];?><?php  } else { ?>images/global/wechat.jpg<?php  } ?>" />
	<!---默认-->
	<link href="./resource/css/bootstrap.min.css" rel="stylesheet">
	<link href="./resource/css/font-awesome.min.css" rel="stylesheet">
	<link href="./resource/css/common.css" rel="stylesheet">
	<script>var require = { urlArgs: 'v=<?php  echo date('YmdH');?>' };</script>
	<script src="./resource/js/lib/jquery-1.11.1.min.js"></script>
	<script src="./resource/js/app/util.js"></script>
	<script src="./resource/js/require.js"></script>
	<script src="./resource/js/app/config.js"></script>
	<!-- CSS -->
	<link rel="stylesheet" href="./static/mobapps/assets/css/login.css">
	<!--[if lt IE 9]>
		<script src="./resource/js/html5shiv.min.js"></script>
		<script src="./resource/js/respond.min.js"></script>
	<![endif]-->
	<script type="text/javascript">
	if(navigator.appName == 'Microsoft Internet Explorer'){
		if(navigator.userAgent.indexOf("MSIE 5.0")>0 || navigator.userAgent.indexOf("MSIE 6.0")>0 || navigator.userAgent.indexOf("MSIE 7.0")>0) {
			alert('您使用的 IE 浏览器版本过低, 推荐使用 Chrome 浏览器或 IE8 及以上版本浏览器.');
		}
	}
	
	window.sysinfo = {
		<?php  if(!empty($_W['uniacid'])) { ?>
				'uniacid': '<?php  echo $_W['uniacid'];?>',
		<?php  } ?>
		<?php  if(!empty($_W['acid'])) { ?>
				'acid': '<?php  echo $_W['acid'];?>',
		<?php  } ?>
		<?php  if(!empty($_W['openid'])) { ?>
				'openid': '<?php  echo $_W['openid'];?>',
		<?php  } ?>
		<?php  if(!empty($_W['uid'])) { ?>
				'uid': '<?php  echo $_W['uid'];?>',
		<?php  } ?>
				'siteroot': '<?php  echo $_W['siteroot'];?>',
				'siteurl': '<?php  echo $_W['siteurl'];?>',
				'attachurl': '<?php  echo $_W['attachurl'];?>',
				'attachurl_local': '<?php  echo $_W['attachurl_local'];?>',
				'attachurl_remote': '<?php  echo $_W['attachurl_remote'];?>',
		<?php  if(defined('MODULE_URL')) { ?>
				'MODULE_URL': '<?php echo MODULE_URL;?>',
		<?php  } ?>
				'cookie' : {'pre': '<?php  echo $_W['config']['cookie']['pre'];?>'}
		};
	</script>
	</head>
	<body>
<div class="container">
      <div class="content_warp">
    <h1>微信分销</h1>
    <form action="" method="post" role="form" id="form1" onsubmit="return formcheck();">
          <div class="row">
        <div class="col-xs-12 col-lg-5">
              <input name="username" type="text" class="username" placeholder="请输入用户名登录">
            </div>
        <div class="col-xs-12 col-lg-5">
              <input name="password" type="password" class="password" placeholder="请输入登录密码">
            </div>
        <div class="col-xs-12 col-lg-2">
              <input type="submit" id="submit"  name="submit" class="submit"  value="登录"/>
              <input name="token" value="<?php  echo $_W['token'];?>" type="hidden" />
            </div>
      </div>
          <div class="error"><span>+</span></div>
          <?php  if(!empty($_W['setting']['copyright']['verifycode'])) { ?>
          <div class="row">
        <div class="col-xs-12 col-lg-6">
              <input name="verify" type="text" placeholder="请输入验证码">
            </div>
        <div class="col-xs-12 col-lg-6"> <a href="javascript:;" id="toggle" style=" display:block; height:62px; line-height:62px; margin-top:45px;"><img id="imgverify" src="<?php  echo url('utility/code')?>" style="height:62px; vertical-align:middle;border-radius:10px;" title="点击图片更换验证码"/><span style="display:inline-block; color:#333; padding:0 15px; border-radius:10px; margin-left:15px; background:#fff; height:62px; line-height:62px; *display:inline; *zoom:1;"> 看不清？换一张</span></a> </div>
      </div>
          <?php  } ?> 
          
          <!-- <?php  if(!$_W['siteclose']) { ?><a href="<?php  echo url('user/register');?>" class="btn btn-link btn-lg">注册</a><?php  } ?>-->
          
        </form>
  </div>
    </div>
<!-- Javascript --> 
<script src="./static/mobapps/assets/js/supersized.3.2.7.min.js"></script> 
<script src="./static/mobapps/assets/js/scripts.js"></script> 
<script type="text/javascript">
$('#toggle').click(function() {

	$('#imgverify').prop('src', '<?php  echo url('utility/code')?>r='+Math.round(new Date().getTime()));

	return false;

});

<?php  if(!empty($_W['setting']['copyright']['verifycode'])) { ?>


	$('#form1').submit(function() {

		var verify = $(':text[name="verify"]').val();

		if (verify == '') {

			alert('请填写验证码');

			return false;

		}

	});

<?php  } ?>

</script>
</body>
</html>
