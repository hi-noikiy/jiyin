<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<div class="page-heading"> 
    <span class='pull-right'>
        <?php if(cv('sysset.sms.temp.add')) { ?>
            <a class='btn btn-primary btn-sm' href="<?php  echo webUrl('sysset/createlink/insert')?>"><i class="fa fa-plus"></i> 添加新链接</a>
        <?php  } ?>
    </span>
    <h2>生成链接管理</h2>
</div>

<form action="./index.php" method="get" class="form-horizontal form-search" role="form">
    <input type="hidden" name="c" value="site"/>
    <input type="hidden" name="a" value="entry"/>
    <input type="hidden" name="m" value="ewei_shopv2"/>
    <input type="hidden" name="do" value="web"/>
    <input type="hidden" name="r" value="sysset.createlink"/>
    <div class="page-toolbar row m-b-sm m-t-sm">
        <div class="col-sm-4">
            <div class="input-group-btn">
                <button class="btn btn-default btn-sm" type="button" data-toggle='refresh'><i class='fa fa-refresh'></i></button>
                    <button class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle='batch-remove' data-confirm="确认要删除?" data-href="<?php  echo webUrl('sysset/createlink/delete')?>"><i class='fa fa-trash'></i> 删除
                    </button>

            </div>
        </div>
        <div class="col-sm-7 pull-right">


        </div>
    </div>
</form>

<?php  if(count($list)>0) { ?>
    <table class="table table-responsive table-hover">
        <thead>
            <tr>
                <th style="width:25px;"><input type='checkbox'/></th>
                <th style="width: 80px;">应用名称</th>
                <th style="width:120px;">应用链接</th>
                <th style="width:200px;">自定义菜单使用链接</th>
 
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
                <td><?php  echo $item['link'];?></td>				
                <td>
                	
                	<input type="text" style="width: 200px;" value="<?php  echo $item['diymenulink'];?>" />
                	
                </td>

                <td>
                    <a class='btn btn-default  btn-sm' data-toggle='ajaxRemove' href="<?php  echo webUrl('sysset/createlink/delete', array('id' => $item['id']))?>" data-confirm="确认删除吗？"><i class='fa fa-trash'></i> 删除</a>
                </td>
            </tr>
        <?php  } } ?>

        </tbody>
    </table>
    <?php  echo $pager;?>
    <?php  } else { ?>
    <div class='panel panel-default'>
        <div class='panel-body' style='text-align: center;padding:30px;'>
            暂时没有任何应用!
        </div>
    </div>
    <?php  } ?>

    </div>
    <script>

	function copy(obj)
	{
	  
	  obj.select(); // 选择对象
	  document.execCommand("Copy"); // 执行浏览器复制命令
	  alert("已复制好，可贴粘。");
	}
    	
    </script>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
