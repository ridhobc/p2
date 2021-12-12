<?php

namespace backend\modules\p2\models;

use Yii;

/**
 * This is the model class for table "p2_petugas".
 *
 * @property int $id
 * @property string|null $nip_petugas
 * @property string|null $nama_petugas
 * @property string|null $kd_kantor
 * @property string|null $pangkat_petugas
 * @property string|null $golongan_petugas
 * @property string|null $jabatan_petugas
 */
class P2Petugas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'p2_petugas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nip_petugas', 'pangkat_petugas', 'gol_petugas'], 'string', 'max' => 45],
            [['nm_petugas'], 'string', 'max' => 200],
            [['kd_kantor'], 'string', 'max' => 30],
            [['jabatan_petugas'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nip_petugas' => 'Nip Petugas',
            'nm_petugas' => 'Nama Petugas',
            'kd_kantor' => 'Kd Kantor',
            'pangkat_petugas' => 'Pangkat Petugas',
            'gol_petugas' => 'Golongan Petugas',
            'jabatan_petugas' => 'Jabatan Petugas',
        ];
    }
}
