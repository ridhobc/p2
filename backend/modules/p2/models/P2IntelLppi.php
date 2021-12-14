<?php

namespace backend\modules\p2\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
/**
 * This is the model class for table "p2_intel_lppi".
 *
 * @property int $id
 * @property string|null $kd_kantor
 * @property string|null $tgl_lppi
 * @property int|null $kategori_lppi_id
 * @property int|null $sumber_info_id
 * @property string|null $media
 * @property string|null $tgl_terima
 * @property string|null $no_dok
 * @property string|null $tgl_dok
 * @property int|null $penerima_info_id
 * @property int|null $penilai_info_id
 * @property string|null $kesimpulan
 * @property int|null $disposisi_id
 * @property string|null $tgl_disposisi
 * @property string|null $tindak_lanjut_id
 * @property string|null $catatan
 * @property int|null $pejabat_id
 * @property string|null $status_pejabat
 * @property string|null $jabatan_ttd
 * @property string|null $no_lppi
 */
class P2IntelLppi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'p2_intel_lppi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
//            [['id'], 'required'],
            [['id', 'kategori_lppi_id', 'sumber_info_id', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['tgl_lppi', 'tgl_terima', 'tgl_dok', 'tgl_disposisi'], 'safe'],
            [['kesimpulan', 'catatan'], 'string'],
            [['kd_kantor', 'tindak_lanjut_id', 'status_pejabat'], 'string', 'max' => 10],
            [['media'], 'string', 'max' => 100],
            [['no_dok',  'no_lppi', 'penerima_info_id', 'penilai_info_id',  'disposisi_id', 'pejabat_id'], 'string', 'max' => 45],
            [['id'], 'unique'],
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
            'no_lppi' => 'No Lppi',
            'tgl_lppi' => 'Tgl Lppi',
            'kategori_lppi_id' => 'Kategori Lppi ID',
            'sumber_info_id' => 'Sumber Info ID',
            'media' => 'Media',
            'tgl_terima' => 'Tgl Terima',
            'no_dok' => 'No Dok',
            'tgl_dok' => 'Tgl Dok',
            'penerima_info_id' => 'Penerima Info ID',
            'penilai_info_id' => 'Penilai Info ID',
            'kesimpulan' => 'Kesimpulan',
            'disposisi_id' => 'Disposisi ID',
            'tgl_disposisi' => 'Tgl Disposisi',
            'tindak_lanjut_id' => 'Tindak Lanjut ID',
            'catatan' => 'Catatan',
            'pejabat_id' => 'Pejabat ID',
            'status_pejabat' => 'Status Pejabat',
            
            
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }
    
    public function getKategorilppi() {
        return $this->hasOne(\backend\modules\setting\models\P2IntelLppiKategori::className(), ['id' => 'kategori_lppi_id']);
    }
    
    public function getSumberinfo() {
        return $this->hasOne(\backend\modules\setting\models\P2IntelLppiSumberinfo::className(), ['id' => 'sumber_info_id']);
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
