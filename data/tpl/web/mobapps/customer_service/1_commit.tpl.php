<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ul class="nav nav-tabs">
	<li>
		<a href="<?php  echo $this->createWebUrl('index')?>">客服列表</a>
	</li>
    <li>
    	<a href="<?php  echo $this->createWebUrl('add')?>">添加客服</a>
    </li>
    <li class="active">
    	<a href="<?php  echo $this->createWebUrl('commit')?>">客服评价</a>
    </li>
    <li>
    	<a href="<?php  echo $this->createWebUrl('order')?>">客服排序</a>
    </li>
</ul>
<div class="panel panel-default">
	<div class="panel-heading">
		搜索
	</div>
	<div class="panel-body table-responsive">
		<form action="" method="get" class="form-horizontal" role="form">
			<input type="hidden" name='m' value="customer_service">
			<input type="hidden" name="c" value="site">
			<input type="hidden" name="a" value="entry">
			<input type="hidden" name="do" value="commit">
			<div class="form-group">
				<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">客服账号</label>
				<div class="col-sm-8 col-lg-3 col-xs-12">
					<input type="text" name="kf_account" class="form-control" value="<?php  echo $kf_account;?>">
				</div>
				<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">微信昵称</label>
				<div class="col-sm-8 col-lg-3 col-xs-12">
					<input type="text" name="nickname" class="form-control" value="<?php  echo $nickname;?>">
				</div>
				<!-- <div class="pull-left col-xs-12 col-sm-2 col-lg-2">
					<button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>
				</div> -->
			</div>
			<div class="form-group">
                <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">评论时间</label>
                <div class="col-sm-9 col-md-8 col-lg-8 col-xs-12">
                    <?php  echo tpl_form_field_daterange('createtime', array('starttime'=>date('Y-m-d', $createtime['start']),'endtime'=>date('Y-m-d', $createtime['end'])));?>
                </div>
                <div class="pull-left col-xs-12 col-sm-3 col-lg-2">
                    <button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>
                    <input type="hidden" name="token" value="<?php  echo $_W['token'];?>"/>
                    <input class="btn btn-primary" type="submit" name="export_submit" id="export_submit" value="导出">
                </div>
            </div>
		</form>
	</div>
	<div class="panel-heading">
		客服评价记录
	</div>
    <div class="panel-body table-responsive">
    	<form action="<?php  echo $this->createWebUrl('commit',['op'=>'delete'])?>" method='post'>
    	<table class="table table-hover">
            <thead class="navbar-inner">
            	<tr>
            		<th style="width:5%;">
            			<input type="checkbox" class="check_all" onclick="$('input[name*=\'selected\']').attr('checked', this.checked);">
            		</th>
            		<th style="width:20%;">客服账号</th>
            		<th style="width:20%;">微信昵称</th>
            		<th style="width:15;">会话创建时间</th>
            		<th style="width:15%;">评论时间</th>
            		<th style="width:5%;">评论等级</th>
            		<th style="width:20%;">评论内容</th>
            	</tr>
            </thead>
            <tbody>
        	<?php  if(is_array($list)) { foreach($list as $c) { ?>
	        	<tr>
	        		<td><input type="checkbox" name="selected[]" value="<?php  echo $c['session_id'];?>"></td>
	        		<td><?php  echo $c['kf_account'];?></td>
	        		<td><?php  echo $c['nickname'];?></td>
	        		<td><?php  echo date("Y-m-d H:i:s", $c['create_time'])?></td>
	        		<td><?php  echo date("Y-m-d H:i:s", $c['score_time'])?></td>
	        		<td><?php  echo $c['score'];?></td>
	        		<td><?php  echo $c['content'];?></td>
	        	</tr>
        	<?php  } } ?>
            </tbody>
            <tfoot>
	            <tr>
	                <td colspan="6">
						<input name="delete" type="submit" class="btn btn-primary" onclick="return confirm('确定要删除这些评论吗?')" value="批量删除">
	                    <input type="hidden" name="token" value="<?php  echo $_W['token'];?>">
	                </td>
	            </tr>
	            </tfoot>
        </table>
        <?php  echo $pager;?>
        </form>
    </div>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>