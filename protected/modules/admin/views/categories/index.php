<?php
/* @var $this CategoriesController */
/* @var $model Category */

$this->breadcrumbs=array(
	'Администрирование'=>array('/admin/dashboard/index'),
	'Категории',
);

?>

<h1>Категории</h1>

<?php echo CHtml::link('Создать', array('/admin/categories/create'), array('class'=>'btn')); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'category-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'title',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}{delete}'
		),
	),
)); ?>
