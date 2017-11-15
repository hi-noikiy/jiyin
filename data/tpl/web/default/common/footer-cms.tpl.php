<?php defined('IN_IA') or exit('Access Denied');?>		</div>
		<script type="text/javascript">
			require(['bootstrap']);
			<?php  if($_W['uid']) { ?>
				function checknotice() {
					$.post("<?php  echo url('utility/notice')?>", {}, function(data){
						var data = $.parseJSON(data);
						$('#notice-container').html(data.notices);
						$('#notice-total').html(data.total);
						if(data.total > 0) {
							$('#notice-total').css('background', '#ff9900');
						} else {
							$('#notice-total').css('background', '');
						}
						setTimeout(checknotice, 60000);
					});
				}
				checknotice();
			<?php  } ?>
		</script>
		<div class="container-fluid footer" role="footer">
			<div class="page-header"></div>
			<span class="pull-left">
				<p><?php  if(empty($_W['setting']['copyright']['footerleft'])) { ?><?php  } else { ?><?php  echo $_W['setting']['copyright']['footerleft'];?><?php  } ?><?php  if(!empty($_W['setting']['copyright']['statcode'])) { ?><?php  echo $_W['setting']['copyright']['statcode'];?><?php  } ?></p>
			</span>
			<span class="pull-right">
				<p><?php  if(empty($_W['setting']['copyright']['footerright'])) { ?><?php  } else { ?><?php  echo $_W['setting']['copyright']['footerright'];?><?php  } ?></p>
			</span>
		</div>
		<?php  if(!empty($_W['setting']['copyright']['statcode'])) { ?><?php  echo $_W['setting']['copyright']['statcode'];?><?php  } ?>
	</body>
</html>
