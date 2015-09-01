<?php

require_once __DIR__ . '/../helpers/EncryptionHelper.php';

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $firstname
 * @property string $lastname
 * @property string $dob
 * @property integer $usertypeid
 * @property string $useraddress
 * @property string $userunit
 * @property string $usercity
 * @property string $userstate
 * @property string $userzip
 * @property string $cellphone
 * @property string $homephone
 * @property integer $babysittingsince
 * @property string $registrationdate
 * @property string $profilephotopath
 */
class Users extends CActiveRecord
{
    public $password_repeat;

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'users';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('username, password, email, password_repeat, firstname, lastname, dob, usertypeid', 'required'),
            array('usertypeid, babysittingsince', 'numerical', 'integerOnly' => true),
            array('username, password, email, firstname, lastname, useraddress, userunit, usercity, profilephotopath', 'length', 'max' => 128),
            array('userstate', 'length', 'max' => 2),
            array('userzip', 'length', 'max' => 5),
            array('cellphone, homephone', 'length', 'max' => 10),
            array('registrationdate', 'safe'),
            array('password', 'compare', 'operator' => '=='),
            array('password', 'compare', 'operator' => '=='),
            array('usertypeid', 'in', 'range' => array(2, 3), 'except' => 'admin'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, username, password, email, firstname, lastname, dob, usertypeid, useraddress, userunit, usercity, userstate, userzip, cellphone, homephone, babysittingsince, registrationdate, profilephotopath', 'safe', 'on' => 'search'),
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
            'usertype' => array(self::BELONGS_TO, 'Usertypes', 'usertypeid'),
            'parentjobs' => array(self::HAS_MANY, 'Jobs', 'parentid'),
            'babysitterjobs' => array(self::HAS_MANY, 'Jobs', 'babysitterid'),
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
            'password_repeat' => 'Repeat Password',
            'email' => 'Email',
            'firstname' => 'First Name',
            'lastname' => 'Last Name',
            'dob' => 'Dob',
            'usertypeid' => 'Usertypeid',
            'useraddress' => 'Address',
            'userunit' => 'Unit',
            'usercity' => 'City',
            'userstate' => 'State',
            'userzip' => 'Zip',
            'cellphone' => 'Cell Phone',
            'homephone' => 'Home Phone',
            'babysittingsince' => 'Baby Sitting Since Year',
            'registrationdate' => 'Registrationdate',
            'profilephotopath' => 'Profilephotopath',
        );
    }

    protected function beforeSave()
    {
        if($this->getIsNewRecord())
        {
            if($this->profilephotopath == null)
                addDefaultPhoto();

        }
        
        //            $this->password = create_hash($this->password);
    }

    public function validatePassword($password)
    {
        return isset($password);
        //return CPasswordHelper::verifyPassword($password, $this->password);
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

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('username', $this->username, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('firstname', $this->firstname, true);
        $criteria->compare('lastname', $this->lastname, true);
        $criteria->compare('dob', $this->dob, true);
        $criteria->compare('usertypeid', $this->usertypeid);
        $criteria->compare('useraddress', $this->useraddress, true);
        $criteria->compare('userunit', $this->userunit, true);
        $criteria->compare('usercity', $this->usercity, true);
        $criteria->compare('userstate', $this->userstate, true);
        $criteria->compare('userzip', $this->userzip, true);
        $criteria->compare('cellphone', $this->cellphone, true);
        $criteria->compare('homephone', $this->homephone, true);
        $criteria->compare('babysittingsince', $this->babysittingsince);
        $criteria->compare('registrationdate', $this->registrationdate, true);
        $criteria->compare('profilephotopath', $this->profilephotopath, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

        
    private function addDefaultPhoto()
    {
        if($this->usertypeid == 3)
        {
            if($this->gender == 'F')
                $this->profilephotopath = Yii::app()->params['defaultFemaleParentProfilePic' ];
            else
                $this->profilephotopath = Yii::app()->params['defaultMaleParentProfilePic' ];
        }
        else
        {
            if($this->gender == 'F')
                $this->profilephotopath = Yii::app()->params['defaultFemaleBabysitterProfilePic'];    
            else
                $this->profilephotopath = Yii::app()->params['defaultMaleBabysitterProfilePic'];
        }
    }
    
    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Users the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
