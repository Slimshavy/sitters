<?php

/**
 * This is the model class for table "rating".
 *
 * The followings are the available columns in table 'rating':
 * @property integer $id
 * @property integer $jobid
 * @property integer $rateruserid
 * @property integer $rateeuserid
 * @property integer $rateeusertype
 * @property integer $generalrating
 * @property integer $reliablerating
 * @property integer $punctualrating
 * @property integer $workagainrating
 * @property integer $transportrating
 * @property integer $keepanonymous
 * @property string $createdate
 * @property integer $createbyuserid
 * @property string $lastupdatedate
 * @property integer $lastupdateuserid
 *
 * The followings are the available model relations:
 * @property Job $job
 * @property User $rateruser
 * @property User $rateeuser
 * @property Usertype $rateeusertype0
 */
class Rating extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'rating';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('jobid, rateruserid, rateeuserid, rateeusertype, generalrating, reliablerating, punctualrating, workagainrating, transportrating, keepanonymous, createdate, createbyuserid, lastupdatedate, lastupdateuserid', 'required'),
			array('jobid, rateruserid, rateeuserid, rateeusertype, generalrating, reliablerating, punctualrating, workagainrating, transportrating, keepanonymous, createbyuserid, lastupdateuserid', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, jobid, rateruserid, rateeuserid, rateeusertype, generalrating, reliablerating, punctualrating, workagainrating, transportrating, keepanonymous, createdate, createbyuserid, lastupdatedate, lastupdateuserid', 'safe', 'on'=>'search'),
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
			'job' => array(self::BELONGS_TO, 'Job', 'jobid'),
			'rateruser' => array(self::BELONGS_TO, 'User', 'rateruserid'),
			'rateeuser' => array(self::BELONGS_TO, 'User', 'rateeuserid'),
			'rateeusertype0' => array(self::BELONGS_TO, 'Usertype', 'rateeusertype'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'jobid' => 'Jobid',
			'rateruserid' => 'Rateruserid',
			'rateeuserid' => 'Rateeuserid',
			'rateeusertype' => 'Rateeusertype',
			'generalrating' => 'Generalrating',
			'reliablerating' => 'Reliablerating',
			'punctualrating' => 'Punctualrating',
			'workagainrating' => 'Workagainrating',
			'transportrating' => 'Transportrating',
			'keepanonymous' => 'Keepanonymous',
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
		$criteria->compare('jobid',$this->jobid);
		$criteria->compare('rateruserid',$this->rateruserid);
		$criteria->compare('rateeuserid',$this->rateeuserid);
		$criteria->compare('rateeusertype',$this->rateeusertype);
		$criteria->compare('generalrating',$this->generalrating);
		$criteria->compare('reliablerating',$this->reliablerating);
		$criteria->compare('punctualrating',$this->punctualrating);
		$criteria->compare('workagainrating',$this->workagainrating);
		$criteria->compare('transportrating',$this->transportrating);
		$criteria->compare('keepanonymous',$this->keepanonymous);
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
	 * @return Rating the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
