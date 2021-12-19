<?php

namespace backend\modules\p2\models;

use Yii;

/**
 * This is the model class for table "p2_indak_mpp_nosurat".
 *
 * @property int $id
 * @property int|null $mpp_id
 * @property string|null $no_mpp
 * @property string|null $tgl_mpp
 * @property string|null $no_mpp_nomor
 * @property int|null $created_at
 * @property int|null $created_by
 * @property int|null $updated_at
 * @property int|null $updated_by
 */
class P2IndakMppNosurat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'p2_indak_mpp_nosurat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mpp_id', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['tgl_mpp'], 'safe'],
            [['no_mpp', 'no_mpp_nomor'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mpp_id' => 'Mpp ID',
            'no_mpp' => 'No Mpp',
            'tgl_mpp' => 'Tgl Mpp',
            'no_mpp_nomor' => 'No Mpp Nomor',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }
}
