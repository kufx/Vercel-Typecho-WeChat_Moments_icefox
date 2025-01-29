<?php $this->need('header.php'); ?>
		
<div class="content">
	<ul>
		<?php if ($this->have()): ?>
		<?php while($this->next()): ?>
			<li> [<?php $this->category(','); ?>]  <a href="<?php $this->permalink() ?>"><?php $this->title() ?></a>   <font color=#808080>(作者：<?php $this->author(); ?> ,<?php $this->date('Y年m月j日'); ?> )</font></li>
		<?php endwhile; ?>
		<?php else: ?>
			<li><?php _e('没有找到内容'); ?></li>		
		<?php endif; ?>
	</ul>
	<br>
	<?php $this->pageNav('上一页', '下一页', 5, '...'); ?>
	<br>
</div>
		
<?php $this->need('footer.php'); ?>