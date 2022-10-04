<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "t_provinsi".
 *
 * @property string $subsektor
 * @property int $tahun
 * @property string $provinsi
 * @property string $tipenilai
 * @property double $nilai
 * @property string $m_tabel
 *
 * @property MSubsektor $subsektor0
 * @property MProvinsi $provinsi0
 * @property MTipenilaiTransaksiProvinsi $tipenilai0
 * @property MTabel $mTabel
 */
class TProvinsi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 't_provinsi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tahun'], 'integer'],
            [['nilai'], 'number'],
            [['subsektor', 'provinsi', 'tipenilai'], 'string', 'max' => 2],
            [['m_tabel'], 'string', 'max' => 4],
            [['subsektor'], 'exist', 'skipOnError' => true, 'targetClass' => MSubsektor::className(), 'targetAttribute' => ['subsektor' => 'id']],
            [['provinsi'], 'exist', 'skipOnError' => true, 'targetClass' => MProvinsi::className(), 'targetAttribute' => ['provinsi' => 'id']],
            [['tipenilai'], 'exist', 'skipOnError' => true, 'targetClass' => MTipenilaiTransaksiProvinsi::className(), 'targetAttribute' => ['tipenilai' => 'id']],
            [['m_tabel'], 'exist', 'skipOnError' => true, 'targetClass' => MTabel::className(), 'targetAttribute' => ['m_tabel' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'subsektor' => Yii::t('app', 'Subsektor'),
            'tahun' => Yii::t('app', 'Tahun'),
            'provinsi' => Yii::t('app', 'Provinsi'),
            'tipenilai' => Yii::t('app', 'Tipenilai'),
            'nilai' => Yii::t('app', 'Nilai'),
            'm_tabel' => Yii::t('app', 'M Tabel'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubsektor0()
    {
        return $this->hasOne(MSubsektor::className(), ['id' => 'subsektor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProvinsi0()
    {
        return $this->hasOne(MProvinsi::className(), ['id' => 'provinsi']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipenilai0()
    {
        return $this->hasOne(MTipenilaiTransaksiProvinsi::className(), ['id' => 'tipenilai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMTabel()
    {
        return $this->hasOne(MTabel::className(), ['id' => 'm_tabel']);
    }
}
