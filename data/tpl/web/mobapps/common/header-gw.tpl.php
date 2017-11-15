<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header-base', TEMPLATE_INCLUDEPATH)) : (include template('common/header-base', TEMPLATE_INCLUDEPATH));?>
<section id="container" class="">    
    <!--header start-->
      <header class="header white-bg">
            <div class="sidebar-toggle-box">
                <div data-original-title="Toggle Navigation" data-placement="right" class="fa fa-reorder tooltips icon-reorder"></div>
            </div>
            <!--logo start-->
            <a href="<?php  echo url('home/welcome/platform');?>" class="logo">微信分销</a>
            <!--logo end-->            
            <div class="top-nav ">
                <!--user info start-->
                <ul class="nav pull-right top-menu">
                   
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <?php  if($_W['role'] != 'operator') { ?>
                            <img class="avatar" width="29" height="29" src="<?php  echo tomedia('headimg_'.$_W['account']['acid'].'.jpg')?>?time=<?php  echo time()?>" onerror="this.src='resource/images/gw-wx.gif'" alt="<?php  echo $_W['account']['name'];?>">
                                <?php  } ?>  
                            <span class="username"><?php  echo $_W['user']['username'];?> (<?php  if($_W['role'] == 'founder') { ?>系统管理员<?php  } else if($_W['role'] == 'manager') { ?>公众号管理员<?php  } else { ?>公众号操作员<?php  } ?>)</span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li><a href="<?php  echo url('user/profile/profile');?>"><i class="fa fa-suitcase"></i>我的账号</a></li>
                            <?php  if($_W['role'] == 'founder') { ?>
                            <li><a href="<?php  echo url('system/welcome');?>"><i class="fa fa-cog"></i> 系统选项</a></li>
                            <li><a href="<?php  echo url('system/welcome');?>"><i class="fa fa-cog"></i> 自动更新</a></li>
                            <li><a href="<?php  echo url('system/updatecache');?>"><i class="fa fa-refresh"></i> 更新缓存</a></li>
                            <?php  } ?>
                            <li><a href="<?php  echo url('user/logout');?>"><i class="fa fa-key"></i> 退出系统</a></li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!--user info end-->
            </div> 
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                <ul class="nav top-menu">
                    <!-- settings start -->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="fa fa-user"></i>                            
                        </a>
                        <ul class="dropdown-menu extended tasks-bar">
                            <div class="notify-arrow notify-arrow-green"></div>
                            <li>
                                <p class="green">公众号名称：<?php  echo $_W['account']['name'];?> </p>
                            </li>
                            <?php  if($_W['role'] != 'operator') { ?>
						<li><a href="<?php  echo url('account/post', array('uniacid' => $_W['uniacid']));?>" target="_blank"><i class="fa fa-weixin fa-fw"></i> 编辑当前账号资料</a></li>
						<?php  } ?>
						<li><a href="<?php  echo url('account/display');?>" target="_blank"><i class="fa fa-cogs fa-fw"></i> 管理其它公众号</a></li>
						<li><a href="<?php  echo url('utility/emulator');?>" target="_blank"><i class="fa fa-mobile fa-fw"></i> 模拟测试</a></li>
                            
                        </ul>
                    </li>
                    <!-- settings end -->
                    <!-- notification dropdown start-->
                    <li id="header_notification_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                            <i class="fa fa-bell"></i>
                            <span class="badge bg-warning" id="notice-total">0</span>
                        </a>
                        <ul class="dropdown-menu extended notification">
                            <div class="notify-arrow notify-arrow-yellow"></div>
                            <li>
                                <p class="yellow">系统公告</p>
                            </li>
                            <li>
                               <ul id="notice-container">
                            
                               </ul>
                            </li>
                            
                            <li>
                                <a href="<?php  echo url('article/notice-show/list');?>" class="pull-right">更多公告>></a>
                            </li>
                            
                        </ul>
                    </li>
                    <!-- notification dropdown end -->
                </ul>
                <!--  notification end -->
            </div>           
        </header>
      <!--header end-->
    
    <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
             <!-- sidebar menu start-->              
              <ul class="sidebar-menu">
                <li class="active"><a href="./?refresh"><i class="fa fa-cogs"></i>系统管理</a></li>
				<li><a href="<?php  echo url('home/welcome/platform');?>" target="_blank"><i class="fa fa-share"></i>继续管理公众号（<?php  echo $_W['account']['name'];?>）</a></li>
			</ul>
              <!-- sidebar menu end-->             
              
               </div>
      </aside>
      <!--sidebar end-->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!--state overview start-->
    
    
	<div>
		<?php  if(defined('IN_MESSAGE')) { ?>
		<div class="jumbotron clearfix alert alert-<?php  echo $label;?>">
			<div class="row">
				<div class="col-xs-12 col-sm-3 col-lg-2">
					<i class="fa fa-5x fa-<?php  if($label=='success') { ?>check-circle<?php  } ?><?php  if($label=='danger') { ?>times-circle<?php  } ?><?php  if($label=='info') { ?>info-circle<?php  } ?><?php  if($label=='warning') { ?>exclamation-triangle<?php  } ?>"></i>
				</div>
				<div class="col-xs-12 col-sm-8 col-md-9 col-lg-10">
					<?php  if(is_array($msg)) { ?>
						<h2>MYSQL 错误：</h2>
						<p><?php  echo cutstr($msg['sql'], 300, 1);?></p>
						<p><b><?php  echo $msg['error']['0'];?> <?php  echo $msg['error']['1'];?>：</b><?php  echo $msg['error']['2'];?></p>
					<?php  } else { ?>
					<h2><?php  echo $caption;?></h2>
					<p><?php  echo $msg;?></p>
					<?php  } ?>
					<?php  if($redirect) { ?>
					<p><a href="<?php  echo $redirect;?>">如果你的浏览器没有自动跳转，请点击此链接</a></p>
					<script type="text/javascript">
						setTimeout(function () {
							location.href = "<?php  echo $redirect;?>";
						}, 3000);
					</script>
					<?php  } else { ?>
						<p>[<a href="javascript:history.go(-1);">点击这里返回上一页</a>] &nbsp; [<a href="./?refresh">首页</a>]</p>
					<?php  } ?>
				</div>
			<?php  } else { ?>
			<div class="well">
		<?php  } ?>
<script>
	var h = document.documentElement.clientHeight;
	$(".gw-container").css('min-height',h);
</script>