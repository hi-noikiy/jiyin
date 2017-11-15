<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php 
 global $_W;
$uniacid = empty($uniacid) ? $_W['uniacid'] : 0;
$accounttype = 
     pdo_fetch("SELECT * FROM " . tablename('account_wechats') . " WHERE uniacid = :uniacid ", array(':uniacid' => $uniacid));
$isconnect = 
     pdo_fetch("SELECT * FROM " . tablename('account') . " WHERE uniacid = :uniacid ", array(':uniacid' => $uniacid));
$num = pdo_fetchcolumn('SELECT COUNT(fanid) FROM '.tablename('mc_mapping_fans').' WHERE uniacid=:uniacid AND follow=1', array(':uniacid'=> $_W['uniacid']));
	$fansnum = intval($num);
if ( pdo_tableexists('stat_fans'))
{ $today_stat = pdo_get('stat_fans', array('date' => date('Ymd'), 'uniacid' => $_W['uniacid']));
$today_add_num = intval($today_stat['new']); //今日新增
$today_cancel_num = intval($today_stat['cancel']);//今日取消
$today_jing_num = $today_add_num - $today_cancel_num;//今日净增
} else {

$today_add_num = pdo_fetchcolumn('SELECT COUNT(*) FROM ' . tablename('mc_mapping_fans') . ' WHERE acid = :acid AND uniacid = :uniacid AND follow = :follow AND followtime >= :starttime AND followtime <= :endtime', array(':acid' => $_W['acid'], ':uniacid' => $_W['uniacid'], ':starttime' => strtotime(date('Y-m-d')), ':endtime' => TIMESTAMP, ':follow' => 1));
$today_cancel_num = pdo_fetchcolumn('SELECT COUNT(*) FROM ' . tablename('mc_mapping_fans') . ' WHERE acid = :acid AND uniacid = :uniacid AND follow = :follow AND unfollowtime >= :starttime AND unfollowtime <= :endtime', array(':acid' => $_W['acid'], ':uniacid' => $_W['uniacid'], ':starttime' => strtotime(date('Y-m-d')), ':endtime' => TIMESTAMP, ':follow' => 0));
$today_jing_num = $today_add_num - $today_cancel_num;
	
}

$percent =  round(($today_jing_num/$fansnum)*100,2); //新增百分比

$starttime1 = strtotime(date("Y-m-d",time()));
$endtime1 = $starttime1 + 3600*24;
$chatnum = pdo_fetchcolumn("SELECT COUNT(id) FROM ".tablename('stat_msg_history')." WHERE uniacid = :uniacid AND createtime >= :starttime1 AND createtime < :endtime1 and type='text'" , array(':uniacid'=> $_W['uniacid'],':starttime1'=>$starttime1,':endtime1'=>$endtime1));
?>
<div class="row state-overview" style="margin-left:-15px;margin-right:-15px; margin-top:15px;">
  <div class="col-lg-3 col-sm-6">
    <section class="panel"> <a href="<?php  echo url('account/post', array('uniacid' => $_W['uniacid']));?>">
      <div class="symbol blue"><img class="avater_img" style="border-radius:50%; border: 5px solid rgba(256,256,256,0.3);" width="80" height="80" src="<?php  echo tomedia('headimg_'.$_W['account']['acid'].'.jpg')?>?time=<?php  echo time()?>" onerror="this.src='resource/images/gw-wx.gif'"></div>
      <div class="value">
        <h1> 
          <?php 
        $h=date('G');
        if ($h<6) echo '<span style="font-size:18px;">夜深了,注意身体哦</span>';
        else if ($h<9) echo '早上好';
        else if ($h<11) echo '上午好';
        else if ($h<14) echo '中午好';
        else if ($h<16) echo '下午好';
        else if ($h<18) echo '傍晚好';
        else echo '晚上好';
        ?>
        </h1>
        <p><?php  if($isconnect['isconnect'] == 1 ) { ?> <i class="verify_icon" title="已接入"></i> <?php  } else { ?> <i class="no_verify_icon" title="未接入"></i> <?php  } ?>
        <p class="cuman"> <?php  if($accounttype['level'] == 1) { ?>普通订阅号<?php  } ?>
          <?php  if($accounttype['level'] == 2) { ?>普通服务号<?php  } ?>
          <?php  if($accounttype['level'] == 3) { ?>认证订阅号<?php  } ?>
          <?php  if($accounttype['level'] == 4) { ?>认证服务号<?php  } ?> </p>
        </p>
      </div>
      </a> </section>
  </div>
  <div class="col-lg-3 col-sm-6">
    <section class="panel"> <a href="<?php  echo url('mc/fans')?>">
      <div class="symbol terques"> <i class="fa fa-user"></i> </div>
      <div class="value">
        <h1><?php  echo $fansnum;?><span style="font-size:12px;"><?php  if($today_jing_num  >= 0 ) { ?><span>+</span><?php  } ?> <?php  if($today_jing_num  < 0 ) { ?><span>-</span><?php  } ?> <?php  echo abs($percent);?>%</span></h1>
        <p>总粉丝数</p>
      </div>
      </a> </section>
  </div>
  <div class="col-lg-3 col-sm-6">
    <section class="panel"> <a href="<?php  echo url('account/summary/', array('acid' => $_W['acid'], 'uniacid' => $_W['uniacid']));?>" >
      <div class="symbol red"> <i class="fa fa-user"></i> </div>
      <div class="value">
        <h1> <?php  if($today_jing_num  < 0 ) { ?> <span >-</span><?php  } ?> <?php  if($today_jing_num  >= 0 ) { ?> <span>+</span> <?php  } ?> </span> <span id="numAnimateFans" class="numAnimate"><?php  echo abs($today_jing_num);?></span></h1>
        <p>净增粉丝</p>
      </div>
      </a> </section>
  </div>
  <div class="col-lg-3 col-sm-6">
    <section class="panel"> <a href="<?php  echo url('platform/stat/history')?>">
      <div class="symbol yellow"> <i class="fa fa-bell"></i> </div>
      <div class="value">
        <h1><?php  echo $chatnum;?></h1>
        <p>消息</p>
      </div>
      </a> </section>
  </div>
