<?php
/* @var $this GenresController */
/* @var $model Genre */

$this->breadcrumbs=array(
	'Genres'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Genre', 'url'=>array('index')),
	array('label'=>'Manage Genre', 'url'=>array('admin')),
);
?>

<h1>Create Genre</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>