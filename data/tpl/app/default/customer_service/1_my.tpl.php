<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta charset="UTF-8">
	<meta content="yes" name="apple-mobile-web-app-capable">
	<meta content="black" name="apple-mobile-web-app-status-bar-style">
	<meta content="telephone=no" name="format-detection">
	<meta content="email=no" name="format-detection">
	<title>我的客服</title>
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
<?php  if($kf) { ?>
<p class="bind">
	你已绑定一名专属客服
</p>
<div class="serverList">
	<div class="serverBox myServerBox">
		<a href="#" class="serverListImg">
			<img src="<?php  if($kf['kf_thumb']) { ?><?php  echo IMG_ROOT . $kf['kf_thumb']?><?php  } else { ?><?php echo MOBILE_URL;?>images/0.png<?php  } ?>" alt="">
		</a>
		<a href="#" class="serverListName">
			<?php  echo $kf['kf_nick']?>
		</a>
		<p class="serverNum">
			<span>服务人数:<?php  echo $kf['total']?></span>
			<i class="mySelect">选择</i>
			<i class="myUnBind">解绑</i>
		</p>
		<p class="serverComment">
			<?php  if($kf['score']) { ?>
				<?php  echo str_repeat("<i></i>", intval($kf['score']))?>
			<?php  } else { ?>
				<i></i><i></i><i></i><i></i><i></i>
			<?php  } ?>
		</p>
	</div>
</div>
<?php  } else { ?>
<p class="bind">
	你尚未绑定专属客服
</p>
<div class="bindConfirm">
	<button type="button" id="gobind">去绑定</button>
</div>
<?php  } ?>
<div class="bindOpacity"></div>
<div class="unBindWrap custormerBind">
	<p class="isUnBind">是否解绑?</p>
	<div class="isBindConfirm">
		<span class="isBindYes">是</span>
		<span class="isBindNo">否</span>
	</div>
</div>
<div class="unBindWrap custormerBindOk">
	<p class="isUnBind isCustomerNoLine">解绑成功。 </p>
	<p class="isChangeCustomer">是否重新绑定专属客服？</p>
	<div class="isBindConfirm">
		<span class="isBindNo">不绑定</span>
		<span class="isBindYes">重新绑定</span>
	</div>
</div>

<!-- 专属客服是否在线 -->
<div class="unBindWrap customerWrap">
	<p class="isUnBind isCustomerNoLine">当前您的专属客服不在线 </p>
	<p class="isChangeCustomer">是否更换客服</p>
	<div class="isBindConfirm">
		<span class="isBindYes">是</span>
		<span class="isBindNo">否</span>
	</div>
</div>
<!-- 当前有无在线客服 -->
<div class="unBindWrap customerOnline">
	<p class="isUnBind isCustomerNoLine">客服服务时间为 </p>
	<p class="isChangeCustomer">9:00-12:00 14:00-18:00</p>
	<div class="isBindConfirm">
		<span class="isBindYes">确定</span>
	</div>
</div>
<div class="unBindWrap isbusy">
	<p class="isUnBind isCustomerNoLine">抱歉，当前咨询人数较多</p>
	<p class="isChangeCustomer">请稍候或选择其他客服</p>
	<div class="isBindConfirm">
		<span class="isBindYes">确定</span>
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
// $(".customerOnline").css("display","block");
// $(".bindOpacity").css("display","block");

// 选择专属客服聊天
$(".mySelect").click(function(){
	var date = new Date ();
	var d = date.getHours();
	if(!((d >= 9 && d < 12) || (d >= 14 && d < 18))){
		$(".customerOnline").css("display","block");
		$(".bindOpacity").css("display","block");
		return;
	}
	<?php  if($is_online == false) { ?>
		$(".bindOpacity").css("display","block");
		$(".customerWrap").css("display","block");
	<?php  } else { ?>
		<?php  if(count($online['sessionlist']) >= 5) { ?>
			$(".isbusy").css("display","block");
			$(".bindOpacity").css("display","block");
			return;
		<?php  } else { ?>
			$.post("<?php  echo $this->createMobileUrl('select')?>",{kf_account:'<?php  echo $kf['kf_account']?>'},function(data){
				if(data == "ok"){
					wx.closeWindow();
				}
			}, "JSON")
		<?php  } ?>
	<?php  } ?>
})
$(".customerWrap .isBindYes").click(function(){
	$(".bindOpacity").css("display","none");
	$(".customerWrap").css("display","none");
	location.href = "<?php  echo $this->createMobileUrl('index')?>";
})
$(".customerWrap .isBindNo").click(function(){
	$(".bindOpacity").css("display","none");
	$(".customerWrap").css("display","none");
})

// 解绑
$(".myUnBind").click(function(){
	$(".bindOpacity").css("display","block");
	$(".custormerBind").css("display","block");
})

// 解绑及相关 
$(".custormerBind .isBindYes").click(function(){
	$.post("<?php  echo $this->createMobileUrl('debind')?>",{},function(data){
		if(data == 'success'){
			$(".custormerBind").css("display","none");
			$(".custormerBindOk").css("display","block");
		}
	})
})
$(".custormerBindOk .isBindYes").click(function(){
	// 重新绑定
	$(".bindOpacity").css("display","none");
	$(".custormerBindOk").css("display","none");
	location.href = "<?php  echo $this->createMobileUrl('bind')?>";
})
$(".custormerBindOk .isBindNo").click(function(){
	location.href = "<?php  echo $this->createMobileUrl('index')?>";
})

$(".custormerBind .isBindNo").click(function(){
	$(".bindOpacity").css("display","none");
	$(".custormerBind").css("display","none");

})

$(".customerOnline .isBindYes").click(function(){
	$(".customerOnline").css("display","none");
	$(".bindOpacity").css("display","none");
})
$(function(){
	$("#gobind").click(function(){
		location.href = "<?php  echo $this->createMobileUrl('bind')?>";
	})
})
</script>
</body>
</html>