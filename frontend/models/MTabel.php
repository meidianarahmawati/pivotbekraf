<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "m_tabel".
 *
 * @property string $id
 * @property string $keterangan
 * @property string $pilihkolom
 * @property string $lokasi
 * @property string $konfigjson
 * @property string $value
 * @property string $kolommaster
 * @property string $setcol
 * @property string $setrow
 * @property int $kategori
 *
 * @property MKategori $kategori0
 */
class MTabel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'm_tabel';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'value', 'setcol', 'setrow', 'kategori'], 'required'],
            [['keterangan'], 'string'],
            [['kategori'], 'integer'],
            [['id'], 'string', 'max' => 4],
            [['pilihkolom', 'konfigjson', 'kolommaster', 'setcol', 'setrow'], 'string', 'max' => 255],
            [['lokasi'], 'string', 'max' => 20],
            [['value'], 'string', 'max' => 50],
            [['id'], 'unique'],
            [['kategori'], 'exist', 'skipOnError' => true, 'targetClass' => MKategori::className(), 'targetAttribute' => ['kategori' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'keterangan' => 'Keterangan',
            'pilihkolom' => 'Pilihkolom',
            'lokasi' => 'Lokasi',
            'konfigjson' => 'Konfigjson',
            'value' => 'Nilai',
            'kolommaster' => 'Variabel',
            'setcol' => 'Kolom',
            'setrow' => 'Baris',
            'kategori' => 'Kategori',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKategori0()
    {
        return $this->hasOne(MKategori::className(), ['id' => 'kategori']);
    }
}
