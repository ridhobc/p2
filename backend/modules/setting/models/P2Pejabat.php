<?php

namespace backend\modules\setting\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "p2_pejabat".
 *
 * @property int $id
 * @property string $nm_pejabat
 * @property string $nip_pejabat
 * @property string $jab_pejabat
 * @property string $kd_kantor
 */
class P2Pejabat extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'p2_pejabat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['id', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['nm_pejabat', 'jab_pejabat'], 'string', 'max' => 100],
            [['nip_pejabat'], 'string', 'max' => 45],
            [['kd_kantor'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'nm_pejabat' => 'Nama',
            'nip_pejabat' => 'NIP',
            'jab_pejabat' => 'Jabatan',
            'kd_kantor' => 'Kode Kantor',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'status_pejabat' => 'Status',
        ];
    }
    
    public function getKantor() {
        return $this->hasOne(DbKantor::className(), ['kd_kantor' => 'kd_kantor']);
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
