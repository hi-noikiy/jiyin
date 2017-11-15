<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<div class="page-heading"> 
    <span class='pull-right'>
        <?php if(cv('goods.add')) { ?>
        <a class='btn btn-primary btn-sm' href="<?php  echo webUrl('goods/add')?>"><i class='fa fa-plus'></i> 添加商品</a>
        <?php  } ?>
    </span>
    <h2>商品管理</h2> </div>

<form action="./index.php" method="get" class="form-horizontal form-search" role="form">
    <input type="hidden" name="c" value="site" />
    <input type="hidden" name="a" value="entry" />
    <input type="hidden" name="m" value="ewei_shopv2" />
    <input type="hidden" name="do" value="web" />
    <input type="hidden" name="r"  value="goods" />
    <input type="hidden" name="goodsfrom" value="<?php  echo $goodsfrom;?>" />
    <div class="page-toolbar row m-b-sm m-t-sm">
        <div class="col-sm-4">

            <div class="input-group-btn">
                <button class="btn btn-default btn-sm"  type="button" data-toggle='refresh'><i class='fa fa-refresh'></i></button>
                <?php if(cv('goods.edit')) { ?>
                <?php  if($_GPC['goodsfrom']=='sale') { ?>
                <button class="btn btn-default btn-sm" type="button" data-toggle='batch'  data-href="<?php  echo webUrl('goods/status',array('status'=>0))?>"><i class='fa fa-circle-o'></i> 下架</button>
                <?php  } ?>
                <?php  if($_GPC['goodsfrom']=='stock') { ?>
                <button class="btn btn-default btn-sm" type="button" data-toggle='batch' data-href="<?php  echo webUrl('goods/status',array('status'=>1))?>"><i class='fa fa-circle'></i> 上架</button>

                <?php  } ?>
                <?php  } ?>

                <?php  if($_GPC['goodsfrom']=='cycle') { ?>
                <?php if(cv('goods.delete1')) { ?>
                <button class="btn btn-default btn-sm" type="button" data-toggle='batch-remove' data-confirm="如果商品存在购买记录，会无法关联到商品, 确认要彻底删除吗?" data-href="<?php  echo webUrl('goods/delete1')?>"><i class='fa fa-remove'></i> 彻底删除</button>
                <?php  } ?>

                <?php if(cv('goods.restore')) { ?>
                <button class="btn btn-default btn-sm" type="button" data-toggle='batch-remove' data-confirm="确认要恢复?" data-href="<?php  echo webUrl('goods/restore')?>"><i class='fa fa-reply'></i> 恢复到仓库</button>
                <?php  } ?>

                <?php  } else { ?>
                <?php if(cv('goods.delete')) { ?>
                <button class="btn btn-default btn-sm" type="button" data-toggle='batch-remove' data-confirm="确认要删除吗?" data-href="<?php  echo webUrl('goods/delete')?>"><i class='fa fa-trash'></i> 删除</button>
                <?php  } ?>
                <?php  } ?>



            </div> 
        </div>	


        <div class="col-sm-8 pull-right">

            <select name="cate" class='form-control input-sm select-sm select2' style="width:200px;" data-placeholder="商品分类">
                <option value="" <?php  if(empty($_GPC['cate'])) { ?>selected<?php  } ?> >商品分类</option>
                <?php  if(is_array($category)) { foreach($category as $c) { ?>
                <option value="<?php  echo $c['id'];?>" <?php  if($_GPC['cate']==$c['id']) { ?>selected<?php  } ?> ><?php  echo $c['name'];?></option>
                <?php  } } ?>
            </select>

            <div class="input-group">				 
                <input type="text" class="input-sm form-control" name='keyword' value="<?php  echo $_GPC['keyword'];?>" placeholder="ID/名称/编号/条码<?php  if($merch_plugin) { ?>/商户名称<?php  } ?>"> <span class="input-group-btn">
                    		
                    <button class="btn btn-sm btn-primary" type="submit"> 搜索</button> </span>
            </div>

        </div>
    </div>
