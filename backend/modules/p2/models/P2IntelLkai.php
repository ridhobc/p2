<?php

namespace backend\modules\p2\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
/**
 * This is the model class for table "p2_intel_lkai".
 *
 * @property int $id
 * @property string $no_lkai
 * @property string|null $tgl_lkai
 * @property string|null $dok_sumber_lppi
 * @property string|null $no_lppi
 * @property string|null $tgl_lppi
 * @property string|null $dok_sumber_lpti
 * @property string|null $no_lpti
 * @property string|null $tgl_lpti
 * @property string|null $dok_sumber_npi
 * @property string|null $no_npi
 * @property string|null $tgl_npi
 * @property string|null $ikhtisar_informasi_lkai
 * @property string|null $prosedur_analisis_lkai
 * @property string|null $hasil_analisis_lkai
 * @property string|null $kesimpulan_lkai
 * @property string|null $rekomendasi_lkai_id
 * @property string|null $rekomendasi_lainnya_id
 * @property string|null $rekomendasi_lainnya_ur
 * @property string|null $informasi_lainnya_id
 * @property string|null $informasi_lainnya_ur
 * @property string|null $tujuan_lkai
 * @property string|null $analis_lkai_nip
 * @property string|null $keputusan_angsung_id
 * @property string|null $keputusan_angsung_cat
 * @property string|null $keputusan_angsung_tgl_terima
 * @property string|null $keputusan_angsung_nip
 * @property string|null $keputusan_atasan_angsung_id
 * @property string|null $keputusan_atasan_angsung_cat
 * @property string|null $keputusan_atasan_angsung_tgl_terima
 * @property string|null $keputusan_atasan_angsung_nip
 */
class P2IntelLkai extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'p2_intel_lkai';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['tgl_lkai', 'tgl_lppi', 'tgl_lpti', 'tgl_npi', 'keputusan_angsung_tgl_terima', 'keputusan_atasan_angsung_tgl_terima'], 'safe'],
            [['ikhtisar_informasi_lkai', 'prosedur_analisis_lkai', 'hasil_analisis_lkai', 'rekomendasi_lainnya_ur', 'informasi_lainnya_ur', 'keputusan_angsung_cat', 'keputusan_atasan_angsung_cat'], 'string'],
            [['no_lkai',  'no_npi', 'kesimpulan_lkai', 'analis_lkai_nip', 'keputusan_angsung_nip', 'keputusan_atasan_angsung_nip','kd_kantor'], 'string', 'max' => 45],
            [['dok_sumber_lppi', 'dok_sumber_lpti', 'dok_sumber_npi'], 'string', 'max' => 2],
            [['rekomendasi_lkai_id', 'informasi_lainnya_id'], 'string', 'max' => 10],
            [['tujuan_lkai'], 'string', 'max' => 100],
            [['keputusan_angsung_id', 'keputusan_atasan_angsung_id'], 'string', 'max' => 10],
            [['no_lppi_id','no_lppi_id'], 'integer'],
            [['created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'no_lkai' => 'No Lkai',
            'tgl_lkai' => 'Tgl Lkai',
            'dok_sumber_lppi' => 'Dok Sumber Lppi',
            'no_lppi_id' => 'No Lppi',
            'dok_sumber_lpti' => 'Dok Sumber Lpti',
            'no_lpti_id' => 'No Lpti',
            'dok_sumber_npi' => 'Dok Sumber Npi',
            'no_npi' => 'No Npi',
            'tgl_npi' => 'Tgl Npi',
            'ikhtisar_informasi_lkai' => 'Ikhtisar Informasi Lkai',
            'prosedur_analisis_lkai' => 'Prosedur Analisis Lkai',
            'hasil_analisis_lkai' => 'Hasil Analisis Lkai',
            'kesimpulan_lkai' => 'Kesimpulan Lkai',
           
            'rekomendasi_lainnya_ur' => 'Rekomendasi Lainnya Ur',
            'informasi_lainnya_id' => 'Informasi Lainnya ID',
            'informasi_lainnya_ur' => 'Informasi Lainnya Ur',
            'tujuan_lkai' => 'Tujuan Lkai',
            'analis_lkai_nip' => 'Analis Lkai Nip',
            'keputusan_angsung_id' => 'Keputusan Angsung ID',
            'keputusan_angsung_cat' => 'Keputusan Angsung Cat',
            'keputusan_angsung_tgl_terima' => 'Keputusan Angsung Tgl Terima',
            'keputusan_angsung_nip' => 'Keputusan Angsung Nip',
            'keputusan_atasan_angsung_id' => 'Keputusan Atasan Angsung ID',
            'keputusan_atasan_angsung_cat' => 'Keputusan Atasan Angsung Cat',
            'keputusan_atasan_angsung_tgl_terima' => 'Keputusan Atasan Angsung Tgl Terima',
            'keputusan_atasan_angsung_nip' => 'Keputusan Atasan Angsung Nip',
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
