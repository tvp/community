<?php
$this->breadcrumbs=array(
    t('Administration')
);
?>

<h1><?php echo t('Requests') ?></h1>

<?php $this->widget('bootstrap.widgets.TbMenu', array(
    'type' => 'tabs',
    'items' => array(
        array('label'=> t('Pending'), 'url'=>array('/admin/requests/pending')),
        array('label'=> t('Active'), 'url'=>array('/admin/requests/active')),
        array('label'=> t('Blocked'), 'url'=>array('/admin/requests/blocked')),
    ),
)); ?>

<?php foreach ($model as $user): ?>
<div class="span-1" style="height: 300px; overflow: hidden;">
    <div style="height: 200px;overflow: hidden">
        <img src="<?php echo $user['photo'] ?>" width="200">
    </div>
    <h4><?php echo $user['first_name'] ?> <?php echo $user['last_name'] ?></h4>
    <p><?php echo $user['email'] ?></p>
    <p><?php echo $user['phone'] ?></p>
</div>
<?php endforeach; ?>