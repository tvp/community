<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle = Yii::app()->name . ' - '. t('Login');
$this->breadcrumbs = array(
    t('Login'),
);
?>

<h1><?php echo t('Login')?></h1>

<div class="span4"></div>
<div class="form well span4">
<?php echo $form?>
</div>
<div class="span4"></div>
