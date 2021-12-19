<?php

namespace backend\modules\p2\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
/**
 * This is the model class for table "p2_intel_psa".
 *
 * @property int $id
 * @property string $kd_kantor
 * @property string|null $atas_pelanggaran_psa
 * @property string|null $oleh_pelanggaran_psa
 * @property string|null $kronologi_psa
 * @property string|null $modus_psa
 * @property string|null $indikator_resiko_psa
 * @property string|null $pihak_terkait_psa
 * @property string|null $analisa_peraturan_psa
 * @property string|null $signifikansi_penindakan_psa
 * @property string|null $proses_penanganan_psa
 * @property string|null $kesimpulan_rekomendasi_psa
 * @property string|null $petugas_id
 * @property int|null $created_at
 * @property int|null $created_by
 * @property int|null $updated_at
 * @property int|null $updated_by
 */
class P2IntelPsa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'p2_intel_psa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kronologi_psa', 'modus_psa', 'indikator_resiko_psa', 'pihak_terkait_psa', 'analisa_peraturan_psa', 'signifikansi_penindakan_psa', 'proses_penanganan_psa', 'kesimpulan_rekomendasi_psa'], 'string'],
            [['created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['kd_kantor'], 'string', 'max' => 10],
            [['atas_pelanggaran_psa'], 'string', 'max' => 200],
            [['oleh_pelanggaran_psa'], 'string', 'max' => 100],
            [['petugas_id'], 'string', 'max' => 45],
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
            'atas_pelanggaran_psa' => 'Atas Pelanggaran Psa',
            'oleh_pelanggaran_psa' => 'Oleh Pelanggaran Psa',
            'kronologi_psa' => 'Kronologi Psa',
            'modus_psa' => 'Modus Psa',
            'indikator_resiko_psa' => 'Indikator Resiko Psa',
            'pihak_terkait_psa' => 'Pihak Terkait Psa',
            'analisa_peraturan_psa' => 'Analisa Peraturan Psa',
            'signifikansi_penindakan_psa' => 'Signifikansi Penindakan Psa',
            'proses_penanganan_psa' => 'Proses Penanganan Psa',
            'kesimpulan_rekomendasi_psa' => 'Kesimpulan Rekomendasi Psa',
            'petugas_id' => 'Petugas ID',
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
