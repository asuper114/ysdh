<?php
/**
 *  extention.func.php 用户自定义函数库
 *
 * @copyright			(C) 2005-2010 PHPCMS
 * @license				http://www.phpcms.cn/license/
 * @lastmodify			2010-10-27
 */

 /**
  * 栏目URL
  *
  * @param	integer	$catid		栏目ID
  * @param	integer	$cut		是否截取为相对地址，默认为不截取
  * @param	integer	$site_id	站点ID，默认为2，为了兼容之前的代码，对新系统，应默认为1
  * @return string	$url		返回URL字符串
  */
function caturl($catid, $cut = 0, $site_id = 2) {
	static $CATEGORY;
	if(empty($CATEGORY)) {
		$CATEGORYS = getcache('category_content','commons');
		// 更新为完全支持多站点 by Matthew Bao
		foreach($CATEGORYS as $k=>$siteid) {
			$CAT = getcache('category_content_'.$siteid,'commons');
			$CATEGORY[$k] = $CAT[$k];
		}
	}
	if ($cut) {
		// 取相对路径的方法支持多站点 by Matthew Bao
		$url = str_replace(siteurl($site_id), '', $CATEGORY[$catid]['url']);
		$url.='index.shtml';
	} else {
		$url = $CATEGORY[$catid]['url'];
	}
	return $url;
}
//获取列表搜索页URL
function list_search($catid,$data=array()) {
	if(is_array($data)) {
		$pars = '&'.http_build_query($data);
	}
	$url = APP_PATH.'index.php?m=content&c=index&a=list_search&catid='.$catid.$pars;
	return $url;
}

//新游戏内容页星星
function showstars($point) {
	$stars = $star_3 = $star_2 = $star_1='';
	$star_3 = floor($point / 2);
	$star_2 = ($point-$star_3*2)> 0 ? 1 : 0;	
	$star_1 = 5-$star_3-$star_2;
	if($star_3 > 0) {
		for($i=1;$i<=$star_3;$i++) $stars .= '<img src="'.IMG_PATH.'star_3.png" />';
	}
	if($star_2) $stars .= '<img src="'.IMG_PATH.'star_2.png" />';
	if($star_1 > 0) {
		for($i=1;$i<=$star_1;$i++) $stars .='<img src="'.IMG_PATH.'star_1.png" />';
	}
	return $stars;
}
/**
 * 转化选项类数值为名称
 */
function box_type($field, $value, $modelid='',$right=0) {
	$fields = getcache('model_field_'.$modelid,'model');
	extract(string2array($fields[$field]['setting']));
	if($outputtype) {
		return $value;
	} else {
			$options = explode("\n",$fields[$field]['options']);
			foreach($options as $_k) {
				$v = explode("|",$_k);
				$k = trim($v[1]);
				$option[$k] = $v[0];
			}
			$string = '';
			switch($fields[$field]['boxtype']) {
				case 'radio':
					$string = $option[$value];
				break;

				case 'checkbox':
					$value_arr = explode(',',$value);
					foreach($value_arr as $_v) {
						if($_v) $string .= $option[$_v].' 、';
					}
				break;

				case 'select':
					$string = $option[$value];
				break;

				case 'multiple':
					$value_arr = explode(',',$value);
					foreach($value_arr as $_v) {
						if($_v) $string .= $option[$_v].' 、';
					}
				break;
			}
			if($right) {
				if($field=='opcompany') $field='opc';
				return $_GET[$field] == $value ? '<span style="color:#CC0000">'.$string.'</span>' : $string;
			}
			return $string;
	}	
}
/**
 * 构造新游get标签sql语句
 */
function structure_game_sql($data) {
	$sql = "status=99 AND catid=$data[catid]";
	$pars_legal = array('first','area','dimension','type','charact','gamestatus','costtype','opcompany');
	foreach ($data as $k=>$r) {
		if($k=='first' && $r=='num') {
			$sql .=" AND `first`between '0' and '9' "; continue;
		}
		if($k=='opc') $k = 'opcompany';
		if(in_array($k,$pars_legal) && $r!='') $sql .=" AND `$k`='$r'";
	}
	$sql .=" AND `gametype` in(2,3)";
 	return $sql;
}
/**
 * 构造新游url地址
 */
function structure_url($array = array(),$showall = '', $siteurl = '') {
	global $_GET;
	if(is_array($_GET)&& count($_GET)>0)$array = array_merge($_GET,$array);
	$urlrules = getcache('urlrules','commons');
	$urlrules = str_replace('|', '~',$urlrules[33]);
	if(strpos($urlrules, '~')) {
		$urlrules = explode('~', $urlrules);
		$urlrule = $urlrules[0];
	} else {
		$urlrule = $urlrules;
	}
	if (is_array($array)) foreach ($array as $k=>$v) {
		if($k=='page') $v=1;
		if($showall) {
			if($k!='catid') {
				continue;
			} else {
				$findme[] = '/{\$'.$k.'}/';
				$replaceme[] = $v;
				break;
			}
		} else {
			$findme[] = '/{\$'.$k.'}/';
			$replaceme[] = $v;
		}
	}
	$findme[] = '/{\$([a-z0-9]+)}/';
	$replaceme[] = '';
	$url = preg_replace($findme, $replaceme, $urlrule);
	$url = str_replace(array('http://','//','~'), array('~','/','http://'), $url);
	$url = APP_PATH.$url;
	return $url;
}
function newgame_path($data) {
	$path = '';
	$pars_legal = array('first','area','dimension','type','charact','gamestatus','costtype','opcompany');
	if(is_array($data)) {
		foreach($data as $k=>$r) {
			if(in_array($k,$pars_legal) && $r!='') $path .= ($k=='first') ? $r.' > ' : box_type($k, $r, 11).' > ';
		}
	}
	return $path;
}
function quarter_extent($year='2011',$q='1') {
	$q = $q>4 ? '1' : $q;
	$start = array('1'=>'01','2'=>'04','3'=>'07','4'=>'10');
	$end = array('1'=>'03','2'=>'06','3'=>'09','4'=>'12');
	$data['start'] = $year.'-'.$start[$q].'-01';
	$data['end'] = $year.'-'.$end[$q].'-31';
	return $data;
}

