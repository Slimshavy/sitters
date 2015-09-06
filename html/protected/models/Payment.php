<?php

/**
 * This is the model class for table "payment".
 *
 * The followings are the available columns in table 'payment':
 * @property integer $id
 * @property integer $paymenttypeid
 * @property string $amount
 * @property integer $jobid
 * @property string $paymentdate
 * @property string $createdate
 * @property integer $createbyuserid
 * @property string $lastupdatedate
 * @property integer $lastupdateuserid
 *
 * The followings are the available model relations:
 * @property Paymenttype $paymenttype
 * @property Job $job
 */
class Payment extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'payment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('paymenttypeid, amount, jobid, createdate, createbyuserid, lastupdatedate, lastupdateuserid', 'required'),
			array('paymenttypeid, jobid, createbyuserid, lastupdateuserid', 'numerical', 'integerOnly'=>true),
			array('amount', 'length', 'max'=>7),
			array('paymentdate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, paymenttypeid, amount, jobid, paymentdate, createdate, createbyuserid, lastupdatedate, lastupdateuserid', 'safe', 'on'=>'search'),
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
			'paymenttype' => array(self::BELONGS_TO, 'Paymenttype', 'paymenttypeid'),
			'job' => array(self::BELONGS_TO, 'Job', 'jobid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'paymenttypeid' => 'Paymenttypeid',
			'amount' => 'Amount',
			'jobid' => 'Jobid',
			'paymentdate' => 'Paymentdate',
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
		$criteria->compare('paymenttypeid',$this->paymenttypeid);
		$criteria->compare('amount',$this->amount,true);
		$criteria->compare('jobid',$this->jobid);
		$criteria->compare('paymentdate',$this->paymentdate,true);
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
	 * @return Payment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
