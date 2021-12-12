<?php

namespace backend\modules\pos\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "pos_master".
 *
 * @property integer $id
 * @property string $no_srt
 * @property string $tgl_srt
 * @property string $bidang_id
 * @property string $tujuan_id
 * @property string $nip_ptgs_kirim
 * @property string $nip_ptgs_rt
 * @property integer $status_srt
 */
class PosRekam extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'pos_master';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['tgl_srt', 'no_srt', 'bidang_id', 'tujuan_id', 'jen_service'], 'required', 'message' => 'wajib diisi'],
            [['tgl_srt', 'tgl_resi'], 'safe'],
            [['status_srt', 'kota_tujuan', 'kota_asal'], 'integer'],
            [['bidang_id', 'tujuan_id', 'nip_ptgs_kirim',
            'nip_ptgs_rt', 'no_resi',
            'courir', 'etd'], 'string', 'max' => 45],
            [['no_srt'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'no_srt' => 'Nomor Surat',
            'tgl_srt' => 'Tgl Surat',
            'bidang_id' => 'Bidang',
            'tujuan_id' => 'Tujuan Kirim',
            'nip_ptgs_kirim' => 'Ptgs Kirim',
            'nip_ptgs_rt' => 'Ptgs Rt',
            'status_srt' => 'Status',
            'no_resi' => 'No Resi',
            'tgl_resi' => 'Tgl Resi',
            'type_kirim' => 'type',
            'berat_satuan' => 'Berat (ons)',
            'jen_service' => 'Service',
            'courir' => 'Kurir',
            'etd' => 'Estimasi',
            'kota_tujuan' => 'Kota Tujuan',
            'kota_asal' => 'Asal',
        ];
    }

    public function getBidang() {
        return $this->hasOne(\backend\modules\spdsetting\models\SpdBidang::className(), ['id' => 'bidang_id']);
    }

    public function getTujuanunit() {
        return $this->hasOne(PosTujuan::className(), ['id' => 'tujuan_id']);
    }

    public function getStatus() {
        return $this->hasOne(PosStatusSrt::className(), ['id' => 'status_srt']);
    }

    public function getKotatujuan() {
        return $this->hasOne(PosPropinsiKota::className(), ['id' => 'kota_tujuan']);
    }

    public function getKotaasal() {
        return $this->hasOne(PosPropinsiKota::className(), ['id' => 'kota_asal']);
    }

    public function getPtgkirim() {
        return $this->hasOne(\backend\models\User::className(), ['nip' => 'nip_ptgs_kirim']);
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
