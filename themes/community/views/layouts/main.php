<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<?php Yii::app()->bootstrap->register(); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />
</head>

<body>

<?php $this->widget('bootstrap.widgets.TbNavbar', array(
    'brand' => 'Community Online',
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>array(
                array('label'=>'Вход', 'url'=>array('/society/accounts/login'), 'visible'=>Yii::app()->user->isGuest),
                array('label'=>'Регистрация', 'url'=>array('/society/accounts/register'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Профиль', 'url'=>array('/society/accounts/my'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'Сообщество', 'url'=>array('/society/accounts/index'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Выход ('.Yii::app()->user->name.')', 'url'=>array('/society/accounts/logout'), 'visible'=>!Yii::app()->user->isGuest)
            ),
        ),
    ),
)); ?>

<div class="container" id="page">

	<?php $this->widget('bootstrap.widgets.TbAlert', array(
	        'block'=>true, // display a larger alert block?
	        'fade'=>true, // use transitions?
	        'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
	        'alerts'=>array( // configurations per alert type
	            'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
	        ),
	    )); ?>
	    
	<?php echo $content; ?>

	<div class="clear"></div>

</div><!-- page -->

</body>
</html>
