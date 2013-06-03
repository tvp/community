<?php
$this->breadcrumbs = array(
	'Профиль'
);
?>

<h1>Профиль</h1>

	<div class="form">
		<?php echo CHtml::beginForm(); ?>
		<?php echo CHtml::errorSummary($model, null, null, array('class' => 'alert')); ?>

		<div class="span5">
            <dl class="dl-horizontal">
                <dt><?php echo t('General Information') ?></dt>
                <dd>
                    <div class="row">
                        <?php echo CHtml::activeLabel($model, 'last_name'); ?>
                        <?php echo CHtml::activeTextField($model, 'last_name'); ?>
                    </div>

                    <div class="row">
                        <?php echo CHtml::activeLabel($model, 'first_name'); ?>
                        <?php echo CHtml::activeTextField($model, 'first_name'); ?>
                    </div>

                    <div class="row">
                        <?php echo CHtml::activeLabel($model, 'second_name'); ?>
                        <?php echo CHtml::activeTextField($model, 'second_name'); ?>
                    </div>
                </dd>

                <dt><?php echo t('Photo') ?></dt>
                <dd>
                    <div class="row">
                        <?php $this->widget(
                        'bootstrap.widgets.TbButtonGroup',
                        array(
                            'buttons' => array(
                                array(
                                    'label' => t('Change photo'),
                                    'icon' => 'picture',
                                    'htmlOptions' => array(
                                        'data-toggle' => 'modal',
                                        'data-target' => '#uploadPhoto',
                                    ),
                                ),
                                array(
                                    'items' => array(
                                        array(
                                            'label' => t('Remove photo'),
                                            'url' => array('/society/accounts/removePhoto')
                                        ),
                                    )
                                ),
                            ),
                        )
                    ); ?>
                        <br><br>
                    </div>

                    <div class="row profile-photo">
                        <?php if ($model->photo): ?>
                        <img id="photo" src="<?php echo $model->photo ?>">
                        <?php else: ?>
                        <img id="photo" src="/images/nophoto.png">
                        <?php endif;?>
                    </div>
                </dd>

                <dt><?php echo t('Security Settings') ?></dt>
                <dd>
                    <div class="row">
                        <?php $this->widget(
                        'bootstrap.widgets.TbButton',
                        array(
                            'label' => t('Change Password'),
                            'icon' => 'lock',
                            'htmlOptions' => array(
                                'data-toggle' => 'modal',
                                'data-target' => '#changePassword',
                                'id' => 'changePasswordButton'
                            ),
                            'url' => '#'
                        )
                    ); ?>
                        <script>
                            $(function () {
                                $('#changePasswordButton').click(function () {
                                    $("#passwordsNotEqual").hide();
                                    $("#password").val("");
                                    $("#repeat_password").val("");
                                    return true;
                                })
                            })
                        </script>
                        <br><br>
                    </div>
                </dd>
            </dl>
        </div>
        <div class="span5"
            <dl class="dl-horizontal">
                <dt><?php echo t('Contacts') ?></dt>
                <dd>
                    <div class="row">
                        <?php echo CHtml::activeLabel($model, 'email'); ?>
                        <?php echo CHtml::activeTextField($model, 'email'); ?>
                    </div>

                    <div class="row">
                        <?php echo CHtml::activeLabel($model, 'phone'); ?>
                        <?php echo CHtml::activeTextField($model, 'phone'); ?>
                    </div>

                    <div class="row">
                        <?php echo CHtml::activeLabel($model, 'website'); ?>
                        <?php echo CHtml::activeTextField($model, 'website'); ?>
                    </div>
                </dd>

                <dt><?php echo t('Social Networks') ?></dt>
                <dd>
                    <div class="row">
                        <?php echo CHtml::activeLabel($model, 'vkontakte'); ?>
                        <?php echo CHtml::activeTextField($model, 'vkontakte'); ?>
                    </div>
                    <div class="row">
                        <?php echo CHtml::activeLabel($model, 'twitter'); ?>
                        <?php echo CHtml::activeTextField($model, 'twitter'); ?>
                    </div>
                    <div class="row">
                        <?php echo CHtml::activeLabel($model, 'facebook'); ?>
                        <?php echo CHtml::activeTextField($model, 'facebook'); ?>
                    </div>
                    <div class="row">
                        <?php echo CHtml::activeLabel($model, 'google'); ?>
                        <?php echo CHtml::activeTextField($model, 'google'); ?>
                    </div>
                    <div class="row">
                        <?php echo CHtml::activeLabel($model, 'instagram'); ?>
                        <?php echo CHtml::activeTextField($model, 'instagram'); ?>
                    </div>
                </dd>

                <dt><?php echo t('Skills') ?></dt>
                <dd>
                    <div class="row">
                        <?php echo t('Languages') ?><br>
                        english, deutsch, русский
                    </div>
                    <div class="row">
                        <?php echo t('Skills') ?><br>
                        ...
                    </div>
                </dd>

                <dt><?php echo t('Geography') ?></dt>
                <dd>
                    <div class="row">
                        <?php echo CHtml::activeLabel($model, 'country'); ?>
                        <?php echo CHtml::activeTextField($model, 'country'); ?>
                    </div>
                    <div class="row">
                        <?php echo CHtml::activeLabel($model, 'city'); ?>
                        <?php echo CHtml::activeTextField($model, 'city'); ?>
                    </div>
                </dd>
            </dl>
        </div>

		<br class="clear">

		<div class="row submit">
			<?php echo CHtml::submitButton(t('Save'), array('class' => 'btn btn-primary')); ?>
		</div>

		<?php echo CHtml::endForm(); ?>
	</div><!-- form -->

