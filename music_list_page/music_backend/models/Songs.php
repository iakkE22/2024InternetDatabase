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
 *
 * @property Artists $artist
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
            [['FilePath'], 'string', 'max' => 255],
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
     * Gets query for [[Songcomments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSongcomments()
    {
        return $this->hasMany(Songcomments::class, ['SongID' => 'SongID']);
    }
}
