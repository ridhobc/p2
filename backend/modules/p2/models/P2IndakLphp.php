<?php

namespace backend\modules\p2\models;

use Yii;

/**
 * This is the model class for table "p2_indak_lphp".
 *
 * @property int $id
 * @property string|null $kd_kantor
 * @property string|null $no_lphp
 * @property string|null $tgl_lphp
 * @property int|null $lptp_id
 * @property int|null $sbp_id
 * @property string|null $analisa_hasil_indak_lphp
 * @property string|null $catatan_lphp
 * @property string|null $petugas_id
 * @property string|null $atasan_petugas_id
 * @property int|null $created_at
 * @property int|null $created_by
 * @property int|null $updated_at
 * @property int|null $updated_by
 */
class P2IndakLphp extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'p2_indak_lphp';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tgl_lphp'], 'safe'],
            [['lptp_id', 'sbp_id', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['analisa_hasil_indak_lphp', 'catatan_lphp'], 'string'],
            [['kd_kantor', 'no_lphp', 'petugas_id', 'atasan_petugas_id'], 'string', 'max' => 45],
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
            'no_lphp' => 'No Lphp',
            'tgl_lphp' => 'Tgl Lphp',
            'lptp_id' => 'Lptp ID',
            'sbp_id' => 'Sbp ID',
            'analisa_hasil_indak_lphp' => 'Analisa Hasil Indak Lphp',
            'catatan_lphp' => 'Catatan Lphp',
            'petugas_id' => 'Petugas ID',
            'atasan_petugas_id' => 'Atasan Petugas ID',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }
}
