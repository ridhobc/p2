<?php

namespace backend\modules\p2\models;

use Yii;

/**
 * This is the model class for table "p2_indak_lphp_nosurat".
 *
 * @property int $id
 * @property int|null $lphp_id
 * @property string|null $no_lphp
 * @property string|null $tgl_lphp
 * @property string|null $no_lphp_nomor
 * @property int|null $created_at
 * @property int|null $created_by
 * @property int|null $updated_at
 * @property int|null $updated_by
 */
class P2IndakLphpNosurat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'p2_indak_lphp_nosurat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lphp_id', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['tgl_lphp'], 'safe'],
            [['no_lphp', 'no_lphp_nomor'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lphp_id' => 'Lphp ID',
            'no_lphp' => 'No Lphp',
            'tgl_lphp' => 'Tgl Lphp',
            'no_lphp_nomor' => 'No Lphp Nomor',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }
}
