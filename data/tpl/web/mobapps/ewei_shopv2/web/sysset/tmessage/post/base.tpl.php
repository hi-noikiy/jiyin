<?php defined('IN_IA') or exit('Access Denied');?><div class="form-group">
    <label class="col-sm-2 control-label must" >模板名称</label>
    <div class="col-sm-9 col-xs-12">
        <input type="text"  id="title" name="title"  class="form-control" value="<?php  echo $list['title'];?>" placeholder="模版名称，例：订单完成模板1（自定义）" data-rule-required='true' />
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label">消息接口分组</label>
    <div class="col-sm-9 col-xs-12">
        <select class='form-control'   style="width: 300px;" id="typegroup" name="typegroup">
            <?php  if(is_array($typegroup)) { foreach($typegroup as $group) { ?>
                <option value="<?php  echo $group['typegroup'];?>" <?php  if($types['typegroup'] == $group['typegroup'] ) { ?>selected<?php  } ?>><?php  echo $group['groupname'];?></option>
            <?php  } } ?>
        </select>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label">模板对应消息接口</label>
    <div class="col-sm-9 col-xs-12">
        <select class='form-control'   style="width: 300px;" id="typecode" name="typecode">
            <?php  if(is_array($templatetypes)) { foreach($templatetypes as $templatetype) { ?>
                <option value="<?php  echo $templatetype['typecode'];?>" <?php  if($types['typecode'] == $templatetype['typecode'] ) { ?>selected<?php  } ?>><?php  echo $templatetype['name'];?></option>
            <?php  } } ?>
        </select>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label">推送模式</label>
    <div class="col-sm-9 col-xs-12">
        <label class="radio-inline coupon-radio">
            <input type="radio" class="messagetype" name="messagetype" value="0" <?php  if($list['messagetype'] == 0) { ?>checked="true"<?php  } ?>/> 发送混合消息
        </label>
        <label class="radio-inline coupon-radio">
            <input type="radio" class="messagetype" name="messagetype" value="1" <?php  if($list['messagetype'] == 1) { ?>checked="true"<?php  } ?>  /> 发送模板消息
        </label>
        <label class="radio-inline coupon-radio">
            <input type="radio" class="messagetype" name="messagetype" value="2" <?php  if($list['messagetype'] == 2) { ?>checked="true"<?php  } ?> /> 发送客服消息
        </label>
       <!-- <span class='help-block'>混合消息发送方式为先发送模板消息,如果发送失败再次发送客服消息</span>-->
    </div>
</div>
