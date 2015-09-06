<?php

/**
 * This is the model class for table "availabilitydetaildate".
 *
 * The followings are the available columns in table 'availabilitydetaildate':
 * @property integer $id
 * @property integer $availabilityid
 * @property string $workdate
 * @property string $starttime
 * @property string $endtime
 * @property string $hourlyrate
 * @property integer $isexception
 * @property string $createdate
 * @property integer $createbyuserid
 * @property string $lastupdatedate
 * @property integer $lastupdateuserid
 */
class Availabilitydetaildate extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'availabilitydetaildate';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('availabilityid, workdate, createdate, createbyuserid, lastupdatedate, lastupdateuserid', 'required'),
			array('availabilityid, isexception, createbyuserid, lastupdateuserid', 'numerical', 'integerOnly'=>true),
			array('hourlyrate', 'length', 'max'=>5),
			array('starttime, endtime', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, availabilityid, workdate, starttime, endtime, hourlyrate, isexception, createdate, createbyuserid, lastupdatedate, lastupdateuserid', 'safe', 'on'=>'search'),
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
			'availabilityid' => 'Availabilityid',
			'workdate' => 'Workdate',
			'starttime' => 'Starttime',
			'endtime' => 'Endtime',
			'hourlyrate' => 'Hourlyrate',
			'isexception' => 'Isexception',
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
		$criteria->compare('availabilityid',$this->availabilityid);
		$criteria->compare('workdate',$this->workdate,true);
		$criteria->compare('starttime',$this->starttime,true);
		$criteria->compare('endtime',$this->endtime,true);
		$criteria->compare('hourlyrate',$this->hourlyrate,true);
		$criteria->compare('isexception',$this->isexception);
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
	 * @return Availabilitydetaildate the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
