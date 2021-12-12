<?php

namespace backend\modules\pegawai\models;

use Yii;

/**
 * This is the model class for table "db_pangkat".
 *
 * @property integer $id
 * @property string $nm_pangkat
 * @property string $kd_pangkat
 */
class DbPangkat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_pangkat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nm_pangkat', 'kd_pangkat'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nm_pangkat' => 'Nm Pangkat',
            'kd_pangkat' => 'Kd Pangkat',
        ];
    }
}
