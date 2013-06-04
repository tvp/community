<div class="posts">
<?php if($posts) foreach ($posts as $post): ?>
    <div class="post">
        <?php if($showGroup): ?><div class="group"><?php echo $post['group']['title'] ?></div><?php endif; ?>
        <div class="time"><?php echo $post['created'] ?></div>
        <div class="author"><?php echo $post['author']['first_name'] ?> <?php echo $post['author']['last_name'] ?></div>
        <div class="message"><?php echo $post['message'] ?></div>
    </div>
<?php endforeach; ?>
</div>