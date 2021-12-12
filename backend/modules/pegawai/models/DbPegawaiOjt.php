<?php

namespace backend\modules\pegawai\models;

use Yii;

/**
 * This is the model class for table "db_pegawai_ojt".
 *
 * @property integer $id
 * @property string $nim_stan
 * @property string $nama_ojt
 * @property string $nip_ojt
 */
class DbPegawaiOjt extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_pegawai_ojt';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nim_stan', 'nama_ojt', 'nip_ojt'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nim_stan' => 'Nim Stan',
            'nama_ojt' => 'Nama Ojt',
            'nip_ojt' => 'Nip Ojt',
        ];
    }
}
