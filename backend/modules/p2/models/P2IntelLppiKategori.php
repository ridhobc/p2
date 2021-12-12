<?php

namespace backend\modules\p2\models;

use Yii;

/**
 * This is the model class for table "p2_intel_lppi_kategori".
 *
 * @property int $id
 * @property string $nm_kategori_lppi
 * @property int|null $created_at
 * @property int|null $created_by
 * @property int|null $updated_at
 * @property int|null $updated_by
 */
class P2IntelLppiKategori extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'p2_intel_lppi_kategori';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['nm_kategori_lppi'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nm_kategori_lppi' => 'Nm Kategori Lppi',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }
}
