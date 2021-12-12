<?php

namespace backend\modules\setting\models;

use Yii;

/**
 * This is the model class for table "db_kantor".
 *
 * @property int $id
 * @property string $kd_kantor
 * @property string $nm_kantor
 */
class DbKantor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'db_kantor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kd_kantor'], 'string', 'max' => 45],
            [['nm_kantor'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kd_kantor' => 'Kd Kantor',
            'nm_kantor' => 'Nm Kantor',
        ];
    }
}
