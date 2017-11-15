<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
 
<div class="page-heading"> <h2>代理商管理 <small>总数: <span class='text-danger'><?php  echo $total;?></span></small></h2> </div>
   <form action="./index.php" method="get" class="form-horizontal" role="form" id="form1">
            <input type="hidden" name="c" value="site" />
            <input type="hidden" name="a" value="entry" />
            <input type="hidden" name="m" value="ewei_shopv2" />
            <input type="hidden" name="do" value="web" />
            <input type="hidden" name="r" value="abonus.agent" />
            
<div class="page-toolbar row m-b-sm m-t-sm">
                            <div class="col-sm-4">
				 
			   <div class="input-group-btn">
			        <button class="btn btn-default btn-sm"  type="button" data-toggle='refresh'><i class='fa fa-refresh'></i></button>
				  <?php if(cv('abonus.agent.edit')) { ?>
                                  <div class="btn-group btn-group-sm">
                                <button data-toggle="dropdown" class="btn btn-default">黑名单 <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class='btn' data-toggle='batch' data-href="<?php  echo webUrl('abonus/agent/aagentblack',array('aagentblack'=>1))?>" data-confirm='确认要设置黑名单?'>设置黑名单</a></li>
                                    <li><a class='btn'  data-toggle='batch' data-href="<?php  echo webUrl('abonus/agent/aagentblack',array('aagentblack'=>0))?>" data-confirm='确认要取消黑名单?'>取消黑名单</a></li>
                                </ul>
                            </div>
                              
		                 <div class="btn-group btn-group-sm">
                                <button data-toggle="dropdown" class="btn btn-default">审核 <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class='btn'  data-toggle='batch' data-href="<?php  echo webUrl('abonus/agent/check',array('status'=>1))?>"  data-confirm='确认要审核通过?' disabled>审核通过</a></li>
                                    <li><a class='btn'  data-toggle='batch' data-href="<?php  echo webUrl('abonus/agent/check',array('status'=>0))?>" data-confirm='确认要取消审核?' disabled>取消审核</a></li>
                                </ul>
                            </div>
                                 
				   <?php  } ?>
				 
                                           
				<?php if(cv('abonus.agent.delete')) { ?>
			              <button class="btn btn-default btn-sm" type="button" data-toggle='batch-remove' data-confirm="确认要删除?" data-href="<?php  echo webUrl('abonus/agent/delete')?>"><i class='fa fa-trash'></i> 删除</button>
				 <?php  } ?>
			   </div> 
                               </div>	
 
			 
                            <div class="col-sm-7 pull-right">
			 	
			 <select name='aagentstatus' class='form-control  input-sm select-md' style="width:100px;"  >
                            <option value=''>状态</option>
                            <option value='0' <?php  if($_GPC['aagentstatus']=='0') { ?>selected<?php  } ?>>未审核</option>
                            <option value='1' <?php  if($_GPC['aagentstatus']=='1') { ?>selected<?php  } ?>>已审核</option>
                        </select>					 

                                <div class="input-group">
                                          <input type="text" class="form-control input-sm"  name="keyword" value="<?php  echo $_GPC['keyword'];?>" placeholder="区域代理昵称/姓名/手机号"/>
				 <span class="input-group-btn">
                                
                                        <button class="btn btn-sm btn-primary" type="submit"> 搜索</button>
										<button class="btn btn-sm btn-default" type="button" onclick="$('#moresearch').toggle()"> 其他 <i class="fa fa-angle-down"></i></button> 
                                                                                	    <?php if(cv('abonus.agent.export')) { ?>
                        <button type="submit" name="export" value="1" class="btn btn-success btn-sm">导出</button>
                        <?php  } ?>
				</span>
                                </div>
								
                            </div>
