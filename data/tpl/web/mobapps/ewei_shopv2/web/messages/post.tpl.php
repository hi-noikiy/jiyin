<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<div class="page-heading">
    <h2>消息群发任务编辑 <small><?php  if(!empty($item)) { ?>群发模板 <?php  echo $item['title'];?><?php  } ?></small></h2>
</div>

<form <?php if( ce('messages' ,$list) ) { ?>action="" method="post"<?php  } ?> class="form-horizontal form-validate" enctype="multipart/form-data">

<div class="alert alert-info">
    <p>根据选择的用户群体不同，发送时间会不相同，发送期间请耐心等待! </p>
    <p>模板消息群发有风险，请谨慎使用，大用户量建议使用公众平台推送!</p>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label must" >任务名称</label>
    <div class="col-sm-9 col-xs-12">
        <?php if( ce('messages.template' ,$list) ) { ?>
            <input type="text" name="title" class="form-control" value="<?php  echo $item['title'];?>" placeholder="任务名称，例：系统更新通知" data-rule-required='true' />
        <?php  } else { ?>
            <div class='form-control-static'><?php  echo $list['title'];?></div>
        <?php  } ?>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label">发送消息类型</label>
    <div class="col-sm-9 col-xs-12" >
        <?php if( ce('messages.template' ,$item) ) { ?>
        <label class="radio-inline coupon-radio">
            <input type="radio" name="messagetype" value="0" <?php  if($item['messagetype'] == 0) { ?>checked="true"<?php  } ?> onclick="$('.customermessage').hide();$('.selecttemplate').show();" /> 发送模板消息
        </label>
        <label class="radio-inline coupon-radio">
            <input type="radio" name="messagetype" value="1" <?php  if($item['messagetype'] == 1) { ?>checked="true"<?php  } ?>  onclick="$('.selecttemplate').hide();$('.customermessage').show();"/> 发送客服消息
        </label>
        <label class="radio-inline coupon-radio">
            <input type="radio" name="messagetype" value="2" <?php  if($item['messagetype'] == 2) { ?>checked="true"<?php  } ?>  onclick="$('.selecttemplate').show();$('.customermessage').show();"/> 发送混合消息
        </label>
        <span class='help-block'>混合消息发送方式为先发送客服消息,如果发送失败再次发送模板消息</span>

        <?php  } else { ?>
            <div class='form-control-static'>
                <?php  if($item['messagetype']==0) { ?>
                    发送客服消息
                <?php  } else if($item['messagetype']==1) { ?>
                    发送模板消息
                <?php  } else if($item['messagetype']==2) { ?>
                    发送混合消息
                <?php  } ?>
            </div>
        <?php  } ?>
    </div>
</div>
<!--

<div class="form-group">
    <label class="col-sm-2 control-label">发送进程数</label>
    <div class="col-sm-2 col-lg-2col-xs-2">
        <select name="processnum" class="form-control"  >
            <option value="1"  <?php  if($item['processnum']==1) { ?>selected<?php  } ?>>1</option>
            <option value="5"  <?php  if($item['processnum']==5) { ?>selected<?php  } ?>>5</option>
            <option value="10"  <?php  if($item['processnum']==10) { ?>selected<?php  } ?>>10</option>
        </select>
    </div>
</div>
-->

<div class="form-group selecttemplate"  <?php  if($item['messagetype']==1 ) { ?>style="display:none"<?php  } ?>>
    <label class="col-sm-2 control-label must">选择模板</label>
    <div class="col-sm-9 col-xs-12">
        <?php  echo tpl_selector('templateid',array(
                'preview'=>false,
        'required'=>true,
        'url'=>webUrl('messages/template/query'),
        'items'=>$send,
        'placeholder'=>'模板名称',
        'buttontext'=>"选择模板"))
        ?>
    </div>
</div>

