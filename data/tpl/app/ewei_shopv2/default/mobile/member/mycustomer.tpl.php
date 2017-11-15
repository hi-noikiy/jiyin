<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>我的团队</title>
    <script src="../addons/ewei_shopv2/static/jiyin/js/setFontsize.js"></script>
	<style type="text/css">
		* {margin: 0;padding: 0;}
		html, body {height: 100%;font-size: 0.28rem;}
		.fl {float: left;}
		.fr {float: right;}
		.ewm_img {position: absolute; bottom: 20%; right: 5%; overflow: hidden; height: 4.03rem;}
		.ewm_img .show {width: 3.7rem;}
		.emw { position: absolute; width: 1.73rem; height: 1.73rem; left: 0.88rem; bottom: 0.56rem; }
		.user { display: flex; display: -webkit-flex; align-items: center; -webkit-align-items: center; position: absolute; top: 40%; left: 5%; font-size: 0.28rem; color: #3f3d3a; }
		.user img {width: 0.96rem; height: 0.96rem;}
		.text {line-height: 0.4rem;padding-left: 0.2rem;}
		.cus_title { position: fixed; top: 0; width: 100%; background-color: #fff; box-sizing: border-box; padding: 0 0.2rem; line-height: 0.9rem; overflow: hidden; border-bottom: 1px solid #eee;}
		.cus_list {padding-top: 0.9rem; padding-bottom: 0.5rem;}
		.cus_list li { line-height: 0; }
		.cus_list li a { display: flex; display: -webkit-flex; align-items: center; -webkit-align-items: center; padding: 0.25rem 0.2rem; overflow: hidden; border-bottom: 1px solid #eee; color: #333; text-decoration: none; }
		.cus_list li img {width: 0.92rem;height: 0.92rem;}
		.cus_list li img.eye {
			width: 0.4rem; height: auto; margin-left: 0.2rem; vertical-align: middle;
		}
	</style>
</head>
<body>
	<script type="text/javascript" src="../addons/ewei_shopv2/static/jiyin/js/jquery-1.12.4.min.js"></script>
	<script src="../addons/ewei_shopv2/static/jiyin/js/tools.js"></script>
	<script src='//res.wx.qq.com/open/js/jweixin-1.1.0.js'></script>
	<script language="javascript" src="../addons/ewei_shopv2/static/jiyin/js/require.js"></script>
	<script language="javascript" src="../addons/ewei_shopv2/static/jiyin/js/app/config.js?v=3"></script>
	<script>
		require(['core'],function(modal){modal.init({siteUrl: "<?php  echo $_W['siteroot'];?>",baseUrl: "<?php  echo mobileUrl('ROUTES')?>"})});
	</script>	

	<div class="cus_title">
		<p class="fl"><?php  echo $member['nickname'];?>的团队</p>
		<p class="fr" >共<span id="total">0</span>人</p>
	</div>
	
	
	
	<ul class="cus_list" id="showindex" >
		
		<script id='tpl_indexnew_list' type='text/html'>
				<%each list as g%>
				<li>
					<a  onclick=<?php  if($oneres['groupid']==13 ) { ?>'window.location.href="<?php  echo mobileUrl('member/mycustomer');?>&id=<%g.id%>"'<?php  } ?>  >
						<img class="fl" src="<%g.avatar%>"/>
						<div class="text">
							
							<p>层级:
							<%if g.thislevel==1 %>
							一级
							<%else%> 
							二级  
							<%/if%> 
							&nbsp;  手机号:<span   <?php  if($myinfo['groupid']!=13) { ?>   style="display: none" <?php  } ?>  ><%g.mobile%></span>     <?php  if($myinfo['groupid']!=13) { ?>     <img class="eye" src="../addons/ewei_shopv2/static/jiyin/img/eye_off.png" />   <?php  } ?></p>
							
							
							
							
							<p class="sub">加入时间：<%g.createtime%></p>
						</div>
					</a>
				</li>	
				
				<%/each%>
		</script>
		
	</ul>
	
	

	
	
	

    <script language="javascript">
	    var page = 1;
	    var loaded = false;
	    var stop = true;
	    var scrolling = false;
    	require(['core', 'tpl'], function (core, tpl) {

		  //创建一个获取list的方法
		  function getlist(){
			
			
			Tools.showIndicator();
			var url=window.location.href;
	        core.json(url, {page:page}, function(json) {
	          	console.log(json);
	          	if (json.result.list.length > 0) {
	          	
	          		console.log(json.result.total);
	          		$('#total').text(json.result.total);
	          		if(page>1){
	          	      $('#showindex').append(tpl('tpl_indexnew_list', json.result));	          			
	          		}
	          		else{
	          	      $('#showindex').append(tpl('tpl_indexnew_list', json.result));	          			
	          		}
	          		$('.eye').click(function (e) {
	          			e.stopPropagation();eyeClick(this);
	          		});

					loaded=false;
	          } else{
		          	//没有数据,并且page是1,清空数据
		          	if(page==1){
						$('#showindex').html('');	          		
		          	}
					//core.tip.show('没有更多数据');
		          	console.log('nothing  to do!');
		          	loaded=true;
	          }
			setTimeout(function() {Tools.hideIndicator();}, Tools.IN_HIDE_TIME);
	    });
	}
		
	//默认加载list
	getlist();
	
	//下拉加载
	var winHeight = $(window).height();
	$(window).scroll(function() {
	var scrollHeight = $(document).height();
		if ($(this).scrollTop() + winHeight >= scrollHeight) {
			console.log('到底了');
			page++;
			Tools.showIndicator();
			getlist();
			loaded=true;
		}
	});
	
});

function eyeClick(__this) {
	var _this = $(__this);
    if (_this.hasClass('eye_open')) {
    	_this.removeClass('eye_open');
    	__this.src = '../addons/ewei_shopv2/static/jiyin/img/eye_off.png';
    	_this.prev().hide();
    }else {
    	_this.addClass('eye_open');
    	__this.src = '../addons/ewei_shopv2/static/jiyin/img/eye_on.png';
    	_this.prev().show();
   	}
}
   </script>
</body>
</html>