<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%blog}}".
 *
 * @property int $id
 * @property string|null $topic ชื่อเรื่อง
 * @property string|null $detail รายละเอียด
 * @property string|null $tag แท็ก
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $created_at
 * @property int|null $updated_at
 */
class Blog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%blog}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['topic', 'detail'], 'string', 'max' => 255],
            [['tag'], 'string', 'max' => 15],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'topic' => 'ชื่อเรื่อง',
            'detail' => 'รายละเอียด',
            'tag' => 'แท็ก',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return BlogQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BlogQuery(get_called_class());
    }
}
