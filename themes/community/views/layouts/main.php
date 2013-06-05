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
                array('label'=> t('Login'), 'url'=>array('/society/accounts/login'), 'visible'=>Yii::app()->user->isGuest),
                array('label'=> t('Registration'), 'url'=>array('/society/accounts/register'), 'visible'=>Yii::app()->user->isGuest),
                array('label'=> t('Dashboard'), 'url'=>array('/society/dashboard/index'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=> t('Community'), 'url'=>array('/society/accounts/index'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=> t('Administration'), 'url'=>array('/admin/dashboard/index'), 'visible'=>!Yii::app()->user->isGuest, 'active' => ($this->module && $this->module->getName() == 'admin')),
				array('label'=> Yii::app()->user->name, 'icon'=>'user', 'visible'=>!Yii::app()->user->isGuest,
                'items'=>array(
                    array('label'=> t('Profile'), 'url'=>array('/society/accounts/my'), 'visible'=>!Yii::app()->user->isGuest),
                    array('label'=> t('Logout'), 'url'=>array('/society/accounts/logout'), 'visible'=>!Yii::app()->user->isGuest)
                )),
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

    <div class="language">
        <?php echo CHtml::link('<span class="ru">русский</span>', array('/', Yii::app()->urlManager->langParam=>'ru'), array(
        'class' => ((Yii::app()->language == 'ru') ? 'action' : ''),
    ));?>
        <?php echo CHtml::link('<span class="en">english</span>', array('/', Yii::app()->urlManager->langParam=>'en'), array(
        'class' => ((Yii::app()->language == 'en') ? 'action' : ''),
    ));?>
    </div>

</div><!-- page -->

</body>
</html>
