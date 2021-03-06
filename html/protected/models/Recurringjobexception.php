<?php

/**
 * This is the model class for table "recurringjobexception".
 *
 * The followings are the available columns in table 'recurringjobexception':
 * @property integer $id
 * @property integer $reccuringjobid
 * @property string $startdate
 * @property string $enddate
 * @property integer $newstarttime
 * @property integer $newendtime
 * @property string $createdate
 * @property integer $createbyuserid
 * @property string $lastupdatedate
 * @property integer $lastupdateuserid
 *
 * The followings are the available model relations:
 * @property Recurringjobscheduler $reccuringjob
 */
class Recurringjobexception extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'recurringjobexception';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('reccuringjobid, startdate, createdate, createbyuserid, lastupdatedate, lastupdateuserid', 'required'),
			array('reccuringjobid, newstarttime, newendtime, createbyuserid, lastupdateuserid', 'numerical', 'integerOnly'=>true),
			array('enddate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, reccuringjobid, startdate, enddate, newstarttime, newendtime, createdate, createbyuserid, lastupdatedate, lastupdateuserid', 'safe', 'on'=>'search'),
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
			'reccuringjob' => array(self::BELONGS_TO, 'Recurringjobscheduler', 'reccuringjobid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'reccuringjobid' => 'Reccuringjobid',
			'startdate' => 'Startdate',
			'enddate' => 'Enddate',
			'newstarttime' => 'Newstarttime',
			'newendtime' => 'Newendtime',
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
		$criteria->compare('reccuringjobid',$this->reccuringjobid);
		$criteria->compare('startdate',$this->startdate,true);
		$criteria->compare('enddate',$this->enddate,true);
		$criteria->compare('newstarttime',$this->newstarttime);
		$criteria->compare('newendtime',$this->newendtime);
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
	 * @return Recurringjobexception the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
