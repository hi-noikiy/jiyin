<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div class="panel panel-default">
	 <div class="panel-heading">
     	基础设置
     </div>
     <div class="panel-body">
		<form class="form-horizontal form" action="" method="post">
			<div class="form-group">
				<label class="col-xs-12 col-sm-3 col-md-2 control-label">客服同时接待人数</label>
				<div class="col-sm-9">
					<input type="text" name="kf_total_on" class="form-control" value="<?php  echo $setting['kf_total_on']?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
				<div class="col-sm-9">
					<input type="submit" value="提交" class="btn btn-primary">
					<input type="hidden" name="token" value="<?php  echo $_W['token'];?>">
				</div>
			</div>
		</form>
	</div>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>