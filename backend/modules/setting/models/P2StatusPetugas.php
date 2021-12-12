<?php

namespace backend\modules\setting\models;

use Yii;

/**
 * This is the model class for table "p2_status_petugas".
 *
 * @property int $id
 * @property string $nm_status
 */
class P2StatusPetugas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'p2_status_petugas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nm_status'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nm_status' => 'Nm Status',
        ];
    }
}
