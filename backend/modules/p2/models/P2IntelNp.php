<?php

namespace backend\modules\p2\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "p2_intel_np".
 *
 * @property int $id
 * @property string $kd_kantor
 * @property string|null $no_np
 * @property string|null $tgl_np
 * @property int|null $sifat_np
 * @property int|null $klasifikasi_np
 * @property string|null $tujuan_kantor_np
 * @property string|null $info_np
 * @property string|null $pejabat_id
 * @property int|null $created_at
 * @property int|null $created_by
 * @property int|null $updated_at
 * @property int|null $updated_by
 */
class P2IntelNp extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'p2_intel_np';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['tgl_np'], 'safe'],
            [['sifat_np', 'klasifikasi_np', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['info_np'], 'string'],
            [['kd_kantor'], 'string', 'max' => 10],
            [['no_np', 'tujuan_kantor_np', 'pejabat_id'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'kd_kantor' => 'Kd Kantor',
            'no_np' => 'No Np',
            'tgl_np' => 'Tgl Np',
            'sifat_np' => 'Sifat Np',
            'klasifikasi_np' => 'Klasifikasi Np',
            'tujuan_kantor_np' => 'Tujuan Kantor Np',
            'info_np' => 'Info Np',
            'pejabat_id' => 'Pejabat ID',
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
