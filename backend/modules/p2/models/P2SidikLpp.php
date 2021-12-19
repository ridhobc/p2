<?php

namespace backend\modules\p2\models;

use Yii;

/**
 * This is the model class for table "p2_sidik_lpp".
 *
 * @property int $id
 * @property string|null $kd_kantor
 * @property string|null $no_lpp
 * @property string|null $tgl_lpp
 * @property string|null $no_lp_surat
 * @property string|null $tgl_lp_surat
 * @property int|null $sbp_id
 * @property string|null $catatan_atas_pembuat_lpp
 * @property string|null $petugas_id
 * @property string|null $atasan_petugas_id
 * @property string|null $angsung_atasan_petugas_id
 * @property int|null $created_at
 * @property int|null $created_by
 * @property int|null $updated_at
 * @property int|null $updated_by
 */
class P2SidikLpp extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'p2_sidik_lpp';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tgl_lpp', 'tgl_lp_surat'], 'safe'],
            [['sbp_id', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['catatan_atas_pembuat_lpp'], 'string'],
            [['kd_kantor', 'no_lpp', 'no_lp_surat', 'petugas_id', 'atasan_petugas_id', 'angsung_atasan_petugas_id'], 'string', 'max' => 45],
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
            'no_lpp' => 'No Lpp',
            'tgl_lpp' => 'Tgl Lpp',
            'no_lp_surat' => 'No Lp Surat',
            'tgl_lp_surat' => 'Tgl Lp Surat',
            'sbp_id' => 'Sbp ID',
            'catatan_atas_pembuat_lpp' => 'Catatan Atas Pembuat Lpp',
            'petugas_id' => 'Petugas ID',
            'atasan_petugas_id' => 'Atasan Petugas ID',
            'angsung_atasan_petugas_id' => 'Angsung Atasan Petugas ID',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }
}