</div>
            
				<div class="page-toolbar row" <?php  if($_GPC['followed']=='' && $_GPC['level']=='' && $_GPC['groupid']=='' && $_GPC['isblack']=='' && $_GPC['time']['start']==''  && $_GPC['time']['end']=='' ) { ?>style='display:none;'<?php  } ?> id='moresearch' >
					
					
					<div class="col-sm-12">
					 
			 	  <select name='followed' class='form-control  input-sm select-md' style="width:140px">
								<option value=''>关注</option>
								<option value='0' <?php  if($_GPC['followed']=='0') { ?>selected<?php  } ?>>未关注</option>
								<option value='1' <?php  if($_GPC['followed']=='1') { ?>selected<?php  } ?>>已关注</option>
								<option value='2' <?php  if($_GPC['followed']=='2') { ?>selected<?php  } ?>>取消关注</option>
							</select>

                        <select name='aagenttype' class='form-control  input-sm select-md' style="width:140px;"  >
                            <option value=''>类型</option>
                            <option value='1' <?php  if($_GPC['aagenttype']==1) { ?>selected<?php  } ?>>省级代理</option>
                            <option value='2' <?php  if($_GPC['aagenttype']==2) { ?>selected<?php  } ?>>市级代理</option>
                            <option value='3' <?php  if($_GPC['aagenttype']==3) { ?>selected<?php  } ?>>区级代理</option>
                        </select>

	 
                      <select name='aagentlevel' class='form-control  input-sm select-md' style="width:140px;"  >
                            <option value=''>等级</option>
                            <?php  if(is_array($aagentlevels)) { foreach($aagentlevels as $level) { ?>
                            <option value='<?php  echo $level['id'];?>' <?php  if($_GPC['aagentlevel']==$level['id']) { ?>selected<?php  } ?>><?php  echo $level['levelname'];?></option>
                            <?php  } } ?>
                        </select>
		 
                     				
						 
                       <select name='aagentblack'  class='form-control  input-sm select-md'   style="width:140px;"  >
                        <option value=''>黑名单</option>
                        <option value='0' <?php  if($_GPC['aagentblack']=='0') { ?>selected<?php  } ?>>否</option>
                        <option value='1' <?php  if($_GPC['aagentblack']=='1') { ?>selected<?php  } ?>>是</option>
                    </select>
		 
				 
                        <?php  echo tpl_daterange('time', array('sm'=>true, 'placeholder'=>'成为区域代理时间'),true);?>
						 
 
  	
                 		
                            </div>
					
					
				</div>
  </form>
