<?php

/**
 * This is the model class for table "trainings".
 *
 * The followings are the available columns in table 'trainings':
 * @property integer $id
 * @property string $title
 * @property string $date
 * @property integer $genre_id
 * @property integer $category_id
 * @property string $description
 * @property integer $duration
 * @property integer $place_type_id
 * @property integer $place_room_id
 * @property integer $attribute_id
 * @property string $attribute_additional
 * @property integer $checked
 * @property integer $payed
 * @property integer $festival_id
 */
class Training extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return trainings the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'trainings';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, date, genre_id, category_id, description, duration, place_type_id, place_room_id, festival_id', 'required'),
			array('genre_id, category_id, duration, place_type_id, place_room_id, attribute_id, checked, payed, festival_id', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, date, genre_id, category_id, description, duration, place_type_id, place_room_id, attribute_id, attribute_additional, checked, payed, festival_id', 'safe', 'on'=>'search'),
		);
	}
	
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'categories' => array(self::BELONGS_TO, 'Category', 'category_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'title' => 'Title',
			'date' => 'Date',
			'genre_id' => 'Жанр',
			'category_id' => 'Категория',
			'description' => 'Description',
			'duration' => 'Duration',
			'place_type_id' => 'Place Type',
			'place_room_id' => 'Place Room',
			'attribute_id' => 'Attribute',
			'attribute_additional' => 'Attribute Additional',
			'checked' => 'Checked',
			'payed' => 'Payed',
			'festival_id' => 'Festival',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);

		$criteria->compare('title',$this->title,true);

		$criteria->compare('date',$this->date,true);

		$criteria->compare('genre_id',$this->genre_id);

		$criteria->compare('category_id',$this->category_id);

		$criteria->compare('description',$this->description,true);

		$criteria->compare('duration',$this->duration);

		$criteria->compare('place_type_id',$this->place_type_id);

		$criteria->compare('place_room_id',$this->place_room_id);

		$criteria->compare('attribute_id',$this->attribute_id);

		$criteria->compare('attribute_additional',$this->attribute_additional,true);

		$criteria->compare('checked',$this->checked);

		$criteria->compare('payed',$this->payed);

		$criteria->compare('festival_id',$this->festival_id);

		return new CActiveDataProvider('Training', array(
			'criteria'=>$criteria,
		));
	}
}