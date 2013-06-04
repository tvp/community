<?php
$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
    t('Error'),
);
?>

<h2><?php echo t('Error')?> <?php echo $code; ?></h2>

<div class="error">
    <?php echo CHtml::encode($message); ?>
</div>