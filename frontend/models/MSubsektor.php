<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "m_subsektor".
 *
 * @property string $id
 * @property string $keterangan
 *
 * @property TProfil[] $tProfils
 * @property TProvinsi[] $tProvinsis
 */
class MSubsektor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'm_subsektor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'string', 'max' => 2],
            [['keterangan'], 'string', 'max' => 50],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'keterangan' => Yii::t('app', 'Keterangan'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTProfils()
    {
        return $this->hasMany(TProfil::className(), ['subsektor' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTProvinsis()
    {
        return $this->hasMany(TProvinsi::className(), ['subsektor' => 'id']);
    }
}
