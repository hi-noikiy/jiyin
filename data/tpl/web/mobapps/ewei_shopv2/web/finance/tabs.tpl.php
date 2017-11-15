<?php defined('IN_IA') or exit('Access Denied');?><?php if(cv('finance.log.recharge|finance.log.withdraw|finance.downloadbill')) { ?>
<div class='menu-header'>财务</div>
<ul>
    <?php if(cv('finance.log.recharge')) { ?><li <?php  if($_W['routes']=='finance.log.recharge') { ?> class="active" <?php  } ?>><a href="<?php  echo webUrl('finance/log/recharge')?>">充值记录</a></li><?php  } ?>
    <?php if(cv('finance.log.withdraw')) { ?><li <?php  if($_W['routes']=='finance.log.withdraw') { ?> class="active" <?php  } ?>><a href="<?php  echo webUrl('finance/log/withdraw')?>">提现申请</a></li><?php  } ?>
    <?php if(cv('finance.downloadbill')) { ?><li <?php  if($_W['routes'] == 'finance.downloadbill' ) { ?> class="active" <?php  } ?>><a href="<?php  echo webUrl('finance/downloadbill')?>">下载对账单</a></li><?php  } ?>
</ul>
<?php  } ?>


