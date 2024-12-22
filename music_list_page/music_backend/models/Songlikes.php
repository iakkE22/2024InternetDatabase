<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "songlikes".
 *
 * @property int $SongID
 * @property int|null $LikeCount
 */
class Songlikes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'songlikes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['SongID'], 'required'],
            [['SongID', 'LikeCount'], 'integer'],
            [['SongID'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'SongID' => 'Song ID',
            'LikeCount' => 'Like Count',
        ];
    }
}
