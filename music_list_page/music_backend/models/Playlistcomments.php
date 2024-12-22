<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "playlistcomments".
 *
 * @property int $CommentID
 * @property int $PlaylistID
 * @property int $UserID
 * @property string $CommentText
 * @property string|null $CommentDate
 *
 * @property Playlists $playlist
 * @property Users $user
 */
class Playlistcomments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'playlistcomments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['PlaylistID', 'UserID', 'CommentText'], 'required'],
            [['PlaylistID', 'UserID'], 'integer'],
            [['CommentText'], 'string'],
            [['CommentDate'], 'safe'],
            [['PlaylistID'], 'exist', 'skipOnError' => true, 'targetClass' => Playlists::class, 'targetAttribute' => ['PlaylistID' => 'PlaylistID']],
            [['UserID'], 'exist', 'skipOnError' => true, 'targetClass' => Users::class, 'targetAttribute' => ['UserID' => 'UserID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'CommentID' => 'Comment ID',
            'PlaylistID' => 'Playlist ID',
            'UserID' => 'User ID',
            'CommentText' => 'Comment Text',
            'CommentDate' => 'Comment Date',
        ];
    }

    /**
     * Gets query for [[Playlist]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlaylist()
    {
        return $this->hasOne(Playlists::class, ['PlaylistID' => 'PlaylistID']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::class, ['UserID' => 'UserID']);
    }
}
