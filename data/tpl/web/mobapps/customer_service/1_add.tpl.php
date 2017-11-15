<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ul class="nav nav-tabs">
	<li>
		<a href="<?php  echo $this->createWebUrl('index')?>">客服列表</a>
	</li>
    <li class="active">
    	<a href="<?php  echo $this->createWebUrl('add')?>">添加客服</a>
    </li>
    <li>
    	<a href="<?php  echo $this->createWebUrl('commit')?>">客服评价</a>
    </li>
    <li>
    	<a href="<?php  echo $this->createWebUrl('order')?>">客服排序</a>
    </li>
</ul>
<div class="clearfix">
	<form action="" method='post' class="form-horizontal" role="form">
		<div class="panel panel-default">
			<div class="panel-heading">添加客服</div>
			<div class="panel-body">
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">客服账号</label>
					<div class="col-sm-8 col-lg-9 col-xs-12">
						<input type="text" class="form-control" name="kf_account" value="" placeholder="客服账号">
						<div class="help-block">请填写客服账号</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">客服昵称</label>
					<div class="col-sm-8 col-lg-9 col-xs-12">
						<input type="text" class="form-control" name="nickname" value="" placeholder="客服昵称">
						<div class="help-block">请填写客服昵称</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">客服性别</label>
					<div class="col-sm-8 col-lg-9 col-xs-12">
						<label class="radio-inline"><input type="radio" name="sex" value="0" checked=""> 女</label>
						<label class="radio-inline"><input type="radio" name="sex" value="1"> 男</label>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">头像</label>
					<div class="col-sm-8 col-lg-9 col-xs-12">
						<div class="input-group ">
							<input type="text" name="thumb" value="" class="form-control" autocomplete="off">
							<span class="input-group-btn">
								<button class="btn btn-default" type="button" onclick="showImageDialog(this);">选择图片</button>
							</span>
						</div>
						<div class="input-group " style="margin-top:.5em;">
							<img src="./resource/images/nopic.jpg" onerror="this.src='./resource/images/nopic.jpg'; this.title='图片未找到.'" class="img-responsive img-thumbnail" width="150">
							<em class="close" style="position:absolute; top: 0px; right: -14px;" title="删除这张图片" onclick="deleteImage(this)">×</em>
						</div>					
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">第一个时间段</label>
					<div class="col-sm-8 col-lg-9 col-xs-12">
						<div class="col-sm-6 col-xs-6">
							<select class="form-control" name="start1" id="start1">
								<option value="-1">请选择每天开始接入时间</option>
								<option value="0">0时</option><option value="1">1时</option><option value="2">2时</option><option value="3">3时</option><option value="4">4时</option><option value="5">5时</option><option value="6">6时</option><option value="7">7时</option><option value="8">8时</option><option value="9">9时</option><option value="10">10时</option><option value="11">11时</option><option value="12">12时</option><option value="13">13时</option><option value="14">14时</option><option value="15">15时</option><option value="16">16时</option><option value="17">17时</option><option value="18">18时</option><option value="19">19时</option><option value="20">20时</option><option value="21">21时</option><option value="22">22时</option><option value="23">23时</option><option value="24">24时</option>				</select>
						</div>
						<div class="col-sm-6 col-xs-6">
							<select class="form-control" name="end1" id="end1">
								<option value="-1">请选择每天开始接入时间</option>
								<option value="0">0时</option><option value="1">1时</option><option value="2">2时</option><option value="3">3时</option><option value="4">4时</option><option value="5">5时</option><option value="6">6时</option><option value="7">7时</option><option value="8">8时</option><option value="9">9时</option><option value="10">10时</option><option value="11">11时</option><option value="12">12时</option><option value="13">13时</option><option value="14">14时</option><option value="15">15时</option><option value="16">16时</option><option value="17">17时</option><option value="18">18时</option><option value="19">19时</option><option value="20">20时</option><option value="21">21时</option><option value="22">22时</option><option value="23">23时</option><option value="24">24时</option>				</select>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">第二个时间段</label>
					<div class="col-sm-8 col-lg-9 col-xs-12">
						<div class="col-sm-6 col-xs-6">
							<select class="form-control" name="start2" id="start2">
								<option value="-1">请选择每天开始接入时间</option>
								<option value="0">0时</option><option value="1">1时</option><option value="2">2时</option><option value="3">3时</option><option value="4">4时</option><option value="5">5时</option><option value="6">6时</option><option value="7">7时</option><option value="8">8时</option><option value="9">9时</option><option value="10">10时</option><option value="11">11时</option><option value="12">12时</option><option value="13">13时</option><option value="14">14时</option><option value="15">15时</option><option value="16">16时</option><option value="17">17时</option><option value="18">18时</option><option value="19">19时</option><option value="20">20时</option><option value="21">21时</option><option value="22">22时</option><option value="23">23时</option><option value="24">24时</option>				</select>
						</div>
						<div class="col-sm-6 col-xs-6">
							<select class="form-control" name="end2" id="end2">
								<option value="-1">请选择每天开始接入时间</option>
								<option value="0">0时</option><option value="1">1时</option><option value="2">2时</option><option value="3">3时</option><option value="4">4时</option><option value="5">5时</option><option value="6">6时</option><option value="7">7时</option><option value="8">8时</option><option value="9">9时</option><option value="10">10时</option><option value="11">11时</option><option value="12">12时</option><option value="13">13时</option><option value="14">14时</option><option value="15">15时</option><option value="16">16时</option><option value="17">17时</option><option value="18">18时</option><option value="19">19时</option><option value="20">20时</option><option value="21">21时</option><option value="22">22时</option><option value="23">23时</option><option value="24">24时</option>				</select>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
					<div class="col-sm-8 col-xs-12">
						<div class="help-block">请选择每天接入时间段。您最多可以设置两个时间段,只有在这两个时间段的用户消息会转到多客服里。</div>
						<strong class="text-danger">如果您只有一个时间段,请将第二个时间段留空。</strong>
					</div>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-8 col-lg-9 col-xs-12">
				<input type="submit" class="btn btn-primary" name="submit" value="提交">
				<input type="hidden" name="token" value="<?php  echo $_W['token']?>">
			</div>
		</div>
	</form>
