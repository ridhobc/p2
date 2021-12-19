<?php

namespace backend\modules\p2\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
/**
 * This is the model class for table "p2_indak_li".
 *
 * @property int $id
 * @property string $kd_kantor
 * @property string $no_li
 * @property string|null $tgl_li
 * @property string|null $sumber_info
 * @property string|null $isi_info
 * @property string|null $tindak_lanjut_li
 * @property string|null $catatan_tindak_lanjut_li
 * @property string|null $petugas_id
 * @property string|null $pejabat_id
 * @property int|null $created_at
 * @property int|null $created_by
 * @property int|null $updated_at
 * @property int|null $updated_by
 */
class P2IndakLi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'p2_indak_li';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kd_kantor'], 'required'],
            [['isi_info', 'catatan_tindak_lanjut_li'], 'string'],
            [['created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['kd_kantor', 'no_li', 'tgl_li', 'tindak_lanjut_li', 'petugas_id', 'pejabat_id'], 'string', 'max' => 45],
            [['sumber_info'], 'string', 'max' => 200],
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
            'no_li' => 'No Li',
            'tgl_li' => 'Tgl Li',
            'sumber_info' => 'Sumber Info',
            'isi_info' => 'Isi Info',
            'tindak_lanjut_li' => 'Tindak Lanjut Li',
            'catatan_tindak_lanjut_li' => 'Catatan Tindak Lanjut Li',
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
