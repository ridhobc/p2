<?php

namespace backend\modules\pos\models;

use Yii;

/**
 * This is the model class for table "pos_tujuan".
 *
 * @property integer $id
 * @property string $nm_tujuan
 * @property string $alamat_tujuan1
 * @property string $alamat_tujuan2
 * @property string $alamat_tujuan3
 * @property string $kota_tujuan
 */
class PosTujuan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pos_tujuan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kota_tujuan_id', 'nm_tujuan', 'kota_tujuan','alamat_tujuan1','alamat_tujuan2'], 'required', 'message' => 'wajib diisi'],
            [['kota_tujuan_id'], 'integer'],
            [['nm_tujuan', 'kota_tujuan'], 'string', 'max' => 45],
            [['alamat_tujuan1', 'alamat_tujuan2', 'alamat_tujuan3'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nm_tujuan' => 'Nm Tujuan',
            'alamat_tujuan1' => 'Alamat Tujuan1',
            'alamat_tujuan2' => 'Alamat Tujuan2',
            'alamat_tujuan3' => 'Alamat Tujuan3',
            'kota_tujuan' => 'Kota Tujuan',
            'kota_tujuan_id' => 'Kota Tujuan',
        ];
    }
    public function getKotatujuan() {
        return $this->hasOne(PosPropinsiKota::className(), ['id' => 'kota_tujuan_id']);
    }
}
