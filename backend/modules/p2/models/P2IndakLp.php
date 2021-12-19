<?php

namespace backend\modules\p2\models;

use Yii;

/**
 * This is the model class for table "p2_indak_lp".
 *
 * @property int $id
 * @property string|null $kd_kantor
 * @property string|null $lphp_id
 * @property string|null $sbp_id
 * @property string|null $no_lp
 * @property string|null $tgl_lp
 * @property string|null $petugas_id
 * @property int|null $created_at
 * @property int|null $created_by
 * @property int|null $updated_at
 * @property int|null $updated_by
 */
class P2IndakLp extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'p2_indak_lp';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tgl_lp'], 'safe'],
            [['created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['kd_kantor', 'lphp_id', 'sbp_id', 'no_lp', 'petugas_id'], 'string', 'max' => 45],
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
            'lphp_id' => 'Lphp ID',
            'sbp_id' => 'Sbp ID',
            'no_lp' => 'No Lp',
            'tgl_lp' => 'Tgl Lp',
            'petugas_id' => 'Petugas ID',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }
}
