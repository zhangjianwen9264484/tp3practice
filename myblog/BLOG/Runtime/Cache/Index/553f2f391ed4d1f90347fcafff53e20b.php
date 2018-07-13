<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="__PUBLIC__/Css/common.css" />
	<script type="text/JavaScript" src='__PUBLIC__/Js/jquery-1.7.2.min.js'></script>
	<script type="text/JavaScript" src='__PUBLIC__/Js/common.js'></script>
	<link rel="stylesheet" href="__PUBLIC__/Css/list.css" />
</head>
<body>
<!--头部-->
	<div class='top-list-wrap'>
		<div class='top-list'>
			<ul class='l-list'>
				<li><a href="http://www.houdunwang.com" target='_blank'>后盾网</a></li>
				<li><a href="http://bbs.houdunwang.com" target='_blank'>后盾网论坛</a></li>
				<li><a href="http://study.houdunwang.com" target='_blank'>后盾学习社区</a></li>
			</ul>
			<ul class='r-list'>
				<li><a href="http://www.hdphp.com" target='_blank'>HDPHP框架</a></li>
				<li><a href="http://bbs.houdunwang.com" target='_blank'>免费视频教程</a></li>
			</ul>
		</div>
	</div>
	<div class='top-search-wrap'>
		<div class='top-search'>
			<a href="http://bbs.houdunwang.com" target='_blank' class='logo'>
				<img src="__PUBLIC__./Images/logo.png"/>
			</a>
			<div class='search-wrap'>
				<form action="" method='get'>
					<input type="text" name='keyword' class='search-content'/>
					<input type="submit" name='search' value='搜索'/>
				</form>
			</div>
		</div>
	</div>
	<?php $cate = M('cate')->order('sort')->select(); import('Class.Category',APP_PATH); $cate=Category::unlimitForLayer($cate,'child'); ?>
	<div class='top-nav-wrap'>
		<ul class='nav-lv1'>
			<li class='nav-lv1-li'>
				<a href="__GROUP__" class='top-cate'>博客首页</a>
			</li>
			<?php if(is_array($cate)): foreach($cate as $key=>$v): ?><li class='nav-lv1-li'>
					<a href="<?php echo U('/c_'.$v[id]);?>" class='top-cate'><?php echo ($v["name"]); ?></a>
					<?php if($v['child']): ?><ul>
							<?php if(is_array($v["child"])): foreach($v["child"] as $key=>$child): ?><li><a href="<?php echo U('/c_'.$v[id]);?>"><?php echo ($child["name"]); ?></a></li><?php endforeach; endif; ?>
						</ul><?php endif; ?>
				</li><?php endforeach; endif; ?>
		</ul>
	</div>
<!--主体-->
	<div class='main'>
		<div class='main-left'>
			<?php if(is_array($list_blog)): foreach($list_blog as $key=>$v): ?><dl>
					<dt><?php echo ($v["name"]); ?></dt>
					<dd class='channel'><?php echo ($v["title"]); ?></dd>
					<dd class='info'>
						<span class='time'>发布于：<?php echo (date("Y年m月d日",$v["time"])); ?></span>
						<span class='click'>点击：<?php echo ($v["click"]); ?></span>
					</dd>
					<dd class='content'><?php echo ($v["summary"]); ?></dd>
					<dd class='read'>
						<a href="<?php echo U('/'.$v['id']);?>" target="_blank">阅读全文>></a>
					</dd>
				</dl><?php endforeach; endif; ?>
			<p><?php echo ($page); ?></p>
		</div>
	<!--主体右侧-->
			<div class='main-right'>
		<?php echo W('Hot',array(limit=>'2'));?>
	
		<!-- 	$field = array('id','content','click');
			$blog= M("blog")->field($field)->order('click DESC')->limit(5)->select();
		
			<dl>
				<dt>热门博文</dt>
					<?php if(is_array($blog)): foreach($blog as $key=>$v): ?><dd>
							<a href="<?php echo U('/'.$v['id']);?>"><?php echo ($v["content"]); ?></a>
								<span><?php echo ($v["click"]); ?></span>
						</dd><?php endforeach; endif; ?>
			</dl> -->

			<?php echo W('New',array(limit=>'2'));?>
			<dl>
				<dt>友情连接</dt>
				<dd>
					<a href="">后盾网</a>
				</dd>

				<dd>
					<a href="">后盾网论坛</a>
				</dd>
				<dd>
					<a href="">后盾网学习社区</a>
				</dd>
			</dl>
	</div>
	
	</div>
<!--底部-->
	<div class='bottom'>
		<div></div>
</div>
</body>
</html>