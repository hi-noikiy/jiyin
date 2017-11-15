<?php defined('IN_IA') or exit('Access Denied');?>
<ul class="menu-head-top">
    <li <?php  if($_W['controller']=='shop') { ?> class="active" <?php  } ?>><a href="<?php  echo webUrl('shop')?>">商城概述 <i class="fa fa-caret-right"></i></a></li>
</ul>


<?php if(cv('shop.adv|shop.nav|shop.banner|shop.sort')) { ?>
<div class='menu-header'  style="display: none;">首页</div>
<ul>
    <?php if(cv('shop.adv')) { ?><li <?php  if($_W['action'] == 'shop.adv') { ?> class="active" <?php  } ?>  style="display: none;"><a href="<?php  echo webUrl('shop/adv')?>">幻灯片</a></li><?php  } ?>
    <?php if(cv('shop.nav')) { ?><li <?php  if($_W['action'] == 'shop.nav') { ?> class="active" <?php  } ?>  style="display: none;"><a href="<?php  echo webUrl('shop/nav')?>">导航图标</a></li><?php  } ?>
    <?php if(cv('shop.banner')) { ?><li <?php  if($_W['action'] == 'shop.banner') { ?> class="active" <?php  } ?> style="display: none;" ><a href="<?php  echo webUrl('shop/banner')?>">广告</a></li><?php  } ?>
    <?php if(cv('shop.sort')) { ?><li <?php  if($_W['action'] == 'shop.sort') { ?> class="active" <?php  } ?> style="display: none;"><a href="<?php  echo webUrl('shop/sort')?>">排版设置</a></li><?php  } ?>  
</ul>
<?php  } ?>

<?php if(cv('shop.dispatch|shop.notice|shop.comment|shop.refundaddress')) { ?>
<div class='menu-header'>商城</div>
<ul>
    <?php if(cv('shop.dispatch')) { ?><li <?php  if($_W['action']== 'shop.dispatch') { ?> class="active" <?php  } ?>><a href="<?php  echo webUrl('shop/dispatch')?>">配送方式</a></li><?php  } ?>
    <?php if(cv('shop.notice')) { ?><li <?php  if($_W['action'] == 'shop.notice') { ?> class="active" <?php  } ?>><a href="<?php  echo webUrl('shop/notice')?>">公告管理</a></li><?php  } ?>
    <?php if(cv('shop.comment')) { ?><li <?php  if($_W['action'] == 'shop.comment') { ?> class="active" <?php  } ?>><a href="<?php  echo webUrl('shop/comment')?>">评价管理</a></li><?php  } ?>
    <?php if(cv('shop.refundaddress')) { ?><li <?php  if($_W['action'] == 'shop.refundaddress') { ?> class="active" <?php  } ?>><a href="<?php  echo webUrl('shop/refundaddress')?>">退货地址管理</a></li><?php  } ?>
</ul>
 <?php  } ?>
