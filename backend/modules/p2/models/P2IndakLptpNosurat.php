<?php

namespace backend\modules\p2\models;

use Yii;

/**
 * This is the model class for table "p2_indak_lptp_nosurat".
 *
 * @property int $id
 * @property int|null $lptp_id
 * @property string|null $no_lptp
 * @property string|null $tgl_lptp
 * @property string|null $no_lptp_nomor
 * @property int|null $created_at
 * @property int|null $created_by
 * @property int|null $updated_at
 * @property int|null $updated_by
 */
class P2IndakLptpNosurat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'p2_indak_lptp_nosurat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lptp_id', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['tgl_lptp'], 'safe'],
            [['no_lptp', 'no_lptp_nomor'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lptp_id' => 'Lptp ID',
            'no_lptp' => 'No Lptp',
            'tgl_lptp' => 'Tgl Lptp',
            'no_lptp_nomor' => 'No Lptp Nomor',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }
}
