<?php

namespace backend\modules\p2\models;

use Yii;

/**
 * This is the model class for table "p2_indak_mpp".
 *
 * @property int $id
 * @property int|null $lapp_id
 * @property int|null $ni_id
 * @property int|null $nhi_id
 * @property int|null $li_id
 * @property string|null $det_mpp_nama
 * @property string|null $det_mpp_umur
 * @property string|null $det_mpp_jenkel
 * @property string|null $det_mpp_alamat
 * @property string|null $det_mpp_perusahan_terkait
 * @property string|null $det_mpp_perusahan_alamat
 * @property int|null $kategori_objek_id
 * @property string|null $jenis_pelanggaran
 * @property string|null $pasal_pelanggaran
 * @property string|null $locus_mpp
 * @property string|null $tempus_mpp
 * @property string|null $modus_mpp
 * @property string|null $komoditi_mpp
 * @property string|null $jumlah_brg_mpp
 * @property string|null $jenis_pengangkut_mpp
 * @property string|null $no_voy_pol_mpp
 * @property string|null $petikemas_kemasan_mpp
 * @property string|null $ukuran_petikemas_mpp
 * @property string|null $dokumen_terkait_mpp
 * @property string|null $instruksi_mpp
 * @property string|null $pejabat_id
 * @property string|null $kd_kantor
 * @property int|null $created_at
 * @property int|null $created_by
 * @property int|null $updated_at
 * @property int|null $updated_by
 */
class P2IndakMpp extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'p2_indak_mpp';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lapp_id', 'ni_id', 'nhi_id', 'li_id', 'kategori_objek_id', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['dokumen_terkait_mpp', 'instruksi_mpp'], 'string'],
            [['det_mpp_nama', 'det_mpp_perusahan_terkait', 'komoditi_mpp', 'petikemas_kemasan_mpp', 'ukuran_petikemas_mpp'], 'string', 'max' => 100],
            [['det_mpp_umur', 'det_mpp_jenkel', 'jenis_pelanggaran', 'pasal_pelanggaran', 'locus_mpp', 'tempus_mpp', 'jumlah_brg_mpp', 'jenis_pengangkut_mpp', 'no_voy_pol_mpp', 'pejabat_id', 'kd_kantor'], 'string', 'max' => 45],
            [['det_mpp_alamat', 'det_mpp_perusahan_alamat', 'modus_mpp'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lapp_id' => 'Lapp ID',
            'ni_id' => 'Ni ID',
            'nhi_id' => 'Nhi ID',
            'li_id' => 'Li ID',
            'det_mpp_nama' => 'Det Mpp Nama',
            'det_mpp_umur' => 'Det Mpp Umur',
            'det_mpp_jenkel' => 'Det Mpp Jenkel',
            'det_mpp_alamat' => 'Det Mpp Alamat',
            'det_mpp_perusahan_terkait' => 'Det Mpp Perusahan Terkait',
            'det_mpp_perusahan_alamat' => 'Det Mpp Perusahan Alamat',
            'kategori_objek_id' => 'Kategori Objek ID',
            'jenis_pelanggaran' => 'Jenis Pelanggaran',
            'pasal_pelanggaran' => 'Pasal Pelanggaran',
            'locus_mpp' => 'Locus Mpp',
            'tempus_mpp' => 'Tempus Mpp',
            'modus_mpp' => 'Modus Mpp',
            'komoditi_mpp' => 'Komoditi Mpp',
            'jumlah_brg_mpp' => 'Jumlah Brg Mpp',
            'jenis_pengangkut_mpp' => 'Jenis Pengangkut Mpp',
            'no_voy_pol_mpp' => 'No Voy Pol Mpp',
            'petikemas_kemasan_mpp' => 'Petikemas Kemasan Mpp',
            'ukuran_petikemas_mpp' => 'Ukuran Petikemas Mpp',
            'dokumen_terkait_mpp' => 'Dokumen Terkait Mpp',
            'instruksi_mpp' => 'Instruksi Mpp',
            'pejabat_id' => 'Pejabat ID',
            'kd_kantor' => 'Kd Kantor',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }
}
