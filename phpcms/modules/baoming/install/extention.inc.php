<?php
defined('IN_PHPCMS') or exit('Access Denied');
defined('INSTALL') or exit('Access Denied');
$parentid = $menu_db->insert(array('name'=>'baoming', 'parentid'=>29, 'm'=>'baoming', 'c'=>'baoming', 'a'=>'init', 'data'=>'', 'listorder'=>0, 'display'=>'1'), true);
$menu_db->insert(array('name'=>'baoming_manage', 'parentid'=>$parentid, 'm'=>'baoming', 'c'=>'baoming', 'a'=>'baoming_manage', 'data'=>'', 'listorder'=>0, 'display'=>'1'));

$language = array('baoming'=>'网上报名', 'baoming_manage'=>'报名管理');
?>