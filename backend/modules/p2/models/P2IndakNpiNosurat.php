<?php

namespace backend\modules\p2\models;

use Yii;

/**
 * This is the model class for table "p2_indak_npi_nosurat".
 *
 * @property int $id
 * @property int|null $npi_id
 * @property string|null $no_npi
 * @property string|null $tgl_npi
 * @property string|null $no_npi_nomor
 * @property int|null $created_at
 * @property int|null $created_by
 * @property int|null $updated_at
 * @property int|null $updated_by
 */
class P2IndakNpiNosurat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'p2_indak_npi_nosurat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['npi_id', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['tgl_npi'], 'safe'],
            [['no_npi', 'no_npi_nomor'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'npi_id' => 'Npi ID',
            'no_npi' => 'No Npi',
            'tgl_npi' => 'Tgl Npi',
            'no_npi_nomor' => 'No Npi Nomor',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }
}
