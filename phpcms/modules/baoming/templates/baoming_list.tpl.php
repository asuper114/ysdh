<?php 
defined('IN_ADMIN') or exit('No permission resources.');
$show_dialog = $show_header = 1; 
include $this->admin_tpl('header', 'admin');
?>

<div class="subnav">
    <div class="content-menu ib-a blue line-x">
    <?php if(isset($big_menu)) echo '<a class="add fb" href="'.$big_menu[0].'"><em>'.$big_menu[1].'</em></a>　';?>
    <?php echo admin::submenu($_GET['menuid'],$big_menu); ?>
    </div>
</div>
<div class="pad-lr-10">
<form name="myform" action="?m=poster&c=space&a=delete" method="post" id="myform">
<div class="table-list">
    <table width="100%" cellspacing="0">
        <thead>
            <tr>
            
			<th width="10%" align="center">姓名</th>
			<th width='4%' align="center">性别</th>
			<th width="4%" align="center">年龄</th>
			<th width="8%" align="center">生日</th>
			<th align="center" width="10%">联系电话</th>
			<th width="12%" align="center">邮箱</th>
			<th width="16%" align="center">身份证</th>
			<th width="10%" align="center">籍贯</th>
			<th width="16%" align="center">毕业院校</th>
			<th width="10%" align="center">所报专业</th>
            </tr>
        </thead>
    <tbody>
 <?php 
if(is_array($infos)){
	foreach($infos as $info){
?>   
	<tr>
	<td align="center"><?php echo $info['name']?></td>
	<td align="center"><?php echo $info['sex']?></td>
	<td align="center"><?php echo $info['age']?></td>
	<td align="center"><?php echo $info['birthday']?></td>
	<td align="center"><?php echo $info['phone']?></td>
	<td align="center"><?php echo $info['email']?></td>
	<td align="center"><?php echo $info['identity_card']?></td>
	<td align="center"><?php echo $info['native_place']?></td>
	<td align="center"><?php echo $diploma[$info['diploma']];?></td>
	<td align="center"><?php echo $major[$info['major']]?></td>
	</tr>
<?php 
	}
}
?>
</tbody>
    </table>
  </div>
 <div id="pages"><?php echo $pages?></div>
</form>
</div>
<script type="text/javascript">
<!--

	function edit(id, name){
	window.top.art.dialog({title:'<?php echo L('edit_space')?>--'+name, id:'testIframe'+id, iframe:'?m=poster&c=space&a=edit&spaceid='+id ,width:'540px',height:'320px'}, 	function(){var d = window.top.art.dialog({id:'testIframe'+id}).data.iframe;// 使用内置接口获取iframe对象
	var form = d.document.getElementById('dosubmit');form.click();return false;}, function(){window.top.art.dialog({id:'testIframe'+id}).close()});
	};

	function call(id) {
		window.top.art.dialog({id:'call'}).close();
		window.top.art.dialog({title:'<?php echo L('get_code')?>', id:'call', iframe:'?m=poster&c=space&a=public_call&sid='+id, width:'600px', height:'470px'}, function(){window.top.art.dialog({id:'call'}).close();}, function(){window.top.art.dialog({id:'call'}).close();})
	}

//-->
</script>
</body>
</html>