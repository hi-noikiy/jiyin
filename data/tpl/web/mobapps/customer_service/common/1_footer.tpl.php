<?php defined('IN_IA') or exit('Access Denied');?>			</div>
		</div>
	</div>
    
    
          </section>
      </section>
      <!--main content end-->
	<script>
		function subscribe(){
			$.post("<?php  echo url('utility/subscribe');?>", function(){
				setTimeout(subscribe, 5000);
			});
		}
		function sync() {
			$.post("<?php  echo url('utility/sync');?>", function(){
				setTimeout(sync, 60000);
			});
		}
		$(function(){
			subscribe();
			sync();
		});
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
	<!--折翼天使资源社区源码社区www.zheyitianshi.com-->
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer-base', TEMPLATE_INCLUDEPATH)) : (include template('common/footer-base', TEMPLATE_INCLUDEPATH));?>
