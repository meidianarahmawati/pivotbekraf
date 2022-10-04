<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "m_keperluan".
 *
 * @property int $id
 * @property string $keperluan
 */
class MKeperluan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'm_keperluan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['keperluan'], 'required'],
            [['keperluan'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'keperluan' => 'Keperluan',
        ];
    }
}
