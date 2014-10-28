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
class Applicant extends HMSActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'applicant';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title, name, fname, nic, postal_address, create_user, create_time', 'required'),
            array('title, create_user, update_user', 'length', 'max' => 10),
            array('name, fname, contact_1, contact_2, postal_address, permanent_address, employer, nominee, relationship, nominee_fname', 'length', 'max' => 255),
            array('nic, nominee_nic', 'length', 'max' => 15),
            array('occupation_status, app_no', 'length', 'max' => 100),
            array('dob, update_time', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, title, name, fname, nic, dob, contact_1, contact_2, postal_address, permanent_address, occupation_status, employer, nominee, relationship, nominee_fname, nominee_nic, app_no, create_user, create_time, update_user, update_time', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'allotments' => array(self::HAS_MANY, 'Allotment', 'applicant_id'), //all allotments whether transferred or not
            'allotment' => array(self::HAS_ONE, 'Allotment', 'applicant_id', 'order'=>'id DESC'), //only active allotment
            'payments_detail' => array(self::HAS_MANY, 'PaymentDetail', 'applicant_id'),
            'due_dates' => array(self::HAS_MANY, 'DueDate', 'applicant_id'),
            'transfers' => array(self::HAS_MANY, 'Transfer', 'applicant_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id, true);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('fname', $this->fname, true);
        $criteria->compare('nic', $this->nic, true);
        $criteria->compare('dob', $this->dob, true);
        $criteria->compare('contact_1', $this->contact_1, true);
        $criteria->compare('contact_2', $this->contact_2, true);
        $criteria->compare('postal_address', $this->postal_address, true);
        $criteria->compare('permanent_address', $this->permanent_address, true);
        $criteria->compare('occupation_status', $this->occupation_status, true);
        $criteria->compare('employer', $this->employer, true);
        $criteria->compare('nominee', $this->nominee, true);
        $criteria->compare('relationship', $this->relationship, true);
        $criteria->compare('nominee_fname', $this->nominee_fname, true);
        $criteria->compare('nominee_nic', $this->nominee_nic, true);
        $criteria->compare('app_no', $this->app_no, true);
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
     * @return Applicant the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getAllotment() {
        //$applicant = $this->loadModel($id);
        $allotments = $this->allotments; // get all allotments made to this applicant
        if (!empty($allotments)) { // if allotment(s) was made
            $cnt = count($allotments);
            for ($i = 0; $i < $cnt; $i++) {
                //check if it was transferred to anyone else
                $criteria = new CDbCriteria(array(
                    'condition' => 'allotment_id=:aid',
                    'order' => 'transfer_date DESC',
                    'limit' => 1,
                    'params' => array(':aid' => $allotments[$i]->id),
                ));
                $transfer = Transfer::model()->find($criteria);
                if ($transfer != null) { //if transferred set $allotment date and deed_no
                    if ($transfer->applicant_id === $this->id) {
                        $allotments[$i]->date = $transfer->transfer_date;
                        $allotments[$i]->order_no = $transfer->deed_no;
                    } else {
                        unset($allotments[$i]);
                    }
                }
            }
        }

        //select allotments from transfers if any
        $criteria = new CDbCriteria(array(
            'condition' => 'applicant_id=:aid',
            'order' => 'transfer_date DESC',
            'limit' => 1,
            'params' => array(':aid' => $this->id),
        ));
        $transfer = Transfer::model()->find($criteria);
        if ($transfer != null) { //if transferred set $allotment date and deed_no
            if ($transfer->applicant_id === $this->id) {
                $allotment = $transfer->allotment;
                $allotment->applicant_id = $transfer->applicant_id;
                $allotment->date = $transfer->transfer_date;
                $allotment->order_no = $transfer->deed_no;
                $allotments[] = $allotment;
            }
        }

        return new CArrayDataProvider($allotments);
    }
    
    public function getPaymentAmount($ptypeid) {
        $p_detail = PaymentDetail::model()->findByPk($ptypeid);
        return $p_detail->amount;
    }

    public static function getApplicantOptions() {
        $result = array();
        //lists all applicants
        $_applicants = Applicant::model()->findAll();
        foreach ($_applicants as $applicant) {
            $result = $result + array($applicant['id'] => $applicant['name'] . ' S/D/o ' . $applicant['fname']);
        }
        return $result;
    }

    protected function beforeSave() {
        $this->fixDate($this, 'dob');
        $this->formatNIC(true);
        return parent::beforeSave();
    }

    protected function beforeFind() {
        $this->fixDate($this, 'dob');
        parent::beforeFind();
    }

    protected function afterFind() {
        $this->fixDate($this, 'dob', false);
        $this->formatNIC();
        parent::afterFind();
    }

    protected function formatNIC($forDB = false) {
        $result = $this->nic;
        $result = str_replace('-', '', $result); //remove all occurences of '-'
        if ($forDB) {
            $this->nic = $result;
        } else {
            $result = substr_replace($result, '-', 5, 0); // places '-' after 5th character place
            $this->nic = substr_replace($result, '-', 13, 0); //places '-' after 13 character place. 
        }
    }

    public function getNameWithTitle() {
        return trim($this->title . ' ' . $this->name);
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
