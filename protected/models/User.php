<?php
/**
 * @property integer $id
 * @property string $first_name
 * @property string $second_name
 * @property string $last_name
 * @property string $email
 * @property string $phone
 * @property string $photo
 * @property string $website
 * @property string $password
 */
class User extends CActiveRecord
{
	const SIGNUP = 'signup';
	const LOGIN = 'login';
	const PROFILE = 'profile';
	const PASSWORD = 'password';

	/**
	 * @var string используется для подтверждения пароля
	 */
	public $passwordRepeat;

	/**
	 * Returns the static model of the specified AR class.
	 * @return User the static model class
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'users';
	}

	public function rules()
	{
		return array(
			array(
				'first_name, last_name, email, phone, password, passwordRepeat',
				'required',
				'on' => self::SIGNUP,
				'message' => 'Заполните поле {attribute}'
			),
			array(
				'first_name, last_name, email, phone',
				'required',
				'on' => self::PROFILE,
				'message' => 'Заполните поле {attribute}'
			),
			array('email, password', 'required', 'on' => self::LOGIN, 'message' => 'Заполните поле {attribute}'),
			array('email, phone', 'unique', 'on' => self::SIGNUP, 'message' => 'Такой {attribute} уже зарегистрирован'),
			array(
				'email, password',
				'length',
				'max' => 255,
				'on' => self::SIGNUP,
				'message' => 'Максимальная длина {attribute} 255 символов'
			),
			array(
				'phone',
				'length',
				'max' => 20,
				'on' => self::SIGNUP,
				'message' => '{attribute} должен состоять не более 20 цифр'
			),
			array(
				'password',
				'compare',
				'compareAttribute' => 'passwordRepeat',
				'on' => self::SIGNUP,
				'message' => 'Пароли не совпадают'
			),
			array('id, email, phone, password, first_name, last_name, second_name, country, city, vkontakte, facebook, twitter, google, instagram, languages, skills, birth_date, nickname', 'safe'),
			array(
				'email',
				'filter',
				'filter' => 'mb_strtolower',
				'on' => self::SIGNUP,
				'message' => '{attribute} должен быть записан маленькими буквами'
			),
			array('email', 'email', 'on' => self::SIGNUP),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'first_name' => t('First Name'),
			'second_name' => t('Second Name'),
			'last_name' => t('Family Name'),
            'birth_date' => t('Birth Date'),
            'nickname' => t('Nick Name'),
			'email' => t('Email'),
			'phone' => t('Phone'),
			'website' => t('Web Site'),
			'password' => t('Password'),
			'passwordRepeat' => t('Repeat Password'),
			'photo' => t('Photo'),
            'country' => t('Country of residence'),
            'city' => t('City of residence'),
            'vkontakte' => t('Vkontakte'),
            'facebook' => t('Facebook'),
            'twitter' => t('Twitter'),
            'google' => t('Google+'),
            'instagram' => t('Instagram'),
            'languages' => t('Languages'),
            'skills' => t('Professional skills to volunteer'),
            'tvp_adv' => t('How did you find out about The Venus Project?'),
            'tvp_goal' => t('What would you like to see in The Venus Project?'),
            'tvp_projects' => t('What project within The Venus Project would you like to take part in?'),
            'tvp_suggest' => t('What project within The Venus Project would you like to suggest, if any?'),
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);

		$criteria->compare('last_name', $this->first_name, true);
		$criteria->compare('first_name', $this->last_name, true);
		$criteria->compare('email', $this->email, true);

		$criteria->compare('phone', $this->phone, true);

		$criteria->compare('password', $this->password, true);

		return new CActiveDataProvider('User', array(
			'criteria' => $criteria,
		));
	}

	protected function beforeSave()
	{
		if (parent::beforeSave()) {
			if ($this->isNewRecord) {
				$this->registered = date('Y-m-d H:i:s');
				$this->password = self::hashPassword($this->password);
			}

			if ($this->scenario == self::PASSWORD) {
				$this->password = self::hashPassword($this->password);
			}

			return true;
		}

		return false;
	}

	static function hashPassword($password)
	{
		return md5($password);
	}

	public function login()
	{
		$identity = new UserIdentity($this->email, $this->password);
		if ($identity->authenticate()) {
			Yii::app()->user->login($identity);

			return true;
		} else {
			$this->addError('email', 'Не верный email или пароль');

			return false;
		}
	}
}