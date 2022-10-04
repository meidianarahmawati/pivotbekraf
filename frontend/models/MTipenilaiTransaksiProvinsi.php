<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "m_tipenilai_transaksi_provinsi".
 *
 * @property string $id
 * @property string $keterangan
 *
 * @property TProvinsi[] $tProvinsis
 */
class MTipenilaiTransaksiProvinsi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'm_tipenilai_transaksi_provinsi';
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
    public function getTProvinsis()
    {
        return $this->hasMany(TProvinsi::className(), ['tipenilai' => 'id']);
    }
}
