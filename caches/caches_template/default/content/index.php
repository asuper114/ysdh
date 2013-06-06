<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
<div class="container">
		<div id="slides2">
			<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=cf34b781485ad31e675be953037b8ff3&action=lists&catid=13&num=5&order=inputtime+ASC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'13','order'=>'inputtime ASC','limit'=>'5',));}?>
			<?php $n=1;if(is_array($data)) foreach($data AS $v) { ?>
			<a href="<?php echo $v['url'];?>" target="_blank" ><img src="<?php echo $v['thumb'];?>" alt=""></a>
			<?php $n++;}unset($n); ?>
			<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
		</div>

	</div>

	<div class="navbar2">
		<div class="container">
			<h2><i class="tel">电话</i><span>010-8030-5452</span></h2>
			<div>
				<a href="#"><i class="info"></i>课程设置</a>
				<a href="#"><i class="teac"></i>师资队伍</a>
				<a href="#"><i class="work"></i>就业保障</a>
				<a href="#"><i class="hua"></i>学院环境</a>
			</div>
		</div>
	</div>

</div>
<div class="container">
	<div class="row">
		<div class="span9 teacher">
			<div class="title">
				<h3>师资力量</h3>
			</div>
			<div class="more"><a href="<?php echo caturl(7);?>" target="_balnk">更多</a></div>
			
			<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=04ed224420e7d44df7fb2c6811811350&action=lists&catid=7&num=3&order=inputtime+ASC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'7','order'=>'inputtime ASC','limit'=>'3',));}?>
			<?php $n=1;if(is_array($data)) foreach($data AS $v) { ?>
			<div class="item">
				<a href="<?php echo $v['url'];?>" target="_blank" ><img src="<?php echo $v['thumb'];?>" width="200" height="140" /></a>
				<dl>
					<dt><a href="<?php echo $v['url'];?>" target="_blank" ><?php echo $v['title'];?></a></dt>
					<dd><?php echo str_cut($v['description'],400,"");?></dd>
				</dl>
			</div>
			<?php $n++;}unset($n); ?>
			<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
			
		</div>

		<div class="span3 m0 cooperation">
			<div class="title">
				<h3>合作项目</h3>
			</div>
			<div class="wrap">
				<div class="more"><a href="<?php echo caturl(10);?>" target="_balnk">更多</a></div>
				<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=cbb662a6a371862a3bceabeaf938fccb&action=lists&catid=10&num=2&order=inputtime+DESC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'10','order'=>'inputtime DESC','limit'=>'2',));}?>
				<?php $n=1;if(is_array($data)) foreach($data AS $v) { ?>
				<div class="project">
					<dl>
						<dt><img src="<?php echo $v['thumb'];?>" width="200" height="140"> </dt>
						<dd><?php echo str_cut($v['description'],200,"");?></dd>
					</dl>
				</div>
				<?php $n++;}unset($n); ?>
				
				<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
			</div>
		</div>
	</div>


	<div class="row prize">
		<div class="item fluid">
			<img src="<?php echo IMG_PATH;?>ysdh/assets/zs1.jpg">
		</div>
		<div class="item fluid">
			<img src="<?php echo IMG_PATH;?>ysdh/assets/zs2.jpg">
		</div>
		<div class="item">
			<img src="<?php echo IMG_PATH;?>ysdh/assets/zs3.jpg">
		</div>
		<div class="item">
			<img src="<?php echo IMG_PATH;?>ysdh/assets/zs4.jpg">
		</div>
	</div>




	<div class="row">
		<div class="span9 work-star">
			<div>
				<div class="title">
					<h3>就业明星</h3>
				</div>
				<div class="more"><a href="#">更多</a></div>
				<div class="span4 m0">
					<img src="<?php echo IMG_PATH;?>ysdh/assets/sd.jpg" />
				</div>
				<div class="student span4 m0">
					<div class="item">
						<img src="<?php echo IMG_PATH;?>ysdh/assets/s.jpg" />
						<dl>
							<dt>aaa</dt>
							<dd>bbbb</dd>
						</dl>
					</div>
					<div class="item">
						<img src="<?php echo IMG_PATH;?>ysdh/assets/s.jpg" />
						<dl>
							<dt>aaa</dt>
							<dd>bbbb</dd>
						</dl>
					</div>
					<div class="item">
						<img src="<?php echo IMG_PATH;?>ysdh/assets/s.jpg" />
						<dl>
							<dt>aaa</dt>
							<dd>bbbb</dd>
						</dl>
					</div>
				</div>
			</div>
		</div>
		<div class="span3 m0 consult">
			<div class="tab">
				<a href="#" class="active" rel="notice">通知公告</a>
				<a href="#" rel="news">学院新闻</a>
			</div>
			<div class="news" style="display:none;">
				<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=57d2d5f255cb093a358290906cf61313&action=lists&catid=12&num=7&order=inputtime+DESC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'12','order'=>'inputtime DESC','limit'=>'7',));}?>
				<ul>
					<?php $n=1;if(is_array($data)) foreach($data AS $v) { ?>
					<li><a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>" target="_blank">><?php echo $v['title'];?></a></li>
					<?php $n++;}unset($n); ?>
				</ul>
				<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
			</div>
			<div class="notice" >
				<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=19df6cd1e52c596f343389723c956510&action=lists&catid=11&num=7&order=inputtime+DESC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'11','order'=>'inputtime DESC','limit'=>'7',));}?>
				<ul>
					<?php $n=1;if(is_array($data)) foreach($data AS $v) { ?>
					<li><a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>" target="_blank">><?php echo $v['title'];?></a></li>
					<?php $n++;}unset($n); ?>
				</ul>
				<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="span12 opus">
			<div class="title">
				<h3>专业</h3>
				<ul>
					<li><a href="#">影视表演艺术</a> </li>
					<li><a href="#">影视美术设计</a> </li>
					<li><a href="#">编导</a> </li>
					<li><a href="#">摄影摄像</a> </li>
					<li><a href="#">影视管理</a> </li>
				</ul>
			</div>
			<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=a23b2da9706429f2f22c5605fe76546d&action=lists&catid=8&num=4&order=inputtime+DESC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'8','order'=>'inputtime DESC','limit'=>'4',));}?>
			<?php $n=1;if(is_array($data)) foreach($data AS $v) { ?>
			<div class="item">
				<dl>
					<dt><img src="<?php echo $v['thumb'];?>"> </dt>
					<dd>
						<h4><a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>" target="_blank"></h4>
						<p><?php echo str_cut($v['description'],100,"");?></p>
					</dd>
				</dl>
			</div>
			<?php $n++;}unset($n); ?>
			 <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
			 
		</div>
	</div>


</div>
<?php include template("content","footer"); ?>