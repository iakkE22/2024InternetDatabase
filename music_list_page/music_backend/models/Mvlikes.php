<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mvlikes".
 *
 * @property int $MVID
 * @property int|null $LikeCount
 */
class Mvlikes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mvlikes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['MVID'], 'required'],
            [['MVID', 'LikeCount'], 'integer'],
            [['MVID'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'MVID' => 'Mvid',
            'LikeCount' => 'Like Count',
        ];
    }
}
