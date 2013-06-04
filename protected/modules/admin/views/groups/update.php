<?php
$this->breadcrumbs=array(
	'Groups'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);
?>

<h1>Update Group <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>