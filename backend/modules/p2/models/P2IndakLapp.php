<?php

namespace backend\modules\p2\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "p2_indak_lapp".
 *
 * @property int $id
 * @property string $kd_kantor
 * @property string|null $no_lapp
 * @property string|null $tgl_lapp
 * @property int|null $li_id
 * @property int|null $ni_id
 * @property int|null $nhi_id
 * @property int|null $pelaku_cek
 * @property string|null $pelaku_keterangan
 * @property int|null $pelanggaran_cek
 * @property string|null $pelanggaran_keterangan
 * @property int|null $locus_cek
 * @property string|null $locus_keterangan
 * @property int|null $tempus_cek
 * @property string|null $tempus_keterangan
 * @property int|null $prosedural_cek
 * @property string|null $prosedural_keterangan
 * @property int|null $sdm_cek
 * @property string|null $sdm_keterangan
 * @property int|null $sarpras_cek
 * @property string|null $sarpras_keterangan
 * @property int|null $anggaran_cek
 * @property string|null $anggaran_keterangan
 * @property int|null $layak_operasi_cek
 * @property int|null $mandiri_cek
 * @property string|null $mandiri_keterangan
 * @property int|null $dgn_bantuan_cek
 * @property string|null $dgn_bantuan_keterangan
 * @property int|null $pelimpahan_cek
 * @property string|null $pelimpahan_keterangan
 * @property int|null $pelimpahan_bantuan_cek
 * @property string $pelimpahan_bantuan_keterangan
 * @property int $perbantuan_insta_lain_cek
 * @property string|null $perbantuan_insta_lain_keterangan
 * @property int|null $tidak_layak_operasi_cek
 * @property int|null $layak_patroli_cek
 * @property string|null $layak_patroli_keterangan
 * @property int|null $tidak_layak_patroli_cek
 * @property string|null $tidak_layak_patroli_keterangan
 * @property string|null $kesimpulan_lapp
 * @property string|null $petugas_id
 * @property string|null $pejabat_id
 * @property int|null $created_at
 * @property int|null $created_by
 * @property int|null $updated_at
 * @property int|null $updated_by
 */
class P2IndakLapp extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'p2_indak_lapp';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['tgl_lapp'], 'safe'],
            [['li_id', 'ni_id', 'nhi_id', 'pelaku_cek', 'pelanggaran_cek', 'locus_cek', 'tempus_cek', 'prosedural_cek', 'sdm_cek', 'sarpras_cek', 'anggaran_cek', 'layak_operasi_cek', 'mandiri_cek', 'dgn_bantuan_cek', 'pelimpahan_cek', 'pelimpahan_bantuan_cek', 'perbantuan_insta_lain_cek', 'tidak_layak_operasi_cek', 'layak_patroli_cek', 'tidak_layak_patroli_cek', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['kesimpulan_lapp'], 'string'],
            [['kd_kantor', 'no_lapp', 'petugas_id', 'pejabat_id'], 'string', 'max' => 45],
            [['pelaku_keterangan', 'pelanggaran_keterangan', 'locus_keterangan', 'tempus_keterangan', 'prosedural_keterangan', 'sdm_keterangan', 'sarpras_keterangan', 'anggaran_keterangan', 'mandiri_keterangan', 'dgn_bantuan_keterangan', 'pelimpahan_keterangan', 'pelimpahan_bantuan_keterangan', 'perbantuan_insta_lain_keterangan', 'layak_patroli_keterangan', 'tidak_layak_patroli_keterangan'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'kd_kantor' => 'Kd Kantor',
            'no_lapp' => 'No Lapp',
            'tgl_lapp' => 'Tgl Lapp',
            'li_id' => 'Li ID',
            'ni_id' => 'Ni ID',
            'nhi_id' => 'Nhi ID',
            'pelaku_cek' => 'Pelaku Cek',
            'pelaku_keterangan' => 'Pelaku Keterangan',
            'pelanggaran_cek' => 'Pelanggaran Cek',
            'pelanggaran_keterangan' => 'Pelanggaran Keterangan',
            'locus_cek' => 'Locus Cek',
            'locus_keterangan' => 'Locus Keterangan',
            'tempus_cek' => 'Tempus Cek',
            'tempus_keterangan' => 'Tempus Keterangan',
            'prosedural_cek' => 'Prosedural Cek',
            'prosedural_keterangan' => 'Prosedural Keterangan',
            'sdm_cek' => 'Sdm Cek',
            'sdm_keterangan' => 'Sdm Keterangan',
            'sarpras_cek' => 'Sarpras Cek',
            'sarpras_keterangan' => 'Sarpras Keterangan',
            'anggaran_cek' => 'Anggaran Cek',
            'anggaran_keterangan' => 'Anggaran Keterangan',
            'layak_operasi_cek' => 'Layak Operasi Cek',
            'mandiri_cek' => 'Mandiri Cek',
            'mandiri_keterangan' => 'Mandiri Keterangan',
            'dgn_bantuan_cek' => 'Dgn Bantuan Cek',
            'dgn_bantuan_keterangan' => 'Dgn Bantuan Keterangan',
            'pelimpahan_cek' => 'Pelimpahan Cek',
            'pelimpahan_keterangan' => 'Pelimpahan Keterangan',
            'pelimpahan_bantuan_cek' => 'Pelimpahan Bantuan Cek',
            'pelimpahan_bantuan_keterangan' => 'Pelimpahan Bantuan Keterangan',
            'perbantuan_insta_lain_cek' => 'Perbantuan Insta Lain Cek',
            'perbantuan_insta_lain_keterangan' => 'Perbantuan Insta Lain Keterangan',
            'tidak_layak_operasi_cek' => 'Tidak Layak Operasi Cek',
            'layak_patroli_cek' => 'Layak Patroli Cek',
            'layak_patroli_keterangan' => 'Layak Patroli Keterangan',
            'tidak_layak_patroli_cek' => 'Tidak Layak Patroli Cek',
            'tidak_layak_patroli_keterangan' => 'Tidak Layak Patroli Keterangan',
            'kesimpulan_lapp' => 'Kesimpulan Lapp',
            'petugas_id' => 'Petugas ID',
            'pejabat_id' => 'Pejabat ID',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }

    public function getKantor() {
        return $this->hasOne(\backend\modules\setting\models\DbKantor::className(), ['kd_kantor' => 'kd_kantor']);
    }

    public function behaviors() {
        return [

            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['updated_at', 'created_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
            ],
            'bleamble' => [
                'class' => BlameableBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['updated_by', 'created_by'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_by'],
                ],
            ]
        ];
    }

}
