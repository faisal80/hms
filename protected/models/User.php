<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property string $id
 * @property string $fullname
 * @property string $username
 * @property string $password
 * @property string $date_format
 * @property string $create_user
 * @property string $create_time
 * @property string $update_user
 * @property string $update_time
 */
class User extends HMSActiveRecord {

    public $password_repeat;
    public $newpassword;
    public $newpassword_repeat;
    private $_identity;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'user';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('fullname, username, password, date_format, create_user, create_time, update_user', 'required'),
            array('fullname, password', 'length', 'max' => 255),
            array('newpassword', 'required', 'on'=>'changepwd'),
            array('username', 'unique'),
            array('password', 'compare', 'on'=>'insert'), // This confirms the repeat password
            array('newpassword_repeat', 'compare', 'compareAttribute'=>'newpassword', 'on'=>'changepwd'),
            array('username, date_format, create_user, update_user', 'length', 'max' => 10),
            array('update_time, password_repeat', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, fullname, username, password, date_format, create_user, create_time, update_user, update_time', 'safe', 'on' => 'search'),
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
            'fullname' => 'User\'s Full Name',
            'username' => 'Username',
            'password' => 'Password',
            'password_repeat' => 'Re-enter Password',
            'newpassword' => 'Enter New Password',
            'newpassword_repeat' => 'Re-enter New Password',
            'date_format' => 'Date Format',
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
        $criteria->compare('fullname', $this->fullname, true);
        $criteria->compare('username', $this->username, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('date_format', $this->date_format, true);
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
     * @return User the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * Authenticates the password.
     * This is the 'authenticate' validator as declared in rules().
     */
    public function authenticate($_username, $_password) {
        $this->_identity = new UserIdentity($_username, $_password);
        if ($this->_identity->authenticate()) {
            return true;
        } else {
            $this->addError('password', 'Invalid password');
            return false;
        }
    }

    /**
     * perform one-way encryption on the password before we store it in	the database
     */
    protected function afterValidate() {
        parent::afterValidate();
        $this->password = $this->encrypt($this->password);
    }

    public function encrypt($value) {
        return md5($value);
    }

    public static function getUserOptions()
    {
        $result = array();
        $paymenttypes = PaymentType::model()->findAll();
        foreach ($paymenttypes as $paymenttype)
        {
            $result = $result + array($paymenttype['id']=> $paymenttype->category->category .' ('. $paymenttype->category->plot_size . ($paymenttype->category->corner?' - Corner)': ') '). $paymenttype['payment_type']);
            
        }
        return $result;
    }
}
