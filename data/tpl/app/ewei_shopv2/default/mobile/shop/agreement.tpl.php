<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
		<style type="text/css">
			.page {background-color: #fff; font-size: 0.24rem;}
			.agree-wrap h1 { margin: 0.2rem 0; text-align: center; font-size: 0.3rem; font-weight: 700; } .agree-wrap { padding-bottom: 0.6rem; line-height: 0.44rem; } .desc { margin-bottom: 0.2rem; } h2 { font-weight: 700; } .wrap h2 { margin: 0.2rem 0; } .wrap p { text-indent: -0.24rem; padding-left: 0.22rem; }
		</style>

			<div class="content">
				<div class="content-pad agree-wrap">
						<?php  echo $wapset['book'];?>
				</div>
			</div>
		</div>


		<script src="../addons/ewei_shopv2/static/jiyin/js/leftmenu.js"></script>
	</body>

</html>