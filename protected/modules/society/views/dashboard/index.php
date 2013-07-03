<?php
$this->breadcrumbs=array(
    t('Dashboard')
);
?>

<div class="span3">
    <ul class="nav nav-list">
        <li><?php echo CHtml::link('My Groups', array('index')) ?></li>

        <li class="nav-header"><?php echo t('Groups') ?></li>
        <?php foreach($groups as $group): ?>
        <li><?php echo CHtml::link(CHtml::encode($group['title']), array('read', 'id'=>$group['id'])) ?></li>
        <?php endforeach; ?>
    </ul>
</div>
<div class="span4">
    <h1><?php echo t('Dashboard') ?></h1>

    <?php echo $this->renderPartial('_posts', array('posts'=>$posts, 'showGroup'=>true)); ?>
</div>