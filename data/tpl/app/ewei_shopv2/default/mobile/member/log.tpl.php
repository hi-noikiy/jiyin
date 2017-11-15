<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<div class='fui-page  fui-page-current member-log-page'>
    <div class="fui-header">
        <div class="fui-header-left">
            <a class="back"></a>
        </div>
        <div class="title"><?php  if($_W['shopset']['trade']['withdraw']) { ?><?php  echo $_W['shopset']['trade']['moneytext'];?>明细<?php  } else { ?>充值记录<?php  } ?></div>
    </div>

    <div class='fui-content navbar' >

        <?php  if($_W['shopset']['trade']['withdraw']) { ?>
        <div id="tab" class="fui-tab fui-tab-danger">
            <a data-tab="tab1"  class="external <?php  if($_GPC['type']==0) { ?>active<?php  } ?>" data-type='0'>获得记录</a>
            <a data-tab="tab2" class='external <?php  if($_GPC['type']==1) { ?>active<?php  } ?>'  data-type='1'>提现记录</a>
        </div>
        <?php  } ?>


        <div class='content-empty' style='display:none;'>
            <i class='icon icon-searchlist'></i><br/>暂时没有任何记录!
        </div>

        <div class='fui-list-group container' style="display:none;"></div>
        <div class='infinite-loading'><span class='fui-preloader'></span><span class='text'> 正在加载...</span></div>
    </div>

    <script id="tpl_member_log_list" type="text/html">

        <%each list as log%>
        <div class="fui-list goods-item">

            <div class="fui-list-inner">
                <div class='title'>   <%if log.type==0%>金额: <%/if%>
                    <%if log.type==1%>提现金额: <%/if%>
                    <%if log.type==2%>佣金打款: <%/if%>
                    <%log.money%> 元 --<%log.remark%>

                </div>
                <div class='text'> <%if log.type==1%>(提现方式:<%log.typestr%>,实际<%if log.status==1%>到账<%else%>金额<%/if%>:<%if log.deductionmoney>0%><%log.realmoney%><%else%><%log.money%><%/if%>元,手续费:<%log.deductionmoney%> 元)
                    <%/if%></div>
                <div class='text'><%log.createtime%></div>
            </div>
            <div class='fui-list-angle'>
                <%if log.status==0%>
                <span class='fui-label fui-label-default'><%if log.type==0%>未充值<%else%>申请中<%/if%></span>
                <%/if%>
                <%if log.status==1%>
                <span  class='fui-label fui-label-success'>成功</span>
                <%/if%>
                <%if log.status==-1%>
                <span  class='fui-label fui-label-danger'><%if log.type==1%>失败<%/if%></span>
                <%/if%>
                <%if log.status==3%>
                <span  class='fui-label fui-label-warning'><%if log.type==0%>退款<%/if%></span>
                <%/if%>

            </div>

        </div>
        <%/each%>
    </script>

    <script language='javascript'>require(['biz/member/log'], function (modal) {
        modal.init({type:"<?php  echo $_GPC['type'];?>"});
    });</script>

</div>