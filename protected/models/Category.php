<?php

/**
 * This is the model class for table "category".
 *
 * The followings are the available columns in table 'category':
 * @property string $id
 * @property string $category
 * @property string $plot_size
 * @property integer $corner
 * @property string $scheme_id
 * @property string $create_user
 * @property string $create_time
 * @property string $update_user
 * @property string $update_time
 */
class Category extends HMSActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'category';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('category, plot_size, corner, scheme_id, create_user, create_time', 'required'),
			array('corner', 'numerical', 'integerOnly'=>true),
			array('category', 'length', 'max'=>100),
			array('plot_size', 'length', 'max'=>50),
			array('scheme_id, create_user, update_user', 'length', 'max'=>10),
			array('update_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, category, plot_size, corner, scheme_id, create_user, create_time, update_user, update_time', 'safe', 'on'=>'search'),
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
            'scheme'=>array(self::BELONGS_TO, 'Scheme', 'scheme_id'),
            'payment_types'=>array(self::HAS_MANY, 'PaymentType', 'category_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'category' => 'Category',
			'plot_size' => 'Plot Size',
			'corner' => 'Corner',
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
		$criteria->compare('category',$this->category,true);
		$criteria->compare('plot_size',$this->plot_size,true);
		$criteria->compare('corner',$this->corner);
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
	 * @return Category the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public static function getCategoryOptions()
    {
        $categoriesArray = array();
		//lists all categories
		$_categories = Category::model()->findAll();
        foreach ($_categories as $category)
        {
            $categoriesArray = $categoriesArray + array($category['id'] => $category['category'] . ' ('. $category['plot_size']. ($category['corner']?' - Corner)': ')'));
        }
	  	return $categoriesArray;        
    }
    
}
