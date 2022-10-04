<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $nama
 * @property int $instansi
 * @property int $keperluan
 * @property int $flag
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 *
 * @property MInstansi $instansi0
 * @property MKeperluan $keperluan0
 */
class User extends \yii\db\ActiveRecord
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
            [['username', 'auth_key', 'password_hash', 'email', 'nama', 'instansi', 'keperluan', 'flag', 'created_at', 'updated_at'], 'required'],
            [['instansi', 'keperluan', 'flag', 'status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['nama'], 'string', 'max' => 100],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
            [['instansi'], 'exist', 'skipOnError' => true, 'targetClass' => MInstansi::className(), 'targetAttribute' => ['instansi' => 'id']],
            [['keperluan'], 'exist', 'skipOnError' => true, 'targetClass' => MKeperluan::className(), 'targetAttribute' => ['keperluan' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'nama' => 'Nama',
            'instansi' => 'Instansi',
            'keperluan' => 'Keperluan',
            'flag' => 'Flag',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInstansi0()
    {
        return $this->hasOne(MInstansi::className(), ['id' => 'instansi']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKeperluan0()
    {
        return $this->hasOne(MKeperluan::className(), ['id' => 'keperluan']);
    }
}
