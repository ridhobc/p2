<?php

namespace backend\modules\p2\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
/**
 * This is the model class for table "p2_intel_nhi".
 *
 * @property int $id
 * @property string|null $kd_kantor
 * @property string|null $no_nhi
 * @property string|null $tgl_nhi
 * @property string|null $sifat_nhi_id
 * @property string|null $klasifikasi_nhi_id
 * @property string|null $lkai_id
 * @property string|null $kd_kantor_tujuan_nhi_id
 * @property string|null $tempat_info
 * @property string|null $tgl_info
 * @property string|null $kantor_bc_info_id
 * @property string|null $kepabenanan_info_chek
 * @property string|null $nm_no_dok_kepabeanan
 * @property string|null $nm_sarkut_kepab
 * @property string|null $voy_nopol_sarkut_kepab
 * @property string|null $no_bl_awb
 * @property string|null $no_kontainer_merk_koli
 * @property string|null $nm_imp_eks_ppjk
 * @property string|null $npwp
 * @property string|null $jenis_jumlah_brg_kepab
 * @property string|null $data_lainnya_kepab
 * @property string|null $cukai_info_cek
 * @property string|null $nm_eks_pab_tpe
 * @property string|null $nm_penyalur
 * @property string|null $nm_tpe
 * @property string|null $no_nppbkc
 * @property string|null $nm_sarkut_cukai
 * @property string|null $voy_nopol_sarkut_cukai
 * @property string|null $jenis_jumlah_brg_cukai
 * @property string|null $data_lainnya_cukai
 * @property string|null $barang_tertentu_cek
 * @property string|null $nm_no_dok_brg_tertentu
 * @property string|null $nm_sarkut_brg_tertentu
 * @property string|null $voy_nopol_brg_tertentu
 * @property string|null $no_bl_awb_brg_tertentu
 * @property string|null $no_kontainer_merk_koli_brg_tertentu
 * @property string|null $org_badan_hukum
 * @property string|null $jenis_jumlah_brg_brg_tertentu
 * @property string|null $data_lainnya_cukai_brg_tertentu
 * @property string|null $indikasi_info
 * @property string|null $pejabat_id
 * @property string|null $tembusan_kantor
 * @property int|null $created_at
 * @property int|null $created_by
 * @property int|null $updated_at
 * @property int|null $updated_by
 */
class P2IntelNhi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'p2_intel_nhi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tgl_nhi', 'tgl_info'], 'safe'],
            [['indikasi_info'], 'string'],
            [['created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['kd_kantor', 'no_nhi', 'kd_kantor_tujuan_nhi_id', 'kantor_bc_info_id', 'nm_no_dok_kepabeanan', 'nm_sarkut_kepab', 'voy_nopol_sarkut_kepab', 'no_bl_awb', 'no_kontainer_merk_koli', 'nm_imp_eks_ppjk', 'npwp', 'jenis_jumlah_brg_kepab', 'data_lainnya_kepab', 'nm_eks_pab_tpe', 'nm_penyalur', 'nm_tpe', 'no_nppbkc', 'nm_sarkut_cukai', 'voy_nopol_sarkut_cukai', 'jenis_jumlah_brg_cukai', 'data_lainnya_cukai', 'nm_no_dok_brg_tertentu', 'nm_sarkut_brg_tertentu', 'voy_nopol_brg_tertentu', 'no_bl_awb_brg_tertentu', 'no_kontainer_merk_koli_brg_tertentu', 'org_badan_hukum', 'jenis_jumlah_brg_brg_tertentu', 'data_lainnya_cukai_brg_tertentu', 'pejabat_id', 'tembusan_kantor'], 'string', 'max' => 45],
            [['sifat_nhi_id', 'klasifikasi_nhi_id', 'lkai_id'], 'string', 'max' => 5],
            [['tempat_info'], 'string', 'max' => 200],
            [['kepabenanan_info_chek', 'cukai_info_cek', 'barang_tertentu_cek'], 'string', 'max' => 1],
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
            'no_nhi' => 'No Nhi',
            'tgl_nhi' => 'Tgl Nhi',
            'sifat_nhi_id' => 'Sifat Nhi ID',
            'klasifikasi_nhi_id' => 'Klasifikasi Nhi ID',
            'lkai_id' => 'Lkai ID',
            'kd_kantor_tujuan_nhi_id' => 'Kd Kantor Tujuan Nhi ID',
            'tempat_info' => 'Tempat Info',
            'tgl_info' => 'Tgl Info',
            'kantor_bc_info_id' => 'Kantor Bc Info ID',
            'kepabenanan_info_chek' => 'Kepabenanan Info Chek',
            'nm_no_dok_kepabeanan' => 'Nm No Dok Kepabeanan',
            'nm_sarkut_kepab' => 'Nm Sarkut Kepab',
            'voy_nopol_sarkut_kepab' => 'Voy Nopol Sarkut Kepab',
            'no_bl_awb' => 'No Bl Awb',
            'no_kontainer_merk_koli' => 'No Kontainer Merk Koli',
            'nm_imp_eks_ppjk' => 'Nm Imp Eks Ppjk',
            'npwp' => 'Npwp',
            'jenis_jumlah_brg_kepab' => 'Jenis Jumlah Brg Kepab',
            'data_lainnya_kepab' => 'Data Lainnya Kepab',
            'cukai_info_cek' => 'Cukai Info Cek',
            'nm_eks_pab_tpe' => 'Nm Eks Pab Tpe',
            'nm_penyalur' => 'Nm Penyalur',
            'nm_tpe' => 'Nm Tpe',
            'no_nppbkc' => 'No Nppbkc',
            'nm_sarkut_cukai' => 'Nm Sarkut Cukai',
            'voy_nopol_sarkut_cukai' => 'Voy Nopol Sarkut Cukai',
            'jenis_jumlah_brg_cukai' => 'Jenis Jumlah Brg Cukai',
            'data_lainnya_cukai' => 'Data Lainnya Cukai',
            'barang_tertentu_cek' => 'Barang Tertentu Cek',
            'nm_no_dok_brg_tertentu' => 'Nm No Dok Brg Tertentu',
            'nm_sarkut_brg_tertentu' => 'Nm Sarkut Brg Tertentu',
            'voy_nopol_brg_tertentu' => 'Voy Nopol Brg Tertentu',
            'no_bl_awb_brg_tertentu' => 'No Bl Awb Brg Tertentu',
            'no_kontainer_merk_koli_brg_tertentu' => 'No Kontainer Merk Koli Brg Tertentu',
            'org_badan_hukum' => 'Org Badan Hukum',
            'jenis_jumlah_brg_brg_tertentu' => 'Jenis Jumlah Brg Brg Tertentu',
            'data_lainnya_cukai_brg_tertentu' => 'Data Lainnya Cukai Brg Tertentu',
            'indikasi_info' => 'Indikasi Info',
            'pejabat_id' => 'Pejabat ID',
            'tembusan_kantor' => 'Tembusan Kantor',
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
