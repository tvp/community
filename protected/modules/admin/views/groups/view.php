<?php
$this->breadcrumbs=array(
	'Groups'=>array('index'),
	$model->title,
);

?>

<h1>View Group #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'message',
	),
)); ?>
