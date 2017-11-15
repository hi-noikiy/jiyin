<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>

<style type="text/css">
	#car-list .top { line-height: 1.2; padding: 0.1rem 0; }
</style>
			<div class="content">
				
						<?php  if($thisre) { ?>	

							<?php  if($thisre['status']==0) { ?>
							<section style="line-height: 1.3rem; background-color: #ff0036; color: #fff;" class="tc fz-30">您的订单正在<?php  if($order['status'] ==1) { ?>申请退款<?php  } else { ?>申请售后<?php  } ?>中，请耐心等待商家处理！</section>	        							
							<?php  } ?>
							<?php  if($thisre['status']>=3) { ?>
							<section style="line-height: 1.3rem; background-color: #ff0036; color: #fff;" class="tc fz-30">您的订单<?php  if($order['status'] ==1) { ?>申请退款<?php  } else { ?>申请售后<?php  } ?>，商家已经通过！</section>	        
							<?php  } ?>
							<?php  if($thisre['status']==-1) { ?>
							<section style="line-height: 1.3rem; background-color: #ff0036; color: #fff;" class="tc fz-30">您的订单<?php  if($order['status'] ==1) { ?>申请退款<?php  } else { ?>申请售后<?php  } ?>，商家已经拒绝！并回复：<?php  echo $thisre['reply'];?></section>	        
							<?php  } ?>							
						<?php  } ?>				

				
				
				<ul id="car-list" class="car-list order-list">
					<li>
						<div class="top fs"><span>下单时间:<?php  echo date('Y-m-d H:i:s',$order['createtime']);?></span></div>
						<div class="top fs"><span>订单编号:<?php  echo $order['ordersn'];?></span><span class="status">
																					<?php  if(empty($order['status'])) { ?>
															                        <?php  if($order['paytype']==3) { ?>
															                        货到付款，等待发货
															                        <?php  } else { ?>
															                        待付款
															                        <?php  } ?>
															                        <?php  } else if($order['status']==1) { ?>
															                        <?php  if($order['sendtype']>0) { ?>部分商品已发货<?php  } else { ?>已付款<?php  } ?>
															                        <?php  if(!empty($order['ccard'])) { ?>
															                        (充值中)
															                        <?php  } ?>
															                        <?php  } else if($order['status']==2) { ?>
															                        已发货
															                        <?php  } else if($order['status']==3) { ?>
															                        交易完成
															                        <?php  if(!empty($order['ccard'])) { ?>
															                        (充值完成)
															                        <?php  } ?>
															                        <?php  } else if($order['status']==-1) { ?>
															                        交易关闭
															                        <?php  } ?>
															
															                        <?php  if($order['refundstate'] > 0) { ?>
															                        (<?php  if($order['status'] ==1) { ?>申请退款<?php  } else { ?>申请售后<?php  } ?>中)
															                        <?php  } ?>
																				   </span></div>
							<?php  if(is_array($goods)) { foreach($goods as $g) { ?>
								<div class="item clearfix">
									<img class="fl" src="<?php  echo tomedia($g['thumb'])?>" />
									<div class="text fl">
										<div class="title over_2"><?php  echo $g['title'];?></div>
										<div class="sub-title">￥<?php  echo $g['price'];?></div>
										<div class="bottom clearfix">
											x<?php  echo $g['total'];?>
										</div>
									</div>
								</div>
							<?php  } } ?>
						<div class="total tr fz-28">共<?php  echo   count($goods);?>件商品  合计：<span class="price">￥<?php  echo $order['goodsprice'];?></span></div>
						<div class="order-list-btns">
							<a class="cancel-order" href="<?php  echo mobileUrl('order/refund',array('id'=>$order['id']))?>">申请退款</a><a href="<?php  echo mobileUrl('order/express')?>&id=<?php  echo $order['id'];?>">追踪物流</a><?php  if($order['status']==2) { ?><a orderid='<?php  echo $order['id'];?>'  id="finish">确认收货</a><?php  } ?>
						</div>
					</li>
				</ul>
				<div class="order-detail-desc">
					<div class="top">
						<div class="wrap">							
							<em><?php  echo $order['realname'];?></em><span><?php  echo $order['realmobile'];?></span>
						</div>
						<div class="wrap"><?php  echo $order['realaddress'];?></div>
					</div>
					<div class="center">
						<div class="wrap">
							<em>支付方式：</em>
							<span>							
								<?php  if($order['paytype'] == 0) { ?>未支付<?php  } ?>
                                <?php  if($order['paytype'] == 1) { ?>余额支付<?php  } ?>
                                <?php  if($order['paytype'] == 11) { ?>后台付款<?php  } ?>
                                <?php  if($order['paytype'] == 21) { ?>微信支付<?php  } ?>
                                <?php  if($order['paytype'] == 22) { ?>支付宝支付<?php  } ?>
                                <?php  if($order['paytype'] == 23) { ?>银联支付<?php  } ?>
                                <?php  if($order['paytype'] == 3) { ?>货到付款<?php  } ?>								
							</span>
						</div>
						
						<div class="wrap">
							<em>商品合计:：</em><span>￥<?php  echo $order['goodsprice'];?></span>
						</div>
						<div class="wrap">
							<?php  $disaddress=pdo_get('ewei_shop_dispatch', array('id' =>$order['disid']), array('dispatchname', 'id','price'));?>														
							<em>运费:：</em><span>￥<?php  echo $disaddress['price'];?></span>
						</div>
					</div>
					<div class="bottom">
						<div class="wrap">
							<em>实付：</em><span>￥<?php  echo $order['price'];?></span>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<script src="../addons/ewei_shopv2/static/jiyin/js/leftmenu.js"></script>
		<script type="text/javascript">
			require(['core', 'tpl'], function (core, tpl) {


				function finish(id) {
					core.json('order/op/finish', {
						id: id
					}, function(pay_json) {
						if (pay_json.status == 1) {
							location.reload();
							return
						}
						Tools.toast(pay_json.result)
					}, true, true)
				};




				//中美国界线*********************************中美国界线



				var lwrap = $('#lwrap');
				Tools.selItems('.sb', Tools.ACTIVE_MODE, function(_this) {
					Tools.showIndicator();
					setTimeout(function() {
						Tools.hideIndicator();
					},500)
				});
				
				//提醒发货回调
				$('#car-list').delegate('.note-order', 'click', function() {
					this.innerHTML = '已提醒'
				});
				//删除订单回调
				$('#car-list').delegate('.del-order', 'click', function() {
					Tools.alert('确定要删除该订单吗？', function() {
						Tools.toast('删除订单成功');
					}, true);
				});
				
				//确认收货
				$('#finish').click(function(){
					finish($(this).attr('orderid'));	
				});
				
				
				return (function() {
					//滚动加载
					var winH = $('.content').height();
					var loaded = false;
					$('.content').scroll(function() {
						var scrollHeight = this.scrollHeight;
						var scrollTop = this.scrollTop;
						if (scrollTop + winH >= scrollHeight) {
							console.log('到底了');
							lwrap.show();
							//假设加载完成
							setTimeout(function() {
								lwrap.hide();
							}, 1000)
						}
					});
				})();
			
			});


			
			
			


			

		</script>
	</body>
</html>
