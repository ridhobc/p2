<?php

namespace backend\modules\pos\models;

use Yii;

/**
 * This is the model class for table "pos_propinsi_kota".
 *
 * @property integer $id
 * @property string $propinsi_id
 * @property string $name
 * @property string $type
 * @property string $postal_code
 */
class PosPropinsiKota extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pos_propinsi_kota';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['propinsi_id', 'type'], 'string', 'max' => 45],
            [['name'], 'string', 'max' => 255],
            [['postal_code'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'propinsi_id' => 'Propinsi ID',
            'name' => 'Name',
            'type' => 'Type',
            'postal_code' => 'Postal Code',
        ];
    }
}
