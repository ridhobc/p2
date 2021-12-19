<?php

namespace backend\modules\p2\models;

use Yii;

/**
 * This is the model class for table "p2_indak_lptp".
 *
 * @property int $id
 * @property string|null $kd_kantor
 * @property string|null $no_sprint
 * @property string|null $tgl_sprint
 * @property int|null $kategori_objek_id
 * @property string|null $ur_penindakan
 * @property string|null $alasan_tidak_indak
 * @property string|null $catatan_lptp
 * @property int|null $sbp_id
 * @property string|null $petugas_id
 * @property string|null $atasan_petugas_id
 * @property int|null $created_at
 * @property int|null $created_by
 * @property int|null $updated_at
 * @property int|null $updated_by
 */
class P2IndakLptp extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'p2_indak_lptp';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tgl_sprint'], 'safe'],
            [['kategori_objek_id', 'sbp_id', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['alasan_tidak_indak', 'catatan_lptp'], 'string'],
            [['kd_kantor', 'no_sprint', 'ur_penindakan', 'petugas_id', 'atasan_petugas_id'], 'string', 'max' => 45],
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
            'no_sprint' => 'No Sprint',
            'tgl_sprint' => 'Tgl Sprint',
            'kategori_objek_id' => 'Kategori Objek ID',
            'ur_penindakan' => 'Ur Penindakan',
            'alasan_tidak_indak' => 'Alasan Tidak Indak',
            'catatan_lptp' => 'Catatan Lptp',
            'sbp_id' => 'Sbp ID',
            'petugas_id' => 'Petugas ID',
            'atasan_petugas_id' => 'Atasan Petugas ID',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }
}
