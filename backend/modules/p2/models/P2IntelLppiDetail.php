<?php

namespace backend\modules\p2\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
/**
 * This is the model class for table "p2_intel_lppi_detail".
 *
 * @property int $id
 * @property string $lppi_id
 * @property string $ikhtisar_info
 * @property string $cek_sumber_id
 * @property string $cek_validitas_id
 */
class P2IntelLppiDetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'p2_intel_lppi_detail';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ikhtisar_info'], 'string'],
            [['lppi_id'], 'string', 'max' => 45],
            [['cek_sumber_id', 'cek_validitas_id'], 'string', 'max' => 5],
            [['created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
        ];
        
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lppi_id' => 'LPTI',
            'ikhtisar_info' => 'Ikhtisar',
            'cek_sumber_id' => 'Sumber',
            'cek_validitas_id' => 'Validitas',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
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
