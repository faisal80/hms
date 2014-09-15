<?php

/**
 * This is the model class for table "payment_type".
 *
 * The followings are the available columns in table 'payment_type':
 * @property string $id
 * @property string $category_id
 * @property string $payment_type
 * @property string $amount
 * @property string $create_user
 * @property string $create_time
 * @property string $update_user
 * @property string $update_time
 */
class PaymentType extends HMSActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'payment_type';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('category_id, payment_type, amount, create_user, create_time', 'required'),
			array('category_id, amount, create_user, update_user', 'length', 'max'=>10),
			array('payment_type', 'length', 'max'=>100),
			array('update_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, category_id, payment_type, amount, create_user, create_time, update_user, update_time', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'category_id' => 'Category',
			'payment_type' => 'Payment Type',
			'amount' => 'Amount',
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
		$criteria->compare('category_id',$this->category_id,true);
		$criteria->compare('payment_type',$this->payment_type,true);
		$criteria->compare('amount',$this->amount,true);
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
	 * @return PaymentType the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
