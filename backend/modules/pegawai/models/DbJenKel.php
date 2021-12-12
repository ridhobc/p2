<?php

namespace backend\modules\pegawai\models;

use Yii;

/**
 * This is the model class for table "db_jen_kel".
 *
 * @property integer $id
 * @property string $nm_kelamin
 * @property string $jen_kel
 */
class DbJenKel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_jen_kel';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nm_kelamin', 'jen_kel'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nm_kelamin' => 'Nm Kelamin',
            'jen_kel' => 'Jen Kel',
        ];
    }
}
