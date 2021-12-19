<?php

namespace backend\modules\p2\models;

use Yii;

/**
 * This is the model class for table "p2_indak_lp_nosurat".
 *
 * @property int $id
 * @property int|null $lp_id
 * @property string|null $no_lp
 * @property string|null $tgl_lp
 * @property string|null $no_lp_nomor
 * @property int|null $created_at
 * @property int|null $created_by
 * @property int|null $updated_at
 * @property int|null $updated_by
 */
class P2IndakLpNosurat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'p2_indak_lp_nosurat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lp_id', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['tgl_lp'], 'safe'],
            [['no_lp', 'no_lp_nomor'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lp_id' => 'Lp ID',
            'no_lp' => 'No Lp',
            'tgl_lp' => 'Tgl Lp',
            'no_lp_nomor' => 'No Lp Nomor',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }
}
