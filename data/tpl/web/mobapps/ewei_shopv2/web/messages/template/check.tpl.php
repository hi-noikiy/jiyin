<?php defined('IN_IA') or exit('Access Denied');?><form action="" method="post" class="form-horizontal form-validate" enctype="multipart/form-data">

    <input type="hidden" name="c" value="site" />
    <input type="hidden" name="a" value="entry" />
    <input type="hidden" name="m" value="ewei_shopv2" />
    <input type="hidden" name="do" value="web" />
    <input type="hidden" name="r" value="messages.template.check" />
    <input type='hidden' name='id' value="<?php  echo $id;?>" />
    <input type='hidden' name='card_id' value="<?php  echo $card_id;?>" />

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">模板校验</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="col-sm-2 control-label">校验用户</label>
                    <div class="col-sm-9 col-xs-12">
                        <div class="form-control-static"> <?php  echo tpl_selector('check_openid',array('key'=>'openid','text'=>'nickname', 'thumb'=>'avatar','multi'=>0,'placeholder'=>'昵称/姓名/手机号','buttontext'=>'选择通知人', 'url'=>webUrl('member/query') ))?>
                        </div>
                    </div>
                </div>
            </div> <div class="modal-footer">
            <button class="btn btn-primary" type="submit">发送校验信息</button>
            <button data-dismiss="modal" class="btn btn-default" type="button">取消</button>
        </div>
        </div>
    </div>
</form>
