<?php

/**
 * This is the model class for table "scheme".
 *
 * The followings are the available columns in table 'scheme':
 * @property string $id
 * @property string $name
 * @property string $draw_date
 * @property integer $penalty
 * @property string $occurence
 * @property string $installment_interval
 * @property string $account
 * @property string $bank
 * @property string $create_user
 * @property string $create_time
 * @property string $update_user
 * @property string $update_time
 */
class Scheme extends HMSActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'scheme';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, occurence, installment_interval, account, bank, create_user, create_time', 'required'),
//            array('penalty', 'numerical', 'integerOnly' => true),
            array('penalty', 'length', 'max'=>5),
            array('name, account, bank', 'length', 'max' => 255),
            array('occurence, installment_interval, create_user, update_user', 'length', 'max' => 10),
            array('draw_date, update_time', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, name, draw_date, penalty, occurence, installment_interval, account, bank, create_user, create_time, update_user, update_time', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'name' => 'Name of Scheme',
            'draw_date' => 'Date of Draw',
            'penalty' => '%age of Penalty',
            'occurence' => 'Occurence of Penalty',
            'installment_interval' => 'Installment Interval',
            'account' => 'Account No.',
            'bank' => 'Bank Branch',
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id, true);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('draw_date', $this->draw_date, true);
        $criteria->compare('penalty', $this->penalty);
        $criteria->compare('occurence', $this->occurence, true);
        $criteria->compare('installment_interval', $this->installment_interval, true);
        $criteria->compare('account', $this->account, true);
        $criteria->compare('bank', $this->bank, true);
        $criteria->compare('create_user', $this->create_user, true);
        $criteria->compare('create_time', $this->create_time, true);
        $criteria->compare('update_user', $this->update_user, true);
        $criteria->compare('update_time', $this->update_time, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Scheme the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function getSchemeOptions() {
        //lists all schemes
        $_Schemes = Scheme::model()->findAll();
        $schemesArray = CHtml::listData($_Schemes, 'id', 'name');
        return $schemesArray;
    }

    protected function beforeSave() 
    {
        $this->fixDate($this, 'draw_date' );
        return parent::beforeSave();
    }

    protected function beforeFind() 
    {
        $this->fixDate($this, 'draw_date');
        parent::beforeFind();
    }

    protected function afterFind() 
    {
        $this->fixDate($this, 'draw_date', false);
        parent::afterFind();
    }
}
