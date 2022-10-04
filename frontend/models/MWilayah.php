<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "m_wilayah".
 *
 * @property int $id
 * @property string $keterangan
 *
 * @property TProfilWilayah[] $tProfilWilayahs
 */
class MWilayah extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'm_wilayah';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['keterangan'], 'string', 'max' => 50],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTProfilWilayahs()
    {
        return $this->hasMany(TProfilWilayah::className(), ['wilayah' => 'id']);
    }
}
