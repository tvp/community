<?php
$this->breadcrumbs = array(
	'Профиль'
);
?>

<h1>Профиль</h1>

	<div class="form">
		<?php echo CHtml::beginForm(); ?>
		<?php echo CHtml::errorSummary($model, null, null, array('class' => 'alert')); ?>

		<div class="span3">
            <dl class="dl-horizontal">
                <dt>Общая информация</dt>
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

                <dt>Контакты</dt>
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

                <dt>Фотография</dt>
                <dd>
                    <div class="row">
                        <?php $this->widget(
                        'bootstrap.widgets.TbButtonGroup',
                        array(
                            'buttons' => array(
                                array(
                                    'label' => 'Изменить фотографию',
                                    'icon' => 'picture',
                                    'htmlOptions' => array(
                                        'data-toggle' => 'modal',
                                        'data-target' => '#uploadPhoto',
                                    ),
                                ),
                                array(
                                    'items' => array(
                                        array(
                                            'label' => 'Удалить фотографию',
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

                <dt>Безопасность</dt>
                <dd>
                    <div class="row">
                        <?php $this->widget(
                        'bootstrap.widgets.TbButton',
                        array(
                            'label' => 'Изменить пароль',
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

		<br class="clear">

		<div class="row submit">
			<?php echo CHtml::submitButton('Сохранить', array('class' => 'btn btn-primary')); ?>
		</div>

		<?php echo CHtml::endForm(); ?>
	</div><!-- form -->

<?php $this->beginWidget('bootstrap.widgets.TbModal', array('id' => 'uploadPhoto')); ?>

	<div class="modal-header">
		<a class="close" data-dismiss="modal">&times;</a>
		<h4>Загрузка фотографии</h4>
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
				'label' => 'Закрыть',
				'url' => '#',
				'htmlOptions' => array('data-dismiss' => 'modal'),
			)
		); ?>
	</div>

<?php $this->endWidget(); ?>

<?php $this->beginWidget('bootstrap.widgets.TbModal', array('id' => 'changePassword')); ?>

	<div class="modal-header">
		<a class="close" data-dismiss="modal">&times;</a>
		<h4>Смена пароля</h4>
	</div>

	<div class="modal-body">
		<div class="alert" id="passwordsNotEqual">
			Пароли не совпадают
		</div>
		<div class="row">
			<label for="password">Новый пароль</label>
			<input id="password" type="password">
		</div>
		<div class="row">
			<label for="password">Повторите пароль</label>
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