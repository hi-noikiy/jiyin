<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta charset="UTF-8">
	<meta content="yes" name="apple-mobile-web-app-capable">
	<meta content="black" name="apple-mobile-web-app-status-bar-style">
	<meta content="telephone=no" name="format-detection">
	<meta content="email=no" name="format-detection">
	<title>客服列表</title>
	<link rel="stylesheet" href="<?php echo MOBILE_URL;?>css/base.css">
	<style>
		.serverListImg {
			z-index: 999;
		}
	</style>
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
<div class="customServer">
	<a href="#" class="selectServer" id="selectServer">随机选择空闲客服</a>
	<a href="<?php  echo $this->createMobileUrl('my')?>" class="myCustomServer">我的客服</a>
</div>
<div class="serverList">
	<?php  if(is_array($kfs)) { foreach($kfs as $kf) { ?>
	<div class="serverBox">
		<a href="<?php  echo $this->createMobileUrl('detail',['kf_account'=>$kf['online']['kf_account']])?>" class="serverListImg">
			<img src="<?php  if($kf['local']['kf_thumb']) { ?><?php  echo IMG_ROOT.$kf['local']['kf_thumb']?><?php  } else { ?><?php echo MOBILE_URL;?>images/0.png<?php  } ?>" alt="">
		</a>
		<span   kf_account="<?php  echo $kf['online']['kf_account']?>" list_count="<?php  echo count($kf['info']['sessionlist'])?>"    onclick="select_this('<?php  echo $kf['online']['kf_account']?>','<?php  echo count($kf['info']['sessionlist'])?>')">
		<a href="<?php  echo $this->createMobileUrl('detail',['kf_account'=>$kf['online']['kf_account']])?>" class="serverListName">
			<?php  echo $kf['local']['kf_nick']?>
			
				<?php  if(count($kf['info']['sessionlist']) >= intval($kf_total_on)) { ?>
				<i style="background-color:red;">
					忙碌
				<?php  } else { ?>
				<i>
					空闲
				<?php  } ?>
			</i>
		</a>
		<span class="serverNum" style="display:block;margin-left:70px;">
			<span>服务人数:<?php  echo $kf['local']['total']?></span>
			<i>选择</i>
			<b>
				已有<var>
					<?php  echo count($kf['info']['sessionlist'])?>
				</var>人在服务中
			</b>
		</span>
		<span class="serverComment" >
			<?php  if($kf['local']['score']) { ?>
				<?php  echo str_repeat("<i></i>",intval(ceil($kf['local']['score'])))?>
			<?php  } else { ?>
				<i></i><i></i><i></i><i></i><i></i>
			<?php  } ?>
		</span>
		</span>
	</div>
	<?php  } } ?>
	<div class="serverScroll">
		向上加载更多
	</div>
</div>
<div class="test"></div>
<div class="bindOpacity"></div>
<div class="unBindWrap customerOnline">
	<p class="isUnBind isCustomerNoLine">当前无在线客服,服务时间为 </p>
	<p class="isChangeCustomer">每天9:00-12:00 14:00-18:00</p>
	<div class="isBindConfirm">
		<span class="isBindYes">确定</span>
	</div>
</div>

<div class="unBindWrap customerConnect">
	<p class="isUnBind isCustomerNoLine">抱歉，您目前对话尚未结束</p>
	<p class="isChangeCustomer"><!-- 请点击当前服务客服头像进入评价，以结束当前对话。 -->
		请等候会话结束或联系客服结束对话后，再更换客服！

	</p>
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
	
var isgo=false;
	
	
var clientHeight=document.documentElement.clientHeight;
	window.onscroll=function(){
		var scrollHeight=document.documentElement.scrollHeight;
		var distance=scrollHeight-clientHeight;
		$('.serverScroll').html("没有更多的客服了");
		// return;
		// if(document.body.scrollTop>=distance){
		// 	var str='<div class="serverBox"><a href="#" class="serverListImg"><img src="<?php echo MOBILE_URL;?>images/face.jpg" alt=""></a><a href="#" class="serverListName">郑秀晶<i class="active">忙碌</i></a><p class="serverNum"><span>服务人数:1000</span><i>选TA</i><b>已有<var>1</var>人在等待</b></p><p class="serverComment"><i></i></p></div>';
		// 	$(str).insertBefore(".serverScroll")
		// }
	}
	





//选择随机客服
$(".selectServer").bind('click', function(){
	


	<?php  if(!$kfs) { ?>
		$(".customerOnline").css("display","block");
		$(".bindOpacity").css("display","block");
	<?php  } else { ?>
	$.post("<?php  echo $this->createMobileUrl('random_select')?>",{},function(data){
		if(data == "ok"){
			isgo=true;
			wx.closeWindow();
		}else if(data == 'fail'){
			alert('11111!')
			$(".customerConnect").css("display","block");
			$(".bindOpacity").css("display","block");
		}
	}, "JSON");
	<?php  } ?>
})


$(document).ready(function(){

wx.ready(function(){

var serverbox=$('.serverBox span');
console.log(serverbox.length);
if(serverbox.length>0){
	for (var i=0;i<serverbox.length;i++) {
		var kf_account=serverbox.eq(i).attr('kf_account');
		var list_count=serverbox.eq(i).attr('list_count');
		list_count=Number(list_count);
		$.post("<?php  echo $this->createMobileUrl('select')?>",{kf_account:kf_account},function(data){
			if(data == "ok"){
				alert('已分配客服,请在公众号中直接回复');
				//wx.closeWindow();
			}
		}, "JSON")
	}
}
else{
	alert('无客服在线');
}
});



});






// 选择指定客服
function select_this(kf_account,list_count){
	
	if(list_count >= 5){
		$(".isbusy").css("display","block");
		$(".bindOpacity").css("display","block");
		return;
	}

	$.post("<?php  echo $this->createMobileUrl('select')?>",{kf_account:kf_account},function(data){
		if(data == "ok"){
			wx.closeWindow();
		}else if(data == 'fail'){

			$(".customerConnect").css("display","block");
			$(".bindOpacity").css("display","block");
		}else{
			$(".customerConnect .isCustomerNoLine").html(data);
			$(".customerConnect .isChangeCustomer").html("");
			$(".customerConnect").css("display","block");
			$(".bindOpacity").css("display","block");
		}
	}, "JSON")
	return false;
}

$(function(){
	<?php  if(!$kfs) { ?>
		$(".customerOnline").css("display","block");
		$(".bindOpacity").css("display","block");
	<?php  } ?>
})


$(".customerOnline .isBindYes").click(function(){
	$(".customerOnline").css("display","none");
	$(".bindOpacity").css("display","none");
})


$(".customerConnect .isBindYes").click(function(){
	$(".customerConnect").css("display","none");
	$(".bindOpacity").css("display","none");
	wx.closeWindow();
})
$(".isbusy .isBindYes").click(function(){
	$(".isbusy").css("display","none");
	$(".bindOpacity").css("display","none");
	wx.closeWindow();
})


</script>
</body>
</html>