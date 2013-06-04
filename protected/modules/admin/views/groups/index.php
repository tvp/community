<h1><?php echo t('Groups') ?></h1>
<?php
$this->breadcrumbs = array(
	'Groups'=>array('index'),
	'Manage',
);

echo CHtml::link('<i class="icon icon-plus"></i> '.t('Add'), array('/admin/groups/create'), array('class'=>'btn'));

$this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'group-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'title',
		'message',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