<?php  if(count($list)>0) { ?>
 
        <table class="table table-hover table-responsive">
            <thead class="navbar-inner" >
            <tr>
                 <th style="width:25px;"><input type='checkbox' /></th>
          
                <th style='width:100px;'>粉丝</th>
                <th style='width:110px;'>姓名<br/>手机号码</th>
                <th style='width:80px;'>等级</th>
                <th style='width:80px;'>累计分红</th>
                <th style='width:90px;'>注册时间</th>
                <th style='width:90px;'>审核时间</th>
                <th style='width:70px;'>状态</th>
                <th style='width:70px;'>关注</th>
                <th style='width:70px;'>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php  if(is_array($list)) { foreach($list as $row) { ?>
           <tr rel="pop" data-title="ID: <?php  echo $row['id'];?> " data-content="推荐人 <br/> <?php  if(empty($row['agentid'])) { ?>
				  <?php  if($row['isagent']==1) { ?>
				      <label class='label label-primary'>总店</label>
				      <?php  } else { ?>
				       <label class='label label-default'>暂无</label>
				      <?php  } ?>
				<?php  } else { ?>
				
                    	<?php  if(!empty($row['parentavatar'])) { ?>
                         <img src='<?php  echo $row['parentavatar'];?>' style='width:20px;height:20px;padding1px;border:1px solid #ccc' />
                       <?php  } ?>
                       [<?php  echo $row['agentid'];?>]<?php  if(empty($row['parentname'])) { ?>未更新<?php  } else { ?><?php  echo $row['parentname'];?><?php  } ?>
					   <?php  } ?>">
               
								<td>
									<input type='checkbox'   value="<?php  echo $row['id'];?>"/>
							</td>
               
                <td >
                    <?php  if($row['aagenttype']==1) { ?>
                    <span class="label label-primary">省级</span>
                    <?php  } else if($row['aagenttype']==2) { ?>
                    <span class="label label-success">市级</span>
                    <?php  } else if($row['aagenttype']==3) { ?>
                    <span class="label label-warning">区级</span>
                    <?php  } ?>
                    </span>
                    <br />
                    <span data-toggle='tooltip' title='<?php  echo $row['nickname'];?>'>
                    <?php  if(!empty($row['avatar'])) { ?>
                    <img src='<?php  echo $row['avatar'];?>' style='width:30px;height:30px;padding1px;border:1px solid #ccc' />
                    <?php  } ?>
                    <?php  if(empty($row['nickname'])) { ?>未更新<?php  } else { ?><?php  echo $row['nickname'];?><?php  } ?>


                </td>

                <td><?php  echo $row['realname'];?> <br/> <?php  echo $row['mobile'];?></td>
                <td><?php  if(empty($row['levelname'])) { ?> <?php echo empty($this->set['levelname'])?'普通等级':$this->set['levelname']?><?php  } else { ?><?php  echo $row['levelname'];?><?php  } ?></td>
             
                <td><?php  echo $row['bonus'];?></td>
                       <td><?php  echo date('Y-m-d',$row['createtime'])?><br/><?php  echo date('H:i',$row['createtime'])?></td>
                <td><?php  if(!empty($row['aagenttime'])) { ?>
                    <?php  echo date('Y-m-d',$row['aagenttime'])?><br/><?php  echo date('H:i',$row['aagenttime'])?>
                <?php  } else { ?>
                -
                <?php  } ?>
                </td>
                <td>
             
                   
                    <span class='label <?php  if($row['aagentstatus']==1) { ?>label-success<?php  } else { ?>label-default<?php  } ?>'
										  <?php if(cv('abonus.agent.check')) { ?>
										  data-toggle='ajaxSwitch' 
                                          data-confirm ='确认要<?php  if($row['aagentstatus']==1) { ?>取消审核<?php  } else { ?>审核通过<?php  } ?>?'
										  data-switch-value='<?php  echo $row['aagentstatus'];?>'
										  data-switch-value0='0|未审核|label label-default|<?php  echo webUrl('abonus/agent/check',array('status'=>1,'id'=>$row['id']))?>'
										  data-switch-value1='1|已审核|label label-success|<?php  echo webUrl('abonus/agent/check',array('status'=>0,'id'=>$row['id']))?>'
										  <?php  } ?>
										>
										  <?php  if($row['aagentstatus']==1) { ?>已审核<?php  } else { ?>未审核<?php  } ?></span>
                    <br/>
                    
                    
                       <span class='label <?php  if($row['aagentblack']==0) { ?>label-success<?php  } else { ?>label-default<?php  } ?>' 
										  <?php if(cv('abonus.agent.aagentblack')) { ?>
										  data-toggle='ajaxSwitch' 
                                                                                       data-confirm ='确认要<?php  if($row['aagentblack']==1) { ?>取消黑名单<?php  } else { ?>设置黑名单<?php  } ?>?'
										  data-switch-value='<?php  echo $row['aagentblack'];?>'
										  data-switch-value0='0|正常|label label-success|<?php  echo webUrl('abonus/agent/aagentblack',array('aagentblack'=>1,'id'=>$row['id']))?>'
										  data-switch-value1='1|黑名单|label label-default|<?php  echo webUrl('abonus/agent/aagentblack',array('aagentblack'=>0,'id'=>$row['id']))?>'
										  <?php  } ?>
										>
										  <?php  if($row['aagentblack']==1) { ?>黑名单<?php  } else { ?>正常<?php  } ?></span>
                     </td>
                <td>
             <?php  if(empty($row['followed'])) { ?>
                    <?php  if(empty($row['uid'])) { ?>
                    <label class='label label-default'>未关注</label>
                    <?php  } else { ?>
                    <label class='label label-warning'>取消关注</label>
                    <?php  } ?>
                    <?php  } else { ?>
                    <label class='label label-primary'>已关注</label>
                    <?php  } ?>
                    
              
                   
           
                </td>
             
        
                <td  style="overflow:visible;">

                    <div class="btn-group btn-group-sm">
                        <a class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="javascript:;">操作 <span class="caret"></span></a>
                        <ul class="dropdown-menu dropdown-menu-left">
                            
                            
                            
                            <?php if(cv('member.list.view')) { ?><li><a href="<?php  echo webUrl('member/list/detail',array('id' => $row['id']));?>" title='会员信息' target='_blank'><i class='fa fa-user'></i> 会员信息</a></li>	<?php  } ?>
                            <?php if(cv('order.list')) { ?><li><a  href="<?php  echo webUrl('order/list',array('agentid' => $row['id']));?>" title='推广订单'  target='_blank'><i class='fa fa-list'></i> 推广订单</a></li><?php  } ?>
                            <?php if(cv('commission.agent.user')) { ?><li><a  href="<?php  echo webUrl('commission/agent/user',array('id' => $row['id']));?>"  title='推广下线'  target='_blank'><i class='fa fa-users'></i> 推广下线</a></li><?php  } ?>
                            <?php if(cv('abonus.agent.delete')) { ?><li><a data-toggle='ajaxRemove' href="<?php  echo webUrl('abonus/agent/delete',array('id' => $row['id']));?>" title="删除" data-confirm="确定要删除该区域代理吗？"><i class='fa fa-remove'></i> 删除区域代理</a></li><?php  } ?>

                            <li class='divider'></li>
                            <?php if(cv('order')) { ?><li><a  href="<?php  echo webUrl('order/list', array('searchfield'=>'member', 'keyword'=>$row['nickname']))?>" title='会员订单'  target='_blank'><i class='fa fa-list'></i> 会员订单</a></li><?php  } ?>
                        <?php if(cv('finance.recharge.credit1')) { ?><li><a data-toggle="ajaxModal" href="<?php  echo webUrl('finance/recharge', array('type'=>'credit1','id'=>$row['id']))?>" title='充值积分'><i class='fa fa-credit-card'></i> 充值积分</a></li><?php  } ?>
                        <?php if(cv('finance.recharge.credit2')) { ?><li><a data-toggle="ajaxModal" href="<?php  echo webUrl('finance/recharge', array('type'=>'credit2','id'=>$row['id']))?>" title='充值余额'><i class='fa fa-money'></i> 充值余额 </a></li><?php  } ?>
                        <?php if(cv('member.list.delete')) { ?><li><a  data-toggle='ajaxRemove'  href="<?php  echo webUrl('member/list/delete',array('id' => $row['id']));?>" title='删除会员' data-confirm="确定要删除该会员吗？"><i class='fa fa-remove'></i> 删除会员</a></li><?php  } ?>
                        
                        </ul>
                    </div>


                </td>
            </tr>
            <?php  } } ?>
            </tbody>
        </table>
        <?php  echo $pager;?>
        
                <?php  } else { ?>
<div class='panel panel-default'>
	<div class='panel-body' style='text-align: center;padding:30px;'>
		 暂时没有任何区域代理!
	</div>
</div>
<?php  } ?>
    <script language="javascript">
			  

 
			require(['bootstrap'],function(){
        $("[rel=pop]").popover({
            trigger:'manual',
            placement : 'left', 
            title : $(this).data('title'),
            html: 'true', 
            content : $(this).data('content'),
            animation: false
        }).on("mouseenter", function () {
                    var _this = this;
                    $(this).popover("show"); 
                    $(this).siblings(".popover").on("mouseleave", function () {
                        $(_this).popover('hide');
                    });
                }).on("mouseleave", function () {
                    var _this = this;
                    setTimeout(function () {
                        if (!$(".popover:hover").length) {
                            $(_this).popover("hide")
                        }
                    }, 100);
                });
 
	 
	   });
 
			   
</script> 
 
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>