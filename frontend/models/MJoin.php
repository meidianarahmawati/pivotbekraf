<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "m_join".
 *
 * @property int $id
 * @property string $kolom
 * @property string $tabel
 * @property string $kondisijoin
 */
class MJoin extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'm_join';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kolom', 'tabel', 'kondisijoin'], 'required'],
            [['kolom'], 'string', 'max' => 20],
            [['tabel'], 'string', 'max' => 50],
            [['kondisijoin'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kolom' => 'Kolom',
            'tabel' => 'Tabel',
            'kondisijoin' => 'Kondisijoin',
        ];
    }
}
