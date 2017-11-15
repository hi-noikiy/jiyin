<?php
if (!(defined('IN_IA'))) 
{
	exit('Access Denied');
}
class Refund_EweiShopV2Page extends WebPage 
{
	public function main() 
	{
		global $_W;
		global $_GPC;
		$pindex = max(1, intval($_GPC['page']));
		$psize = 20;
		$condition = ' and 1';
		$list = pdo_fetchall('SELECT * FROM ' . tablename('ewei_shop_refundsetlist') . ' WHERE 1 ' . $condition . '  ORDER BY id asc limit ' . (($pindex - 1) * $psize) . ',' . $psize);
		$total = pdo_fetchcolumn('SELECT count(*) FROM ' . tablename('ewei_shop_refundsetlist') . ' WHERE 1 ' . $condition);
		$pager = pagination($total, $pindex, $psize);
		include $this->template();
	}
	public function add() 
	{
		$this->post();
	}
	public function edit() 
	{
		$this->post();
	}
	protected function post() 
	{
		global $_W;
		global $_GPC;
		$id = intval($_GPC['id']);
		
		
		$list = pdo_fetch('SELECT * FROM ' . tablename('ewei_shop_refundsetlist') . ' WHERE id=:id  ', array(':id' => $id));

		if ($_W['ispost']) 
		{		
			$data=array('title'=>$_GPC['title'],'rate'=>($_GPC['rate']),'remark'=>$_GPC['remark'],'addtime'=>time());
			if (empty($id)) 
			{	
				pdo_insert('ewei_shop_refundsetlist', $data);
			}
			else 
			{
				pdo_update('ewei_shop_refundsetlist', $data, array('id' => $id));
			}
			show_json(1, array('url' => webUrl('sysset/refund')));
		}

		include $this->template();
	}
	public function delete() 
	{
		global $_W;
		global $_GPC;
		$id = intval($_GPC['id']);
		if (empty($id)) 
		{
			$id = ((is_array($_GPC['ids']) ? implode(',', $_GPC['ids']) : 0));
		}
		$items = pdo_fetchall('SELECT id,title FROM ' . tablename('ewei_shop_refundsetlist') . ' WHERE id in( ' . $id . ' ) ');
		foreach ($items as $item ) 
		{
			pdo_delete('ewei_shop_refundsetlist', array('id' => $id));
			
		}
		show_json(1, array('url' => referer()));
	}
	public function query() 
	{
		global $_W;
		global $_GPC;
		$kwd = trim($_GPC['keyword']);
		$params = array();
		$params[':uniacid'] = $_W['uniacid'];
		$condition = ' and uniacid=:uniacid';
		if (!(empty($kwd))) 
		{
			$condition .= ' AND `title` LIKE :keyword';
			$params[':keyword'] = '%' . $kwd . '%';
		}
		$ds = pdo_fetchall('SELECT id,title FROM ' . tablename('ewei_shop_member_printer_template') . ' WHERE 1 ' . $condition . ' order by id asc', $params);
		if ($_GPC['suggest']) 
		{
			exit(json_encode(array('value' => $ds)));
		}
		include $this->template();
	}
	public function tpl() 
	{
		global $_W;
		global $_GPC;
		$kw = intval($_GPC['kw']);
		$style_list = com_run('printer::style_list');
		$style_list = ((is_array($style_list) ? $style_list : array()));
		include $this->template();
	}


	public function set() 
	{
		global $_W;
		global $_GPC;
		if ($_W['ispost']) 
		{
			$data = array();
			$data['order_printer'] = ((is_array($_GPC['order_printer']) ? implode(',', $_GPC['order_printer']) : ''));
			$data['order_template'] = intval($_GPC['order_template']);
			$data['ordertype'] = ((is_array($_GPC['ordertype']) ? implode(',', $_GPC['ordertype']) : ''));
			m('common')->updateSysset(array('printer' => $data));
			//plog('sysset.printer.set', '修改系统设置-商城打印机设置');
			show_json(1);
		}
		$data = com_run('printer::getPrinterSet');
		$order_printer_array = $data['order_printer'];
		$ordertype = $data['ordertype'];
		$order_template = pdo_fetchall('SELECT * FROM ' . tablename('ewei_shop_member_printer_template') . ' WHERE uniacid=:uniacid ', array(':uniacid' => $_W['uniacid']));
		include $this->template();
	}
}
?>