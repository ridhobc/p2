<?php

namespace backend\modules\pos\models;

use Yii;

/**
 * This is the model class for table "pos_propinsi".
 *
 * @property integer $id
 * @property string $name
 */
class PosPropinsi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pos_propinsi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }
}
