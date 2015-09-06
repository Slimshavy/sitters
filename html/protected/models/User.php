<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $firstname
 * @property string $lastname
 * @property string $dob
 * @property integer $usertypeid
 * @property string $gender
 * @property string $useraddress
 * @property string $userunit
 * @property string $usercity
 * @property string $userstate
 * @property string $userzip
 * @property string $cellphone
 * @property string $homephone
 * @property integer $babysittingsince
 * @property string $profilephotopath
 * @property string $registrationdate
 * @property string $lastupdatedate
 * @property integer $lastupdateuserid
 *
 * The followings are the available model relations:
 * @property Availabilityschedule[] $availabilityschedules
 * @property Job[] $jobs
 * @property Job[] $jobs1
 * @property Rating[] $ratings
 * @property Rating[] $ratings1
 * @property Recurringjobscheduler[] $recurringjobschedulers
 * @property Recurringjobscheduler[] $recurringjobschedulers1
 * @property Usertype $usertype
 * @property Userdocument[] $userdocuments
 * @property Userskill[] $userskills
 */
class User extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, email, firstname, lastname, dob, usertypeid, gender', 'required'),
			array('usertypeid, babysittingsince, lastupdateuserid', 'numerical', 'integerOnly'=>true),
			array('username, password, email, firstname, lastname, useraddress, userunit, usercity, profilephotopath', 'length', 'max'=>128),
			array('gender', 'length', 'max'=>1),
			array('userstate', 'length', 'max'=>2),
			array('userzip', 'length', 'max'=>5),
			array('usertypeid','in','range'=>array(2,3),'allowEmpty'=>false,'on'=>'register'),
			array('gender','in','range'=>array('F','M'),'allowEmpty'=>false),
			array('cellphone, homephone', 'length', 'is'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, username, password, email, firstname, lastname, dob, usertypeid, gender, useraddress, userunit, usercity, userstate, userzip, cellphone, homephone, babysittingsince, profilephotopath, registrationdate, lastupdatedate, lastupdateuserid', 'safe', 'on'=>'search'),
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
			'availabilityschedules' => array(self::HAS_MANY, 'Availabilityschedule', 'userid'),
			'jobs' => array(self::HAS_MANY, 'Job', 'parentuserid'),
			'jobs1' => array(self::HAS_MANY, 'Job', 'babysitteruserid'),
			'ratings' => array(self::HAS_MANY, 'Rating', 'rateruserid'),
			'ratings1' => array(self::HAS_MANY, 'Rating', 'rateeuserid'),
			'recurringjobschedulers' => array(self::HAS_MANY, 'Recurringjobscheduler', 'babysitteruserid'),
			'recurringjobschedulers1' => array(self::HAS_MANY, 'Recurringjobscheduler', 'parentuserid'),
			'usertype' => array(self::BELONGS_TO, 'Usertype', 'usertypeid'),
			'userdocuments' => array(self::HAS_MANY, 'Userdocument', 'userid'),
			'userskills' => array(self::HAS_MANY, 'Userskill', 'userid'),
		);
	}

        public function scopes()
        {
            return array(
                'babysitters'=>array(
                    'condition'=>'usertypeid=babysitter',
                ),
                
            );
        }
    
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'password' => 'Password',
			'email' => 'Email',
			'firstname' => 'Firstname',
			'lastname' => 'Lastname',
			'dob' => 'Dob',
			'usertypeid' => 'Usertypeid',
			'gender' => 'Gender',
			'useraddress' => 'Useraddress',
			'userunit' => 'Userunit',
			'usercity' => 'Usercity',
			'userstate' => 'Userstate',
			'userzip' => 'Userzip',
			'cellphone' => 'Cellphone',
			'homephone' => 'Homephone',
			'babysittingsince' => 'Babysittingsince',
			'profilephotopath' => 'Profilephotopath',
			'registrationdate' => 'Registrationdate',
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('firstname',$this->firstname,true);
		$criteria->compare('lastname',$this->lastname,true);
		$criteria->compare('dob',$this->dob,true);
		$criteria->compare('usertypeid',$this->usertypeid);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('useraddress',$this->useraddress,true);
		$criteria->compare('userunit',$this->userunit,true);
		$criteria->compare('usercity',$this->usercity,true);
		$criteria->compare('userstate',$this->userstate,true);
		$criteria->compare('userzip',$this->userzip,true);
		$criteria->compare('cellphone',$this->cellphone,true);
		$criteria->compare('homephone',$this->homephone,true);
		$criteria->compare('babysittingsince',$this->babysittingsince);
		$criteria->compare('profilephotopath',$this->profilephotopath,true);
		$criteria->compare('registrationdate',$this->registrationdate,true);
		$criteria->compare('lastupdatedate',$this->lastupdatedate,true);
		$criteria->compare('lastupdateuserid',$this->lastupdateuserid);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
                   
                    protected function beforeSave()
	{
		parent::beforeSave();
	
	                  if($this->isNewRecord)
	                  {
	                       $passwordHelper = new PasswordHelper();
	                       $this->password = CPasswordHelper::hashPassword($this->password);
                                     }
	                    return true;
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
