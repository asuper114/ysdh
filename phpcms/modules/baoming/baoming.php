<?php
defined('IN_PHPCMS') or exit('No permission resources.');
pc_base::load_app_class('admin','admin',0);
//pc_base::load_sys_class('form','',0);
//pc_base::load_sys_class('format','',0);
//pc_base::load_app_func('global','sms');
class baoming extends admin {
	function __construct() {
		$this->baoming = pc_base::load_model('baoming_model');
		$siteid = get_siteid();

	}
	/*
	 * @desc 列表
	 * */
	public function init() {
		$page = max(intval($_GET['page']), 1);
		$infos = $this->baoming->listinfo("","id desc ", $page);
		
		$pages = $this->baoming->pages;
		
		$diploma = array(
					"1" =>'初中',
					"2"=>'高中',
					"3"=>'中技',
					"4"=>'中专',
					"5"=>'大专',
					"6"=>'本科',
					"7"=>'硕士',
					"8"=>'MBA',
					"9"=>'博士',
					);
		$major =array(
				"1"=>'动画专业',
				"2"=>'影视表演艺术',
				"3"=>'影视美术设计',
				"4"=>'编导',
				"5"=>'摄影摄像',
				"6"=>'影视管理',
				);
		//$big_menu = array('javascript:window.top.art.dialog({id:\'add\',iframe:\'?m=poster&c=space&a=add\', title:\''.L('add_space').'\', width:\'540\', height:\'320\'}, function(){var d = window.top.art.dialog({id:\'add\'}).data.iframe;var form = d.document.getElementById(\'dosubmit\');form.click();return false;}, function(){window.top.art.dialog({id:\'add\'}).close()});void(0);', L('add_space'));
		include $this->admin_tpl('baoming_list');
	}
}
