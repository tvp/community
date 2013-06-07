<?php
$this->breadcrumbs=array(
    t('Dashboard')
);
?>

<div class="span3">
    <ul class="nav nav-list">
        <li><?php echo CHtml::link('My Groups', array('index')) ?></li>

        <li class="nav-header"><?php echo t('Groups') ?></li>
        <?php foreach($groups as $iterableGroup): ?>
        <li><?php echo CHtml::link($iterableGroup['title'], array('read', 'id'=>$iterableGroup['id'])) ?></li>
        <?php endforeach; ?>
    </ul>
</div>
<div class="span4">
    <h1><?php echo t('Dashboard') ?> <?php echo $group['title'] ?></h1>
    <div class="actions">
        <?php echo CHtml::link('<i class="icon icon-bookmark"></i> Subscribe', array('subscribe'), array('class'=>'btn')); ?>
    </div>
    <br>
    <p><?php echo $group['message'] ?></p>

    <?php echo CHtml::beginForm(); ?>
    <textarea name="message" placeholder="Status message"></textarea>
    <input type="hidden" name="group_id" value="<?php echo $group['id'] ?>">

    <div>
        <?php echo CHtml::submitButton(t('Post'), array('class' => 'btn btn-primary')); ?>
    </div>

    <?php echo CHtml::endForm(); ?>

    <?php echo $this->renderPartial('_posts', array('posts'=>$posts, 'showGroup'=>false)); ?>
</div>