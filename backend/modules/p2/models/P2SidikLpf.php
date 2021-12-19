<?php

namespace backend\modules\p2\models;

use Yii;

/**
 * This is the model class for table "p2_sidik_lpf".
 *
 * @property int $id
 * @property string|null $kd_kantor
 * @property string|null $no_lpf
 * @property string|null $tgl_lpf
 * @property int|null $sbp_id
 * @property string|null $kesimpulan_lpf
 * @property string|null $usulan_lpf
 * @property string|null $catatan_disposisi_atasan
 * @property string|null $petugas_id
 * @property string|null $atasan_petugas_id
 * @property string|null $angsung_atasan_id
 * @property int|null $created_at
 * @property int|null $created_by
 * @property int|null $updated_at
 * @property int|null $updated_by
 */
class P2SidikLpf extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'p2_sidik_lpf';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tgl_lpf'], 'safe'],
            [['sbp_id', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['catatan_disposisi_atasan'], 'string'],
            [['kd_kantor', 'no_lpf', 'petugas_id', 'atasan_petugas_id', 'angsung_atasan_id'], 'string', 'max' => 45],
            [['kesimpulan_lpf', 'usulan_lpf'], 'string', 'max' => 200],
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
            'no_lpf' => 'No Lpf',
            'tgl_lpf' => 'Tgl Lpf',
            'sbp_id' => 'Sbp ID',
            'kesimpulan_lpf' => 'Kesimpulan Lpf',
            'usulan_lpf' => 'Usulan Lpf',
            'catatan_disposisi_atasan' => 'Catatan Disposisi Atasan',
            'petugas_id' => 'Petugas ID',
            'atasan_petugas_id' => 'Atasan Petugas ID',
            'angsung_atasan_id' => 'Angsung Atasan ID',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }
}
