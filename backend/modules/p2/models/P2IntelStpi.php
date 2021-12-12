<?php

namespace backend\modules\p2\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "p2_intel_stpi".
 *
 * @property int $id
 * @property string $kd_kantor
 * @property string|null $tgl_rekam
 * @property string|null $uraian_tugas
 * @property string|null $kategori_tugas
 * @property string|null $periode_penugasan
 * @property string|null $wilayah_penugasan
 * @property string $pejabat_id
 * @property string|null $status_plh
 */
class P2IntelStpi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'p2_intel_stpi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['tgl_rekam','tgl_stpi'], 'safe'],
            [['uraian_tugas'], 'string'],
            [['kd_kantor', 'kategori_tugas', 'pejabat_id', 'status_plh'], 'string', 'max' => 10],
            [['periode_penugasan', 'wilayah_penugasan','no_stpi'], 'string', 'max' => 45],
            [['uraian_tugas',  'kategori_tugas',  'periode_penugasan','wilayah_penugasan'], 'required', 'message' => 'Tidak boleh kosong'],
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
            'tgl_rekam' => 'Tgl Rekam',
            'uraian_tugas' => 'Uraian Tugas',
            'kategori_tugas' => 'Kategori Tugas',
            'periode_penugasan' => 'Periode Penugasan',
            'wilayah_penugasan' => 'Wilayah Penugasan',
            'pejabat_id' => 'Pejabat TTD ST',
            'status_plh' => 'Status Plh',
            'no_stpi' => 'No ST I',
            'tgl_stpi' => 'Tgl ST I',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }
    
    public function getPetugas() {
        return $this->hasOne(P2IntelStpiPetugas::className(), ['id' => 'id_intel_stpi']);
    }
    
    public function getKategori() {
        return $this->hasOne(P2KategoriObjek::className(), ['id' => 'kategori_tugas']);
    }
    
    public function getPejabatttd() {
        return $this->hasOne(P2Pejabat::className(), ['id' => 'pejabat_id']);
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
