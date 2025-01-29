<?php $this->need('header.php'); ?>

<div class="crumbs">
	<a href="<?php $this->options->siteUrl(); ?>">Home</a> &raquo;</li>
	<?php if ($this->is('index')): ?><!-- 页面为首页时 -->
		Latest Post
	<?php elseif ($this->is('post')): ?><!-- 页面为文章单页时 -->
		<?php $this->category(); ?> &raquo; <?php $this->title() ?>
	<?php else: ?><!-- 页面为其他页时 -->
		<?php $this->archiveTitle(' &raquo; ','',''); ?>
	<?php endif; ?>
</div>

<div class="content"><div class="post">
	
	<h2 style="font-family:黑体;"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h2>
	<div class="meta"><?php _e('编 辑：'); ?><?php $this->author(); ?> ┊	<?php _e('时 间：'); ?><?php $this->date('Y年m月d日'); ?> ┊	<?php Views_Plugin::theViews(); ?></div>
	<?php if (isset($this->fields->desc)): ?>
	<div class="post-desc">		
		<span><b>博主提炼核心内容：</b><?php $this->fields->desc(); ?></span>
	</div>
	<?php endif; ?>
	
	<div>
		<?php $this->content(); ?>
	</div>
	<br>

	<!-- START donate by moidea.info -->
<div style="text-align: center;"><strong>捐赠我们，创造更多优秀内容<br>用<span style="color: #339966;"> 微信</span> OR <span style="color: #337fe5;">支付宝</span> 扫描二维码</strong></div>
<div align="center"><img class="wp-image-558 size-thumbnail" src="http://www.moidea.info/usr/uploads/2015/09/weixin.jpg" alt="pay_weixin" width="150" height="150"/><img class="wp-image-558 size-thumbnail" src="http://www.moidea.info/usr/uploads/2015/09/alipay.jpg" alt="pay_weixin" width="150" height="150" /></div></div>
<!-- END donate by moidea.info -->
	
	<?php if ($this->category == 'mind') { ?>
<!-- 代码1：放在页面需要展示的位置  -->
<!-- 如果您配置过sourceid，建议在div标签中配置sourceid、cid(分类id)，没有请忽略  -->
<div id="cyQing" role="cylabs" data-use="qing"></div>
<!-- 代码2：用来读取评论框配置，此代码需放置在代码1之后。 -->
<!-- 如果当前页面有评论框，代码2请勿放置在评论框代码之前。 -->
<!-- 如果页面同时使用多个实验室项目，以下代码只需要引入一次，只配置上面的div标签即可 -->
<script type="text/javascript" charset="utf-8" src="http://changyan.itc.cn/js/??lib/jquery.js,changyan.labs.js?appid=cyrlwTuxO"></script>
<?php } else { ?>

<?php } ?>

<!--高速版-->
<div id="SOHUCS"></div>
<script charset="utf-8" type="text/javascript" src="http://changyan.sohu.com/upload/changyan.js" ></script>
<script type="text/javascript">
    window.changyan.api.config({
        appid: 'cyrlwTuxO',
        conf: 'prod_c85bfbbf5084fa61b9717b248148eb70'
    });
</script>
	
	<br>
	<!--百度分享-->
	<div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a><a href="#" class="bds_sqq" data-cmd="sqq" title="分享到QQ好友"></a><a href="#" class="bds_huaban" data-cmd="huaban" title="分享到花瓣"></a><a href="#" class="bds_ty" data-cmd="ty" title="分享到天涯社区"></a><a href="#" class="bds_copy" data-cmd="copy" title="分享到复制网址"></a></div>
	<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"16"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
	<!--百度分享-->
	<br>
</div>

	
	<ul class="post-near">
        <li>上一篇: <?php $this->thePrev('%s','没有了'); ?></li>
        <li>下一篇: <?php $this->theNext('%s','没有了'); ?></li>
    </ul>
</div>


	
<?php $this->need('footer.php'); ?>
