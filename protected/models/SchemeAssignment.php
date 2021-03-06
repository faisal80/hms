<?php

/**
 * This is the model class for table "scheme_assignment".
 *
 * The followings are the available columns in table 'scheme_assignment':
 * @property string $id
 * @property integer $user_id
 * @property integer $scheme_id
 * @property integer $create_user
 * @property string $create_time
 * @property integer $update_user
 * @property string $update_time
 */
class SchemeAssignment extends HMSActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'scheme_assignment';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('user_id, scheme_id, create_user, create_time, update_user', 'required'),
            array('user_id, scheme_id, create_user, update_user', 'numerical', 'integerOnly' => true),
            array('update_time', 'safe'),
            array('*', 'compositeUniqueKeysValidator'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, user_id, scheme_id, create_user, create_time, update_user, update_time', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'user'=>array(self::BELONGS_TO, 'User', 'user_id'),
            'scheme'=>array(self::BELONGS_TO, 'Scheme', 'scheme_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'user_id' => 'User',
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id, true);
        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('scheme_id', $this->scheme_id);
        $criteria->compare('create_user', $this->create_user);
        $criteria->compare('create_time', $this->create_time, true);
        $criteria->compare('update_user', $this->update_user);
        $criteria->compare('update_time', $this->update_time, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return SchemeAssignment the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function behaviors() {
        return array(
            'ECompositeUniqueKeyValidatable' => array(// This behavior adds composite unique key validator
                'class' => 'application.extensions.ECompositeUniqueKeyValidatable',
                'uniqueKeys' => array(
                    'attributes' => 'scheme_id, user_id',
                    'errorMessage' => 'This scheme is already assigned this user.',
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

}
