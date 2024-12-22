<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mvcomments".
 *
 * @property int $CommentID
 * @property int $MVID
 * @property int $UserID
 * @property string $CommentText
 * @property string|null $CommentDate
 *
 * @property Musicvideos $mV
 * @property Users $user
 */
class Mvcomments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mvcomments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['MVID', 'UserID', 'CommentText'], 'required'],
            [['MVID', 'UserID'], 'integer'],
            [['CommentText'], 'string'],
            [['CommentDate'], 'safe'],
            [['MVID'], 'exist', 'skipOnError' => true, 'targetClass' => Musicvideos::class, 'targetAttribute' => ['MVID' => 'MVID']],
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
            'MVID' => 'Mvid',
            'UserID' => 'User ID',
            'CommentText' => 'Comment Text',
            'CommentDate' => 'Comment Date',
        ];
    }

    /**
     * Gets query for [[MV]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMV()
    {
        return $this->hasOne(Musicvideos::class, ['MVID' => 'MVID']);
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
