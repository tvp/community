<?php
$this->breadcrumbs=array(
	'Groups'=>array('index'),
	'Create',
);

?>

<h1>Create Group</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>