<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
			<div class="content">
				<ul id="car-list" class="car-list">
					<script id='tpl_indexnew_list' type='text/html'>
						<%each list as g%>
						<li>
							<div class="item clearfix">
								<img class="fl" src="<%g.thumb%>" />
								<div class="text fl">
									<div class="title over_2"><%g.title%></div>
									<div class="sub-title">￥<%g.marketprice%></div>
									<div class="bottom clearfix">
										<div class="btns fr  cartmark" id="<%g.id%>">
											<!-- 如果是一件商品显示删除图标，否则就是 - 号 -->
											<span class="minus">
												<%if g.total==1 %>
												<img src="../addons/ewei_shopv2/static/jiyin/img/delete_icon.png"/>
												<%else%>
												-
												<%/if%>
											</span>
											<!--图 27px --><input type="number" class="input" value="<%g.total%>" /><span class="add">+</span>
										</div>
									</div>
								</div>
							</div>
						</li>
						<%/each%>
					</script>	
				</ul>
				
				<div id="empty" class="hide" >
					<div class="empty-wrap">
						<img src="../addons/ewei_shopv2/static/jiyin/img/empty.png">
						<p>您的购物车里还没有商品</p>
						<a href="<?php  echo  mobileUrl(''); ?>">去购物>></a>
					</div>
				</div>
				
				<div class="detail-footer clearfix">
					<img id="empty-car" src="../addons/ewei_shopv2/static/jiyin/img/delete_icon_red.png" />
					<div class="wrap fr fv">
						<section>
							<p>合计：<span class="price">￥<span>666.00</span></span></p>
						</section>
						<section class="button confirm">去结算</section>
					</div>
				</div>
			</div>
		</div>
		
		<script src="../addons/ewei_shopv2/static/jiyin/js/leftmenu.js"></script>	
		<script type="text/javascript">
			   
			   require(['core', 'tpl'], function (core, tpl) {
				
					
					
					//默认执行一次
					getlist();
					
					
					//1.获取购物车列表数据的函数
					function  getlist(){
						Tools.showIndicator();
						core.json('member/cart/get_list', {}, function(json) {
					          console.log(json);
					          console.log(json.result.totalprice);
					          
					          
					          
					          $('.price span').text(json.result.totalprice);
					          
					          //有数据.
					          if (json.result.list.length > 0) {
	
					          	      $('#car-list').html(tpl('tpl_indexnew_list', json.result));
					          	      $('.confirm').attr('status',1);

					          }
					          //无数据
					          else{
									  $('#car-list').html('');	  
					          	      $('.confirm').attr('status',2);
					          	      $('#empty').show();
					          }
						});
						Tools.hideIndicator();
					}
					
					
					//2.删除购物的商品的函数
					//传入需要移除的商品id,数组喔
					function   deletecart(ids){
						var url='<?php  echo  mobileUrl('member/cart/remove'); ?>';
					    $.post(url,{ids:ids});
					   
					}
					
					//3.更新单个商品
					function updatecart(id,total){
						var  upstatus=false;
						var url='<?php  echo  mobileUrl('member/cart/update'); ?>';
						$.ajax({ 
						          type : "post", 
						          url : url, 
						          data : "id=" + id+"&total="+total, 
						          async : false, 
						          success : function(data){ 
						            data = eval("(" + data + ")"); 
						            console.log(data.status);
						            if(data.status==1){
						            	upstatus=true;
						            }
						            else{
						            	upstatus=false;
						            }
						            
						          } 
						}); 
						
						return upstatus;
						
					}
					
					
					
					//4.获取所有购物车的id函数,返回数组
					function allcartid(){
						var ids=[];
						$allcartobj=$('.cartmark');
						for (var i=0;i<$allcartobj.length;i++) {							
							ids.push($allcartobj.eq(i).attr('id'));
						}
						return ids;					
					}
					
					
					
					//5.提交订单被执行
					$('.confirm').click(function(){
					   var status= $(this).attr('status');
					   if(status==1){
							core.json('member/cart/submit', {}, function(ret) {
								if (ret.status != 1) {
									if (ret.result == 0) {
										Tools.toast(ret.result.message);
									} else {
										Tools.toast(ret.result.message);
									}
									return
								}
								location.href = core.getUrl('order/create')
							}, true)					   		
					   }
					   else{
					   		Tools.toast('购物车没有商品');
					   }
					});
					
					
					
					
					//中美两国国界线******************************************************					
					
					
					//韩星星的玩具代码开始
					const MAX = 9999;
					
					$('#car-list').delegate('.add', 'click', function() {
						var _this = $(this);
						var prev = _this.prev();
						var val = parseInt(prev.val());
						val++;
						val = Math.min(MAX, val);
						_this.html('+');
						_this.prev().prev().html('-');
						
						//必须后端保存成功才更新
						cartid=_this.parent().attr('id');
					    upstatus=updatecart(cartid,val);
						if(upstatus==true){
							//prev.val(val);
							 getlist();
						}
						
						
						
					});
					$('#car-list').delegate('.minus', 'click', function() {
						var _this = $(this);
						var next = _this.next();
						var val = parseInt(next.val());
						val--;
						if(val === 0) {
							delFun(this);
						}
						val = Math.max(1, val);
						if(val === 1) {
							update(this, true);
						} else {
							update(this, false);
						}
						
						//必须后端保存成功才更新
						cartid=_this.parent().attr('id');
					    upstatus=updatecart(cartid,val);
						if(upstatus==true){
							//next.val(val);
							getlist();
						}						
						
						
					});
					$('#car-list').delegate('.input', 'blur', function() {
						var _this = $(this);
						var val = _this.val();
						var __this = _this.next()[0];
						if(val === 1) {
							update(__this, true);
						} else {
							update(__this, false);
						}
						if(val > MAX || val < 1) {
							reset(this);
							Tools.toast('亲~商品数量必须在1~' + MAX + '之间');
						}
					});
					//清空购物车
					$('#empty-car').click(function() {
						Tools.alert('亲，你确定要清空所有商品吗？', function() {
							//获取所有id,并删除开始
							ids=allcartid();
							deletecart(ids);
							//获取所有id,并删除结束							
							
							//删除成功
							Tools.showIndicator();
							setTimeout(function() {
								//删除成功
								Tools.hideIndicator();
								$('#car-list').html('');
								Tools.toast('清空成功');
								getlist();
							}, 1000);
						}, true);
					});
					
					function reset(_this) {
						_this.value = 1;
						$(_this).prev().html('<img src="../addons/ewei_shopv2/static/jiyin/img/delete_icon.png" />').next().next().html('+');
					}
	
					function update(_this, isMin) {
						if(isMin) {
							$(_this).html('<img src="../addons/ewei_shopv2/static/jiyin/img/delete_icon.png" />');
						} else {
							$(_this).html('-');
						}
					}
	
					function delFun(_this) {
						//删除商品
						Tools.alert('你确定要删除该商品吗？', function() {
							//模拟 1s
							Tools.showIndicator();
							var cartid=$(_this).parent().attr('id');
							var ids=[];
							ids.push(cartid);
							console.log(cartid)
							deletecart(ids);

							setTimeout(function() {
								//删除成功
								Tools.hideIndicator();
								$(_this).parents('li').remove();
								getlist();
								
								
							}, 1000);
							
							Tools.toast('删除成功');
							
						}, true);
					}					
					
					
					
					
					//韩星星的玩具代码结束					
					

			   });
			   
			   
			   
			



			

		</script>
	</body>
</html>