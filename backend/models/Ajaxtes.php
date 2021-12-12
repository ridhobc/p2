<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ajaxtes".
 *
 * @property string $id
 * @property string $post_title
 * @property string $post_description
 */
class Ajaxtes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ajaxtes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['post_title', 'post_description'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'post_title' => 'Post Title',
            'post_description' => 'Post Description',
        ];
    }
}
