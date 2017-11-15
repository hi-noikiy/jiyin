<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ul class="nav nav-tabs">
	<li class="active">
		<a href="<?php  echo $this->createWebUrl('index')?>">客服列表</a>
	</li>
	<?php  if($_W['role'] != 'operator') { ?>
    <li>
    	<a href="<?php  echo $this->createWebUrl('add')?>">添加客服</a>
    </li>
    <li>
    	<a href="<?php  echo $this->createWebUrl('commit')?>">客服评价</a>
    </li>
    <li>
    	<a href="<?php  echo $this->createWebUrl('order')?>">客服排序</a>
    </li>
    <?php  } ?>
</ul>
<div class="main">

	<div class="panel panel-default">
		<div class="panel-body table-responsive">
			<form action="<?php  echo $this->createWebUrl('del')?>" method="post">
				<table class="table table-hover">
					<thead>
						<tr>
							<th style="width:5%;">选择</th>
							<th style="width:5%;">排序</th>
							<th style="width:5%;">客服编号</th>
							<th style="width:10%;">客服昵称</th>
							<th style="width:15%;">客服账户</th>
							<th style="width:5%;">性别</th>
							<th style="width:5%;">服务次数</th>
							<th style="width:10%;">微信号</th>
							<th style="width:10%;">邀请微信号</th>
							<th style="width:15%;">邀请过期时间</th>
							<th style="width:5%;">状态</th>
							<th style="width:10%;">操作</th>
						</tr>
					</thead>
					<tbody>
					<?php  if($kf_list) { ?>
					<?php  if(is_array($kf_list)) { foreach($kf_list as $row) { ?>
						<tr>
							<td>
								<input type="checkbox" name="selected[]" value="<?php  echo $row['kf_account'];?>">
							</td>
							<td><?php  echo $row['displayorder'];?></td>
							<td><?php  echo $row['kf_id'];?></td>
							<td><?php  echo $row['kf_nick'];?></td>
							<td><?php  echo $row['kf_account'];?></td>
							<td><?php  if($row['sex'] == 0) { ?>女<?php  } else { ?>男<?php  } ?></td>
							<td><?php  echo $row['total'];?></td>
							<td><?php  echo $row['kf_wx'];?></td>
							<td><?php  echo $row['invite_wx'];?></td>
							<td>
								<?php  if($row['invite_expire_time'] != 0) { ?>
									<?php  echo date('Y-m-d H:i:s', $row['invite_expire_time'])?>
								<?php  } ?>
							</td>
							<td><?php  echo $row['invite_status'];?></td>
							<td>
								<?php  if($row['invite_status'] != 'waiting') { ?>
									<?php  if($row['kf_wx'] == "") { ?>
										<?php  if($row['invite_wx'] != "") { ?>
											<a href="<?php  echo $this->createWebUrl('invite',['kf_account'=>$row['kf_account']])?>">重新邀请</a>
											<?php  } else { ?>
											<a href="<?php  echo $this->createWebUrl('invite',['kf_account'=>$row['kf_account']])?>">邀请绑定</a>
										<?php  } ?>
										 | 
									<?php  } ?> 
								<?php  } ?> 
								<?php  if($_W['role'] != 'operator') { ?>
								<a href="<?php  echo $this->createWebUrl('upt',['kf_id'=>$row['kf_id']])?>">编辑</a>&nbsp;&nbsp;&nbsp;&nbsp;
								<?php  } ?>
								<a  style="display: none;" href="<?php  echo $this->createWebUrl('record',['kf_account'=>$row['kf_account']])?>">查看聊天记录</a>
							</td>
						</tr>
					<?php  } } ?>
					<?php  } else { ?>
						<tr>
							<td colspan="9">没有任何数据</td>
						</tr>
					<?php  } ?>
					</tbody>
				</table>
				<?php  if($_W['role'] != 'operator') { ?>
				<table class="table table-hover">
                    <tbody>
                    	<tr>
	                        <td style="width:50px;">
	                        	<input type="checkbox" onclick="$('input[name*=\'selected\']').attr('checked', this.checked);">
	                        </td>
	                        <td colspan="4">        
	                            <input type="submit" onclick="return confirm('确定要删除客服吗？')" name="delete" value="删除" class="btn btn-primary">
	                            <input type="hidden" name="token" value="<?php  echo $_W['token']?>">
	                        </td>
	                    </tr>
                	</tbody>
            	</table>
            	<?php  } ?>
            	<?php  echo $pager;?>
			</form>
		</div>
		<?php  if($_W['role'] != 'operator') { ?>
		<div class="panel-footer">
			<a href="<?php  echo $this->createWebUrl('sync')?>" class="btn btn-primary">一键导入客服</a>
		</div>
		<?php  } ?>
	</div>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>