<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<div class="page-heading">
	<span class='pull-right'>
		<a class="btn btn-default  btn-sm" href="<?php  echo webUrl('sysset.tmessage')?>">返回列表</a>
	</span>
    <h2>模板消息设置 </h2>

</div>
<ul class="nav nav-arrow-next nav-tabs" id="settingTab">
    <li class="active"><a href="#tab_base">基础设置</a></li>
    <li ><a href="#tab_customnotice">客服消息设置</a></li>
    <li ><a href="#tab_setting">模板消息设置</a></li>
</ul>

<form <?php if( ce('sysset.tmessage' ,$list) ) { ?>action="" method="post"<?php  } ?> class="form-horizontal form-validate" enctype="multipart/form-data">

    <div class="tab-content">
        <div class="tab-pane active" id="tab_base"  ><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('sysset/tmessage/post/base', TEMPLATE_INCLUDEPATH)) : (include template('sysset/tmessage/post/base', TEMPLATE_INCLUDEPATH));?>
        </div>
        <div class="tab-pane" id="tab_customnotice"  ><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('sysset/tmessage/post/customnotice', TEMPLATE_INCLUDEPATH)) : (include template('sysset/tmessage/post/customnotice', TEMPLATE_INCLUDEPATH));?>
        </div>
        <div class="tab-pane" id="tab_setting"  ><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('sysset/tmessage/post/templatenotice', TEMPLATE_INCLUDEPATH)) : (include template('sysset/tmessage/post/templatenotice', TEMPLATE_INCLUDEPATH));?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label" ></label>
        <div class="col-sm-9 col-xs-12">
            <div class="help-block">
                <button class="btn btn-primary" type="submit">提交</button>
            </div>
        </div>
    </div>
</form>

<script>

    var types =<?php  echo $type_json;?>;


    $("#typegroup").change(function(){

        $("#typecode").html("");
        for(var type  in types){
            if($(this).val()==types[type].typegroup)
            {
                $("#typecode").append( "<option value='"+types[type].typecode+"' >"+types[type].name+"</option>" );
            }

        }
    });

    require(['bootstrap'],function(){
        $('#settingTab a').click(function (e) {
            e.preventDefault();
            $('#tab').val( $(this).attr('href'));
            $(this).tab('show');
        })
    });

    $(function () {
        require(['jquery.caret'],function(){
            var jiaodian;
            $(document).on('focus', 'input,textarea',function () {
                jiaodian = this;
            });

            $("a[href='JavaScript:']").click(function () {
                if (jiaodian) {
                    $(jiaodian).insertAtCaret("["+this.innerText+"]" );
                }
            })

        })
    })

    $('form').submit(function(){

        if($('#title').val()=='')
        {
            $('#settingTab a[href=#tab_base]').tab('show');
            tip.msgbox.err('请填写模板名称!');
            $('form').attr('stop',1);
            return false;
        }


        var messagetype = $('.messagetype:checked').val();

        if(messagetype==0||messagetype==2)
        {
            if($('#send_desc').val()=='')
            {
                $('#settingTab a[href=#tab_base]').tab('show');
                tip.msgbox.err('请填写客服消息!');
                $('form').attr('stop',1);
                return false;
            }
        }

        if(messagetype==0||messagetype==1)
        {
            if($('.key_item').length<=0){
                tip.msgbox.err('请添加一条键!');
                $('#settingTab a[href=#tab_setting]').tab('show');
                $('form').attr('stop',1);
                return false;
            }

            var checkkw = true;
            $(":input[name='tp_kw[]']").each(function(){
                if ( $.trim( $(this).val() ) ==''){
                    checkkw = false;
                    tip.msgbox.err('请输入键名!');
                    $(this).focus();
                    $('form').attr('stop',1);
                    return false;
                }
            });
            if( !checkkw){
                return false;
            }
        }


        $('form').removeAttr('stop');
        return true;
    });
</script>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>