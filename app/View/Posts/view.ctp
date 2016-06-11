<!-- File: /app/View/Posts/view.ctp -->

<?php
$this->extend('/Common/news');

$this->assign('title', __('Blog posts') );

$this->start('sidebar');
?>
<div class="title">
    <h2><?php echo __('Users'); ?></h2>
</div>
<div class="content">
<?php 
if( !empty($data['user_data']) ) {
    foreach ($data['user_data'] as $item) {
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

<h1><?php echo h($data['post']['title']); ?></h1>
<p><?php echo __('View'); ?>: <?php echo $data['post']['hit']; ?></p>
<p><small><?php echo __('Created'); ?>: <?php echo $data['post']['created']; ?></small></p>

<p><?php echo h($data['post']['body']); ?></p>