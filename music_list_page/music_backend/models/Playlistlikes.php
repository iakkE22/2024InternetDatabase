<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "playlistlikes".
 *
 * @property int $PlaylistID
 * @property int|null $LikeCount
 */
class Playlistlikes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'playlistlikes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['PlaylistID'], 'required'],
            [['PlaylistID', 'LikeCount'], 'integer'],
            [['PlaylistID'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'PlaylistID' => 'Playlist ID',
            'LikeCount' => 'Like Count',
        ];
    }
}
