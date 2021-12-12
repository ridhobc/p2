<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tab_unit".
 *
 * @property string $id
 * @property string $kd_unit
 * @property string $nm_unit
 */
class TabUnit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tab_unit';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
           
            [['nm_unit'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
          
            'nm_unit' => 'Nm Unit',
        ];
    }
}
