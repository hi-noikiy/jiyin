<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>

<style type="text/css">
	input { appearance: none; -webkit-appearance: none; }
</style>
<div class='fui-page  fui-page-current'>
    <div class="fui-header">
		<div class="fui-header-left">
			<a class="back" onclick='location.back()'></a>
		</div>
		<div class="title">用户注册</div>
		<div class="fui-header-right">&nbsp;</div>
	</div>

	<div class='fui-content' style='margin-top:5px;'>

		<style>.fui-cell-group .fui-cell .fui-cell-label {width: 4.5rem;}</style>

		<div class="fui-cell-group">
			<!--隐藏表单用于保存一级上级-->	
			<input type="hidden" name="uid" id="uid" value="<?php  echo $uid;?>" />
			<div class="fui-cell must">
				<div class="fui-cell-label">手机号</div>
				<div class="fui-cell-info"><input type="tel" class='fui-input' id='mobile' verify="phone" msg-empty="手机号码" msg="手机号格式有误" name='mobile' placeholder="请输入您的手机号"  value="<?php  echo $member['mobile'];?>" maxlength="11" /></div>
			</div>

			<?php  if(!empty($wapset['smsimgcode'])) { ?>
				<div class="fui-cell must">
					<div class="fui-cell-label">图形验证码</div>
					<div class="fui-cell-info">
						<input type="tel" class='fui-input' id='verifycode2' verify msg-empty="图形验证码" name='verifycode2' placeholder="请输入图形验证码"  value="" maxlength="4" />
					</div>
					<div class="fui-cell-remark noremark">
						<img src="../web/index.php?c=utility&a=code&r=<?php  echo time()?>" style="width: 3.5rem; height: 1.5rem; vertical-align: middle;" id="btnCode2">
					</div>
				</div>
			<?php  } ?>

			<div class="fui-cell must">
				<div class="fui-cell-label">验证码</div>
				<div class="fui-cell-info"><input type="tel" verify msg-empty="验证码" class='fui-input' id='verifycode' name='verifycode' placeholder="短信验证码"  value="" maxlength="10" /></div>
				<div class="fui-cell-remark noremark"><input type="button" class="btn btn-default btn-default-o btn-sm" id="btnCode" value="获取验证码" /></div>
			</div>
			<div class="fui-cell must">
				<div class="fui-cell-label">登录密码</div>
				<div class="fui-cell-info"><input type="password" verify msg-empty="登录密码" class='fui-input' id='pwd' name='pwd' placeholder="请输入您的登录密码"  value="" /></div>
			</div>
			<div class="fui-cell must">
				<div class="fui-cell-label">确认密码</div>
				<div class="fui-cell-info"><input type="password" verify msg-empty="确认密码" class='fui-input' id='pwd1' name='pwd1' placeholder="请输入确认登录密码"  value="" /></div>
			</div>

		</div>

		<a href='#' id='btnSubmit' class='btn btn-success block'>马上注册</a>
		<a href='<?php  echo  mobileUrl('member/login'); ?>'  class='btn btn-success block' style="margin-top: 20px;background-color: #ffffff;color: green;" >立即登陆</a>		
	</div>
	<script src="../addons/ewei_shopv2/static/jiyin/js/tools.js"></script>
	<script type="text/javascript">
		require(['core', 'tpl'], function (core, tpl) {
			//点击了登陆按钮
			$('#btnSubmit').click(function(){
				var b = Tools.validForm('body', Tools.TOAST_MODE);
				var b1 = (function() { return $('#pwd').val() === $('#pwd1').val()})();
				if (b) {
					if (!b1) { Tools.toast('两次输入的密码不一致'); return false; }
					mobile=$('#mobile').val();
					pwd=$('#pwd').val();
					code=$('#verifycode').val();
					uid=$('#uid').val();
					console.log(mobile+'-'+pwd+'--'+code);
					data={
						mobile:mobile,
						pwd:pwd,
						code:code,
						uid:uid
					};
					
					core.json('member/bind', data, function(ret) {
						
						console.log(ret);
						if(ret.status==1){
							Tools.toast('注册成功!');
							//return;
							setTimeout(function(){var url='<?php  echo  mobileUrl(''); ?>';window.location.href=url;},1000);
						}
						else{
							Tools.toast(ret.result.message);						
						}
					}, false, true);
					
					
				}				
			});	
			
			Tools.sendSms('#btnCode', {
				cookiename: 'time',
				color: '#fff',
				time: 60,
				number: '#mobile',
				ajax: function(obj) {
					//发送验证码需要执行的操作
					var mobile=$('#mobile').val();
					core.json('member/bind/smscode', {mobile:mobile}, function(ret) {
						
						console.log(ret);
						
					}, false, true);					
					
				} 
			});
		});
		
		

		
	</script>

</div>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>

