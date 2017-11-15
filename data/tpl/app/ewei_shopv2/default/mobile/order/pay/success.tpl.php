<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
		<style type="text/css">
			.page {background-color: #fff;}
		</style>
			<div class="content tc">
				<div style="margin-top: 18%; margin-bottom: 0.8rem;" class="fhv"><img src="../addons/ewei_shopv2/static/jiyin/img/pay_success.png" style="width: 0.7rem;"/><span class="fz-28" style="color: #6ec15b; ">付款成功</span></div>
				<img src="../addons/ewei_shopv2/static/jiyin/img/jy_ewm.png" style="display: block; width: 2.2rem height: 2.2rem; margin: 0 auto;" />
				<p class="fz-28" style=" margin-top: 0.26rem; margin-bottom: 0.6rem; color: #332c2b;">长按识别二维码，关注公众号，了解发货进度</p>
				<a href="<?php  echo  mobileUrl(''); ?>" class="btn btn-mar btn-primary" style="width: 40%;margin-left: auto;margin-right: auto;" >返回首页</a>
			</div>
		</div>
		
		<script src="../addons/ewei_shopv2/static/jiyin/js/leftmenu.js"></script>		
		<script type="text/javascript">
			$(document).ready(function () {
				setTimeout(function () {
					if (<?php  echo $lottery_changes['is_changes'];?> == 1) {
						var changes = <?php  echo json_encode($lottery_changes['lottery']);?>;
						$('#changescontent').attr('onclick', 'window.location.href="<?php  echo mobileUrl("lottery/lottery_info",array(),true);?>&id=' + changes.lottery_id + '"');
						taskget = new FoxUIModal({
							content: $('#changesmodel').html(),
							extraClass: 'picker-modal',
							maskClick: function () {
								taskget.close()
							}
						});
						taskget.container.find('.changes-btn-close').click(function () {
							taskget.close();
							event.stopPropagation();
						});

						taskget.show();
					}
				}, 200);
			});

		</script>		
	</body>

</html>