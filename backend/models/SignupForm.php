<?php

namespace backend\models;

use common\models\User;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model {

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
    public $unit_id;
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
            ['nip', 'required'],
            ['nip', 'string', 'min' => 18],
            ['status', 'integer'],
        ];
    }

    public function attributeLabels() {
        return [

            'username' => 'Username',
            'password' => 'Password',
            'name' => 'Nama Lengkap',
            'email' => 'Email',
            'nip' => 'NIP',
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
            $user->nip = $this->nip;
            $user->status = 0;

            if ($user->save()) {
                return $user;
            }
        }

        return null;
    }

}
