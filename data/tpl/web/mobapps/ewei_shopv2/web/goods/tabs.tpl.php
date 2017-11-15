<?php defined('IN_IA') or exit('Access Denied');?><style type='text/css'>
	.goods-list a {
		position: relative; 
	}
	.goods-list span  {
	float:right;margin-right:20px;
	 
	}
</style>

<?php  $totals = m('goods')->getTotals()?>
<?php if(cv('goods')) { ?>
<div class='menu-header'>商品管理</div>
<ul class='goods-list'>
    <li <?php  if($_GPC['goodsfrom'] == 'num1') { ?> class="active" <?php  } ?>><a href="<?php  echo webUrl('goods',array('goodsfrom'=>'num1'))?>">正常上线</a></li>
    <li <?php  if($_GPC['goodsfrom'] == 'num2') { ?> class="active" <?php  } ?>><a href="<?php  echo webUrl('goods',array('goodsfrom'=>'num2'))?>">即将上线</a></li>
    <li <?php  if($_GPC['goodsfrom'] == 'num3') { ?> class="active" <?php  } ?>><a href="<?php  echo webUrl('goods',array('goodsfrom'=>'num3'))?>">已经下线</a></li>
    <li <?php  if($_GPC['goodsfrom'] == 'num4') { ?> class="active" <?php  } ?>><a href="<?php  echo webUrl('goods',array('goodsfrom'=>'num4'))?>">已经售罄</a></li>
    <li <?php  if($_GPC['goodsfrom'] == 'num5') { ?> class="active" <?php  } ?>><a href="<?php  echo webUrl('goods',array('goodsfrom'=>'num5'))?>">其他</a></li>    
</ul>
<?php  } ?>


<?php  if(com('virtual')) { ?>
<?php if(cv('goods.virtual.temp|goods.virtual.category|goods.virtual.data')) { ?>

<?php  } ?>
<?php  } ?>

  