<div class="form-group customermessage"  <?php  if(empty($item['messagetype'])) { ?>style="display:none"<?php  } ?>>

    <label class="col-sm-2 control-label"> 客服消息类型</label>
    <div class="col-sm-9 col-xs-12" >
        <?php if( ce('messages.template' ,$item) ) { ?>
            <label class="radio-inline coupon-radio">
                <input type="radio" name="customertype" value="0" <?php  if($item['customertype'] == 0) { ?>checked="true"<?php  } ?> onclick="$('.custm').hide();$('.news').show();" /> 发送图文消息
            </label>
            <label class="radio-inline coupon-radio">
                <input type="radio" name="customertype" value="1" <?php  if($item['customertype'] == 1) { ?>checked="true"<?php  } ?>  onclick="$('.news').hide();$('.custm').show();"/> 发送文字消息
            </label>
            <span class='help-block'>混合消息发送方式为先发送客服消息,如果发送失败再次发送模板消息</span>
        <?php  } else { ?>
            <div class='form-control-static'>
                <?php  if($item['customertype']==0) { ?>
                发送图文消息
                <?php  } else if($item['customertype']==1) { ?>
                发送文字消息
                <?php  } ?>
            </div>
        <?php  } ?>
    </div>



    <div class="form-group news"  <?php  if(!empty($item['customertype'])) { ?>style="display:none"<?php  } ?>>>
        <div class="form-group">
            <label class="col-sm-2 control-label">推送标题</label>
            <div class="col-sm-9 col-xs-12">
                <input type="text" name="send_title" id="title" class="form-control" value="<?php  echo $item['resptitle'];?>" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">推送图片</label>
            <div class="col-sm-9 col-xs-12">
                <?php  echo tpl_form_field_image('send_thumb', $item['respthumb'])?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">推送描述</label>
            <div class="col-sm-9 col-xs-12">
                <textarea name="send_desc" class="form-control" ><?php  echo $item['respdesc'];?></textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">推送链接</label>
            <div class="col-sm-9 col-xs-12">

                <div class="input-group form-group" style="margin: 0;">
                    <input type="text" name="send_url" class="form-control" value="<?php  echo $item['respurl'];?>" id="sendurl" />
                    <span data-input="#sendurl" data-toggle="selectUrl" data-full="true" class="input-group-addon btn btn-default">选择链接</span>
                </div>
                <span class='help-block'>消息推送点击的链接，为空默认为优惠券详情</span>

            </div>
        </div>
    </div>

    <div class="form-group custm"  <?php  if(empty($item['customertype'])) { ?>style="display:none"<?php  } ?>>
        <script>
            require(['jquery','util'], function($, util){
                $(function(){
                    $('#btn').click(function(){
                        util.emojiBrowser(function(emoji){
                            var text = '[U+'+emoji[0].text+']';
                            var content = $('#content').val()+text;
                            $('#content').val(content);

                        });
                    });
                });

                $(function(){
                    util.emotion($('#emotion'), $('#content'));
                });

                $(function () {
                    $('#link').click(function () {
                        var link='<a href=\\"您要插入的链接\\">链接文字</a>';
                        var content = $('#content').val()+link;
                        $('#content').val(content);
                    });
                });
            });
        </script>>
        <label class="col-sm-2 control-label">输入文字内容</label>
        <div class="col-sm-9 col-xs-12">
            <textarea name="send_desc2" style="height: 150px;resize: none;" class="form-control" placeholder='支持<a href=""></a>标签' name="content" id="content"><?php  echo $item['resdesc2'];?></textarea>
            <div class="edit" style="width: 100%;height: 30px;border-bottom:1px solid #e5e6e7;border-left:1px solid #e5e6e7;border-right:1px solid #e5e6e7;">
                <div style="width: 30px;height: 30px;float: left;margin-left: 20px">
                    <a href="javascript:" id="btn" title="插入emoji">
                        <img src="../addons/ewei_shopv2/static/images/emoji.png" width="18px" height="18px" style="margin-top: 7px;">
                    </a>
                </div>
                <div style="width: 30px;height: 30px;float: left;margin-left: 20px">
                    <a href="javascript:" id="emotion" title="插入表情">
                        <img src="../addons/ewei_shopv2/static/images/qq.png" width="18px" height="18px" style="margin-top: 7px;">
                    </a>
                </div>
                <div style="width: 30px;height: 30px;float: left;margin-left: 20px">
                    <a href="javascript:" id="link" title="插入链接">
                        <img src="../addons/ewei_shopv2/static/images/link.png" width="18px" height="18px" style="margin-top: 7px;">
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="form-group">
    <label class="col-xs-12 col-sm-3 col-md-2 control-label" >发送类型</label>
    <div class="col-sm-9 col-xs-12">
        <label class="radio-inline"><input type="radio" name="sendlimittype" value="1"   <?php  if($item['sendlimittype'] == 1) { ?>checked="true"<?php  } ?> /> 按openid发送</label>
        <label class="radio-inline"><input type="radio" name="sendlimittype" value="2"  <?php  if($item['sendlimittype'] == 2) { ?>checked="true"<?php  } ?>  /> 指定用户发送</label>
        <label class="radio-inline"><input type="radio" name="sendlimittype" value="3"   <?php  if($item['sendlimittype'] == 3) { ?>checked="true"<?php  } ?>  /> 按用户等级发送</label>
        <label class="radio-inline"><input type="radio" name="sendlimittype" value="4"  <?php  if($item['sendlimittype'] == 4) { ?>checked="true"<?php  } ?> /> 按用户分组等级发送</label>
        <?php  if(p('commission')) { ?>
            <label class="radio-inline"><input type="radio" name="sendlimittype" value="5"   <?php  if($item['sendlimittype'] == 5) { ?>checked="true"<?php  } ?>/> 按分销商等级发送</label>
        <?php  } ?>
        <label class="radio-inline"><input type="radio" name="sendlimittype" value="6"  <?php  if($item['sendlimittype'] == 6) { ?>checked="true"<?php  } ?>/>全部发送</label>
    </div>
