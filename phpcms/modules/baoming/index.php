<?php
defined('IN_PHPCMS') or exit('No permission resources.');
class index {
	
	function __construct() {
		pc_base::load_app_func('global');
		$this->db = pc_base::load_model('baoming_model');//
		
		$this->ip = ip();
		
		$siteid = isset($_GET['siteid']) ? intval($_GET['siteid']) : get_siteid();
  		define("SITEID",$siteid);
 	}
	
	public function init() {
		$siteid = SITEID;
		$sitelist  = getcache('sitelist','commons');
		$default_style = $sitelist[$siteid]['default_style'];
		$CATEGORYS = getcache('category_content_'.$siteid,'commons');
		
		if($_REQUEST['issubmit']==1){
			
			
			$info['name'] = $_POST['name'];
			$info['email'] = $_POST['email'];
			$info['sex'] = $_POST['sex'];
			$info['phone'] = $_POST['phone'];
			$info['identity_card'] = $_POST['identity_card'];
			$info['native_place'] = $_POST['native_place'];
			$info['diploma'] = $_POST['diploma'];
			$info['birthday'] = $_POST['birthday'];
			$info['major'] = $_POST['major'];
			$info['age'] = $_POST['age'];
			$id = $this->db->insert($info, true);
			showmessage('报名成功', 'index.php?m=baoming&c=index');
		//	include template('baoming','success',$default_style);
		}else{
			include template('baoming','index',$default_style);
		}
	}
	
}