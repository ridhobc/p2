<?php

namespace backend\modules\pegawai\models;

use Yii;

/**
 * This is the model class for table "db_pendidikan".
 *
 * @property integer $id
 * @property string $kd_pendidikan
 * @property string $nm_pendidikan
 */
class DbPendidikan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_pendidikan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kd_pendidikan'], 'string', 'max' => 10],
            [['nm_pendidikan'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kd_pendidikan' => 'Kd Pendidikan',
            'nm_pendidikan' => 'Nm Pendidikan',
        ];
    }
}
