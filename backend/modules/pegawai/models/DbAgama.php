<?php

namespace backend\modules\pegawai\models;

use Yii;

/**
 * This is the model class for table "db_agama".
 *
 * @property integer $id
 * @property string $nm_agama
 */
class DbAgama extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_agama';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nm_agama'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nm_agama' => 'Nm Agama',
        ];
    }
}
