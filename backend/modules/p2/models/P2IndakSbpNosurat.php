<?php

namespace backend\modules\p2\models;

use Yii;

/**
 * This is the model class for table "p2_indak_sbp_nosurat".
 *
 * @property int $id
 * @property int|null $sbp_id
 * @property string|null $no_sbp
 * @property string|null $tgl_sbp
 * @property string|null $no_sbp_nomor
 * @property int|null $created_at
 * @property int|null $created_by
 * @property int|null $updated_at
 * @property int|null $updated_by
 */
class P2IndakSbpNosurat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'p2_indak_sbp_nosurat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sbp_id', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['tgl_sbp'], 'safe'],
            [['no_sbp', 'no_sbp_nomor'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sbp_id' => 'Sbp ID',
            'no_sbp' => 'No Sbp',
            'tgl_sbp' => 'Tgl Sbp',
            'no_sbp_nomor' => 'No Sbp Nomor',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }
}
