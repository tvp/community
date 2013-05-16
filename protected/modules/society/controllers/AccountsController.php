<?php

class AccountsController extends Controller
{
	public function actionRegister()
	{
		$model = new User(User::SIGNUP);
		$form = new CForm('application.modules.society.forms.register', $model);
		$form->model = $model;
		if ($form->submitted('register') && $form->validate()) {
			$user = $form->model;
			if ($user->save()) {
//                $message = new YiiMailMessage;
//                $message->view = 'registrationIntro';
//                $message->setSubject('[Кабинет] Подтверждение регистрации');
//                $message->setBody(array('user'=>$user), 'text/html');
//                $message->addTo($user->email);
//                $message->from = Yii::app()->params['adminEmail'];
//                Yii::app()->mail->send($message);

				$this->redirect(array('accounts/welcome'));
			}
		} else {
			$this->render('register', array('form' => $form));
		}
	}

	public function actionWelcome()
	{
		$this->render('welcome');
	}

	public function actionLogin()
	{
		if (!Yii::app()->user->isGuest) {
			$this->redirect(array('accounts/my'));
		}

		$model = new User(User::LOGIN);
		$form = new CForm('application.modules.society.forms.login', $model);
		$form->model = $model;
		if ($form->submitted('login') && $form->validate()) {
			$model = $form->model;

			if ($model->validate()) {
				if ($model->login()) {
					$this->redirect(array('my'));
				}
			}
		}

		$this->render('login', array('form' => $form));
	}

	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

	public function actionMy()
	{
		$user = User::model()->findByPk(Yii::app()->user->id);
		if (isset($_POST['User'])) {
			$user->scenario = User::PROFILE;
			$user->attributes = $_POST['User'];
			if ($user->validate()) {
				$user->save(false);
				$this->redirect(array('/society/accounts/my'));
			}
		}
		$this->layout = '//layouts/profile';
		$this->render('my', array('model' => $user));
	}

	public function actionUpload()
	{
		Yii::import("ext.EAjaxUpload.qqFileUploader");
		$folder = dirname(Yii::getPathOfAlias('application')).'/uploads/';
		$allowedExtensions = array("jpg", "jpeg", "gif", "png");
		$sizeLimit = 10 * 1024 * 1024;
		$uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
		$result = $uploader->handleUpload($folder, true);

		$result = htmlspecialchars(json_encode($result), ENT_NOQUOTES);
		echo $result;
	}

	public function actionChangePhoto()
	{
		$filename = $_POST['filename'];
		$user = User::model()->findByPk(Yii::app()->user->id);
		$user->photo = $filename;
		$user->save(false);
	}

	public function actionRemovePhoto()
	{
		$user = User::model()->findByPk(Yii::app()->user->id);
		$user->photo = '';
		$user->save(false);
		$this->redirect(array('my'));
	}

	public function actionChangePassword()
	{
		$user = User::model()->findByPk(Yii::app()->user->id);
		$user->scenario = User::PASSWORD;
		$user->password = $_POST['password'];
		$user->save(false);
	}
}