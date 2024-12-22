<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "artists".
 *
 * @property int $ArtistID
 * @property string $Name
 * @property string|null $Bio
 * @property string|null $ProfilePic
 *
 * @property Musicvideos[] $musicvideos
 * @property Songs[] $songs
 */
class Artists extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'artists';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Name'], 'required'],
            [['Bio'], 'string'],
            [['Name'], 'string', 'max' => 100],
            [['ProfilePic'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ArtistID' => 'Artist ID',
            'Name' => 'Name',
            'Bio' => 'Bio',
            'ProfilePic' => 'Profile Pic',
        ];
    }

    /**
     * Gets query for [[Musicvideos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMusicvideos()
    {
        return $this->hasMany(Musicvideos::class, ['ArtistID' => 'ArtistID']);
    }

    /**
     * Gets query for [[Songs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSongs()
    {
        return $this->hasMany(Songs::class, ['ArtistID' => 'ArtistID']);
    }
}