/**
 * 字符串截取，支持编码
 * @param $str 需要转换的字符串
 * @param $length 截取长度
 * @param $suffix 截断显示字符
 * @param $start 开始位置
 * @param $charset 编码格式
 * @return string
 */
function my_substr($string, $length, $suffix = '...', $start = 0, $charset = "utf-8") {
	if (function_exists ( "mb_substr" )) {
		return mb_substr ( $string, $start, $length, $charset ) . $suffix;
	} elseif (function_exists ( 'iconv_substr' )) {
		return iconv_substr ( $string, $start, $length, $charset ) . $suffix;
	}
	$encodeMark ['utf-8'] = '/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/';
	$encodeMark ['gb2312'] = '/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/';
	$encodeMark ['gbk'] = '/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/';
	$encodeMark ['big5'] = '/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/';
	$match = array ();
	preg_match_all ( $encodeMark [$charset], $string, $match );
	$slice = join ( "", array_slice ( $match [0], $start, $length ) );
	return $slice . $suffix;
}

function get_hotwords() {
	$s = getcache('search','search');
	$hotwords = explode("\n",$s[1]['hotwords']);
	return $hotwords;
}
function remote_file_exists($url_file){
	$headers = get_headers($url_file);
	if (!preg_match("/200/", $headers[0])){
		return false;
	}
	return true;
}

function sec2time($sec){
	if(strstr($sec, '：')) {
		return $sec;
	}
	$res = '';
	$hours = intval(intval($sec) / 3600); 
	$minutes = bcmod((intval($sec) / 60),60); 
	$seconds = bcmod(intval($sec),60); 
	if($hours>0) $res .= $hours.':';
	if($minutes>0) $res .= str_pad($minutes, 2, "0", STR_PAD_LEFT).'：';
	if($seconds>0) $res .= str_pad($seconds, 2, "0", STR_PAD_LEFT);
	else $res .= '00';
	return $res;
} 

/**
 * 通过站点获得游戏官网静态内容目录地址
 * @param	string	$type	要获得的类型名，包括css,js,images,swf，对应相应的子目录
 * @param	integer	$siteid	指定的站点，默认为当前站点
 * @param	string	$extra	扩展目录，用于查找statics下子目录下的js/css等，默认不开放
 * @param	integer	$isstaticsite	是否是用于静态站
 * @return	string	$dir	返回目录
 */
function get_staticsdir($type = '', $siteid = 0, $extra = '', $isstaticsite = 0){
	if (empty($type)){
		return false;
	}
	if (!$siteid)
		$siteid = get_siteid();
	$sitelist = getcache('sitelist', 'commons');
	$sitedomain = $sitelist[$siteid]['domain'];
	if (!isset($sitedomain) || empty($sitedomain)){
		return false;
	}
	
	if ($isstaticsite == 1){
		$pre_domain = "http://static.ichengzi.com.cn/guanwang/".$sitelist[$siteid]['dirname']."/";
	} else {
		$pre_domain = $sitedomain."statics/";
	}
	if (empty($extra)){
		$dir = $pre_domain.$type."/";
	} else {
		$dir = $pre_domain.$extra."/".$type."/";
	}
	return $dir;
}

/**
 * 获取站点配置的信息
 * @param integer $siteid	站点信息
 */
function get_siteinfo($siteid)
{
	$tmp = siteinfo($siteid);
	if (empty($tmp))
	{
		return false;
	}
	$tmp['setting'] = string2array($tmp['setting']);
	$tmp['release_point'] = explode(',', $tmp['release_point']);
	return $tmp;
}

/**
 * 获得静态站公共目录，便于使用公共目录中的静态文件
 * @return string	$dir	返回目录
 */
function get_commonstatic()
{
	return "http://static.ichengzi.com.cn/common/";
}

    /**
	 * 新浪微游戏获取最近登录服务器
	 * 
	 */
	 function get_last_server($userid)
	{
		if ($data = CDB::getInstance('sinagame_lastserver')->where(array('userid'=>$userid))->getOne())
		{
			//return $data['last_server'];
		}
		else 
		{
			$db = CDB::getInstance('sinagame_lastserver');
			$db->query('insert into `v9_sinagame_lastserver`(userid,lastserver) values('.$userid.',"")');
		}
	}
	
?>
