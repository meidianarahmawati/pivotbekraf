<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "m_instansi".
 *
 * @property int $id
 * @property string $nama_instansi
 */
class MInstansi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'm_instansi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_instansi'], 'required'],
            [['nama_instansi'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_instansi' => 'Nama Instansi',
        ];
    }
}
