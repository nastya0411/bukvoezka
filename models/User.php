<?php

namespace app\models;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $full_name
 * @property string $phone
 * @property string $email
 * @property string $login
 * @property string $password
 * @property int $role_id
 * @property string $auth_key
 *
 * @property BookCart[] $bookCarts
 * @property Role $role
 */
class User extends ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['full_name', 'phone', 'email', 'login', 'password', 'role_id', 'auth_key'], 'required'],
            [['role_id'], 'integer'],
            [['login'], 'unique'],
            [['full_name', 'password', 'auth_key'], 'string', 'max' => 255],
            [['password'], 'string', 'min' => 6],
            ['full_name', 'match', 'pattern' => '/^[а-яё\s]+$/ui', 'message' => 'Только символы кириллицы и пробелы'],
            [['email'], 'email'],
            [['phone', 'login'], 'string', 'max' => 50],
            [['email'], 'string', 'max' => 100],
            [['role_id'], 'exist', 'skipOnError' => true, 'targetClass' => Role::class, 'targetAttribute' => ['role_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Номер книги',
            'full_name' => 'ФИО',
            'phone' => 'Телефон',
            'email' => 'Адрес электронной почты',
            'login' => 'Логин',
            'password' => 'Пароль',
            'role_id' => 'Role ID',
            'auth_key' => 'Auth Key',
        ];
    }

    /**
     * Gets query for [[BookCarts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBookCarts()
    {
        return $this->hasMany(BookCart::class, ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Role]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(Role::class, ['id' => 'role_id']);
    }

    public static function findByUsername($login): null|User
    {
        return self::findOne(['login' => $login]);
    }

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * Finds an identity by the given token.
     *
     * @param string $token the token to be looked for
     * @return IdentityInterface|null the identity object that matches the given token.
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * @return int|string current user ID
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string|null current user auth key
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @param string $authKey
     * @return bool|null if auth key is valid for current user
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    public function getIsAdmin()
    {
        return $this->role_id===Role::getRoleId('admin');
    }
}
