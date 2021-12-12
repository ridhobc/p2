<?php

namespace backend\modules\p2\models;

use Yii;
use mdm\autonumber\NextValueValidator;
use mdm\autonumber\AutoNumber;
/**
 * This is the model class for table "p2_intel_lpti_nosurat".
 *
 * @property int $id
 * @property int|null $lpti_id
 * @property string|null $no_lpti
 * @property string|null $tgl_lpti
 * @property string|null $no_lpti_nomor
 */
class P2IntelLptiNosurat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'p2_intel_lpti_nosurat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lpti_id'], 'integer'],
            [['tgl_lpti'], 'safe'],
            [['no_lpti', 'no_lpti_nomor'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lpti_id' => 'Lpti ID',
            'no_lpti' => 'No Lpti',
            'tgl_lpti' => 'Tgl Lpti',
            'no_lpti_nomor' => 'No Lpti Nomor',
        ];
    }
    
    public function behaviors() {
        return [
            [
                'class' => 'mdm\autonumber\Behavior',
                'attribute' => 'no_lpti', // required
                'group' => $this->id, // optional
//                  'value' => date('Y') . '-?', // format auto number. '?' will be replaced with generated number
                'value' => '?' . '/' . date('Y'), // format auto number. '?' will be replaced with generated number
                'digit' => 3 // optional, default to null. 
            ],
            
        ];
    }
}
