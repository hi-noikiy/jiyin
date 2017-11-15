<?php defined('IN_IA') or exit('Access Denied');?><?php  $no_left=true?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<style>
    .form-horizontal .form-group{margin-right: -50px;}
    .col-sm-9{padding-right: 0;}
	.tm .btn { margin-bottom:5px;}
</style>

<div class="page-heading">
	<span class='pull-right'>

        <a class="btn btn-default  btn-sm" href="<?php  echo webUrl('sysset/createlink/index')?>">返回列表</a>

	</span>
	<h2><small>创建应用链接(创建自定义菜单应该设置的链接)</small></h2>
</div>

<div class="row">
	<div class="col-sm-9">

	 <form <?php if( ce('sysset.sms.temp' ,$item) ) { ?>action="" method="post"<?php  } ?> class="form-horizontal " enctype="multipart/form-data">
                <input type="hidden" name="action" value="ok" />
                
                <div class="form-group">
                    <label class="col-sm-2 control-label" >应用名称</label>
                    <div class="col-sm-9 col-xs-12">
   
                            <input type="text" name="name" class="form-control" value="" placeholder="" data-rule-required='true' />

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" >应用链接</label>
                    <div class="col-sm-9 col-xs-12">
   
                            <input type="text" name="link" class="form-control" value="" placeholder="系统未做/识别,只是单纯的在链接增加&openid=xxx,注意http://xxx.com&openid=xxx的情况" data-rule-required='true' />

                    </div>
                </div>






        </div>


                <div class="form-group"></div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label" ></label>
                    <div class="col-sm-9 col-xs-12">
                        <?php if( ce('sysset.sms.temp' ,$item) ) { ?>
                       <input type="submit"  value="创建并生成" class="btn btn-primary"  />
                        <?php  } ?>
                        <?php if(cv('sysset.sms.temp.main')) { ?>
                       <input type="button" name="back" onclick='history.back()' <?php if(cv('sysset.sms.temp.add|sysset.sms.temp.edit')) { ?>style='margin-left:10px;'<?php  } ?> value="返回列表" class="btn btn-default" />
                        <?php  } ?>
                    </div>
                </div>
	 
</form>
		
	</div>
	<div class="col-sm-3">

	</div>
</div>

 


<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
