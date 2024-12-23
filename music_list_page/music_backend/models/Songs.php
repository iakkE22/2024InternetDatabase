<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "songs".
 *
 * @property int $SongID
 * @property string $Title
 * @property int $ArtistID
 * @property string $FilePath
 * @property string $CoverImage
 *
 * @property Artists $artist
 * @property PlaylistSongs[] $playlistSongs
 * @property Playlists[] $playlists
 * @property Songcomments[] $songcomments
 */
class Songs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'songs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Title', 'ArtistID', 'FilePath'], 'required'],
            [['ArtistID'], 'integer'],
            [['Title'], 'string', 'max' => 100],
            [['FilePath', 'CoverImage'], 'string', 'max' => 255],
            [['ArtistID'], 'exist', 'skipOnError' => true, 'targetClass' => Artists::class, 'targetAttribute' => ['ArtistID' => 'ArtistID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'SongID' => 'Song ID',
            'Title' => 'Title',
            'ArtistID' => 'Artist ID',
            'FilePath' => 'File Path',
            'CoverImage' => 'Cover Image',
        ];
    }

    /**
     * Gets query for [[Artist]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getArtist()
    {
        return $this->hasOne(Artists::class, ['ArtistID' => 'ArtistID']);
    }

    /**
     * Gets query for [[PlaylistSongs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlaylistSongs()
    {
        return $this->hasMany(PlaylistSongs::class, ['SongID' => 'SongID']);
    }

    /**
     * Gets query for [[Playlists]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlaylists()
    {
        return $this->hasMany(Playlists::class, ['PlaylistID' => 'PlaylistID'])->viaTable('playlist_songs', ['SongID' => 'SongID']);
    }

    /**
     * Gets query for [[Songcomments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSongcomments()
    {
        return $this->hasMany(Songcomments::class, ['SongID' => 'SongID']);
    }
}
