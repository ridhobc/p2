<?php

namespace backend\modules\p2\models;

use Yii;

/**
 * This is the model class for table "p2_sidik_lp1".
 *
 * @property int $id
 * @property string|null $kd_kantor
 * @property string|null $no_lp1
 * @property string|null $tgl_lp1
 * @property string|null $surat_pelimpahan_perkara_no
 * @property string|null $surat_pelimpahan_perkara_tgl
 * @property string|null $instansi_pelimpah
 * @property string|null $jenis_perkara
 * @property int|null $kategori_objek_id
 * @property string|null $locus_lp1
 * @property string|null $tempus_lp1
 * @property string|null $jam_lp1
 * @property string|null $nama_pelaku_lp1
 * @property string|null $umur_pelaku_lp1
 * @property string|null $jenkel_pelaku_lp1
 * @property string|null $alamat_pelaku_lp1
 * @property string|null $kel_komoditi_brg_lp1
 * @property string|null $jml_koli_brg_lp1
 * @property string|null $jenis_koli_brg_lp1
 * @property string|null $jenis_sarkut_lp1
 * @property string|null $voy_nopol_sarkut_lp1
 * @property string|null $nocont_sarkut_lp1
 * @property string|null $ukcont_sarkut_lp1
 * @property string|null $jen_pelanggaran_lp1
 * @property string|null $pasal_pelanggaran_lp1
 * @property string|null $modus_pelanggaran_lp1
 * @property int|null $lpp_id
 * @property string|null $petugas_id
 * @property int|null $created_at
 * @property int|null $created_by
 * @property int|null $updated_at
 * @property int|null $updated_by
 */
class P2SidikLp1 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'p2_sidik_lp1';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tgl_lp1', 'surat_pelimpahan_perkara_tgl'], 'safe'],
            [['kategori_objek_id', 'lpp_id', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['kd_kantor', 'no_lp1', 'surat_pelimpahan_perkara_no', 'instansi_pelimpah', 'jenis_perkara', 'petugas_id'], 'string', 'max' => 45],
            [['locus_lp1', 'tempus_lp1', 'jam_lp1', 'nama_pelaku_lp1', 'umur_pelaku_lp1', 'jenkel_pelaku_lp1', 'alamat_pelaku_lp1', 'kel_komoditi_brg_lp1', 'jml_koli_brg_lp1', 'jenis_koli_brg_lp1', 'jenis_sarkut_lp1', 'voy_nopol_sarkut_lp1', 'nocont_sarkut_lp1', 'ukcont_sarkut_lp1', 'jen_pelanggaran_lp1', 'pasal_pelanggaran_lp1', 'modus_pelanggaran_lp1'], 'string', 'max' => 100],
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
            'no_lp1' => 'No Lp1',
            'tgl_lp1' => 'Tgl Lp1',
            'surat_pelimpahan_perkara_no' => 'Surat Pelimpahan Perkara No',
            'surat_pelimpahan_perkara_tgl' => 'Surat Pelimpahan Perkara Tgl',
            'instansi_pelimpah' => 'Instansi Pelimpah',
            'jenis_perkara' => 'Jenis Perkara',
            'kategori_objek_id' => 'Kategori Objek ID',
            'locus_lp1' => 'Locus Lp1',
            'tempus_lp1' => 'Tempus Lp1',
            'jam_lp1' => 'Jam Lp1',
            'nama_pelaku_lp1' => 'Nama Pelaku Lp1',
            'umur_pelaku_lp1' => 'Umur Pelaku Lp1',
            'jenkel_pelaku_lp1' => 'Jenkel Pelaku Lp1',
            'alamat_pelaku_lp1' => 'Alamat Pelaku Lp1',
            'kel_komoditi_brg_lp1' => 'Kel Komoditi Brg Lp1',
            'jml_koli_brg_lp1' => 'Jml Koli Brg Lp1',
            'jenis_koli_brg_lp1' => 'Jenis Koli Brg Lp1',
            'jenis_sarkut_lp1' => 'Jenis Sarkut Lp1',
            'voy_nopol_sarkut_lp1' => 'Voy Nopol Sarkut Lp1',
            'nocont_sarkut_lp1' => 'Nocont Sarkut Lp1',
            'ukcont_sarkut_lp1' => 'Ukcont Sarkut Lp1',
            'jen_pelanggaran_lp1' => 'Jen Pelanggaran Lp1',
            'pasal_pelanggaran_lp1' => 'Pasal Pelanggaran Lp1',
            'modus_pelanggaran_lp1' => 'Modus Pelanggaran Lp1',
            'lpp_id' => 'Lpp ID',
            'petugas_id' => 'Petugas ID',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }
}
