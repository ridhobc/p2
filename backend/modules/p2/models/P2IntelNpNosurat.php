<?php

namespace backend\modules\p2\models;

use Yii;
use mdm\autonumber\NextValueValidator;
use mdm\autonumber\AutoNumber;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "p2_intel_np_nosurat".
 *
 * @property int $id
 * @property int|null $np_id
 * @property string|null $no_np
 * @property string|null $tgl_np
 * @property string|null $no_np_nomor
 * @property int|null $created_at
 * @property int|null $created_by
 * @property int|null $updated_at
 * @property int|null $updated_by
 */
class P2IntelNpNosurat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'p2_intel_np_nosurat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['np_id', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['tgl_np'], 'safe'],
            [['no_np', 'no_np_nomor'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'np_id' => 'Np ID',
            'no_np' => 'No Np',
            'tgl_np' => 'Tgl Np',
            'no_np_nomor' => 'No Np Nomor',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }
    
    public function behaviors() {
        return [
            [
                'class' => 'mdm\autonumber\Behavior',
                'attribute' => 'no_np', // required
                'group' => $this->id, // optional
//                  'value' => date('Y') . '-?', // format auto number. '?' will be replaced with generated number
                'value' => '?' . '/' . date('Y'), // format auto number. '?' will be replaced with generated number
                'digit' => 3 // optional, default to null. 
            ],
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
