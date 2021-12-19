<?php

namespace backend\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $name
 * @property integer $gender
 * @property string $born
 * @property string $birthday
 * @property string $address
 * @property string $phone
 * @property string $email
 * @property integer $religion_id
 * @property string $role
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property TrainingUser[] $trainingUsers
 * @property Training[] $trainings
 */
class User extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'user';
    }

    public $password, $password_repeat, $password_reset;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            
        //password
        [['username'],'unique', 'message'=>'Pilih username lain gan!'],
        ['password', 'string', 'min' => 6],
        [['nip'], 'string', 'min' => 18, 'message' => 'Gunakan NIP Baru'],
        [['username', 'nip', 'name', 'email', 'phone', 'role','kd_kantor'], 'required', 'message' => 'Tidak boleh kosong'],
        [['gender', 'religion_id', 'status', 'iddisposisi', 'created_at', 'updated_at','unit_id' ], 'integer'],
        [['birthday'], 'safe'],
        [['email'], 'filter', 'filter' => 'trim'],
        [['email'], 'email'],
//            [['email'], 'unique','targetClass'=>'\common\models\User','message' => 'Email sudah terpakai'],
        [['address', 'jabatan'], 'string'],
        [['username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
        [['auth_key'], 'string', 'max' => 32],
        [['name'], 'string', 'max' => 50],
        [['born', 'phone', 'role'], 'string', 'max' => 30],
        
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'name' => 'Nama Lengkap',
            'nip' => 'NIP',
            'iddisposisi' => 'Disposisi',
            'gender' => 'Gender',
            'born' => 'Tempat Lahir',
            'birthday' => 'Tgl Lahir',
            'address' => 'Alamat',
            'phone' => 'Phone',
            'email' => 'Email',
            'religion_id' => 'Agama',
            'role' => 'Role',
            'status' => 'Status',
            
            'jabatan' => 'jabatan',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    
    public function getagama() {
        return $this->hasOne(Agama::className(), ['id' => 'religion_id']);
    }
    
    

    public static function getPhoto($imgName) {
        $dispImg = is_file(Yii::getAlias('@webroot') . '/web/user/' . $imgName) ? true : false;
        return Yii::getAlias('@web') . "/web/user/" . (($dispImg) ? $imgName : "no-photo.png");
    }

    public function getChatname()
    {
        return User::find()->where(['id' => Yii::$app->user->id])->one()['name'];
    }
 
    public function getChaticon()
    {
        return User::find()->where(['id' => Yii::$app->user->id])->one()['photo'];
    }
    
    
    
    public function behaviors() {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['updated_at', 'created_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
            ]
        ];
    }

}

