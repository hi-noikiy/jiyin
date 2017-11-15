<?php

if (!defined('IN_IA')) {
	exit('Access Denied');
}

class Index_EweiShopV2Page extends ComWebPage
{
	public function __construct($_com = 'sms')
	{
		parent::__construct($_com);
	}

	public function main()
	{
		global $_W;
		global $_GPC;
		
		
		$list=pdo_getall('ewei_shop_creatediylink');
		foreach ($list as $key => $value) {
			$list[$key]['diymenulink']=	$_W['siteroot'] .'app/index.php?i=1&c=entry&m=ewei_shopv2&do=mobile&appid='.$value[id];				
		}
		
		
		include $this->template();
	}

	public function insert()
	{
		global $_W;
		global $_GPC;
		
		
		if($_GPC['action']=='ok'){
			$data=array(
			'name'=>$_GPC['name'],
			'link'=>$_GPC['link'],
			'addtime'=>time()
			);
			
			if($data['name']==''){
				message('请返回填写应用名称',Null, 'error');					
			}
			if($data['link']==''){
				message('请返回填写应用链接',Null, 'error');				
			}
			
			pdo_insert('ewei_shop_creatediylink',$data);
			
			message('创建成功!',webUrl('sysset/createlink'),'success');			
		}


		include $this->template();
	}


	public function delete()
	{
		global $_W;
		global $_GPC;
		$id = intval($_GPC['id']);

		if (empty($id)) {
			$id = ((is_array($_GPC['ids']) ? implode(',', $_GPC['ids']) : 0));
		}


		if (empty($id)) {
			show_json(0, '参数错误，请刷新重试！');
		}


		$items = pdo_fetchall('SELECT id FROM ' . tablename('ewei_shop_creatediylink') . ' WHERE id in( ' . $id . ' )');

		if (!empty($items)) {
			foreach ($items as $item ) {
				pdo_delete('ewei_shop_creatediylink', array('id' => $item['id']));
				
			}
		}


		show_json(1);
	}


	public function getnum()
	{
		global $_W;
		global $_GPC;

		if ($_W['ispost']) {
			$result = array();
			$emay_num = com('sms')->sms_num('emay');

			if (!empty($emay_num)) {
				$result['emay'] = $emay_num;
			}


			show_json(1, $result);
		}


		show_json(0);
	}
}


?>