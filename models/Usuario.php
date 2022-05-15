<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property int $id
 * @property int $rol_id
 * @property string $username
 * @property string $password
 * @property string|null $email
 * @property string|null $nickname
 * @property string $last_name
 * @property string $first_name
 * @property string|null $birthday
 * @property string|null $auth_key
 * @property string|null $access_token
 * @property bool $is_active
 * @property string|null $avatar
 * @property bool $change_password
 * @property string $created_at
 * @property int|null $created
 * @property string $updated_at
 * @property int|null $updated
 *
 * @property Rol $rol
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rol_id', 'username', 'password', 'last_name', 'first_name', 'created_at', 'updated_at'], 'required'],
            [['rol_id', 'created', 'updated'], 'default', 'value' => null],
            [['rol_id', 'created', 'updated'], 'integer'],
            [['birthday', 'created_at', 'updated_at'], 'safe'],
            [['auth_key', 'access_token'], 'string'],
            [['is_active', 'change_password'], 'boolean'],
            [['username'], 'string', 'max' => 20],
            [['password', 'avatar'], 'string', 'max' => 255],
            [['email'], 'string', 'max' => 200],
            [['nickname'], 'string', 'max' => 30],
            [['last_name', 'first_name'], 'string', 'max' => 80],
            [['username'], 'unique'],
            [['rol_id'], 'exist', 'skipOnError' => true, 'targetClass' => Rol::className(), 'targetAttribute' => ['rol_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'rol_id' => 'Rol ID',
            'username' => 'Username',
            'password' => 'Password',
            'email' => 'Email',
            'nickname' => 'Nickname',
            'last_name' => 'Last Name',
            'first_name' => 'First Name',
            'birthday' => 'Birthday',
            'auth_key' => 'Auth Key',
            'access_token' => 'Access Token',
            'is_active' => 'Is Active',
            'avatar' => 'Avatar',
            'change_password' => 'Change Password',
            'created_at' => 'Created At',
            'created' => 'Created',
            'updated_at' => 'Updated At',
            'updated' => 'Updated',
        ];
    }

    /**
     * Gets query for [[Rol]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRol()
    {
        return $this->hasOne(Rol::className(), ['id' => 'rol_id']);
    }
}
