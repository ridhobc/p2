<?php

namespace backend\modules\pegawai\models;

use Yii;

/**
 * This is the model class for table "db_status_pegawai".
 *
 * @property integer $id
 * @property string $nm_status_pegawai
 * @property string $kd_status_pegawai
 */
class DbStatusPegawai extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_status_pegawai';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nm_status_pegawai'], 'string', 'max' => 45],
            [['kd_status_pegawai'], 'string', 'max' => 5],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nm_status_pegawai' => 'Nm Status Pegawai',
            'kd_status_pegawai' => 'Kd Status Pegawai',
        ];
    }
}