</div>
<script type="text/javascript">
	function showImageDialog(elm, opts, options) {
		require(["util"], function(util){
			var btn = $(elm);
			var ipt = btn.parent().prev();
			var val = ipt.val();
			var img = ipt.parent().next().children();
			options = {'dest_dir':'articles','global':false,'class_extra':'','direct':true,'multiple':false};
			util.image(val, function(url){
				if(url.url){
					if(img.length > 0){
						img.get(0).src = url.url;
					}
					ipt.val(url.attachment);
					ipt.attr("filename",url.filename);
					ipt.attr("url",url.url);
				}
				if(url.media_id){
					if(img.length > 0){
						img.get(0).src = "";
					}
					ipt.val(url.media_id);
				}
			}, null, options);
		});
	}
	function deleteImage(elm){
		require(["jquery"], function($){
			$(elm).prev().attr("src", "./resource/images/nopic.jpg");
			$(elm).parent().prev().find("input").val("");
		});
	}
	$(function(){
		$("input[name='submit']").bind('click',function(){
			var start1 = parseInt($('#start1').val());
			var end1 = parseInt($('#end1').val());
			var start2 = parseInt($('#start2').val());
			var end2 = parseInt($('#end2').val());

			if(start1 == '-1' && end1 == '-1' && start2 == '-1' && end2 == '-1') {
				alert('请选择有效的时间段');
				return false;
			}
			if(start1 > end1) {
				alert('第一个时间段的开始接入时间大于结束时间');
				return false;
			}
			if(start2 != '-1' && (end1 > start2)) {
				alert('第一个时间段的结束日期大于第二个时间段的开始时间');
				return false;
			}
			if(start2 != '-1' &&  (start2 > end2)) {
				alert('第二个时间段的开始接入时间大于结束时间');
				return false;
			}
		})
	})
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>