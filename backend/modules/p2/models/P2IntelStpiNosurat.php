<?php

namespace backend\modules\p2\models;

use Yii;
use mdm\autonumber\NextValueValidator;
use mdm\autonumber\AutoNumber;
/**
 * This is the model class for table "p2_intel_stpi_nosurat".
 *
 * @property int $id
 * @property int|null $stpi_id
 * @property string|null $no_stpi
 * @property string|null $tgl_stpi
 * @property string|null $no_surat_nomor
 */
class P2IntelStpiNosurat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'p2_intel_stpi_nosurat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['stpi_id'], 'integer'],
            [['tgl_stpi'], 'safe'],
            [['no_stpi', 'no_surat_nomor'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'stpi_id' => 'Stpi ID',
            'no_stpi' => 'No Stpi',
            'tgl_stpi' => 'Tgl Stpi',
            'no_surat_nomor' => 'No Surat Nomor',
        ];
    }
    
    public function behaviors() {
        return [
            [
                'class' => 'mdm\autonumber\Behavior',
                'attribute' => 'no_stpi', // required
                'group' => $this->id, // optional
//                  'value' => date('Y') . '-?', // format auto number. '?' will be replaced with generated number
                'value' => '?' . '/' . date('Y'), // format auto number. '?' will be replaced with generated number
                'digit' => 3 // optional, default to null. 
            ],
            
        ];
    }
}
