<?php

/**
 * This is the model class for table "payment_detail".
 *
 * The followings are the available columns in table 'payment_detail':
 * @property string $id
 * @property string $applicant_id
 * @property string $date
 * @property string $payment_type_id
 * @property string $remarks
 * @property string $amount
 * @property string $allotment_id
 * @property string $create_user
 * @property string $create_time
 * @property string $update_user
 * @property string $update_time
 */
class PaymentDetail extends HMSActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'payment_detail';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('applicant_id, date, payment_type_id, amount, allotment_id, create_user, create_time', 'required'),
			array('applicant_id, payment_type_id, amount, allotment_id, create_user, update_user', 'length', 'max'=>10),
			array('remarks', 'length', 'max'=>255),
			array('update_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, applicant_id, date, payment_type_id, remarks, amount, allotment_id, create_user, create_time, update_user, update_time', 'safe', 'on'=>'search'),
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
			'applicant_id' => 'Applicant',
			'date' => 'Date',
			'payment_type_id' => 'Payment Type',
			'remarks' => 'Remarks',
			'amount' => 'Amount',
			'allotment_id' => 'Allotment',
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
		$criteria->compare('remarks',$this->remarks,true);
		$criteria->compare('amount',$this->amount,true);
		$criteria->compare('allotment_id',$this->allotment_id,true);
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
	 * @return PaymentDetail the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
