<?php /* @var $this Controller */ ?>
<?php
$this->beginContent('//layouts/main');
$this->breadcrumbs=array(
    t('Administration')
);
?>
<div class="row">
    <div class="span12">
        <div id="content">
            <div class="span3">
                <?php $this->widget('bootstrap.widgets.TbMenu', array(
                'type' => 'list',
                'items' => array(
                        array('label'=>t('Human Resources'), 'class'=>'header'),
                        array('label'=> t('Requests'), 'icon'=>'home', 'url'=>array('/admin/requests/pending')),
                        array('label'=> t('Skills'), 'icon'=>'book', 'url'=>array('/admin/skills/index'), 'visible'=>false),
                        array('label'=> t('Groups'), 'icon'=>'globe', 'url'=>array('/admin/groups/index')),
                    ),
                )); ?>
            </div>
            <div class="span8">
                <?php echo $content ?>
            </div>
        </div><!-- content -->
    </div>
</div>
<?php $this->endContent(); ?>