<?php

/**
 * This is the model class for table "applicant".
 *
 * The followings are the available columns in table 'applicant':
 * @property string $id
 * @property string $title
 * @property string $name
 * @property string $fname
 * @property string $nic
 * @property string $dob
 * @property string $contact_1
 * @property string $contact_2
 * @property string $postal_address
 * @property string $permanent_address
 * @property string $occupation_status
 * @property string $employer
 * @property string $nominee
 * @property string $relationship
 * @property string $nominee_fname
 * @property string $nominee_nic
 * @property string $app_no
 * @property string $create_user
 * @property string $create_time
 * @property string $update_user
 * @property string $update_time
 */
class Applicant extends HMSActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'applicant';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, name, fname, nic, postal_address, create_user, create_time', 'required'),
			array('title, create_user, update_user', 'length', 'max'=>10),
			array('name, fname, contact_1, contact_2, postal_address, permanent_address, employer, nominee, relationship, nominee_fname', 'length', 'max'=>255),
			array('nic, nominee_nic', 'length', 'max'=>15),
			array('occupation_status, app_no', 'length', 'max'=>100),
			array('dob, update_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, name, fname, nic, dob, contact_1, contact_2, postal_address, permanent_address, occupation_status, employer, nominee, relationship, nominee_fname, nominee_nic, app_no, create_user, create_time, update_user, update_time', 'safe', 'on'=>'search'),
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
			'title' => 'Title',
			'name' => 'Name of Applicant',
			'fname' => 'Father Name of Applicant',
			'nic' => 'NIC No.',
			'dob' => 'Date of Birth',
			'contact_1' => 'Contact No.',
			'contact_2' => '2nd Contact No.',
			'postal_address' => 'Postal Address',
			'permanent_address' => 'Permanent Address',
			'occupation_status' => 'Status of Occupation',
			'employer' => 'Name of Employer',
			'nominee' => 'Name of Nominee',
			'relationship' => 'Relationership with Applicant',
			'nominee_fname' => 'Father Name of Nominee',
			'nominee_nic' => 'NIC No. of Nominee',
			'app_no' => 'Application No.',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('fname',$this->fname,true);
		$criteria->compare('nic',$this->nic,true);
		$criteria->compare('dob',$this->dob,true);
		$criteria->compare('contact_1',$this->contact_1,true);
		$criteria->compare('contact_2',$this->contact_2,true);
		$criteria->compare('postal_address',$this->postal_address,true);
		$criteria->compare('permanent_address',$this->permanent_address,true);
		$criteria->compare('occupation_status',$this->occupation_status,true);
		$criteria->compare('employer',$this->employer,true);
		$criteria->compare('nominee',$this->nominee,true);
		$criteria->compare('relationship',$this->relationship,true);
		$criteria->compare('nominee_fname',$this->nominee_fname,true);
		$criteria->compare('nominee_nic',$this->nominee_nic,true);
		$criteria->compare('app_no',$this->app_no,true);
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
	 * @return Applicant the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
