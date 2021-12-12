<?php

namespace backend\modules\setting\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
/**
 * This is the model class for table "p2_petugas".
 *
 * @property int $id
 * @property string $nip_petugas
 * @property string|null $nm_petugas
 * @property string|null $kd_kantor
 * @property string|null $pangkat_petugas
 * @property string|null $gol_petugas
 * @property string|null $jabatan_petugas
 * @property int $status_aktif
 * @property int|null $created_at
 * @property int|null $created_by
 * @property int|null $updated_at
 * @property int|null $updated_by
 */
class P2Petugas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'p2_petugas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status_aktif', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['nip_petugas'], 'string', 'max' => 20],
            [['nm_petugas', 'pangkat_petugas', 'jabatan_petugas'], 'string', 'max' => 100],
            [['kd_kantor', 'gol_petugas'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nip_petugas' => 'NIP',
            'nm_petugas' => 'Nama',
            'kd_kantor' => 'Kd Kantor',
            'pangkat_petugas' => 'Pangkat',
            'gol_petugas' => 'Gol',
            'jabatan_petugas' => 'Jabatan',
            'status_aktif' => 'Status',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
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
