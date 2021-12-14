<?php

namespace backend\modules\p2\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "p2_intel_stpi_petugas".
 *
 * @property int $id
 * @property int $id_intel_stpi
 * @property string $nip_pegawai
 * @property string $status_pegawai
 * @property string $kd_kantor
 */
class P2IntelStpiPetugas extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'p2_intel_stpi_petugas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['id_intel_stpi'], 'integer'],
            [['kd_kantor', 'nip_pegawai', 'status_pegawai'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'id_intel_stpi' => 'Id Intel Stpi',
            'nip_pegawai' => 'Nip Pegawai',
            'status_pegawai' => 'Status Pegawai',
            'kd_kantor' => 'Kd Kantor',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }

    public function getStatus() {
        return $this->hasOne(\backend\modules\setting\models\P2StatusPetugas::className(), ['id' => 'status_pegawai']);
    }

    public function getPetugas() {
        return $this->hasOne(\backend\modules\setting\models\P2Petugas::className(), ['nip_petugas' => 'nip_pegawai']);
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
