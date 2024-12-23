<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "musicvideos".
 *
 * @property int $MVID
 * @property string $Title
 * @property int $ArtistID
 * @property string $VideoPath
 * @property string|null $CoverImage
 *
 * @property Artists $artist
 * @property Mvcomments[] $mvcomments
 */
class Musicvideos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'musicvideos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Title', 'ArtistID', 'VideoPath'], 'required'],
            [['ArtistID'], 'integer'],
            [['Title'], 'string', 'max' => 100],
            [['VideoPath', 'CoverImage'], 'string', 'max' => 255],
            [['ArtistID'], 'exist', 'skipOnError' => true, 'targetClass' => Artists::class, 'targetAttribute' => ['ArtistID' => 'ArtistID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'MVID' => 'Mvid',
            'Title' => 'Title',
            'ArtistID' => 'Artist ID',
            'VideoPath' => 'Video Path',
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
     * Gets query for [[Mvcomments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMvcomments()
    {
        return $this->hasMany(Mvcomments::class, ['MVID' => 'MVID']);
    }
}
