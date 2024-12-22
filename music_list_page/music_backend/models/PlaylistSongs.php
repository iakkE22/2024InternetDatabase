<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "playlist_songs".
 *
 * @property int $PlaylistID
 * @property int $SongID
 * @property string|null $AddedDate
 * @property int|null $OrderIndex
 *
 * @property Playlists $playlist
 * @property Songs $song
 */
class PlaylistSongs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'playlist_songs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['PlaylistID', 'SongID'], 'required'],
            [['PlaylistID', 'SongID', 'OrderIndex'], 'integer'],
            [['AddedDate'], 'safe'],
            [['PlaylistID', 'SongID'], 'unique', 'targetAttribute' => ['PlaylistID', 'SongID']],
            [['PlaylistID'], 'exist', 'skipOnError' => true, 'targetClass' => Playlists::class, 'targetAttribute' => ['PlaylistID' => 'PlaylistID']],
            [['SongID'], 'exist', 'skipOnError' => true, 'targetClass' => Songs::class, 'targetAttribute' => ['SongID' => 'SongID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'PlaylistID' => 'Playlist ID',
            'SongID' => 'Song ID',
            'AddedDate' => 'Added Date',
            'OrderIndex' => 'Order Index',
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
     * Gets query for [[Song]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSong()
    {
        return $this->hasOne(Songs::class, ['SongID' => 'SongID']);
    }
}
