<?php

namespace backend\modules\pos\models;

use Yii;

/**
 * This is the model class for table "pos_status_srt".
 *
 * @property integer $id
 * @property string $nm_status
 */
class PosStatusSrt extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pos_status_srt';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nm_status'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nm_status' => 'Nm Status',
        ];
    }
}
