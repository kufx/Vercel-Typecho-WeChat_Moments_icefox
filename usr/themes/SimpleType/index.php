<?php
/**
 * 超简洁的typecho皮肤
 * 
 * @package SimpleType
 * @author Roogle
 * @version 1.0.8
 * @link http://www.moidea.info
 */
 
$this->need('header.php');
?>

<div class="content">
	<ul>
		<?php while($this->next()): ?>
			<li> [<?php $this->category(','); ?>]  <a href="<?php $this->permalink() ?>"><?php $this->title() ?></a>   <font color=#808080>(作者：<?php $this->author(); ?> ,<?php $this->date('Y年m月j日'); ?> )</font></li>
		<?php endwhile; ?>
	</ul>
	<br>
	<?php $this->pageNav('上一页', '下一页', 5, '...'); ?>
	<br>
</div>
<?php $this->need('footer.php'); ?>