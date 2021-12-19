<?php

namespace backend\modules\p2\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "p2_intel_ni".
 *
 * @property int $id
 * @property string $kd_kantor
 * @property string|null $no_ni
 * @property string|null $tgl_ni
 * @property int|null $sifat_ni
 * @property int|null $klasifikasi_ni
 * @property int|null $lkai_id
 * @property string|null $tujuan_kantor_ni
 * @property string|null $info_ni
 * @property string|null $pejabat_id
 * @property string|null $tembusan_ni
 * @property int|null $created_at
 * @property int|null $created_by
 * @property int|null $updated_at
 * @property int|null $updated_by
 */
class P2IntelNi extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'p2_intel_ni';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['tgl_ni'], 'safe'],
            [['sifat_ni', 'klasifikasi_ni', 'lkai_id', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['info_ni'], 'string'],
            [['kd_kantor'], 'string', 'max' => 10],
            [['no_ni', 'tujuan_kantor_ni', 'pejabat_id'], 'string', 'max' => 45],
            [['tembusan_ni'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'kd_kantor' => 'Kd Kantor',
            'no_ni' => 'No Ni',
            'tgl_ni' => 'Tgl Ni',
            'sifat_ni' => 'Sifat Ni',
            'klasifikasi_ni' => 'Klasifikasi Ni',
            'lkai_id' => 'Lkai ID',
            'tujuan_kantor_ni' => 'Tujuan Kantor Ni',
            'info_ni' => 'Info Ni',
            'pejabat_id' => 'Pejabat ID',
            'tembusan_ni' => 'Tembusan Ni',
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
