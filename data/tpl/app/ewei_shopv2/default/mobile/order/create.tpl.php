<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<link rel="stylesheet" type="text/css" href="/addons/ewei_shopv2/static/jiyin/css/mui.picker.min.css"/>
		<style type="text/css">
			.content1 {bottom: 0.98rem;}
			.content2 {bottom: 0.84rem;}
			#page2 {font-size: 0.28rem;transform: translate3d(100%, 0, 0); transition: transform .3s ease-in;}
			#agree-btn {position: fixed;bottom: 0;left: 0;}
		</style>
		<div class="page">
			<div id="mask2" class="hide">
				<div class="mask" onclick="$(this).parent().hide()"></div>
				<div class="repair-mask">
					<h2>请选择配送方式</h2>
					<ul class="list" id="dislist">
						<script id='tpl_dis_list' type='text/html'>	
							<%each dispatchres as dis%>
								<li disid="<%dis.id%>"><%dis.dispatchname%></li>
							<%/each%>
						</script>	
					</ul>
				</div>
			</div>
			<div class="content content1">
				
				<!--商品循环-->
				<div id="car-list">
					<script id='tpl_goods_list' type='text/html'>
					<%each list as g%>
					<ul  class="car-list">
						<%each g.goods as gs%>
							<input class='goodsid' type='hidden' name='goodsid[]' value="<%gs.goodsid%>" />							
							<li>
								<div class="item clearfix">
									<img class="fl" src="<%gs.thumb%>" />
									<div class="text fl">
										<div class="title over_2"><%gs.title%></div>
										<div class="sub-title">￥<%gs.marketprice%></div>
										<div class="bottom clearfix">
											<div class="btns fr cartmark" id="<%gs.cid%>">
												<span class="minus">-</span>
												<!--图 27px --><input type="number" class="input" value="<%gs.total%>" /><span class="add">+</span>
											</div>
										</div>
									</div>
								</div>
							</li>
						<%/each%>
					</ul>
					<%/each%>
					</script>
				</div>
				
				<div id="consigee" class="consigee-info">
					<div class="input-wrap order-item">
						<span class="fl">收件人</span>
						<div class="input fl"><input type="text" id="realname" verify msg-empty="收货人姓名" placeholder="请输入收件人姓名" /></div>
					</div>
					<div class="input-wrap order-item">
						<span class="fl">电话</span>
						<div class="input fl"><input type="number" id="realmobile" verify="phone" msg-empty="收货人手机" msg="手机号码格式不正确" placeholder="请输入收件人手机号码" /></div>
					</div>
					<div class="input-wrap order-item">
						<span class="fl">地址</span>
						<div class="input fl"><input id="realaddress" type="text" verify msg-empty="收货地址" placeholder="-省-市-区-街道-号" readonly onfocus="this.blur()" /></div>
					</div>
					<div class="input-wrap order-item">
						<span class="fl">详细地址</span>
						<div class="input fl"><input type="text" verify msg-empty="详细地址" id="addressdetail" placeholder="请输入详细地址（如xx小区xx号）" /></div>
					</div>
					<div class="order-item order-mar fs">
						<span>配送方式</span><a id="mailsend"  disid=""  onclick="$('#mask2').show()" class="right" href="javascript:;">顺丰包邮</a>
					</div>
					<div id="coupon-sel" class="order-item order-bg fs">
						<span>使用优惠码</span><a class="right" href="javascript:;"></a>
					</div>
					<div id="coupon-form" class="coupon-form content-pad hide">
						<input id="promocode" type="text" value="" placeholder="请输入优惠码" />
						<input id="iscode" type="hidden" value="0" />
						<a href="javascript:;" class="btn codebtn">确定</a>
					</div>
					<?php  if($member['ispreferential']==1) { ?>
					<div class="order-item fs order-bg">
						<span>扫码注册首单</span><a class="right" href="javascript:;">-<?php  echo $memberset['favourable'];?>元</a>
					</div>
					<input type="hidden" id="favourable" value="1"  />
					<?php  } else { ?>
					<input type="hidden" id="favourable" value="2"  />
					<?php  } ?>
					<div class="order-item fs order-bg">
						<span>发票信息</span><a id="bill" fpstatus='0' class="right" href="javascript:;">不开发票</a>
					</div>
					<div class="input-wrap order-item">
						<span class="fl">留言</span>
						<div class="input fl"><input id="remark" type="text" placeholder="请填写您对本次订单或商品有特殊的要求" /></div>
					</div>
				</div>
				<!-- 点击跳转到协议页面 -->
				<div class="order-xy toggle active">同意 <a href="<?php  echo  mobileUrl('shop/agreement'); ?>">《基因启示录知情同意书》</a></div>
			</div>
			<div class="detail-footer clearfix">
				<div class="wrap fr fv">
					<section>
						<p>合计：<span class="price">￥<span class="goodsprice">666.00</span></span>
						</p>
					</section>
					<section><input type="button" id="sum-btn" class="button" value="提交订单" /></section>
				</div>
			</div>
		</div>
		<div id="page2" class="page hide">
			<div class="content content2">
				<div class="bill-top">
					<h1>发票类型</h1>
					<a href="javascript:;" id="no-bill" class="item sb block" fid='sd1'>不开发票</a>
					<a href="javascript:;" id="bill-item" class="item active sb block" fid="sd2">增值税普通发票</a>
				</div>
				<div class="bill-content">
					<div class="item">
						<h2>发票内容</h2>
						<div class="singe active">基因检测服务费</div>
					</div>
					<div class="item">
						<h2>发票信息</h2>
						<input  id="receipttype" name="receipttype" type="hidden"   value="0" />
						<a href="javascript:;" id="person" class="info active fl sb block">个人</a>
						<a href="javascript:;" id="company" class="info fl sb block">单位</a>
					</div>
					<div id="company-content" class="hide" style="clear: both;">
						<div class="input-wrap">
							<div class="input"><input type="text" id="receiptname" placeholder="请填写单位名称" /></div>
						</div>
						<div class="input-wrap">
							<div class="input"><input type="text" id="receiptcode" placeholder="请填写纳税人识别码" /></div>
						</div>
					</div>
					<div class="bill-b-tips">
						温馨提示：自2017年7月1日起，购买方为企业的，索取增值税普通发票，购买方为企业的，索取增值税普通发票购买方为企业的，索取增值税普通发票购买方为企业的，索取增值税普通发票。索取增值税普通发票。索取增值税普通发票。索取增值税普通发票。索取增值税普通发票。
					</div>
				</div>
			</div>
			<a href="javascript:;" id="agree-btn" class="btn btn-primary" style="border-radius: 0;">确定</a>
		</div>
		
		<script src="../addons/ewei_shopv2/static/jiyin/js/leftmenu.js"></script>
		<script src="../addons/ewei_shopv2/static/jiyin/js/mui.min.js"></script>
		<script src="../addons/ewei_shopv2/static/jiyin/js/mui.picker.min.js"></script>
		<script src="../addons/ewei_shopv2/static/jiyin/js/city.data-3.js"></script>
		<script type="text/javascript">
			
			var allgoodsinfo;
			var areacode;
			require(['core', 'tpl'], function (core, tpl) {
				//默认获取
				getorderinfo();
				
	          	var cityPicker3 = new mui.PopPicker({
	            	layer: 3
	         	});
	         	cityPicker3.setData(cityData3);
	         	var showCityPickerButton = document.getElementById('realaddress');
	          	showCityPickerButton.addEventListener('tap', function(event) {
	          		var _this = this;
	           		cityPicker3.show(function(items) {
	           			var item2 = typeof items[2].text === 'undefined'?'':items[2].text;
	           			var len = items.length;
	           			var valueStr = typeof items[len-1].value === 'undefined'?items[len-2].value:items[len-1].value;
	           			var str = items[0].text+items[1].text+item2;
	           			
	           			console.log(valueStr);
	           			areacode=valueStr;
	           			_this.value = str;
	           		});
	          	}, false);
				
				//1.获取需要的支付的订单集合,多的超乎你的想象
				function getorderinfo(){
					Tools.showIndicator();
						
						var disid=$('#mailsend').attr('disid');//选作的快递
						var code =$('#promocode').val();
						
						core.json('order/create', {disid:disid,code:code}, function(json) {
							allgoodsinfo=json.result.list[0].goods;
							console.log(json);
					        if(json.result.list.length>0){
					        	//让商品循环
					        	$('#car-list').html(tpl('tpl_goods_list', json.result));
					        	//让配送地址循环
					        	$('#dislist').html(tpl('tpl_dis_list', json.result));					        	
					        	//设置默认的配送地址
					        	if(disid==''){
					        		$('#mailsend').text(json.result.dispatchres[0].dispatchname).attr('disid',json.result.dispatchres[0].id);	
					        	}

					        	//更新商品价格
					        	$('.goodsprice').text(json.result.goodsprice);	
					        }
					        else{
					        	Tools.toast('购物车没有商品');
					        	setTimeout(function(){var url="<?php  echo  mobileUrl(''); ?>";window.location.href=url; },1000);
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
					
					//4.提交订单
					$('#sum-btn').click(function(){
						var bool = Tools.validForm('#consigee', Tools.TOP_SHOW_MODE);
						
						
						if (!bool) {
							//验证通过
							return;
						}
						
						
						//获取所有必要的参数
						//1.所有商品id
						var allgoodsid=[];
						
						console.log(allgoodsinfo);
						
						for (var i=0;i<allgoodsinfo.length;i++) {
							
							var array = {
								cates:allgoodsinfo[i].cates,
								goodsid:allgoodsinfo[i].goodsid,
								marketprice:allgoodsinfo[i].marketprice,
								total:allgoodsinfo[i].total
							}

							
							console.log(allgoodsinfo[i]);
							
							allgoodsid.push(array);
							
							
						}
						console.log(allgoodsid);


						//2.收货信息
						var realname=$('#realname').val();
						var realmobile=$('#realmobile').val();
						var realaddress=$('#realaddress').val()+$('#addressdetail').val();
						
						console.log(realname,realmobile,realaddress);
						
						//3.配送方式
						var disid=$("#mailsend").attr('disid');
						
						console.log('disid'+disid);
						
						//4.优惠码
						var promocode=$("#promocode").val();
						console.log(promocode);
						
						
						//5.发票信息
						fpstatus=$("#bill").attr('fpstatus');	
						
						
						console.log($('#receipttype').val());
						
						//6.首单优惠
						favourable=$('#favourable').val();
						

						if(fpstatus!='0'){
							var receipttype=$('#receipttype').val();//个人或企业
							var receiptname=$('#receiptname').val();//企业名称	
							var receiptcode=$('#receiptcode').val();//纳税人识别码								
						}

						//6.留言信息
						var remark=$('#remark').val();
						var data={
							orderid:0,
							addressid:0,
							areacode:areacode,
							goods:allgoodsid,
							realname:realname,
							realmobile:realmobile,
							realaddress:realaddress,							
							disid:disid,
							fpstatus:fpstatus,
							receipttype:receipttype,
							receiptname:receiptname,
							receiptcode:receiptcode,
							code:$('#promocode').val(),
							remark:remark,
							favourable:favourable
						};
						
						
						console.log(data);
							
						//return;

						//正式提交
						core.json('order/create/submit', data, function(ret) {
							console.log(ret);

							if (ret.status == 0) {
								Tools.toast(ret.result.message);
								return
							}
							if (ret.status == -1) {
								Tools.toast(ret.result.message);
								return
							}
							
							location.href = core.getUrl('order/pay', {
								id: ret.result.orderid
							})

						}, false, true);						
						
						
						
					});
					

					
					
					
					
				
				//中美国界线.************************************************************
				
				const MAX = 9999;
				var b_coupon = false;
				
				$('.toggle').click(function() {
					var _this = $(this);
					if (_this.hasClass('active')) {
						_this.removeClass('active');
						$('#sum-btn').attr('disabled', 'true');
					}else {
						_this.addClass('active');
						$('#sum-btn').removeAttr('disabled');
					}
				})
				
				Tools.selItems('.sb', Tools.ACTIVE_MODE, function(_this) {
					
					
					if(_this.getAttribute('fid')=='sd1'){
						$('#bill').text(_this.innerText).attr('fpstatus',0);
						hidePage();
					}
					else if(_this.getAttribute('fid')=='sd2'){
						$('#bill').text(_this.innerText).attr('fpstatus',1);
						$('.bill-content').show();
					}
					else{
						$('.bill-content').show();
					}

					if (_this.id === 'company') $('#company-content').show();else if(_this.id === 'person') $('#company-content').hide();
				})
				
				//优惠券切换
				$('#coupon-sel').click(function () {
					var _this = this;
					$('#coupon-form').toggle(0, function() {
						if (this.style.display === 'none') showCoupon(_this);
						else hideCoupon(_this);
					});
				})
				
				//优惠券确定按钮点击
				$('#coupon-form .btn').click(function() {
					var input = $(this).prev();
					var sel = document.getElementById('coupon-sel');
					if (input.val() === '') {
						Tools.toast('请输入优惠码');
						return;
					}
					var code=$('#promocode').val();						
					core.json('order/create/checkcode', {code:code}, function(ret) {
						console.log(ret);
						if(ret.status==1){
							$('#iscode').val(1);
							$('#coupon-form').hide();
							showCoupon(sel);
							$('#coupon-sel').find('.right').html('已使用优惠码 '+input.val());
							//重新计算价格
							getorderinfo()							
						}
						else{
							Tools.toast('优惠码不存在或不可用!');
							$('#iscode').val(0);							
							return;
						}
					}, false, true);					
					
					
					
					
					

				});
				
				//开发票
				$('#bill').click(showPage);
				
				$('#agree-btn').click(function() {
					//获取发票信息
					if($('#bill-item').hasClass('active')){
						$('#bill').attr('fpstatus',1);								
					}					
					var company = $('#company');
					var isPass = true;
					if (company.hasClass('active')) {
						$('#company-content').find('input').each(function() {
							if (this.value === '') { isPass=false; Tools.toast('请填写所有的必填项'); return false; }
						});
					}
					if (isPass){
						hidePage();
						$('#bill').html($('#bill-item').text());
					}
				});
				
				//协议防止事件冒泡
				$('.order-xy a').click(function (e) {e.stopPropagation();})
				
				//配送方式点击条目
				$('#mask2').delegate('li', 'click', function() {
					$('#mailsend').html(this.innerHTML).attr('disid',this.getAttribute('disid'));
					
					$('#mask2').hide();
					
					//重新计算价格
					getorderinfo();
					
				});
				
				$('#car-list').delegate('.add', 'click', function() {
					var _this = $(this);
					var prev = _this.prev();
					var val = parseInt(prev.val());
					val++;
					val = Math.min(MAX, val);
					//必须后端保存成功才更新
					cartid=_this.parent().attr('id');
				    upstatus=updatecart(cartid,val);
					if(upstatus==true){
						//prev.val(val);
						 getorderinfo();
					}					

				});
				$('#car-list').delegate('.minus', 'click', function() {
					var _this = $(this);
					var next = _this.next();
					var val = parseInt(next.val());
					val--;
					val = Math.max(1, val);
					//必须后端保存成功才更新
					cartid=_this.parent().attr('id');
				    upstatus=updatecart(cartid,val);
					if(upstatus==true){
						//next.val(val);
						getorderinfo();
					}						

				});
				$('#car-list').delegate('.input', 'blur', function() {
					var _this = $(this);
					var val = _this.val();
					var __this = _this.next()[0];
					if(val > MAX || val < 1) {
						reset(this);
						Tools.toast('亲~商品数量必须在1~' + MAX + '之间');
					}
				});


				
				function showCoupon(_this) {
					_this.style.borderBottom = '1px solid #c3c3c3';
					_this.style.backgroundImage = 'url(../addons/ewei_shopv2/static/jiyin/img/right_arrow.png)';
				}
				
				function hideCoupon(_this) {
					_this.style.borderBottom = 'none';
					_this.style.backgroundImage = 'url(../addons/ewei_shopv2/static/jiyin/img/bottom_arrow.png)';
				}
				
				function reset(_this) {
					_this.value = 1;
				}
				function showPage() {
					$('#page2').show()
					setTimeout(function() {						
						$('#page2').css('transform', 'translate3d(0, 0, 0)');
					}, 50)
				}
				function hidePage() {
					$('#page2').css('transform', 'translate3d(100%, 0, 0)');
					setTimeout(function() {
						$('#bill-item').addClass('active').siblings().removeClass('active');
						$('#page2').hide();
					},300)
				}
			});
			

			

		</script>
	</body>
</html>