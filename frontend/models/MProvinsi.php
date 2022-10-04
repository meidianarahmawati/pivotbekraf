<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "m_provinsi".
 *
 * @property string $id
 * @property string $keterangan
 * @property string $pulau
 *
 * @property MKota[] $mKotas
 * @property TProfil[] $tProfils
 * @property TProvinsi[] $tProvinsis
 * @property TTenagakerja[] $tTenagakerjas
 * @property TUpahtenagakerja[] $tUpahtenagakerjas
 */
class MProvinsi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'm_provinsi';
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
            [['pulau'], 'string', 'max' => 1],
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
            'pulau' => Yii::t('app', 'Pulau'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMKotas()
    {
        return $this->hasMany(MKota::className(), ['provinsi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTProfils()
    {
        return $this->hasMany(TProfil::className(), ['provinsi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTProvinsis()
    {
        return $this->hasMany(TProvinsi::className(), ['provinsi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTTenagakerjas()
    {
        return $this->hasMany(TTenagakerja::className(), ['provinsi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTUpahtenagakerjas()
    {
        return $this->hasMany(TUpahtenagakerja::className(), ['provinsi' => 'id']);
    }
}
