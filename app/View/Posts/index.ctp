<!-- File: /app/View/Posts/index.ctp -->

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

<p><?php echo $this->Html->link(__('Add Post'), array('action' => 'add')); ?></p>
<?php echo $this->Paginator->numbers(); ?>
<table>
    <tr>
        <th><?php echo __('Id'); ?></th>
        <th><?php echo __('Title'); ?></th>
        <th><?php echo __('Actions'); ?></th>
        <th><?php echo __('Created'); ?></th>
    </tr>

<!-- Here's where we loop through our $posts array, printing out post info -->

    <?php foreach ($posts['post_data'] as $item): ?>
    <tr>
        <td><?php echo $item['Post']['id']; ?></td>
        <td>
            <?php
                echo $this->Html->link(
                    $item['Post']['title'],
                    array('action' => 'view', $item['Post']['id'])
                );
            ?>
        </td>
        <td>
            <?php
                echo $this->Form->postLink(
                    __('Delete'),
                    array('action' => 'delete', $item['Post']['id']),
                    array('confirm' => 'Are you sure?')
                );
            ?>
            <?php
                echo $this->Html->link(
                    __('Edit'), array('action' => 'edit', $item['Post']['id'])
                );
            ?>
        </td>
        <td>
            <?php echo $item['Post']['created']; ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>