<?php

namespace backend\modules\setting\models;

use Yii;

/**
 * This is the model class for table "db_pangkat".
 *
 * @property int $id
 * @property string|null $nm_pangkat
 * @property string|null $kd_pangkat
 * @property string|null $kd_gol
 */
class DbPangkat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'db_pangkat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nm_pangkat', 'kd_pangkat', 'kd_gol'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nm_pangkat' => 'Nm Pangkat',
            'kd_pangkat' => 'Kd Pangkat',
            'kd_gol' => 'Kd Gol',
        ];
    }
}
