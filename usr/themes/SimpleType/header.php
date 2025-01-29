<!DOCTYPE html>
<html>
<head>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
	
	<meta http-equiv="Cache-Control" content="no-siteapp"/>
	<meta http-equiv="Cache-Control" content="no-transform"/>
	<meta name="applicable-device" content="pc,mobile"/>
	<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=yes"/>

	<meta name="format-detection" content="telephone=no" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	
	<link rel="dns-prefetch" href="www.moidea.us">
	<link rel="apple-touch-icon-precomposed" href="logo_icon.png">
	<link rel="shortcut icon" href="<?php $this->options->themeUrl('favicon.ico'); ?>" >

	
	<!-- 输出HTML头部信息 -->
	<meta name="site" content="<?php $this->options->siteUrl(); ?>" />
	<meta name="author" content="Roogle QQ1989473781" />
	<meta name="generator" content="Moidea" />
	<meta name="keywords" content="<?php $this->options->keywords(); ?>" />
	<?php if($this->is('index')){ ?>
	<meta name="description" content="<?php $this->options->description(); ?>" />
	<?php }  else if($this->is('category')) { ?>
	<meta name="description" content="<?php echo $this->getDescription(); ?>" />
	<?php } else if($this->is('tag')) { ?>
	<meta name="description" content="<?php $this->options->description(); ?>" />
	<?php } else if($this->is('archive'))  { ?>
	<meta name="description" content="<?php $this->options->description(); ?>" />
	<?php } else if($this->is('attachment')) {?>
	<meta name="description" content="<?php $this->options->description(); ?>" />
	<?php } else  { ?>
	<meta name="description" content="<?php 
		$code=array(" ","　","\t","\n","\r");
		$desc=str_replace($code, '', strip_tags($this->content)); 
		echo substr($desc,0,280); ?>" />
	<?php } ?>
	
	<title><?php if($this->is('index')){ ?>
				专注于心理学研究,塔罗牌占卜,心理教程,思维方式,企业管理研究的专业博客 - <?php $this->options->title(); ?>
			<?php if($this->_currentPage>1) echo ' 第 '.$this->_currentPage.' 页 '; ?>
			<?php }  else if($this->is('category')) { ?>
				<?php $this->archiveTitle(' &lt; ','',''); ?> - <?php $this->options->title(); ?> - 专注于心理学，思维方式研究
			<?php } else if($this->is('tag')) { ?>
				标签: <?php $this->archiveTitle(' &lt; ','',''); ?> - <?php $this->options->title(); ?> - 专注于心理学，思维方式研究
			<?php } else if($this->is('archive'))  { ?>
				关键词: <?php $this->archiveTitle(' &lt; ','',''); ?> - <?php $this->options->title(); ?> - 专注于心理学，思维方式研究
			<?php } else if($this->is('attachment')) {?>
				附件: <?php $this->archiveTitle(' &lt; ','',''); ?> - <?php $this->options->title(); ?> - 专注于心理学，思维方式研究
			<?php } else  { ?>
				<?php $this->archiveTitle('', '', ''); ?> - <?php $this->options->title(); ?> - 专注于心理学，思维方式研究
			<?php } ?>
	</title>
	
	<link rel="stylesheet" type="text/css" media="all" href="<?php $this->options->themeUrl('style.css'); ?>" />
</head>

<body>
	<ul class="head">
		<div><font style="background: #eee;padding: 5px;line-height: 13px;font-weight: 700;"><a href="<?php $this->options->siteUrl(); ?>" alt="<?php $this->options->title() ?>"><?php $this->options->title() ?></a></font>&nbsp;&nbsp;<font style="background: #eee;color: #898989;padding: 5px;line-height: 26px;"># 专注心理学，思维方式，塔罗牌研究的非专业人士 </font></div>


		<ul style="margin:20px 0;">
			<li>| <a href="<?php $this->options->siteUrl(); ?>"><?php _e('首  页'); ?></a> | <a href="<?php $this->options->siteUrl(); ?>about.html">简 介</a> | <a href="<?php $this->options->siteUrl(); ?>service.html">服 务</a> | <a href="<?php $this->options->siteUrl(); ?>links.html">友 链</a> | <a href="<?php $this->options->siteUrl(); ?>notice.html">预 告</a> |</li>
			<li>| <?php $this->widget('Widget_Metas_Category_List')
                ->parse('<a href="{permalink}">{name}</a>  | '); ?></li>
		</ul>	
	</ul>