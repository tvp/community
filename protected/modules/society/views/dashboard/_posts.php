<div class="posts">
<?php if($posts) foreach ($posts as $post): ?>
    <div class="post">
        <?php if($showGroup): ?><div class="group"><?php echo CHtml::encode($post['group']['title']) ?></div><?php endif; ?>
        <div class="time"><?php echo $post['created'] ?></div>
        <div class="author"><?php echo CHtml::encode($post['author']['first_name']) ?> <?php echo CHtml::encode($post['author']['last_name']) ?></div>
        <div class="message"><?php echo CHtml::encode($post['message']) ?></div>
    </div>
<?php endforeach; ?>
</div>