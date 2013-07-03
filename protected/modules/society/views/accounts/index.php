<?php
$this->breadcrumbs=array(
    t('Community')
);
?>

<h1><?php echo t('Community') ?></h1>

<?php foreach ($model as $user): ?>
    <div class="span-1" style="height: 300px; overflow: hidden;">
        <div style="height: 200px;overflow: hidden">
            <img src="<?php echo $user['photo'] ?>" width="200">
        </div>
        <h4><?php echo CHtml::encode($user['first_name']) ?> <?php echo CHtml::encode($user['last_name']) ?></h4>
        <p><?php echo CHtml::encode($user['email']) ?></p>
        <p><?php echo CHtml::encode($user['phone']) ?></p>
    </div>
<?php endforeach; ?>