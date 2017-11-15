<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<div class="page-heading"> <h2>关注及分享设置</h2> </div>
 
    <form action="" method="post" class="form-horizontal  form-validate" enctype="multipart/form-data" >


                
            <div class='form-group-title'>分享设置[二维码]</div>
      
                <div class="form-group">
                    <label class="col-sm-2 control-label">分享标题</label>
                    <div class="col-sm-9 col-xs-12">
                        <?php if(cv('sysset.follow.edit')) { ?>
                        <input type="text" name="data[title]" class="form-control" value="<?php  echo $data['title'];?>" />
                        <span class="help-block">不填写默认商城名称</span>
                        <?php  } else { ?>
                        <input type="hidden" name="data[title]" value="<?php  echo $data['title'];?>" />
                        <div class='form-control-static'><?php  echo $data['title'];?></div>
                        <?php  } ?>

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">分享图标</label>
                    <div class="col-sm-9 col-xs-12">
                        <?php if(cv('sysset.follow.edit')) { ?>

                        <?php  echo tpl_form_field_image('data[icon]', $data['icon']);?>
                        <span class="help-block">不选择默认商城LOGO</span>
                        <?php  } else { ?>
                        <input type="hidden" name="data[icon]" value="<?php  echo $data['icon'];?>" />
                        <?php  if(!empty($data['icon'])) { ?>
                        <a href='<?php  echo tomedia($data['icon'])?>' target='_blank'>
                           <img src="<?php  echo tomedia($data['icon'])?>" style='width:100px;border:1px solid #ccc;padding:1px' />
                        </a>
                        <?php  } ?>
                        <?php  } ?>

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">分享描述</label>
                    <div class="col-sm-9 col-xs-12">
                        <?php if(cv('sysset.follow.edit')) { ?>
                        <textarea style="height:100px;" name="data[desc]" class="form-control" cols="60"><?php  echo $data['desc'];?></textarea>
                        <?php  } else { ?>
                        <textarea style="height:100px;display: none" name="data[desc]" class="form-control" cols="60"><?php  echo $data['desc'];?></textarea>
                        <div class='form-control-static'><?php  echo $data['desc'];?></div>
                        <?php  } ?>
                    </div> 
                </div> 
                <div class="form-group" style="display: none;">
                    <label class="col-sm-2 control-label">分享链接</label>
                    <div class="col-sm-9 col-xs-12">
                        <?php if(cv('sysset.follow.edit')) { ?>
                        
                        <div class="input-group form-group" style="margin: 0;"> 
                        	<input type="text" name="data[url]" class="form-control" value="<?php  echo $data['url'];?>" id="shareurl" />
                        	<span data-input="#shareurl" data-toggle="selectUrl" data-full="true" class="input-group-addon btn btn-default">选择链接</span>
                    	</div>
                    	
                        <span class='help-block'>用户分享出去的链接，默认为首页</span>
                        <?php  } else { ?>
                        <input type="hidden" name="data[url]" value="<?php  echo $data['url'];?>" />
                        <div class='form-control-static'><?php  echo $data['url'];?></div>
                        <?php  } ?>
                    </div>
                </div>









            <div class='form-group-title'>分享设置[首页]</div>
      
                <div class="form-group">
                    <label class="col-sm-2 control-label">分享标题</label>
                    <div class="col-sm-9 col-xs-12">
                        <?php if(cv('sysset.follow.edit')) { ?>
                        <input type="text" name="data[title1]" class="form-control" value="<?php  echo $data['title1'];?>" />
                        <span class="help-block">不填写默认商城名称</span>
                        <?php  } else { ?>
                        <input type="hidden" name="data[title1]" value="<?php  echo $data['title1'];?>" />
                        <div class='form-control-static'><?php  echo $data['title1'];?></div>
                        <?php  } ?>

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">分享图标</label>
                    <div class="col-sm-9 col-xs-12">
                        <?php if(cv('sysset.follow.edit')) { ?>

                        <?php  echo tpl_form_field_image('data[icon1]', $data['icon1']);?>
                        <span class="help-block">不选择默认商城LOGO</span>
                        <?php  } else { ?>
                        <input type="hidden" name="data[icon1]" value="<?php  echo $data['icon1'];?>" />
                        <?php  if(!empty($data['icon1'])) { ?>
                        <a href='<?php  echo tomedia($data['icon1'])?>' target='_blank'>
                           <img src="<?php  echo tomedia($data['icon1'])?>" style='width:100px;border:1px solid #ccc;padding:1px' />
                        </a>
                        <?php  } ?>
                        <?php  } ?>

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">分享描述</label>
                    <div class="col-sm-9 col-xs-12">
                        <?php if(cv('sysset.follow.edit')) { ?>
                        <textarea style="height:100px;" name="data[desc1]" class="form-control" cols="60"><?php  echo $data['desc1'];?></textarea>
                        <?php  } else { ?>
                        <textarea style="height:100px;display: none" name="data[desc1]" class="form-control" cols="60"><?php  echo $data['desc1'];?></textarea>
                        <div class='form-control-static'><?php  echo $data['desc1'];?></div>
                        <?php  } ?>
                    </div> 
                </div> 
                <div class="form-group" style="display: none;">
                    <label class="col-sm-2 control-label">分享链接</label>
                    <div class="col-sm-9 col-xs-12">
                        <?php if(cv('sysset.follow.edit')) { ?>
                        
                        <div class="input-group form-group" style="margin: 0;"> 
                        	<input type="text" name="data[url1]" class="form-control" value="<?php  echo $data['url1'];?>" id="shareurl" />
                        	<span data-input="#shareurl" data-toggle="selectUrl" data-full="true" class="input-group-addon btn btn-default">选择链接</span>
                    	</div>
                    	
                        <span class='help-block'>用户分享出去的链接，默认为首页</span>
                        <?php  } else { ?>
                        <input type="hidden" name="data[url1]" value="<?php  echo $data['url1'];?>" />
                        <div class='form-control-static'><?php  echo $data['url1'];?></div>
                        <?php  } ?>
                    </div>
                </div>














        <div class="form-group"></div>
            <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-9 col-xs-12">
                           <?php if(cv('sysset.follow.edit')) { ?>
                            <input type="submit"  value="提交" class="btn btn-primary"  />
                          <?php  } ?>
                     </div>
            </div>
 
    </form>
 
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>     