<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tab_agenda".
 *
 * @property string $id
 * @property string $tgl_agenda
 * @property string $waktu_agenda
 * @property string $uraian_agenda
 * @property string $tempat_agenda
 * @property string $pic_agenda
 * @property string $sedang_berlangsung
 */
class TabAgenda extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tab_agenda';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tgl_agenda', 'tempat_agenda', 'pic_agenda', 'sedang_berlangsung'], 'required'],
            [['tgl_agenda'], 'safe'],
            [['waktu_agenda'], 'string', 'max' => 20],
            [['uraian_agenda'], 'string', 'max' => 200],
            [['tempat_agenda', 'pic_agenda', 'sedang_berlangsung'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tgl_agenda' => 'Date',
            'waktu_agenda' => 'Time',
            'uraian_agenda' => 'Task',
            'tempat_agenda' => 'Place',
            'pic_agenda' => 'CP/PIC',
            'sedang_berlangsung' => 'Sedang Berlangsung',
        ];
    }
}
