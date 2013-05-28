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
		include $this->admin_tpl('baoming_list');
	}
}
