<?php

namespace backend\modules\pegawai\models;

use Yii;

/**
 * This is the model class for table "db_jen_jab".
 *
 * @property integer $id
 * @property string $nm_jen_jab
 */
class DbJenJab extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_jen_jab';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nm_jen_jab'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nm_jen_jab' => 'Nm Jen Jab',
        ];
    }
}
