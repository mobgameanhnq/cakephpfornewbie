<!-- File: /app/View/Posts/list.ctp -->
<?php
// In your view file
$this->Html->script('posts', array('inline' => false));

$this->extend('/Common/news');

$this->assign('title', __('News') );

$this->start('sidebar');
?>
<div class="title">
	<h2><?php echo __('Users'); ?></h2>
</div>
<div class="content">
<?php 
if( !empty($posts['user_data']) ) {
	foreach ($posts['user_data'] as $item) {
		?>
		<ul>
			<li>
				<?php
	            echo $item['User']['username'];
	    		?>
			</li>
		</ul>
		<?php
	}
}
?>
</div>
<?php
$this->end();
?>

<div class="title">
	<h2><?php echo __('News'); ?></h2>
</div>
<div class="content">
	<?php echo $this->Paginator->numbers(); ?>
	<ul>
		<?php 
		if( !empty($posts['post_data']) ) {
			foreach ($posts['post_data'] as $item) { 
			?>
			<li>
				<h3>
				<?php
	                echo $this->Html->link(
	                    $item['Post']['title'],
	                    array('action' => 'view', $item['Post']['slug'])
	                );
	            ?>
	        	</h3>
				<div class="created-time">
					<small><?php echo __('Created'); ?>: <?php echo $item['Post']['created']; ?></small>
				</div>
				<div class="description">
					<p><?php echo h($item['Post']['body']); ?></p>
				</div>
			</li>
			<?php 
			}
		}
		?>
 	</ul>
</div>

<div class="related">
	<h2><?php echo __('Lastest'); ?></h2>
	<div class="content">
		<a href="javascript:void(0);" onclick="posts.load_lastest()" class="btn-load"><?php echo __('Load data'); ?></a>
		<ul class="lastest-content">
		</ul>
	</div>
</div>
