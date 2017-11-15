<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>



<link rel="stylesheet" type="text/css" href="../addons/ewei_shopv2/static/jiyin/css/swiper.min.css"/>
		<style type="text/css">
			.content {
				bottom: 0.8rem;
			}
		</style>

			<div class="content">
				<div class="swiper-container detail-swipe">
					<div class="swiper-wrapper">
						<?php  if(is_array($thumbs)) { foreach($thumbs as $thumb) { ?>
							<div class="swiper-slide"><img src="<?php  echo tomedia($thumb)?>" /></div>
						<?php  } } ?>
					</div>
				</div>
				<h1 class="detail-ttile f-b over_2"><?php  echo $goods['title'];?></h1>
				<div class="detail-params img-100">
					<?php  echo $goods['content'];?>
				</div>
			</div>
			<a  class="detail-add-btn">立即购买(<?php  echo $goods['marketprice'];?>元)</a>
		</div>
		<script src=""></script>
		<script type="text/javascript">
    		require(['core', 'tpl','../addons/ewei_shopv2/static/jiyin/js/swiper-3.4.2.min.js'], function (core, tpl,swipe) {
				toggleSide();
				Tools.swipe('.swiper-container');
				
				
				//添加到购物车
				var id='<?php  echo $goods['id'];?>';
				$('.detail-add-btn').click(function(){
					
					core.json('member/cart/add', {'id':id,'total':1}, function(json) {
						var url="<?php  echo  mobileUrl('member/cart'); ?>";
						if(json.status==1){
							Tools.toast('添加成功,进入购物车');
							setTimeout(function(){window.location.href=url;},1000);
						}
						else{
							Tools.toast('添加失败');					
						}
					});
						
				});
				
				document.title = '<?php  echo $goods['title'];?>';
    		});
			
		</script>
		
		
		<script src="../addons/ewei_shopv2/static/jiyin/js/leftmenu.js"></script>
		<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_share', TEMPLATE_INCLUDEPATH)) : (include template('_share', TEMPLATE_INCLUDEPATH));?>		
	</body>
</html>