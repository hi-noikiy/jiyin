<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>

<div class="page-heading">
    <h2>物流信息接口</h2>
</div>

<div class="alert alert-info">
    <p>提示：内置物流接口可能不稳定，您可申请/购买快递100正式接口(根据需求)</p>
    <p>类型：商城内置接口(可能不稳定); 免费接口(需要申请,相对稳定); 企业接口(收费,稳定性高)</p>
</div>

<form action="" method="post" class="form-horizontal form-validate" enctype="multipart/form-data">

    <div class="form-group">
        <label class="col-sm-2 control-label">接口类型</label>
        <div class="col-sm-9 col-xs-12">
            <?php if(cv('sysset.express.edit')) { ?>
                <label class="radio-inline"><input type="radio" class="toggle" data-show="" data-hide="type" name="isopen" value="0" <?php  if(empty($data['isopen'])) { ?>checked="checked"<?php  } ?> /> 商城内置接口</label>
                <label class="radio-inline"><input type="radio" class="toggle" data-show="type1" data-hide="type" name="isopen" value="1" <?php  if($data['isopen']==1) { ?>checked="checked"<?php  } ?> /> 免费接口</label>
                <label class="radio-inline"><input type="radio" class="toggle" data-show="type2" data-hide="type" name="isopen" value="2" <?php  if($data['isopen']==2) { ?>checked="checked"<?php  } ?> /> 企业接口</label>
            <?php  } else { ?>
                <div class='form-control-static'><?php echo empty($data['isopen'])?"默认免费接口":"正式接口"?></div>
            <?php  } ?>
        </div>
    </div>

    <div class="form-group type type1 type2" <?php  if(empty($data['isopen'])) { ?>style="display: none"<?php  } ?>>
        <label class="col-sm-2 control-label" style="padding-top: 0;">授权密匙<br>(Key)</label>
        <div class="col-sm-9 col-xs-12">
            <?php if(cv('sysset.express.edit')) { ?>
                <input type="text" name="apikey" class="form-control" value="<?php  echo $data['apikey'];?>"/>
            <?php  } else { ?>
                <div class='form-control-static'><?php  echo $data['apikey'];?></div>
            <?php  } ?>
        </div>
    </div>

    <div class="form-group type type2" <?php  if($data['isopen']<2) { ?>style="display: none"<?php  } ?>>
        <label class="col-sm-2 control-label" style="padding-top: 0;">公司编号<br>(Customer)</label>
        <div class="col-sm-9 col-xs-12">
            <?php if(cv('sysset.express.edit')) { ?>
                <input type="text" name="customer" class="form-control" value="<?php  echo $data['customer'];?>"/>
            <?php  } else { ?>
                <div class='form-control-static'><?php  echo $data['customer'];?></div>
            <?php  } ?>
        </div>
    </div>

    <div class="form-group type type1 type2" <?php  if(empty($data['isopen'])) { ?>style="display: none"<?php  } ?>>
        <label class="col-sm-2 control-label">数据缓存时间</label>
        <div class="col-sm-9 col-xs-12">
            <?php if(cv('sysset.express.edit')) { ?>
                <div class="input-group">
                    <input type="text" name="cache" class="form-control" value="<?php  echo intval($data['cache'])?>"/>
                    <span class="input-group-addon">分钟</span>
                </div>
            <?php  } else { ?>
                <div class='form-control-static'><?php  echo intval($data['cache'])?>分钟</div>
            <?php  } ?>
            <div class="help-block">正式接口可能存在次数限制问题, 设置缓存时间后在指定时间内只读取缓存并不调用接口(数据可能会延迟)</div>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label"></label>
        <div class="col-sm-9 col-xs-12">
            <?php if(cv('sysset.express.edit')) { ?>
            <input type="submit" value="提交" class="btn btn-primary"/>
            <?php  } ?>
        </div>
    </div>

</form>

<script type="text/javascript">
    $(".toggle").unbind('click').click(function () {
        var hide = $(this).data('hide');
        var show = $(this).data('show');
        if(hide){
            $("."+hide).hide();
        }
        if(show){
            $("."+show).show();
        }
    });
</script>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>     
