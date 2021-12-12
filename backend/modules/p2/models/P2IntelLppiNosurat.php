<?php

namespace backend\modules\p2\models;

use Yii;
use mdm\autonumber\NextValueValidator;
use mdm\autonumber\AutoNumber;
/**
 * This is the model class for table "p2_intel_lppi_nosurat".
 *
 * @property int $id
 * @property int|null $lppi_id
 * @property string|null $no_lppi
 * @property string|null $tgl_lppi
 * @property string|null $no_lppi_nomor
 */
class P2IntelLppiNosurat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'p2_intel_lppi_nosurat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lppi_id'], 'integer'],
            [['tgl_lppi'], 'safe'],
            [['no_lppi', 'no_lppi_nomor'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lppi_id' => 'Lppi ID',
            'no_lppi' => 'No Lppi',
            'tgl_lppi' => 'Tgl Lppi',
            'no_lppi_nomor' => 'No Lppi Nomor',
        ];
    }
    
    public function behaviors() {
        return [
            [
                'class' => 'mdm\autonumber\Behavior',
                'attribute' => 'no_lppi', // required
                'group' => $this->id, // optional
//                  'value' => date('Y') . '-?', // format auto number. '?' will be replaced with generated number
                'value' => '?' . '/' . date('Y'), // format auto number. '?' will be replaced with generated number
                'digit' => 3 // optional, default to null. 
            ],
            
        ];
    }
}
