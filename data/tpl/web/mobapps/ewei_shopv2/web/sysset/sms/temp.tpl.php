<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<div class="page-heading"> 
    <span class='pull-right'>
        <?php if(cv('sysset.sms.temp.add')) { ?>
            <a class='btn btn-primary btn-sm' href="<?php  echo webUrl('sysset/sms/temp/add')?>"><i class="fa fa-plus"></i> 添加新模板</a>
        <?php  } ?>
    </span>
    <h2>短信消息库管理</h2>
</div>

<form action="./index.php" method="get" class="form-horizontal form-search" role="form">
    <input type="hidden" name="c" value="site"/>
    <input type="hidden" name="a" value="entry"/>
    <input type="hidden" name="m" value="ewei_shopv2"/>
    <input type="hidden" name="do" value="web"/>
    <input type="hidden" name="r" value="sysset.sms.temp"/>
    <div class="page-toolbar row m-b-sm m-t-sm">
        <div class="col-sm-4">
            <div class="input-group-btn">
                <button class="btn btn-default btn-sm" type="button" data-toggle='refresh'><i class='fa fa-refresh'></i></button>
                <?php if(cv('sysset.sms.temp.edit')) { ?>
                <button class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle='batch' data-confirm="确认要启用?" data-href="<?php  echo webUrl('sysset/sms/temp/status', array('status'=>1))?>"><i class='fa fa fa-circle'></i> 启用
                </button>
                <button class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle='batch' data-confirm="确认要禁用?" data-href="<?php  echo webUrl('sysset/sms/temp/status', array('status'=>0))?>"><i class='fa fa fa-circle-o'></i> 禁用
                </button>
                <?php  } ?>
                <?php if(cv('sysset.sms.temp.delete')) { ?>
                    <button class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle='batch-remove' data-confirm="确认要删除?" data-href="<?php  echo webUrl('sysset/sms/temp/delete')?>"><i class='fa fa-trash'></i> 删除
                    </button>
                <?php  } ?>
            </div>
        </div>
        <div class="col-sm-7 pull-right">
            <select name="type" class="form-control input-sm select-sm" style="width:120px;">
                <option value="" <?php  if($_GPC['type']=='') { ?>selected<?php  } ?>>服务商</option>
                <option value="juhe" <?php  if($_GPC['type']=='juhe') { ?>selected<?php  } ?>>聚合数据</option>
                <option value="dayu" <?php  if($_GPC['type']=='dayu') { ?>selected<?php  } ?>>阿里大于</option>
                <option value="emay" <?php  if($_GPC['type']=='emay') { ?>selected<?php  } ?>>亿美软通</option>
            </select>
            <select name="status" class="form-control input-sm select-sm" style="width:80px;">
                <option value="" <?php  if($_GPC['status']=='') { ?>selected<?php  } ?>>状态</option>
                <option value="0" <?php  if($_GPC['status']=='0') { ?>selected<?php  } ?>>关闭</option>
                <option value="1" <?php  if($_GPC['status']=='1') { ?>selected<?php  } ?>>开启</option>
            </select>
            <div class="input-group">
                <input type="text" class="input-sm form-control" name='keyword' value="<?php  echo $_GPC['keyword'];?>" placeholder="请输入关键词"> <span class="input-group-btn">
                <button class="btn btn-sm btn-primary" type="submit"> 搜索</button> </span>
            </div>
        </div>
    </div>
</form>

<?php  if(count($list)>0) { ?>
    <table class="table table-responsive table-hover">
        <thead>
            <tr>
                <th style="width:25px;"><input type='checkbox'/></th>
                <th>模板名称</th>
                <th style="width: 100px; text-align: center;">服务商</th>
                <th style="width: 80px; text-align: center;">状态</th>
                <?php if(cv('sysset.sms.temp.testsend')) { ?>
                <th style="width: 100px; text-align: center;">测试发送</th>
                <?php  } ?>
                <th style="width: 150px;">操作</th>
            </tr>
        </thead>
        <tbody>
        <?php  if(is_array($list)) { foreach($list as $item) { ?>
            <tr>
                <td>
                    <input type='checkbox' value="<?php  echo $item['id'];?>"/>
                </td>
                <td><?php  echo $item['name'];?></td>
                <td style="text-align: center;">
                    <?php  if($item['type']=='juhe') { ?>
                        <span class="label label-primary">聚合数据</span>
                    <?php  } else if($item['type']=='dayu') { ?>
                        <span class="label label-success">阿里大于</span>
                    <?php  } else if($item['type']=='emay') { ?>
                        <span class="label label-warning">亿美软通</span>
                    <?php  } ?>
                </td>
                <td style="text-align: center;">
                    <span class="label
						<?php  if(!empty($item['status'])) { ?>label-success<?php  } else { ?>label-default<?php  } ?>"
                        <?php if(cv('sysset.sms.temp.edit')) { ?>
                        data-toggle="ajaxSwitch"
                        data-confirm = "确认<?php  if(!empty($item['status'])) { ?>关闭<?php  } else { ?>开启<?php  } ?>吗？"
                        data-switch-value="<?php  echo $item['status'];?>"
                        data-switch-value0="0|关闭|label label-default|<?php  echo webUrl('sysset/sms/temp/status',array('status'=>1,'id'=>$item['id']))?>"
                        data-switch-value1="1|开启|label label-success|<?php  echo webUrl('sysset/sms/temp/status',array('status'=>0,'id'=>$item['id']))?>"
                        <?php  } ?>>

                        <?php  if(!empty($item['status'])) { ?>开启<?php  } else { ?>关闭<?php  } ?>
                    </span>
                </td>
                <?php if(cv('sysset.sms.temp.testsend')) { ?>
                <td style="text-align: center;">
                    <a class="btn btn-primary btn-sm" data-toggle="ajaxModal" href="<?php  echo webUrl('sysset/sms/temp/testsend', array('id'=>$item['id']))?>"><i class="fa fa-paper-plane-o"></i> 发送</a>
                </td>
                <?php  } ?>
                <td>
                    <?php if(cv('sysset.sms.temp.edit|sysset.sms.temp.view')) { ?>
                    <a class='btn btn-default  btn-sm' href="<?php  echo webUrl('sysset/sms/temp/edit', array('id' => $item['id']))?>"><i class='fa fa-edit'></i> <?php if(cv('sysset.sms.temp.edit')) { ?>编辑<?php  } else { ?>查看<?php  } ?></a>
                    <?php  } ?>
                    <?php if(cv('sysset.sms.temp.delete')) { ?>
                    <a class='btn btn-default  btn-sm' data-toggle='ajaxRemove' href="<?php  echo webUrl('sysset/sms/temp/delete', array('id' => $item['id']))?>" data-confirm="确认删除此模板吗？"><i class='fa fa-trash'></i> 删除</a>
                    <?php  } ?>
                </td>
            </tr>
        <?php  } } ?>

        </tbody>
    </table>
    <?php  echo $pager;?>
    <?php  } else { ?>
    <div class='panel panel-default'>
        <div class='panel-body' style='text-align: center;padding:30px;'>
            暂时没有任何短信模板!
        </div>
    </div>
    <?php  } ?>

    </div>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
