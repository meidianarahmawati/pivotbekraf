<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "unduhan".
 *
 * @property int $id
 * @property int $userid
 * @property int $tabelid
 * @property string $datetime
 * @property string $ip
 * @property string $country
 * @property int $flag
 *
 * @property MTabel $tabel
 * @property User $user
 */
class Unduhan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'unduhan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['userid', 'tabelid', 'datetime', 'flag'], 'required'],
            [['userid', 'tabelid', 'flag'], 'integer'],
            [['datetime'], 'safe'],
            [['ip'], 'string', 'max' => 15],
            [['country'], 'string', 'max' => 200],
            [['tabelid'], 'exist', 'skipOnError' => true, 'targetClass' => MTabel::className(), 'targetAttribute' => ['tabelid' => 'id']],
            [['userid'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['userid' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'userid' => 'Userid',
            'tabelid' => 'Tabelid',
            'datetime' => 'Datetime',
            'ip' => 'Ip',
            'country' => 'Country',
            'flag' => 'Flag',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTabel()
    {
        return $this->hasOne(MTabel::className(), ['id' => 'tabelid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'userid']);
    }

    public function getInstansi()
    {
        return $this->hasOne(MInstansi::className(), ['id' => 'instansi'])
            ->via('user');
    }

    public function getKeperluan()
    {
        return $this->hasOne(MKeperluan::className(), ['id' => 'keperluan'])
            ->via('user');
    }
}
