<?php

namespace backend\modules\p2\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
/**
 * This is the model class for table "p2_intel_lpti".
 *
 * @property int $id
 * @property string|null $no_lpti
 * @property string|null $tgl_lpti
 * @property int|null $stpi_id
 * @property string|null $kd_kantor
 * @property int|null $created_at
 * @property int|null $created_by
 * @property int|null $updated_at
 * @property int|null $updated_by
 * @property string|null $sumber_info
 * @property string|null $metode_pengumpulan_info
 * @property string|null $ikhtisar_informasi
 * @property string|null $jenis_dok_pbc
 * @property string|null $metode_analisa_intelijen
 * @property string|null $ikhtisar_hasil
 * @property string|null $jenis_pelanggaran
 * @property string|null $modus_pelanggaran
 * @property string|null $titik_koordinat
 * @property string|null $perkiraan_tempat_pelanggaran
 * @property string|null $perkiraan_waktu_pelanggaran
 * @property string|null $perkiraan_pelaku
 * @property string|null $info_lainnya
 * @property string|null $lpti_simpulan
 * @property string|null $lpti_rekom
 * @property string|null $nip_pembuat
 */
class P2IntelLpti extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'p2_intel_lpti';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tgl_lpti'], 'safe'],
            [['stpi_id', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['ikhtisar_informasi', 'metode_analisa_intelijen', 'ikhtisar_hasil', 'jenis_pelanggaran', 'modus_pelanggaran', 'info_lainnya', 'lpti_simpulan', 'lpti_rekom'], 'string'],
            [['no_lpti', 'kd_kantor'], 'string', 'max' => 10],
            [['sumber_info'], 'string', 'max' => 200],
            [['metode_pengumpulan_info', 'titik_koordinat', 'perkiraan_tempat_pelanggaran', 'perkiraan_pelaku'], 'string', 'max' => 100],
            [['jenis_dok_pbc', 'perkiraan_waktu_pelanggaran', 'nip_pembuat','no_tgl_dok_pbc'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'no_lpti' => 'No Lpti',
            'tgl_lpti' => 'Tgl Lpti',
            'stpi_id' => 'Stpi ID',
            'kd_kantor' => 'Kd Kantor',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'sumber_info' => 'Sumber Info',
            'metode_pengumpulan_info' => 'Metode Pengumpulan Info',
            'ikhtisar_informasi' => 'Ikhtisar Informasi',
            'jenis_dok_pbc' => 'Jenis Dok Pbc',
            'metode_analisa_intelijen' => 'Metode Analisa Intelijen',
            'ikhtisar_hasil' => 'Ikhtisar Hasil',
            'jenis_pelanggaran' => 'Jenis Pelanggaran',
            'modus_pelanggaran' => 'Modus Pelanggaran',
            'titik_koordinat' => 'Titik Koordinat',
            'perkiraan_tempat_pelanggaran' => 'Perkiraan Tempat Pelanggaran',
            'perkiraan_waktu_pelanggaran' => 'Perkiraan Waktu Pelanggaran',
            'perkiraan_pelaku' => 'Perkiraan Pelaku',
            'info_lainnya' => 'Info Lainnya',
            'lpti_simpulan' => 'Lpti Simpulan',
            'lpti_rekom' => 'Lpti Rekom',
            'nip_pembuat' => 'Nip Pembuat',
        ];
    }
    
    public function getStpi() {
        return $this->hasOne(P2IntelStpi::className(), ['id' => 'stpi_id']);
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
