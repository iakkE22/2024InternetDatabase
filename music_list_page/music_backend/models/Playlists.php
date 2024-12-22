<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "playlists".
 *
 * @property int $PlaylistID
 * @property string $Title
 * @property string|null $Description
 * @property string|null $CoverImage
 *
 * @property Playlistcomments[] $playlistcomments
 */
class Playlists extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'playlists';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Title'], 'required'],
            [['Description'], 'string'],
            [['Title'], 'string', 'max' => 100],
            [['CoverImage'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'PlaylistID' => 'Playlist ID',
            'Title' => 'Title',
            'Description' => 'Description',
            'CoverImage' => 'Cover Image',
        ];
    }

    /**
     * Gets query for [[Playlistcomments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlaylistcomments()
    {
        return $this->hasMany(Playlistcomments::class, ['PlaylistID' => 'PlaylistID']);
    }
}
