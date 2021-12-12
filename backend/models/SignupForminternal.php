<?php

namespace backend\models;

use common\models\User;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SignupForminternal extends Model {

    public $username;
    public $email;
    public $password;
    public $name;
    public $gender;
    public $born;
    public $birthday;
    public $nip;
    public $phone;
    public $role;
    public $religion_id;
//    public $unit_id;
        public $penguji_id;
    public $status;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            ['name', 'required'],
            ['name', 'string', 'min' => 6],
            ['gender', 'required'],
            ['gender', 'integer'],
            ['born', 'required'],
            ['born', 'string', 'min' => 6],
            ['religion_id', 'required'],
            ['religion_id', 'integer'],
//            ['unit_id', 'required'],
//            ['unit_id', 'integer'],
            ['birthday', 'required'],
            ['birthday', 'safe'],
            ['nip', 'required'],
            ['nip', 'string', 'min' => 18],
            ['phone', 'required'],
            ['phone', 'string', 'min' => 6],
            ['role', 'required'],
            ['role', 'in', 'range' => ['penguji', 'loket', 'ppspm']],
            ['penguji_id', 'integer'],
            ['penguji_id', 'required'],
            ['penguji_id', 'unique', 'targetClass' => '\backend\models\TabPenguji', 'message' => 'This username has already been taken.'],
           
            ['status', 'integer'],
        ];
    }

    public function attributeLabels() {
        return [

            'username' => 'Username',
            'password' => 'Password',
            'name' => 'Nama Lengkap',
            'gender' => 'L/P',
            'born' => 'Tempat Lahir',
            'birthday' => 'Tgl Lahir',
            'phone' => 'No HP',
            'email' => 'Email',
            'religion_id' => 'Agama',
            'role' => 'Role',
            'nip' => 'NIP',
//            'unit_id' => 'Unit',
            'penguji_id' => 'Penguji',
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup() {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            $user->name = $this->name;
            $user->gender = $this->gender;
            $user->born = $this->born;
            $user->birthday = $this->birthday;
            $user->phone = $this->phone;
            $user->religion_id = $this->religion_id;
            $user->role = $this->role;
            $user->nip = $this->nip;
            $user->penguji_id = $this->penguji_id;
//            $user->unit_id = $this->unit_id;
            $user->status = 0;
            
            if ($user->save()) {
                return $user;
            }
        }

        return null;
    }

}
