<?php

namespace backend\modules\p2\models;

use Yii;

/**
 * This is the model class for table "p2_pejabat".
 *
 * @property int $id
 * @property string $nm_pejabat
 * @property string $nip_pejabat
 * @property string $jab_pejabat
 * @property string $kd_kantor
 */
class P2Pejabat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'p2_pejabat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nm_pejabat', 'jab_pejabat'], 'string', 'max' => 100],
            [['nip_pejabat'], 'string', 'max' => 45],
            [['kd_kantor'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nm_pejabat' => 'Nama',
            'nip_pejabat' => 'NIP',
            'jab_pejabat' => 'Jabatan',
            'kd_kantor' => 'Kode Kantor',
        ];
    }
}