</div>
<div class="form-group choose choose_1"  <?php  if($item['sendlimittype'] != 1) { ?>style='display: none'<?php  } ?>>
    <label class="col-xs-12 col-sm-3 col-md-2 control-label" >会员openid</label>
    <div class="col-sm-9 col-xs-12">
        <textarea name="send_openid1" class="form-control" style="height:250px;" placeholder="请用半角逗号隔开OPENID, 如 aaa,bbb" id="value_1"><?php  echo $send_openid1;?></textarea>
    </div>
</div>

<div class="form-group choose choose_2" <?php  if($item['sendlimittype'] != 2) { ?>style='display: none'<?php  } ?>>
    <label class="col-sm-2 control-label" >选择会员</label>
    <div class="col-sm-9 col-xs-12">
        按用户发送
        <!--<textarea name="send_openid" class="form-control" style="height:250px;" placeholder="请用半角逗号隔开OPENID, 如 aaa,bbb" id="value_1"></textarea>-->
        <?php  echo tpl_selector('send_openid2',array('key'=>'openid','text'=>'nickname', 'thumb'=>'avatar','multi'=>1,'placeholder'=>'昵称/姓名/手机号','buttontext'=>'选择通知人', 'items'=>$salers,'url'=>webUrl('member/query') ))?>
        <span class='help-block'>订单生成后以模板消息的方式商家通知，可以制定多个人，如果不填写则不通知</span>
    </div>
</div>
<div class="form-group choose choose_3" <?php  if($item['sendlimittype'] != 3) { ?>style='display: none'<?php  } ?>>
    <label class="col-xs-12 col-sm-3 col-md-2 control-label" >选择会员等级</label>
    <div class="col-sm-8 col-lg-9 col-xs-12">
        <select name="send_level" class="form-control"  >
            <option value="0">全部</option>
            <?php  if(is_array($list)) { foreach($list as $type) { ?>
                <option value="<?php  echo $type['id'];?>"  <?php  if($item['send_level']==$type['id']) { ?>checked<?php  } ?>><?php  echo $type['levelname'];?></option>
            <?php  } } ?>
        </select>
    </div>
</div>
<div class="form-group choose choose_4" <?php  if($item['sendlimittype'] != 4) { ?>style='display: none'<?php  } ?>>
    <label class="col-xs-12 col-sm-3 col-md-2 control-label" >选择会员分组</label>
    <div class="col-sm-8 col-lg-9 col-xs-12">
        <select name="send_group" class="form-control"  >
            <option value="0">全部</option>
            <?php  if(is_array($list2)) { foreach($list2 as $type2) { ?>
                <option value="<?php  echo $type2['id'];?>" <?php  if($item['send_group']==$type2['id']) { ?>checked<?php  } ?>><?php  echo $type2['groupname'];?></option>
            <?php  } } ?>
        </select>
    </div>
</div>
<?php  if(p('commission')) { ?>
<div class="form-group choose choose_5" <?php  if($item['sendlimittype'] != 5) { ?>style='display: none'<?php  } ?>>
    <label class="col-xs-12 col-sm-3 col-md-2 control-label" >选择分销商等级</label>
    <div class="col-sm-8 col-lg-9 col-xs-12">
        <select name="send_agentlevel" class="form-control" >
            <option value="0">全部</option>
            <?php  if(is_array($list3)) { foreach($list3 as $type3) { ?>
            <option value="<?php  echo $type3['id'];?>" <?php  if($item['send_agentlevel']==$type3['id']) { ?>checked<?php  } ?>><?php  echo $type3['levelname'];?></option>
            <?php  } } ?>
        </select>
    </div>
</div>
<?php  } ?>
<?php if(cv('messages')) { ?>
<div class="form-group">
    <label class="col-xs-12 col-sm-3 col-md-2 control-label" ></label>
    <div class="col-sm-9 col-xs-12">
        <div class="help-block">
            <input type="submit"  value="提交" class="btn btn-primary"  />
            <input type="button" name="back" onclick='history.back()' style='margin-left:10px;' value="返回列表" class="btn btn-default" />

        </div>
    </div>
</div>
<?php  } ?>

<script>
    $(function(){
        $(':radio[name=sendlimittype]').click(function(){
            var v = $(this).val();
            $(".choose").hide();
            $(".choose_"+v).show();
        })
    })
</script>
</form>


<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