</div>
<div class="clearfix welcome-container">
 <?php  if($do != 'ext') { ?>
  <div class="page-header">
    <h4><i class="fa fa-plane"></i> 快捷操作</h4>
  </div>
  <div class="shortcut clearfix" style="background:#fff; padding:10px; border-radius:5px;"> <a href="<?php  echo url('platform/reply', array('m' => 'userapi'))?>"> <i class="fa fa-sitemap"></i> <span>自定义接口</span> </a> <?php  if(is_array($shortcuts)) { foreach($shortcuts as $shortcut) { ?> <a href="<?php  echo $shortcut['link'];?>" title="<?php  echo $shortcut['title'];?>"> <img src="<?php  echo $shortcut['image'];?>" alt="<?php  echo $shortcut['title'];?>" class="img-rounded" /> <span><?php  echo $shortcut['title'];?></span> </a> <?php  } } ?> </div>
  <?php  } ?>
  
  <?php  if($do == 'platform') { ?>
  
  <?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('home/welcome-platform', TEMPLATE_INCLUDEPATH)) : (include template('home/welcome-platform', TEMPLATE_INCLUDEPATH));?>
  
  <?php  } ?>
  
  <?php  if($do == 'site') { ?>
  
  <?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('home/welcome-site', TEMPLATE_INCLUDEPATH)) : (include template('home/welcome-site', TEMPLATE_INCLUDEPATH));?>
  
  <?php  } ?>
  
  <?php  if($do == 'mc') { ?>
  
  <?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('home/welcome-mc', TEMPLATE_INCLUDEPATH)) : (include template('home/welcome-mc', TEMPLATE_INCLUDEPATH));?>
  
  <?php  } ?>
  
  <?php  if($do == 'setting') { ?>
  
  <?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('home/welcome-setting', TEMPLATE_INCLUDEPATH)) : (include template('home/welcome-setting', TEMPLATE_INCLUDEPATH));?>
  
  <?php  } ?>
  
  <?php  if($do == 'ext') { ?>
  
  <?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('home/welcome-ext', TEMPLATE_INCLUDEPATH)) : (include template('home/welcome-ext', TEMPLATE_INCLUDEPATH));?>
  
  <?php  } ?>
  
  <?php  if($do == 'solution') { ?>
  
  <?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('home/welcome-solution', TEMPLATE_INCLUDEPATH)) : (include template('home/welcome-solution', TEMPLATE_INCLUDEPATH));?>
  
  <?php  } ?> </div>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?> 