<!-- File: /app/View/Common/news.ctp -->

<div class="news-page">
<div class="title">
	<h1><?php echo $this->fetch('title'); ?></h1>
</div>

<div class="content">
	<div class="content-left">
		<?php echo $this->fetch('content'); ?>
 	</div>

 	<div class="content-right">
 		<?php echo $this->fetch('sidebar'); ?>
 	</div>
</div>
</div>
