<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no" />
		<meta name="format-detection" content="telephone=no" />
		<script src='//res.wx.qq.com/open/js/jweixin-1.1.0.js'></script>
		<?php  if($id!='') { ?>
			<title><?php  echo $member['nickname'];?>推荐您注册基因启示录</title>
		<?php  } else { ?>
			<title>我的二维码</title>
		<?php  } ?>
		<style type="text/css">
			* {margin: 0;padding: 0;}
			body,html {height: 100%;}
			body {
				background: url(../addons/ewei_shopv2/static/jiyin/img/jy_ewm_bg.jpg) no-repeat center center;
				background-size: cover
			}
			.img { position: absolute; top: 50%; margin-top: -45px; left: 50%; margin-left: -45px; width: 90px; height: 90px; }
			img.info-img { display: block; width: 80%; margin: 0 auto; }
			.info { display: flex; display: -webkit-flex; align-items: center; -webkit-align-items: center; justify-content: center; -webkit-justify-content: center; position: absolute; top: 35px; background-color: #fff; border-radius: 5px; box-shadow: 5px 5px 10px #ddd; width: 80%; height: 82px;left: 50%; margin-left: -40%; font-size: 13px; color: #03354e; }
			.info img {
				width: 45px;
				height: 45px;
				margin-right: 10px;
				float: left;
			}
			.info section {
				float: left;
				line-height: 24px;
			}
			.info::after {
				content: '';
				position: absolute;
				margin-left: 10%;
				left: 10px;
				top: 0;
				width: 5px;
				height: 35px;
				margin-top: -35px;
				background-color: #ff8071;
			}
			.info::before {
				content: '';
				position: absolute;
				margin-right: 10%;
				right: 10px;
				top: 0;
				width: 5px;
				height: 35px;
				margin-top: -35px;
				background-color: #ff8071;
			}
		</style>
	</head>
	<body>
		<div class="info">
			<img src="<?php  echo $member['avatar'];?>"/>
			<section>
				<p>我是<?php  echo $member['nickname'];?></p>
				<p>我为Babyfirst儿童基因检测代言</p>
			</section>
		</div>
		<img src="<?php  echo $thisqrcode;?>" class="img" />
		<img src="../addons/ewei_shopv2/static/jiyin/img/share.png"    onclick="this.style.display = 'none'" style="position: absolute; top: 0;bottom: 0;left: 0;right: 0; width: 100%; height: 100%;z-index: 10;<?php  if($id!='') { ?>display: none;<?php  } ?>" />

<?php  $this->shopShare()?>


<script language="javascript">
        clearTimeout(window.interval);
        window.interval = setTimeout(function () {
            window.shareData = <?php  echo json_encode($_W['shopshare'])?>;
            window.shareData.link='<?php  echo $signurl;?>';
            console.log(window.shareData);
            jssdkconfig = <?php  echo json_encode($_W['account']['jssdkconfig']);?> || { jsApiList:[] };
            jssdkconfig.debug = false;
            jssdkconfig.jsApiList = ['checkJsApi','onMenuShareTimeline','onMenuShareAppMessage','onMenuShareQQ','onMenuShareWeibo','showOptionMenu', 'hideMenuItems', 'onMenuShareQZone'];
            wx.config(jssdkconfig);
            wx.ready(function () {
                wx.showOptionMenu();

                <?php  if(!empty($_W['shopshare']['hideMenus'])) { ?>
                    wx.hideMenuItems({
                        menuList: <?php  echo  json_encode($_W['shopshare']['hideMenus'])?>
                    });
                <?php  } ?>

                wx.onMenuShareAppMessage(window.shareData);
                wx.onMenuShareTimeline(window.shareData);
                wx.onMenuShareQQ(window.shareData);
                wx.onMenuShareWeibo(window.shareData);
                wx.onMenuShareQZone(window.shareData);
            });
        },500);


		<?php  if(!empty($_W['shopset']['wap']['open']) && !is_weixin()) { ?>
		//	Share to qq
		require(['//qzonestyle.gtimg.cn/qzone/qzact/common/share/share.js'], function(setShareInfo) {
			setShareInfo({
				title: "<?php  echo $_W['shopshare']['title'];?>",
				summary: "<?php  echo $_W['shopshare']['desc'];?>",
				pic: "<?php  echo $_W['shopshare']['imgUrl'];?>",
				url: "<?php  echo $_W['shopshare']['link'];?>"
			});
		});
		<?php  } ?>
</script> 

	</body>
</html>
