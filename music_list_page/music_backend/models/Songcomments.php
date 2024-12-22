<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "songcomments".
 *
 * @property int $CommentID
 * @property int $SongID
 * @property int $UserID
 * @property string $CommentText
 * @property string|null $CommentDate
 *
 * @property Songs $song
 * @property Users $user
 */
class Songcomments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'songcomments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['SongID', 'UserID', 'CommentText'], 'required'],
            [['SongID', 'UserID'], 'integer'],
            [['CommentText'], 'string'],
            [['CommentDate'], 'safe'],
            [['SongID'], 'exist', 'skipOnError' => true, 'targetClass' => Songs::class, 'targetAttribute' => ['SongID' => 'SongID']],
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
            'SongID' => 'Song ID',
            'UserID' => 'User ID',
            'CommentText' => 'Comment Text',
            'CommentDate' => 'Comment Date',
        ];
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
