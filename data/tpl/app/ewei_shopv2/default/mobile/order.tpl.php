<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
		<style type="text/css">
			.content {top: 1.74rem;}
		</style>


			<div class="tab fz-28 tc" style="margin-top: 0.9rem;">
				<?php  if($status==4) { ?>
					<div class="item sb <?php  if($status==4) { ?>active<?php  } ?>" data-status=''>退款/售后</div>
					<div  onclick="window.location.href='<?php  echo mobileUrl('order')?>'"  class="item  " data-status=''>其他订单</div>
				<?php  } else { ?>
					<div class="item sb <?php  if($status==-1) { ?>active<?php  } ?>" data-status=''>全部</div>
					<div class="item sb <?php  if($status==0) { ?>active<?php  } ?>" data-status='0'>待付款</div>
					<div class="item sb <?php  if($status==1) { ?>active<?php  } ?>" data-status='1'>待发货</div>
					<div class="item sb <?php  if($status==2) { ?>active<?php  } ?>" data-status='2'>待收货</div>
					<div class="item sb <?php  if($status==3) { ?>active<?php  } ?>" data-status='3'>已完成</div>				
				<?php  } ?>

			</div>
			<div class="content ">
				<ul id="car-list" class="car-list order-list">
					<script id='tpl_order_index_list' type='text/html'>
						<%each list as order%>
							<li>
								<div class="top fs"><span>订单编号:<%order.ordersn%></span><span class="status"><%order.statusstr%></span></div>
								<%each order.goods[0].goods as g%>
									<div class="item clearfix">
										<img class="fl" src="<%g.thumb%>" />
										<div class="text fl" onclick="window.location.href='<?php  echo mobileUrl('order/detail')?>&id=<%order.id%>';">
											<div class="title over_2"><%g.title%></div>
											<div class="sub-title">￥<%g.price%></div>
											<div class="bottom clearfix">
												x<%g.total%>
											</div>
										</div>
									</div>
               					<%/each%>								
								<div class="total tr fz-28">共<%order.goods.length%>件商品  合计：<span class="price">￥<%order.price%></span></div>
								<div class="order-list-btns">
									
									
									<!--待付款的内容-->
									<% if order.status==0 && order.paytype!=3%>
										<a class="cancel-order" orderid="<%order.id%>"  href="javascript:;">取消订单</a>
										<a href="<?php  echo mobileUrl('order/pay')?>&id=<%order.id%>">立即支付</a>
									<%/if%>
									<!--待付款的内容-->
									
									
									<!--代发货的内容-->
									<% if order.status==1%>
										<a href="<?php  echo mobileUrl('order/refund')?>&id=<%order.id%>">申请退款</a>
										<a class='tomessage' orderid="<%order.id%>" >提醒发货</a>
										<%/if%>									
									<!--代发货的内容-->
									
									<!--代收货的内容-->
									<% if order.status==2 ||  (order.status==0 && order.paytype==3) %>
										<a   href="<?php  echo mobileUrl('order/refund')?>&id=<%order.id%>">申请退款</a>
										<a   href="<?php  echo mobileUrl('order/express')?>&id=<%order.id%>">查看物流</a>
										<a class='finish' orderid="<%order.id%>">确认收货</a>
										<%/if%>									
									<!--代收货的内容-->									
									
									
									
								
								</div>
							</li>
						<%/each%>
					</script>
				</ul>
				
				<div id="empty" class="hide">
					<div class="empty-wrap empty-data">
						<img src="../addons/ewei_shopv2/static/jiyin/img/empty_data.png">
						<p>(～ o ～)~zZ空空如也 ~     <a style="display: inline;" href="javascript: window.location.reload();">点我重试</p>
					</div>
				</div>
				
				
				<div id="lwrap" class="loadding hide">正在努力为您加载...</div>
			</div>
		</div>
		
		<script src="../addons/ewei_shopv2/static/jiyin/js/leftmenu.js"></script>
	    <script language='javascript'>

			require(['core', 'tpl'], function (core, tpl) {
		    	var page=1;
				var status='<?php  echo $_GPC['status'];?>';
		    	var merchid=0;				

				//1.默认加载列表
				getlist();
				//2.获取订单列表的方法
				function getlist(){

					Tools.showIndicator();
					console.log('page:'+page+'--status:'+status+'--'+merchid);
					core.json('order/get_list', {
						page: page,
						status: status,
						merchid: merchid
					}, function(ret) {
						var result = ret.result;
						console.log(result);
						Tools.hideIndicator();
						if(result.list.length>0){
							
							$('#empty').hide();
							if(page!=1){
								$('.order-list').append(tpl('tpl_order_index_list', result));
							}
							else{
								$('.order-list').html(tpl('tpl_order_index_list', result));
							}
							
							page++;
						}
						else{
							if(page!=1){
								console.log('扯着扯着就没有数据了!');
								Tools.toast('没有更多数据了!');
							}
							else{
								console.log('第一页加载完成再扯显示没有数据了');
								$('.order-list').html(tpl('tpl_order_index_list', result));
								$('#empty').show();
							}							
						}
					})										
				}
				//3.取消订单的方法
				function  cancel(orderid){

					core.json('order/op/cancel', {
						id: orderid,
						remark: '其他原因'
					}, function(pay_json) {
						console.log(pay_json);
						if(pay_json.status==1){
							
							Tools.toast('订单取消成功!');
							
						}
						else{
							Tools.toast(pay_json.result.message);
						}
						
					}, true, true)
					page=1;getlist();
				}
				
				

			
				
				
				
				//中美国界线,犯我中华者,虽远必诛!!!!!!*********************************************.以下是美国佬写的代码
				var lwrap = $('#lwrap');
				Tools.selItems('.sb', Tools.ACTIVE_MODE, function(_this) {
					page=1;//订单状态的切换
					status=_this.getAttribute('data-status');//订单状态的切换
					getlist();//订单状态的切换
					$('.order-list').html('');//订单状态的切换
				});
				
				//取消订单回调
				$('#car-list').delegate('.cancel-order', 'click', function() {
					var orderid=$(this).attr('orderid');
					
					Tools.alert('确定要取消该订单吗？', function() {
						cancel(orderid);						
					}, true);
					
					
				});
				//提醒发货回调
				$('#car-list').delegate('.tomessage', 'click', function() {
					var orderid=this.getAttribute('orderid');
					thisobj=this;
					console.log(orderid);
					core.json('order/op/tomessage', {
						orderid: orderid
					}, function(pay_json) {	
							console.log(pay_json);
							thisobj.innerHTML = '已提醒';
							Tools.toast('提醒发货成功');
						
					}, true, true);					
					
					
					
				});
				//删除订单回调
				$('#car-list').delegate('.del-order', 'click', function() {
					Tools.alert('确定要删除该订单吗？', function() {
						Tools.toast('删除订单成功');
					}, true);
				});
				
				//确认收货回调
				$('#car-list').delegate('.finish', 'click', function() {
					var orderid=this.getAttribute('orderid');					
					Tools.alert('确认收货后不可退款,是否继续？', function() {
						core.json('order/op/finish', {
							id: orderid
						}, function(pay_json) {
							if (pay_json.status == 1) {
								
								page=1;getlist();
								return
							}
							
						}, true, true);	
					}, true);
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
							getlist();
							console.log(page);
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