<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
		<style type="text/css">
			.content1 {bottom: 0.98rem;}
			.content2 {bottom: 0.84rem;}
			#page2 {font-size: 0.28rem;transform: translate3d(100%, 0, 0); transition: transform .3s ease-in;}
			.btn {position: fixed;bottom: 0;left: 0; border-radius: 0;}
			
			.total {
				margin: 0; margin-top: -0.2rem; padding: 0.2rem; margin-bottom: -0.1rem; border-top: 1px solid #c3c3c3; background-color: #fff;
			}
		</style>
			<div class="content content1">
				<ul id="car-list" class="car-list">

					<?php  if(is_array($order_goods)) { foreach($order_goods as $item) { ?>
					<li>
						<div class="item clearfix">
							<img class="fl" src="<?php  echo $item['thumb'];?>" />
							<div class="text fl">
								<div class="title over_2"><?php  echo $item['title'];?></div>
								<div class="sub-title"><?php  echo $item['marketprice'];?></div>
								<div class="bottom clearfix">x<?php  echo $item['buycount'];?></div>
							</div>
						</div>
					</li>
					<?php  } } ?>				
				</ul>
				<div class="total tr fz-28">共<?php  echo count($order_goods);?>件商品  合计：<span class="price">￥<?php  if(empty($ispeerpay)) { ?><?php  echo number_format($order['price'],2)?><?php  } else { ?><?php  echo number_format($peerprice,2)?><?php  } ?></span></div>	
				<h2 class="fz-28 c-6 content-pad" style="color: #999999;margin-top: 0.4rem;">支付方式</h2>
				<div class="pay-type">
					
						<?php  if($wechat['success'] || (is_h5app() &&$payinfo['wechat'])) { ?>
							<div class="item active sb" id="wechatpay"><img src="../addons/ewei_shopv2/static/jiyin/img/order_wx_bg.png"/>微信支付</div>
						<?php  } ?>
						
						<?php  if(($alipay['success'] && !is_h5app()) || (is_h5app() &&$payinfo['alipay'])) { ?>
							<div class="item active sb" id="alipaypay"><img src="../addons/ewei_shopv2/static/jiyin/img/order_alpay.png"/>支付宝支付</div>
						<?php  } ?>
				</div>
			</div>
			<a  class="btn btn-primary pay-btn" data-type='<?php  if($wechat['success'] || (is_h5app() &&$payinfo['wechat'])) { ?>wechat<?php  } else { ?>alipay<?php  } ?>'>立即支付</a>
		</div>
		<script src="../addons/ewei_shopv2/static/jiyin/js/leftmenu.js"></script>
    	<script language='javascript'>
    		
    		require(['biz/order/pay','core', 'tpl'], function (modal,core,tpl) {
					
				Tools.selItems('.sb', Tools.ACTIVE_MODE, function(_this) {
//					console.log(_this.id);
//					if(_this.id=='wechatpay'){
//						$('.pay-btn').attr('data-type','wechat');
//					}
//					else{
//						$('.pay-btn').attr('data-type','alipay');
//					}
//					
				});

        		modal.init(<?php  echo json_encode($payinfo)?>);
				
				
				console.log(modal);
				
   			});
    	</script>
	</body>
</html>