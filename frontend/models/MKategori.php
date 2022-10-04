<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "m_kategori".
 *
 * @property int $id
 * @property string $kategori
 */
class MKategori extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'm_kategori';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kategori'], 'required'],
            [['kategori'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kategori' => 'Kategori',
            'flag' => 'Flag',
        ];
    }
}
