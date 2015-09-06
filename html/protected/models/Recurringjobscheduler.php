<?php

/**
 * This is the model class for table "recurringjobscheduler".
 *
 * The followings are the available columns in table 'recurringjobscheduler':
 * @property integer $id
 * @property string $startdate
 * @property string $enddate
 * @property integer $intervalday
 * @property double $intervalamt
 * @property string $intervalunit
 * @property string $starttime
 * @property string $endtime
 * @property integer $babysitteruserid
 * @property integer $parentuserid
 * @property integer $approvedparent
 * @property integer $approvedbabysitter
 * @property string $createdate
 * @property integer $createbyuserid
 * @property string $lastupdatedate
 * @property integer $lastupdateuserid
 *
 * The followings are the available model relations:
 * @property Recurringjobexception[] $recurringjobexceptions
 * @property User $babysitteruser
 * @property User $parentuser
 */
class Recurringjobscheduler extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'recurringjobscheduler';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('startdate, enddate, intervalday, intervalamt, intervalunit, starttime, babysitteruserid, parentuserid, approvedparent, approvedbabysitter, createdate, createbyuserid, lastupdatedate, lastupdateuserid', 'required'),
			array('intervalday, babysitteruserid, parentuserid, approvedparent, approvedbabysitter, createbyuserid, lastupdateuserid', 'numerical', 'integerOnly'=>true),
			array('intervalamt', 'numerical'),
			array('intervalunit', 'length', 'max'=>1),
			array('endtime', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, startdate, enddate, intervalday, intervalamt, intervalunit, starttime, endtime, babysitteruserid, parentuserid, approvedparent, approvedbabysitter, createdate, createbyuserid, lastupdatedate, lastupdateuserid', 'safe', 'on'=>'search'),
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
			'recurringjobexceptions' => array(self::HAS_MANY, 'Recurringjobexception', 'reccuringjobid'),
			'babysitteruser' => array(self::BELONGS_TO, 'User', 'babysitteruserid'),
			'parentuser' => array(self::BELONGS_TO, 'User', 'parentuserid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'startdate' => 'Startdate',
			'enddate' => 'Enddate',
			'intervalday' => 'Intervalday',
			'intervalamt' => 'Intervalamt',
			'intervalunit' => 'Intervalunit',
			'starttime' => 'Starttime',
			'endtime' => 'Endtime',
			'babysitteruserid' => 'Babysitteruserid',
			'parentuserid' => 'Parentuserid',
			'approvedparent' => 'Approvedparent',
			'approvedbabysitter' => 'Approvedbabysitter',
			'createdate' => 'Createdate',
			'createbyuserid' => 'Createbyuserid',
			'lastupdatedate' => 'Lastupdatedate',
			'lastupdateuserid' => 'Lastupdateuserid',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('startdate',$this->startdate,true);
		$criteria->compare('enddate',$this->enddate,true);
		$criteria->compare('intervalday',$this->intervalday);
		$criteria->compare('intervalamt',$this->intervalamt);
		$criteria->compare('intervalunit',$this->intervalunit,true);
		$criteria->compare('starttime',$this->starttime,true);
		$criteria->compare('endtime',$this->endtime,true);
		$criteria->compare('babysitteruserid',$this->babysitteruserid);
		$criteria->compare('parentuserid',$this->parentuserid);
		$criteria->compare('approvedparent',$this->approvedparent);
		$criteria->compare('approvedbabysitter',$this->approvedbabysitter);
		$criteria->compare('createdate',$this->createdate,true);
		$criteria->compare('createbyuserid',$this->createbyuserid);
		$criteria->compare('lastupdatedate',$this->lastupdatedate,true);
		$criteria->compare('lastupdateuserid',$this->lastupdateuserid);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Recurringjobscheduler the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
