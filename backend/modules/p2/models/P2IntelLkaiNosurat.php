<?php

namespace backend\modules\p2\models;

use Yii;
use mdm\autonumber\NextValueValidator;
use mdm\autonumber\AutoNumber;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "p2_intel_lkai_nosurat".
 *
 * @property int $id
 * @property int|null $lkai_id
 * @property string|null $no_lkai
 * @property string|null $tgl_lkai
 * @property string|null $no_lkai_nomor
 * @property int|null $created_at
 * @property int|null $created_by
 * @property int|null $updated_at
 * @property int|null $updated_by
 */
class P2IntelLkaiNosurat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'p2_intel_lkai_nosurat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lkai_id', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['tgl_lkai'], 'safe'],
            [['no_lkai', 'no_lkai_nomor'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lkai_id' => 'Lkai ID',
            'no_lkai' => 'No Lkai',
            'tgl_lkai' => 'Tgl Lkai',
            'no_lkai_nomor' => 'No Lkai Nomor',
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
                'attribute' => 'no_lkai', // required
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
