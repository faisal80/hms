<?php

/**
 * This is the model class for table "allotment".
 *
 * The followings are the available columns in table 'allotment':
 * @property string $id
 * @property string $applicant_id
 * @property string $scheme_id
 * @property string $category_id
 * @property string $plot_no
 * @property string $street_no
 * @property string $sector
 * @property string $phase
 * @property string $date
 * @property string $order_no
 * @property string $create_user
 * @property string $create_time
 * @property string $update_user
 * @property string $update_time
 * @property string $type 'allotment' or 'transfer' not a db field.
 */
class Allotment extends HMSActiveRecord {

    public $_type = 'allotment';  // Type of allotment 'transfer' or 'allotment'
    public $_transfer_id = null;  // If $_type is 'transfer' then transfer_id
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'allotment';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('applicant_id, scheme_id, category_id, plot_no, date, order_no, create_user, create_time', 'required'),
            array('applicant_id, scheme_id, category_id, plot_no, street_no, sector, phase, create_user, update_user', 'length', 'max' => 10),
            array('order_no', 'length', 'max' => 255),
            array('update_time', 'safe'),
            array('*', 'compositeUniqueKeysValidator'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, applicant_id, scheme_id, category_id, plot_no, street_no, sector, phase, date, order_no, create_user, create_time, update_user, update_time', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'applicant' => array(self::BELONGS_TO, 'Applicant', 'applicant_id'),
            'category' => array(self::BELONGS_TO, 'Category', 'category_id'),
            'scheme' => array(self::BELONGS_TO, 'Scheme', 'scheme_id'),
            'transfers'=> array(self::HAS_MANY, 'Transfer', 'allotment_id'),
            'payments_detail'=>array(self::HAS_MANY, 'PaymentDetail', 'allotment_id'),
            'latest_transfer'=>array(self::HAS_ONE, 'Transfer', 'allotment_id', 'order'=>'latest_transfer.id DESC'),
            'last_2_transfers'=>array(self::HAS_MANY, 'Transfer', 'allotment_id', 'order'=>'last_2_transfers.id DESC', 'limit'=>2),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'applicant_id' => 'Applicant ID',
            'scheme_id' => 'Scheme ID',
            'category_id' => 'Category ID',
            'plot_no' => 'Plot No.',
            'street_no' => 'Street No.',
            'sector' => 'Sector',
            'phase' => 'Phase',
            'date' => 'Allotment Date',
            'order_no' => 'Allotment Order No.',
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
        $criteria->compare('applicant_id', $this->applicant_id, true);
        $criteria->compare('scheme_id', $this->scheme_id, true);
        $criteria->compare('category_id', $this->category_id, true);
        $criteria->compare('plot_no', $this->plot_no, true);
        $criteria->compare('street_no', $this->street_no, true);
        $criteria->compare('sector', $this->sector, true);
        $criteria->compare('phase', $this->phase, true);
        $criteria->compare('date', $this->date, true);
        $criteria->compare('order_no', $this->order_no, true);
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
     * @return Allotment the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function getAllotmentOptions()
    {
        $result = array();
        $allotments = Allotment::model()->findAll();
        foreach ($allotments as $allotment)
        {
            $result = $result + array($allotment['id']=>
                $allotment->applicant->name . ' (' .
                $allotment->category->category . ' - ' .
                $allotment->category->plot_size . 
                ($allotment->category->corner ? ' Corner)': ') ') .
                $allotment->scheme->name
            );
        }
        return $result;
    }

    public function getCurrentAllottee(){
        $result = Allotment::model()->findByPk($this->id);
        if ($this->latest_transfer) { 
            $result->applicant_id = $this->latest_transfer->transfer_to->id;
            $result->date = $this->latest_transfer->transfer_date;
            $result->order_no = $this->latest_transfer->deed_no;
            $result->type = 'transfer';
            $result->_transfer_id = $this->latest_transfer->id;
        }
        return $result;
    }
    
    public function getType(){
        if ($this->latest_transfer)
            $this->_type = 'transfer';
        return $this->_type;
    }
    
    public function setType($type){
        $this->_type = $type;
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

    public function behaviors() {
        return array(
            'ECompositeUniqueKeyValidatable' => array(// This behavior adds composite unique key validator
                'class' => 'application.extensions.ECompositeUniqueKeyValidatable',
                'uniqueKeys' => array(
                    'attributes' => 'applicant_id, category_id, scheme_id, plot_no, sector, street_no, phase',
                    'errorMessage' => 'This plot has already been allotted.',
                )
            ),
        );
    }

    /**
     * Validates composite unique keys
     *
     * Validates composite unique keys declared in the
     * ECompositeUniqueKeyValidatable bahavior
     */
    public function compositeUniqueKeysValidator() {
        $this->validateCompositeUniqueKeys();
    }

    public function getNextId() {
        $record = self::model()->find(array(
            'condition' => 'id>:current_id',
            'order' => 'id ASC',
            'limit' => 1,
            'params' => array(':current_id' => $this->id),
        ));
        if ($record !== null)
            return $record->id;
        return null;
    }

    public function getPreviousId() {
        $record = self::model()->find(array(
            'condition' => 'id<:current_id',
            'order' => 'id DESC',
            'limit' => 1,
            'params' => array(':current_id' => $this->id),
        ));
        if ($record !== null)
            return $record->id;
        return null;
    }

    public function getFirstId() {
        $record = self::model()->find(array(
            'order' => 'id ASC',
            'limit' => 1,
        ));
        if ($record !== null)
            return $record->id;
        return null;
    }

    public function getLastId() {
        $record = self::model()->find(array(
            'order' => 'id DESC',
            'limit' => 1,
        ));
        if ($record !== null)
            return $record->id;
        return null;
    }
    
}
