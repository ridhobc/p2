<?php

namespace backend\modules\p2\models;

use Yii;

/**
 * This is the model class for table "p2_indak_sbp".
 *
 * @property int $id
 * @property string|null $surat_perintah_no
 * @property string|null $surat_perintah_tgl
 * @property string|null $nm_jenis_sarkut_sbp
 * @property string|null $voy_penerbangan_trayek_sarkut_sbp
 * @property string|null $uk_kap_muatan_sbp
 * @property string|null $nahkoda_pilot_sopir_sbp
 * @property string|null $bendera_sbp
 * @property string|null $no_register_nopol_sbp
 * @property string|null $jumlah_jenis_uk_nomor_sbp
 * @property string|null $petikemas_kemasan_sbp
 * @property string|null $jumlah_jenis_brg_sbp
 * @property string|null $jenis_no_tgl_dok_sbp
 * @property string|null $pemilik_imp_eks_kuasa_sbp
 * @property string|null $alamat_bgn_sbp
 * @property string|null $no_reg_nppbkc_dll_sbp
 * @property string|null $nm_pemilik_menguasai_sbp
 * @property string|null $nm_badan_sbp
 * @property string|null $tgl_lahir_badan_sbp
 * @property string|null $kewarganegaraan_badan_sbp
 * @property string|null $alamat_badan_sbp
 * @property string|null $no_identitas_badan_sbp
 * @property string|null $lokasi_indak_sbp
 * @property string|null $ur_indak_sbp
 * @property string|null $alasan_indak_sbp
 * @property string|null $jen_pelanggaran_sbp
 * @property string|null $tindakan_yang_diambil_id
 * @property string|null $waktu_indak_mulai_sbp
 * @property string|null $waktu_indak_selesai_sbp
 * @property string|null $hal_yang_terjadi_sbp
 * @property string|null $kd_kantor
 * @property string|null $petugas_id
 * @property int|null $created_at
 * @property int|null $created_by
 * @property int|null $updated_at
 * @property int|null $updated_by
 */
class P2IndakSbp extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'p2_indak_sbp';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['surat_perintah_no', 'surat_perintah_tgl', 'nm_jenis_sarkut_sbp', 'voy_penerbangan_trayek_sarkut_sbp', 'uk_kap_muatan_sbp', 'nahkoda_pilot_sopir_sbp', 'bendera_sbp', 'no_register_nopol_sbp', 'jumlah_jenis_uk_nomor_sbp', 'petikemas_kemasan_sbp', 'jumlah_jenis_brg_sbp', 'jenis_no_tgl_dok_sbp', 'pemilik_imp_eks_kuasa_sbp', 'alamat_bgn_sbp', 'no_reg_nppbkc_dll_sbp', 'nm_pemilik_menguasai_sbp', 'nm_badan_sbp', 'tgl_lahir_badan_sbp', 'kewarganegaraan_badan_sbp', 'alamat_badan_sbp', 'no_identitas_badan_sbp', 'lokasi_indak_sbp', 'ur_indak_sbp', 'alasan_indak_sbp', 'jen_pelanggaran_sbp', 'tindakan_yang_diambil_id', 'waktu_indak_mulai_sbp', 'waktu_indak_selesai_sbp', 'hal_yang_terjadi_sbp', 'kd_kantor', 'petugas_id'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'surat_perintah_no' => 'Surat Perintah No',
            'surat_perintah_tgl' => 'Surat Perintah Tgl',
            'nm_jenis_sarkut_sbp' => 'Nm Jenis Sarkut Sbp',
            'voy_penerbangan_trayek_sarkut_sbp' => 'Voy Penerbangan Trayek Sarkut Sbp',
            'uk_kap_muatan_sbp' => 'Uk Kap Muatan Sbp',
            'nahkoda_pilot_sopir_sbp' => 'Nahkoda Pilot Sopir Sbp',
            'bendera_sbp' => 'Bendera Sbp',
            'no_register_nopol_sbp' => 'No Register Nopol Sbp',
            'jumlah_jenis_uk_nomor_sbp' => 'Jumlah Jenis Uk Nomor Sbp',
            'petikemas_kemasan_sbp' => 'Petikemas Kemasan Sbp',
            'jumlah_jenis_brg_sbp' => 'Jumlah Jenis Brg Sbp',
            'jenis_no_tgl_dok_sbp' => 'Jenis No Tgl Dok Sbp',
            'pemilik_imp_eks_kuasa_sbp' => 'Pemilik Imp Eks Kuasa Sbp',
            'alamat_bgn_sbp' => 'Alamat Bgn Sbp',
            'no_reg_nppbkc_dll_sbp' => 'No Reg Nppbkc Dll Sbp',
            'nm_pemilik_menguasai_sbp' => 'Nm Pemilik Menguasai Sbp',
            'nm_badan_sbp' => 'Nm Badan Sbp',
            'tgl_lahir_badan_sbp' => 'Tgl Lahir Badan Sbp',
            'kewarganegaraan_badan_sbp' => 'Kewarganegaraan Badan Sbp',
            'alamat_badan_sbp' => 'Alamat Badan Sbp',
            'no_identitas_badan_sbp' => 'No Identitas Badan Sbp',
            'lokasi_indak_sbp' => 'Lokasi Indak Sbp',
            'ur_indak_sbp' => 'Ur Indak Sbp',
            'alasan_indak_sbp' => 'Alasan Indak Sbp',
            'jen_pelanggaran_sbp' => 'Jen Pelanggaran Sbp',
            'tindakan_yang_diambil_id' => 'Tindakan Yang Diambil ID',
            'waktu_indak_mulai_sbp' => 'Waktu Indak Mulai Sbp',
            'waktu_indak_selesai_sbp' => 'Waktu Indak Selesai Sbp',
            'hal_yang_terjadi_sbp' => 'Hal Yang Terjadi Sbp',
            'kd_kantor' => 'Kd Kantor',
            'petugas_id' => 'Petugas ID',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }
}
