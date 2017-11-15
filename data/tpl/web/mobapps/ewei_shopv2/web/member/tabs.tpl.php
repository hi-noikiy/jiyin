<?php defined('IN_IA') or exit('Access Denied');?><ul class="menu-head-top">
    <li <?php  if($_W['action']=='member') { ?> class="active" <?php  } ?>><a href="<?php  echo webUrl('member')?>">会员概述 <i class="fa fa-caret-right"></i></a></li>
</ul>

<?php if(cv('member.list|member.level|member.group')) { ?>
<div class='menu-header'>会员</div>
<ul>
	<?php if(cv('member.list')) { ?>
    	<li <?php  if($_W['action']=='member.list') { ?> class="active" <?php  } ?>><a href="<?php  echo webUrl('member/list')?>">会员管理</a></li>
    <?php  } ?>
    <?php if(cv('member.group')) { ?>
    	<li <?php  if($_W['action']=='member.group') { ?> class="active" <?php  } ?>><a href="<?php  echo webUrl('member/group')?>">会员分组</a></li>
    <?php  } ?>
	<?php if(cv('member.list')) { ?>
    	<li  style="display: none;" <?php  if($_W['action']=='member.otherlist') { ?> class="active" <?php  } ?>><a href="<?php  echo webUrl('member/otherlist')?>">第三方数据</a></li>
    <?php  } ?>    
</ul>
<?php  } ?>
<?php if(cv('member.rank')) { ?>

<?php  } ?>