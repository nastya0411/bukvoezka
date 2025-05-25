<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "book_cart".
 *
 * @property int $id
 * @property int $user_id
 * @property string $author
 * @property string $title
 * @property int $status_id
 * @property int $sharing_option
 * @property string|null $reason
 * @property string|null $created_at
 *
 * @property Status $status
 * @property User $user
 */
class BookCart extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'book_cart';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'author', 'title', 'status_id'], 'required'],
            [['user_id', 'author', 'title', 'status_id'], 'required'],
            [['user_id', 'status_id', 'sharing', 'to_lib'], 'integer'],
            [['reason'], 'string'],
            [['created_at'], 'safe'],
            [['author', 'title'], 'string', 'max' => 255],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => Status::class, 'targetAttribute' => ['status_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
            [['sharing', 'to_lib'], 'required', 'requiredValue' => 1, 'message' => "надо отметить"],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Номер карточки',
            'user_id' => 'Пользователь',
            'author' => 'Автор книги',
            'title' => 'Название книги',
            'status_id' => 'Статус карточки',
            'sharing' => 'Дополнительная опция',
            'to_lib' => 'в библиотеку',
            'reason' => 'Причина отклонения',
            'created_at' => 'Время создания карточки',
        ];
    }

    /**
     * Gets query for [[Status]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::class, ['id' => 'status_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    // public function getSharingOptionText()
    // {
    //     $options = [
    //         1 => 'Готов поделиться',
    //         2 => 'Хочу в свою библиотеку'
    //     ];
    //     return $options[$this->sharing_option];
    // }
}