<?php $this->beginWidget('bootstrap.widgets.TbModal', array('id' => 'uploadPhoto')); ?>

	<div class="modal-header">
		<a class="close" data-dismiss="modal">&times;</a>
		<h4><?php echo t('Upload a Photo') ?></h4>
	</div>

	<div class="modal-body">
		<?php
		$this->widget(
			'ext.EAjaxUpload.EAjaxUpload',
			array(
				'id' => 'uploadFile',
				'config' => array(
					'action' => Yii::app()->createUrl('/society/accounts/upload'),
					'allowedExtensions' => array("jpg", "jpeg", "gif", "png"),
					'sizeLimit' => 10 * 1024 * 1024,
					'minSizeLimit' => 1,
					'onComplete' => new CJavaScriptExpression("function(id, fileName, responseJSON){
																$('#photo').attr('src', '/uploads/'+responseJSON.filename);
																$.post('".Yii::app()->createUrl('/society/accounts/changePhoto')."', {filename: '/uploads/' + responseJSON.filename});
																}"),
				)
			)
		);
		?>
	</div>

	<div class="modal-footer">
		<?php $this->widget(
			'bootstrap.widgets.TbButton',
			array(
				'label' => t('Close'),
				'url' => '#',
				'htmlOptions' => array('data-dismiss' => 'modal'),
			)
		); ?>
	</div>

<?php $this->endWidget(); ?>

<?php $this->beginWidget('bootstrap.widgets.TbModal', array('id' => 'changePassword')); ?>

	<div class="modal-header">
		<a class="close" data-dismiss="modal">&times;</a>
		<h4><?php echo t('Change Password') ?></h4>
	</div>

	<div class="modal-body">
		<div class="alert" id="passwordsNotEqual">
            <?php echo t('Passwords doesn\'t match') ?>
		</div>
		<div class="row">
			<label for="password"><?php echo t('New password') ?></label>
			<input id="password" type="password">
		</div>
		<div class="row">
			<label for="password"><?php echo t('Repeat password') ?></label>
			<input id="repeat_password" type="password">
		</div>
	</div>

	<div class="modal-footer">
		<?php $this->widget(
			'bootstrap.widgets.TbButton',
			array(
				'label' => 'Сохранить',
				'buttonType' => 'ajaxButton',
				'ajaxOptions' => array(
					'type' => 'post',
					'beforeSend' => new CJavaScriptExpression('function(){
										if($("#password").val().length > 0 && $("#password").val()==$("#repeat_password").val()) {
											$.post("'.Yii::app()->createUrl('/society/accounts/changePassword').'", {password:$("#password").val()});
											$("#changePassword").modal("hide");
										} else {
											$("#passwordsNotEqual").show();
										}
									}'),
				)
			)
		); ?>
	</div>

<?php $this->endWidget(); ?>