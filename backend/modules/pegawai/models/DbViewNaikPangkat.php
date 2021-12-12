<?php

namespace backend\modules\pegawai\models;

use Yii;

/**
 * This is the model class for table "db_view_naik_pangkat".
 *
 * @property integer $id
 * @property string $NmPegawai
 * @property string $Nip
 * @property string $TmtPangkat
 * @property string $tgl_pangkat_berikutnya
 * @property integer $selisih
 */
class DbViewNaikPangkat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_view_naik_pangkat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'selisih'], 'integer'],
            [['TmtPangkat'], 'safe'],
            [['NmPegawai', 'tgl_pangkat_berikutnya'], 'string', 'max' => 100],
            [['Nip'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'NmPegawai' => 'Nm Pegawai',
            'Nip' => 'Nip',
            'TmtPangkat' => 'Tmt Pangkat',
            'tgl_pangkat_berikutnya' => 'Tgl Pangkat Berikutnya',
            'selisih' => 'Selisih',
        ];
    }
}
