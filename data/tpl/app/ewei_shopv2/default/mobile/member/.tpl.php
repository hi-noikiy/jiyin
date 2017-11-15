<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
			<div class="content">
				<div class="home-top">
					<div class="info">
						<div class="head">
							<img src="<?php  echo $member['avatar'];?>">
						</div>
						<p class="name fhv"><?php  echo $member['nickname'];?><img style="width: 0.34rem; margin-left: 5px;" src="../addons/ewei_shopv2/static/jiyin/img/<?php  if($member['sex']==2) { ?>woman_icon<?php  } else { ?>man<?php  } ?>.png"/></p>
						<div class="number-wrap">
							<p class="number fhv"><img src="../addons/ewei_shopv2/static/jiyin/img/home_mobile.png"/><?php  echo $member['mobile'];?></p>
						</div>
					</div>
				</div>
				<div class="home-items">
					<section class="item">
						<div class="title">
							<p>商城订单</p>
							<p>
								<a href="<?php  echo mobileUrl('order')?>" style="color: #eb569a">查看全部订单<img src="../addons/ewei_shopv2/static/jiyin/img/right_arrow.png" alt="" /></a>
							</p>
						</div>
						<ul class="wrap wrap1">
							<li>
								<a href="<?php  echo mobileUrl('order',array('status'=>0))?>">
									<div class="img">
										<img src="../addons/ewei_shopv2/static/jiyin/img/daifukuan.png" alt="">
									</div>
									<p>待付款</p>
								</a>
							</li>
							<li>
								<a href="<?php  echo mobileUrl('order',array('status'=>1))?>">
									<div class="img">
										<img src="../addons/ewei_shopv2/static/jiyin/img/daifahuo.png" alt="">
									</div>
									<p>待发货</p>
								</a>
							</li>
							<li>
								<a href="<?php  echo mobileUrl('order',array('status'=>2))?>">
									<div class="img">
										<img src="../addons/ewei_shopv2/static/jiyin/img/daishouhuo.png" alt="">
									</div>
									<p>待收货</p>
								</a>
							</li>
							<li>
								<a href="<?php  echo mobileUrl('order',array('status'=>4))?>">
									<div class="img">
										<img src="../addons/ewei_shopv2/static/jiyin/img/yishouhuo.png" alt="">
				
									</div>
									<p>已收货</p>
								</a>
							</li>
							<li>
								<a href="#">
									<div class="img">
										<img src="../addons/ewei_shopv2/static/jiyin/img/tuikuan.png" alt="">
				
									</div>
									<p>退款</p>
								</a>
							</li>
						</ul>
					</section>
				</div>
				<div class="home-links">
					<a href="#" class="link fv" style="display: none;"><img class="left" src="../addons/ewei_shopv2/static/jiyin/img/wdshdz.png" />
						<div class="border">收货地址管理<img class="right" src="../addons/ewei_shopv2/static/jiyin/img/right_arrow.png" alt="" /></div>
					</a>
					<a href="<?php  echo mobileUrl('member/cart');?>" class="link fv"><img class="left" src="../addons/ewei_shopv2/static/jiyin/img/wdgwc.png" />
						<div class="border">我的购物车<img class="right" src="../addons/ewei_shopv2/static/jiyin/img/right_arrow.png" alt="" /></div>
					</a>
					<a href="<?php  echo mobileUrl('member/vipdesc');?>" class="link fv"><img class="left" src="../addons/ewei_shopv2/static/jiyin/img/hyxz.png" />
						<div class="border">会员须知<img class="right" src="../addons/ewei_shopv2/static/jiyin/img/right_arrow.png" alt="" /></div>
					</a>
					<a href="tel:<?php  echo $shopset['phone'];?>" class="link fv"><img class="left" src="../addons/ewei_shopv2/static/jiyin/img/lxwm.png" />
						<div class="border">联系我们<img class="right" src="../addons/ewei_shopv2/static/jiyin/img/right_arrow.png" alt="" /></div>
					</a>
					<a href="http://jiyin.baimuv.com/app/index.php?i=1&c=entry&do=index&m=customer_service" class="link fv"><img class="left" src="../addons/ewei_shopv2/static/jiyin/img/wxkf.png" />
						<div class="border">微信客服<img class="right" src="../addons/ewei_shopv2/static/jiyin/img/right_arrow.png" alt="" /></div>
					</a>
					<a href="<?php  echo mobileUrl('member/info')?>" class="link fv"><img class="left" src="../addons/ewei_shopv2/static/jiyin/img/bjxx.png" />
						<div class="border">编辑信息<img class="right" src="../addons/ewei_shopv2/static/jiyin/img/right_arrow.png" alt="" /></div>
					</a>
					<a href="<?php  echo mobileUrl('member/qrcode')?>" class="link fv"><img class="left" src="../addons/ewei_shopv2/static/jiyin/img/wdewm.png" />
						<div class="border">我的二维码<img class="right" src="../addons/ewei_shopv2/static/jiyin/img/right_arrow.png" alt="" /></div>
					</a>
					<a href="<?php  echo mobileUrl('member/mycustomer')?>" class="link fv"><img class="left" src="../addons/ewei_shopv2/static/jiyin/img/wdtd.png" />
						<div class="border">我的团队<img class="right" src="../addons/ewei_shopv2/static/jiyin/img/right_arrow.png" alt="" /></div>
					</a>
					<a style="display: none;" href="<?php  echo mobileUrl('member/generalize')?>" class="link fv"><img class="left" src="../addons/ewei_shopv2/static/jiyin/img/xgdz.png" />
						<div class="border">修改地址<img class="right" src="../addons/ewei_shopv2/static/jiyin/img/right_arrow.png" alt="" /></div>
					</a>
					
					
					
				</div>
			</div>
		</div>
		<script src="../addons/ewei_shopv2/static/jiyin/js/leftmenu.js"></script>
	</body>

</html>