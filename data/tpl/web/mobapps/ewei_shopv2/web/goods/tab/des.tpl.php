<?php defined('IN_IA') or exit('Access Denied');?><div class="form-group"></div>
<div class="form-group">
    <label class="col-sm-2 form-control-static">商品详情</label>
    <div class="col-sm-11">
        <?php if( ce('goods' ,$item) ) { ?>
        <?php  echo tpl_ueditor('content',$item['content'],array('height'=>'300'))?>
        <?php  } else { ?>
        <textarea id='detail' style='display:none'><?php  echo $item['content'];?></textarea>
        <a href='javascript:preview_html("#detail")' class="btn btn-default">查看内容</a>
        <?php  } ?>
    </div>
</div>
<br>



<div class="form-group" style="display: none;" >
    <!--<label class="col-sm-2">购买后可见</label>-->

    <div class="col-sm-10 col-xs-12">
        <h4>购买后可见</h4>
        <span>开启后购买过的商品才会显示</span>
    </div>
    <div class="col-sm-2 pull-right" style="padding-right:50px;text-align: right" >
        <?php if( ce('goods' ,$item) ) { ?>
        <input type="checkbox" class="js-switch" name="buyshow" value="1" <?php  if($item['buyshow']==1) { ?>checked<?php  } ?> />
        <?php  } else { ?>
        <?php  if($item['buyshow']==1) { ?>
        <span class='text-success'>开启</span>
        <?php  } else { ?>
        <span class='text-default'>关闭</span>
        <?php  } ?>
        <?php  } ?>

    </div>

    <div class="col-sm-11 bcontent" <?php  if(empty($item['buyshow'])) { ?>style="display: none;"<?php  } ?>>
    <?php if( ce('goods' ,$item) ) { ?>
    <?php  echo tpl_ueditor('buycontent',$item['buycontent'],array('height'=>'300'))?>
    <?php  } else { ?>
    <textarea id='buycontent' style='display:none;'><?php  echo $item['buycontent'];?></textarea>
    <a href='javascript:preview_html("#buycontent")' class="btn btn-default">查看内容</a>
    <?php  } ?>
</div>

</div>