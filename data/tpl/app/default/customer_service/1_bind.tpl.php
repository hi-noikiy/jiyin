<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta charset="UTF-8">
	<meta content="yes" name="apple-mobile-web-app-capable">
	<meta content="black" name="apple-mobile-web-app-status-bar-style">
	<meta content="telephone=no" name="format-detection">
	<meta content="email=no" name="format-detection">
	<title>绑定客服</title>
	<link rel="stylesheet" href="<?php echo MOBILE_URL;?>css/base.css">
	<script type='text/javascript'>
      var _vds = _vds || [];
      window._vds = _vds;
      (function(){
        _vds.push(['setAccountId', 'bf4e742617c190e5']);
        (function() {
          var vds = document.createElement('script');
          vds.type='text/javascript';
          vds.async = true;
          vds.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'dn-growing.qbox.me/vds.js';
          var s = document.getElementsByTagName('script')[0];
          s.parentNode.insertBefore(vds, s);
        })();
      })();
  </script>
</head>
<body class="debtWrap">
<div class="serverList">
	<?php  if(is_array($kfs)) { foreach($kfs as $kf) { ?>
	<div class="serverBox">
		<a href="#" class="serverListImg">
			<img src="<?php  if($kf['kf_thumb']) { ?><?php  echo IMG_ROOT . $kf['kf_thumb']?><?php  } else { ?><?php echo MOBILE_URL;?>images/0.png<?php  } ?>" alt="">
		</a>
		<a href="#" class="serverListName">
			<?php  echo $kf['kf_nick']?>
			<i>
				<?php  if($kf['is_online']) { ?>
					在线
				<?php  } else { ?>
					离线
				<?php  } ?>
			</i>
		</a>
		<p class="serverNum">
			<i onclick="select_bind('<?php  echo $kf['kf_account']?>')">绑定</i>
		</p>
		<p class="serverComment">
			<?php  if($kf['score']) { ?>
				<?php  echo str_repeat("<i></i>",intval(ceil($kf['score'])))?>
			<?php  } else { ?>
				<i></i><i></i><i></i><i></i><i></i>
			<?php  } ?>
		</p>
	</div>
	<?php  } } ?>
	<div class="serverScroll">
		向上加载更多
	</div>
</div>
<script type="text/javascript" src="<?php echo MOBILE_URL;?>js/zepto.min.js"></script>
<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script type="text/javascript">
<?php  $signPackage=$_W['account']['jssdkconfig'];?>	
wx.config({
	debug: false,   
	appId: '<?php  echo $signPackage["appId"];?>',
	timestamp: '<?php  echo $signPackage["timestamp"];?>',
	nonceStr: '<?php  echo $signPackage["nonceStr"];?>',
	signature: '<?php  echo $signPackage["signature"];?>',
	jsApiList: ['closeWindow',]
});
</script>
<script type="text/javascript">
function select_bind(kf_account){
	var binding = true;
	if(!binding) return false;
	binding = false;
	$.post("<?php  echo $this->createMobileUrl('bindkf')?>",{kf_account:kf_account},function(data){
		if(data == "success"){
			binding = true;
			alert("绑定成功！");
			wx.closeWindow();
		}
	})
}
</script>
</body>
</html>