</form>

<?php  if(count($list)>0 && cv('goods.main')) { ?>
<table class="table table-hover table-responsive"> 
    <thead class="navbar-inner">
        <tr>
            <th style="width:25px;"><input type='checkbox' /></th>
            <th style="width:50px;text-align:center;">排序</th>
            <th style="width:50px;">商品</th>
            <th  style="width:150px;">&nbsp;</th>

            <th style="width:80px;" >价格</th>
            <th style="width:60px;" >库存</th>
            <th style="width:60px;" >销量</th>
            <th  style="width:60px;" >来源</th>              
            <?php  if($goodsfrom!='cycle') { ?>
            <th  style="width:80px;" >状态</th>
            <?php  } ?>         
            <th style="">操作</th>
        </tr>
    </thead>
    <tbody>
        <?php  if(is_array($list)) { foreach($list as $item) { ?>
        <tr>
            <td>
                <input type='checkbox'  value="<?php  echo $item['id'];?>"/>
            </td>
            <td style='text-align:center;'>
                <?php if(cv('goods.edit')) { ?>
                <a href='javascript:;' data-toggle='ajaxEdit' data-href="<?php  echo webUrl('goods/change',array('type'=>'displayorder','id'=>$item['id']))?>" ><?php  echo $item['displayorder'];?></a>
                <?php  } else { ?>
                <?php  echo $item['displayorder'];?> 
                <?php  } ?>
            </td>
            <td>
                <img src="<?php  echo tomedia($item['thumb'])?>" style="width:40px;height:40px;padding:1px;border:1px solid #ccc;"  />
            </td>
            <td class='full' style="overflow-x: hidden">
                <?php  if(!empty($category[$item['pcate']])) { ?>
                	<span class="text-danger">[<?php  echo $category[$item['pcate']]['name'];?>]</span>
                <?php  } ?>
                <?php  if(!empty($category[$item['ccate']])) { ?>
                	<span class="text-info">[<?php  echo $category[$item['ccate']]['name'];?>]</span>
                <?php  } ?>
                <?php  if(!empty($category[$item['tcate']]) && intval($shopset['catlevel'])==3) { ?>
                	<span class="text-info">[<?php  echo $category[$item['tcate']]['name'];?>]</span>
                <?php  } ?>
                <br/>
                <?php if(cv('goods.edit')) { ?>
                <a href='javascript:;' data-toggle='ajaxEdit' data-edit='textarea'  data-href="<?php  echo webUrl('goods/change',array('type'=>'title','id'=>$item['id']))?>" ><?php  echo $item['title'];?></a>
                <?php  } else { ?>
                <?php  echo $item['title'];?>
                <?php  } ?>
            </td>

            <td>
                <?php  if($item['hasoption']==1) { ?>
                <?php if(cv('goods.edit')) { ?>
                <span data-toggle='tooltip' title='多规格不支持快速修改'><?php  echo $item['marketprice'];?></span>
                <?php  } else { ?>
                <?php  echo $item['marketprice'];?>
                <?php  } ?>
                <?php  } else { ?>
                <?php if(cv('goods.edit')) { ?>

                <a href='javascript:;' data-toggle='ajaxEdit' data-href="<?php  echo webUrl('goods/change',array('type'=>'marketprice','id'=>$item['id']))?>" ><?php  echo $item['marketprice'];?></a>
                <?php  } else { ?>
                <?php  echo $item['marketprice'];?>
                <?php  } ?><?php  } ?>

            </td>

            <td>
                <?php  if($item['hasoption']==1) { ?>
                <?php if(cv('goods.edit')) { ?>
                <span data-toggle='tooltip' title='多规格不支持快速修改'><?php  echo $item['total'];?></span>
                <?php  } else { ?>
                <?php  echo $item['total'];?>
                <?php  } ?>
                <?php  } else { ?>
                <?php if(cv('goods.edit')) { ?>
                <a href='javascript:;' data-toggle='ajaxEdit' data-href="<?php  echo webUrl('goods/change',array('type'=>'total','id'=>$item['id']))?>" ><?php  echo $item['total'];?></a>							
                <?php  } else { ?>
                <?php  echo $item['total'];?>
                <?php  } ?><?php  } ?>
            </td>
            <td><?php  echo $item['salesreal'];?></td>
			
			
			<td>
				<span class="label label-info">
					<?php  if($item['uid']!=0) { ?>
						ERP
					<?php  } else { ?>
					      商城
					<?php  } ?>
				
				</span>
			</td>
			
            <?php  if($goodsfrom!='cycle') { ?>
            <td  style="overflow:visible;">
				<span class="label label-success">
					<?php  if($item['status']==1) { ?>
						正常上架
					<?php  } else if($item['status']==2) { ?>
					       即将上线
					<?php  } else if($item['status']==3) { ?>
						已经下架
					<?php  } else if($item['status']==4) { ?>
						已经售罄
					<?php  } else if($item['status']==5) { ?>
						其他
					<?php  } ?>
				
				</span>
             </td>
             <?php  } ?>
                <td  style="overflow:visible;position:relative">

                        <?php if(cv('goods.edit|goods.view')) { ?>
                        	<a  class='btn btn-default btn-sm' href="<?php  echo webUrl('goods/edit', array('id' => $item['id'],'goodsfrom'=>$goodsfrom,'page'=>$page))?>" title="<?php if(cv('goods.edit')) { ?>编辑<?php  } else { ?>查看<?php  } ?>"><i class='fa fa-edit'></i> </a>
                        <?php  } ?>
                        <?php  if($_GPC['goodsfrom']=='cycle') { ?>
                        <?php if(cv('goods.restore')) { ?>
                        <a  class='btn btn-default btn-sm' data-toggle='ajaxRemove' href="<?php  echo webUrl('goods/restore', array('id' => $item['id']))?>" data-confirm='确认要恢复?'><i class='fa fa-reply'></i> </a>
                        <?php  } ?>
                        <?php if(cv('goods.delete1')) { ?>
                        <a  class='btn btn-default btn-sm' data-toggle='ajaxRemove' href="<?php  echo webUrl('goods/delete1', array('id' => $item['id']))?>" data-confirm='如果此商品存在购买记录，会无法关联到商品, 确认要彻底删除吗?？'><i class='fa fa-remove'></i> </a>
                        <?php  } ?>
                        <?php  } else { ?>
                        <?php if(cv('goods.delete')) { ?>
                        <a  class='btn btn-default btn-sm' data-toggle='ajaxRemove' href="<?php  echo webUrl('goods/delete', array('id' => $item['id']))?>" data-confirm='确认删除此商品？'><i class='fa fa-trash'></i> </a>
                        <?php  } ?>
                        <?php  } ?>


                        <?php  if($_GPC['goodsfrom']!='cycle') { ?>
                        <a href="javascript:;" class='btn btn-default btn-sm js-clip' data-url="<?php  echo mobileUrl('goods/detail', array('id' => $item['id']),true)?>">
                            <i class='fa fa-link'></i> 复制链接
                        </a>
                        <a href="javascript:void(0);" class="btn btn-default btn-sm" data-toggle="popover" data-trigger="hover" data-html="true"
                           data-content="<img src='<?php  echo $item['qrcode'];?>' width='130' alt='链接二维码'>" data-placement="auto right">
                            <i class="glyphicon glyphicon-qrcode"></i>
                        </a>
                        <?php  } ?>


                    </td>
                </tr>
                <tr>
                    <td colspan='4' style='text-align: left;border-top:none;padding:5px 0;' class='aops'>
                    <?php  if(!empty($item['merchname']) && $item['merchid'] > 0) { ?>
                    <span class="text-default" style="margin-left: 95px;">商户名称:</span><span class="text-info"><?php  echo $item['merchname'];?></span>
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
                                  暂时没有任何商品!
                              </div>
                          </div>
                          <?php  } ?>
                          <?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
