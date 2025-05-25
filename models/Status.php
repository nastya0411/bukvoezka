<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "status".
 *
 * @property int $id
 * @property string $title
 *
 * @property BookCart[] $bookCarts
 */
class Status extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
        ];
    }

    /**
     * Gets query for [[BookCarts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBookCarts()
    {
        return $this->hasMany(BookCart::class, ['status_id' => 'id']);
    }

    public static function getStatusId($status)
    {
        return self::findOne(['title' => $status])->id;
    }

    public static function getStatuses()
    {
        return self::find()
        ->select('title')
        ->indexBy('id')
        ->column();
    }
}
