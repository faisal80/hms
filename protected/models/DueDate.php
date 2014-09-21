<?php

/**
 * This is the model class for table "due_date".
 *
 * The followings are the available columns in table 'due_date':
 * @property string $id
 * @property string $applicant_id
 * @property string $date
 * @property string $payment_type_id
 * @property string $scheme_id
 * @property string $create_user
 * @property string $create_time
 * @property string $update_user
 * @property string $update_time
 */
class DueDate extends HMSActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'due_date';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('applicant_id, date, payment_type_id, scheme_id, create_user, create_time', 'required'),
			array('applicant_id, payment_type_id, scheme_id, create_user, update_user', 'length', 'max'=>10),
			array('update_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, applicant_id, date, payment_type_id, scheme_id, create_user, create_time, update_user, update_time', 'safe', 'on'=>'search'),
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
            'applicant' => array(self::BELONGS_TO, 'Applicant', 'applicant_id'),
            'payment_type'=> array(self::BELONGS_TO, 'PaymentType', 'payment_type_id'),
            'scheme' => array(self::BELONGS_TO, 'Scheme', 'scheme_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'applicant_id' => 'Applicant ID',
			'date' => 'Date',
			'payment_type_id' => 'Payment Type',
			'scheme_id' => 'Scheme',
			'create_user' => 'Create User',
			'create_time' => 'Create Time',
			'update_user' => 'Update User',
			'update_time' => 'Update Time',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('applicant_id',$this->applicant_id,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('payment_type_id',$this->payment_type_id,true);
		$criteria->compare('scheme_id',$this->scheme_id,true);
		$criteria->compare('create_user',$this->create_user,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_user',$this->update_user,true);
		$criteria->compare('update_time',$this->update_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DueDate the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    protected function beforeSave() 
    {
        $this->fixDate($this, 'date' );
        return parent::beforeSave();
    }

    protected function beforeFind() 
    {
        $this->fixDate($this, 'date');
        parent::beforeFind();
    }

    protected function afterFind() 
    {
        $this->fixDate($this, 'date', false);
        parent::afterFind();
    }

}
