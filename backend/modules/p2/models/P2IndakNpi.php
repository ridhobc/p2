<?php

namespace backend\modules\p2\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "p2_indak_npi".
 *
 * @property int $id
 * @property string|null $kd_kantor
 * @property string|null $no_npi
 * @property string|null $tgl_npi
 * @property int|null $ni_id
 * @property int|null $nhi_id
 * @property int|null $kategori_objek_id
 * @property string|null $info_npi
 * @property int|null $petugas_id
 * @property int|null $pejabat_id
 * @property int|null $created_at
 * @property int|null $created_by
 * @property int|null $updated_at
 * @property int|null $updated_by
 */
class P2IndakNpi extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'p2_indak_npi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['tgl_npi'], 'safe'],
            [['ni_id', 'nhi_id', 'kategori_objek_id',  'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['info_npi'], 'string'],
            [['kd_kantor', 'no_npi', 'petugas_id', 'pejabat_id'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'kd_kantor' => 'Kd Kantor',
            'no_npi' => 'No Npi',
            'tgl_npi' => 'Tgl Npi',
            'ni_id' => 'Ni ID',
            'nhi_id' => 'Nhi ID',
            'kategori_objek_id' => 'Kategori Objek ID',
            'info_npi' => 'Info Npi',
            'petugas_id' => 'Petugas ID',
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
