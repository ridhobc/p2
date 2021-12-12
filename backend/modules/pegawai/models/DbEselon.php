<?php

namespace backend\modules\pegawai\models;

use Yii;

/**
 * This is the model class for table "db_eselon".
 *
 * @property integer $id
 * @property string $kd_eselon
 * @property string $nm_eselon
 */
class DbEselon extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_eselon';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kd_eselon'], 'string', 'max' => 5],
            [['nm_eselon'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kd_eselon' => 'Kd Eselon',
            'nm_eselon' => 'Nm Eselon',
        ];
    }
}
