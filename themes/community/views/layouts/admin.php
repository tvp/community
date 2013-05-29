<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="row">
    <div class="span3">
        <div id="sidebar">
        <?php
            $this->widget('bootstrap.widgets.TbMenu', array(
            	'type'=>'nav',
                'items'=>array(
	                array('label'=>'Категории', 'url'=>array('/admin/categories/index')),
	            ),
            ));
        ?>
        </div><!-- sidebar -->
    </div>
    <div class="span8">
        <div id="content">
            <?php echo $content; ?>
        </div><!-- content -->
    </div>
</div>
<?php $this->endContent(); ?>