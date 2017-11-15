<?php defined('IN_IA') or exit('Access Denied');?><?php  if($article_sys['article_temp']==0) { ?>
	<?php  if($page==1) { ?>
		<div class="topimg">
			<img src="<?php  echo $article_sys['article_image'];?>" />
		</div>
	<?php  } ?>
	<?php  if(is_array($articles)) { foreach($articles as $article) { ?>
		<div class="list-number">
			<a class="fui-list " href="<?php  echo mobileUrl('article',array('aid'=>$article['id']))?>">
				<?php  if(!empty($article['resp_img'])) { ?>
					<div class="fui-list-media">
						<img class="round" src="<?php  echo tomedia($article['resp_img'])?>"/>
					</div>
				<?php  } ?>
				<div class="fui-list-inner">
					<div class="title"><?php  echo $article['article_title'];?></div>
					<div class="subtitle"><?php  echo $article['resp_desc'];?></div>
						<?php  if($article['article_rule_money']>0 || !empty($article['article_rule_credit'])) { ?>
							<div class="subtitle">  
								<span class="fui-label fui-label-danger">
									<?php  if($article['article_rule_money']>0) { ?>
										<?php  echo $article['article_rule_money'];?>元<?php  echo $_W['shopset']['trade']['moneytext'];?>
									<?php  } ?>
									<?php  if(!empty($article['article_rule_credit'])) { ?>
										<?php  echo $article['article_rule_credit'];?>个<?php  echo $_W['shopset']['trade']['credittext'];?>
									<?php  } ?>
								</span>
							</div>
						<?php  } ?>
				</div>
				<div class="fui-list-angle">
					<div class="angle"></div>
				</div>
			</a>
		</div>
	<?php  } } ?>

<?php  } else if($article_sys['article_temp']==1) { ?>

	<?php  if(is_array($articles)) { foreach($articles as $k => $v) { ?>
		<div class="list-number">
			<?php  if(count($v['articles'])==1) { ?>
				<a href="<?php  echo mobileUrl('article',array('aid'=>$v['articles'][0]['id']))?>" class="">
					<div class="fui-card">
						<div class="fui-card-title">
							<span class="title"><?php  echo $v['articles'][0]['article_title'];?></span>
							<span class="subtitle"><?php  echo $k;?></span>
						</div>
						<?php  if(!empty($v['articles'][0]['resp_img'])) { ?>
							<div class="fui-card-image">
								<img src="<?php  echo tomedia($v['articles'][0]['resp_img'])?>">
							</div>
						<?php  } ?>
						<div class="fui-card-content"><?php  echo $v['articles'][0]['resp_desc'];?></div>
						<div class="fui-card-footer">
							<span class="text">点击查看详情</span>
							<span class="remark"></span>
						</div>
					</div>
				</a>
			<?php  } else { ?>
				<div class="fui-card fui-card-list">
					<?php  if(is_array($v['articles'])) { foreach($v['articles'] as $index => $vv) { ?>
						<?php  if($index==0) { ?>
							<a href="<?php  echo mobileUrl('article',array('aid'=>$vv['id']))?>" class="">
								<div class="fui-card-info">
									<div class="image">
										<img src="<?php  echo tomedia($vv['resp_img'])?>" />
									</div>
									<div class="text">
										<span class="subtitle"><?php  echo $k;?></span>
									</div> 
								</div>
								<div class="fui-card-first">
									<div class="image">
										<img src="<?php  echo tomedia($vv['resp_img'])?>" />
										<div class="text"><?php  echo $vv['article_title'];?></div>
									</div>
								</div>
							</a>
						<?php  } else { ?>
							<a href="<?php  echo mobileUrl('article',array('aid'=>$vv['id']))?>" class="">
								<div class="fui-card-item">
									<img src="<?php  echo tomedia($vv['resp_img'])?>" />
									<div class="text"><?php  echo $vv['article_title'];?></div>
								</div>
							</a>
						<?php  } ?>
					<?php  } } ?>
				 </div>
			<?php  } ?>
		</div>
	<?php  } } ?>

<?php  } else if($article_sys['article_temp']==2) { ?>
	<?php  if(is_array($articles)) { foreach($articles as $article) { ?>
		<div class="list-number">
				<a class="fui-list " href="<?php  echo mobileUrl('article',array('aid'=>$article['id']))?>">
					<div class="fui-list-media">
						<img class="round" src="<?php  echo tomedia($article['resp_img'])?>">
					</div>
					<div class="fui-list-inner">
						<div class="title"><?php  echo $article['article_title'];?></div>
						<div class="text"><?php  echo $article['resp_desc'];?></div>
					</div>
					<div class="fui-list-angle">
						<div class="angle"></div>
					</div>
				</a>
		</div>
	<?php  } } ?>
<?php  } ?>
