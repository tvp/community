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
			$user->first_name = CHtml::encode($user->first_name);
			$user->last_name = CHtml::encode($user->last_name);
			$user->email = CHtml::encode($user->email);
			$user->phone = CHtml::encode($user->phone);
			if ($user->save()) {
                $model->confirmEmail();
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

    public function actionForgotPassword()
    {
        $model = new User;
        $form = new CForm('application.modules.society.forms.password', $model);
        if ($form->submitted('password')) {
            $user = User::model()->findByAttributes(array('email'=>strtolower($_POST['User']['email'])));
            if($user) {
                $password = time();
                $user->password = User::hashPassword($password);
                $user->save(false);
                $message = new YiiMailMessage;
                $message->view = 'password_' . Yii::app()->language;
                $message->setSubject(t('[Community Online] Password Recovery'));
                $message->setBody(array('user'=>$user, 'password'=>$password), 'text/html');
                $message->addTo($user->email);
                $message->from = Yii::app()->params['adminEmail'];
                Yii::app()->mail->send($message);
                Yii::app()->user->setFlash('success', t("Check your mail"));
                $this->redirect(array('/'));
            } else {
                Yii::app()->user->setFlash('error', t("Wrong email"));
            }
        }

        $this->render('forgotPassword', array('form' => $form));
    }

    public function actionConfirm($hash)
    {
        $user = User::model()->find("hash='$hash'");
        if($user) {
            $user->hash = '';
            $user->confirmed = 1;
            $user->save(false);
            Yii::app()->user->setFlash('success', t("Your email was successfully confirmed"));
            $identity = new UserIdentity($user->email, $user->password);
            $identity->authenticate(true);
            Yii::app()->user->login($identity);
            $this->redirect(array('dashboard/index'));
        } else {
            throw new CHttpException(404, t('Confirmation code is wrong'));
        }
    }

	public function actionLogin()
	{
		if (!Yii::app()->user->isGuest) {
			$this->redirect(array('dashboard/index'));
		}

		$model = new User(User::LOGIN);
		$form = new CForm('application.modules.society.forms.login', $model);
		$form->model = $model;
		if ($form->submitted('login') && $form->validate()) {
			$model = $form->model;

			if ($model->validate()) {
				if ($model->login()) {
					$this->redirect(array('dashboard/index'));
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

    public function actionIndex()
    {
        $user = User::model()->findAll('confirmed=1');
        $this->layout = '//layouts/profile';
        $this->render('index', array('model' => $user));
    }

	public function actionMy()
	{
		$user = User::model()->findByPk(Yii::app()->user->id);
		if (isset($_POST['User'])) {
			$user->attributes = $_POST['User'];
			if ($user->validate()) {
				$user->save(true);
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