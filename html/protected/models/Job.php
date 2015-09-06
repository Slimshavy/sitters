<?php

/**
 * This is the model class for table "job".
 *
 * The followings are the available columns in table 'job':
 * @property integer $id
 * @property string $scheduledstarttime
 * @property string $scheduledendtime
 * @property string $actualstarttime
 * @property string $actualendtime
 * @property integer $parentuserid
 * @property integer $babysitteruserid
 * @property integer $childcount
 * @property integer $maxchildage
 * @property integer $minchildage
 * @property string $hourlyrate
 * @property string $amount
 * @property string $tip
 * @property string $creditcardfee
 * @property string $createdate
 * @property string $lastupdatedate
 * @property integer $lastupdateuserid
 *
 * The followings are the available model relations:
 * @property User $parentuser
 * @property User $babysitteruser
 * @property Payment[] $payments
 * @property Rating[] $ratings
 */
class Job extends CActiveRecord
{
    public $jobdate;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'job';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('scheduledstarttime, scheduledendtime,jobdate', 'required'),
			array('parentuserid, babysitteruserid, childcount, maxchildage, minchildage, lastupdateuserid', 'numerical', 'integerOnly'=>true),
			array('hourlyrate, creditcardfee', 'length', 'max'=>5),
			array('amount, tip', 'length', 'max'=>7),
			array('actualstarttime, actualendtime', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, scheduledstarttime, scheduledendtime, actualstarttime, actualendtime, parentuserid, babysitteruserid, childcount, maxchildage, minchildage, hourlyrate, amount, tip, creditcardfee, createdate, lastupdatedate, lastupdateuserid', 'safe', 'on'=>'search'),
		);
	}

    public function beforeSave()
    {
        $this->lastupdatedate = date('Y-m-d H:i:s');
        $this->lastupdateuserid = Yii::app()->user->getId();
        
        $this->scheduledstarttime = $this->jobdate.' '.$this->scheduledstarttime;
        $this->scheduledendtime = $this->jobdate.' '.$this->scheduledendtime;

        if ($this->isNewRecord)
        {
            $this->parentuserid = Yii::app()->user->getId();
        }
        return true;
    }
 
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'parentuser' => array(self::BELONGS_TO, 'User', 'parentuserid'),
			'babysitteruser' => array(self::BELONGS_TO, 'User', 'babysitteruserid'),
			'payments' => array(self::HAS_MANY, 'Payment', 'jobid'),
			'ratings' => array(self::HAS_MANY, 'Rating', 'jobid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'scheduledstarttime' => 'Scheduledstarttime',
			'scheduledendtime' => 'Scheduledendtime',
			'actualstarttime' => 'Actualstarttime',
			'actualendtime' => 'Actualendtime',
			'parentuserid' => 'Parentuserid',
			'babysitteruserid' => 'Babysitteruserid',
			'childcount' => 'Childcount',
			'maxchildage' => 'Maxchildage',
			'minchildage' => 'Minchildage',
			'hourlyrate' => 'Hourlyrate',
			'amount' => 'Amount',
			'tip' => 'Tip',
			'creditcardfee' => 'Creditcardfee',
			'createdate' => 'Createdate',
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
		$criteria->compare('scheduledstarttime',$this->scheduledstarttime,true);
		$criteria->compare('scheduledendtime',$this->scheduledendtime,true);
		$criteria->compare('actualstarttime',$this->actualstarttime,true);
		$criteria->compare('actualendtime',$this->actualendtime,true);
		$criteria->compare('parentuserid',$this->parentuserid);
		$criteria->compare('babysitteruserid',$this->babysitteruserid);
		$criteria->compare('childcount',$this->childcount);
		$criteria->compare('maxchildage',$this->maxchildage);
		$criteria->compare('minchildage',$this->minchildage);
		$criteria->compare('hourlyrate',$this->hourlyrate,true);
		$criteria->compare('amount',$this->amount,true);
		$criteria->compare('tip',$this->tip,true);
		$criteria->compare('creditcardfee',$this->creditcardfee,true);
		$criteria->compare('createdate',$this->createdate,true);
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
	 * @return Job the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
