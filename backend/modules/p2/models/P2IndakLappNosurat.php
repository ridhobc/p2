<?php

namespace backend\modules\p2\models;

use Yii;

/**
 * This is the model class for table "p2_indak_lapp_nosurat".
 *
 * @property int $id
 * @property int|null $lapp_id
 * @property string|null $no_lapp
 * @property string|null $tgl_lapp
 * @property string|null $no_lapp_nomor
 * @property int|null $created_at
 * @property int|null $created_by
 * @property int|null $updated_at
 * @property int|null $updated_by
 */
class P2IndakLappNosurat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'p2_indak_lapp_nosurat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lapp_id', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['tgl_lapp'], 'safe'],
            [['no_lapp', 'no_lapp_nomor'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lapp_id' => 'Lapp ID',
            'no_lapp' => 'No Lapp',
            'tgl_lapp' => 'Tgl Lapp',
            'no_lapp_nomor' => 'No Lapp Nomor',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }
}
