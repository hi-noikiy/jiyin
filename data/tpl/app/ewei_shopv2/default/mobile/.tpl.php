<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>

<div class="content">
	<ul class="index-list" id="showindex">
		<script id='tpl_indexnew_list' type='text/html'>
			<%each list as g%>
			<li>
				<div class="img-100"><img onclick="window.location.href='<?php  echo  mobileUrl('goods/detail'); ?>&id=<%g.id%>'" src="<%g.thumb%>" /></div>
				<div class="bottom">
					<div class="text">
						<%g.title%>
					</div>
					<a href="<?php  echo  mobileUrl('goods/detail'); ?>&id=<%g.id%>"><img class="button" src="../addons/ewei_shopv2/static/jiyin/img/index_btn_img.png" /></a>
				</div>
			</li>
			<%/each%>
		</script>
	</ul>
</div>
</div>

<script src="../addons/ewei_shopv2/static/jiyin/js/leftmenu.js"></script>
<script type="text/javascript">
	var page = 1;
	require(['core', 'tpl'], function(core, tpl) {

		//默认执行一次
		getlist();
		//获取商品数据
		function getlist() {
			Tools.showIndicator();
			core.json('index/get_recommand', {
				'page': page
			}, function(json) {

				//有数据.
				if(json.result.list.length > 0) {
					if(page > 1) {
						$('#showindex').append(tpl('tpl_indexnew_list', json.result));
					} else {
						$('#showindex').append(tpl('tpl_indexnew_list', json.result));
					}

					loaded = false;
				}
				//无数据
				else {
					//没有数据,并且page是1,清空数据
					if(page == 1) {
						$('#showindex').html('');
					}
					console.log('nothing  to do!');
					loaded = true;
				}
			});
			Tools.hideIndicator();
		}

	});
</script>





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

							wx.onMenuShareTimeline({
								title: '<?php  echo $share['title1'];?>', // 分享标题
								link: '<?php  echo $share['url1'];?>', // 分享链接，该链接域名或路径必须与当前页面对应的公众号JS安全域名一致
								imgUrl: '<?php  echo $share['icon1'];?>', // 分享图标
								success: function() {
									// 用户确认分享后执行的回调函数
								},
								cancel: function() {
									// 用户取消分享后执行的回调函数
								}
							});

							wx.onMenuShareAppMessage({
								title: '<?php  echo $share['title1'];?>', // 分享标题
								link: '<?php  echo $share['url1'];?>', // 分享链接，该链接域名或路径必须与当前页面对应的公众号JS安全域名一致
								imgUrl: '<?php  echo $share['icon1'];?>', // 分享图标
								desc:'<?php  echo $share['desc1'];?>',
								type: '', // 分享类型,music、video或link，不填默认为link
								dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
								success: function() {
									// 用户确认分享后执行的回调函数
								},
								cancel: function() {
									// 用户取消分享后执行的回调函数
								}
							});

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