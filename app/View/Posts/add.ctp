<!-- File: /app/View/Posts/add.ctp -->

<h1><?php echo __('Add Post'); ?></h1>
<?php
echo $this->Form->create('Post');
echo $this->Form->input('title');
echo $this->Form->input('body', array('rows' => '3'));
echo $this->Form->end('Save Post');
?>