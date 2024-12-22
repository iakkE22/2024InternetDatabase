<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "admins".
 *
 * @property int $AdminID
 * @property string $Permissions
 *
 * @property Users $admin
 */
class Admins extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'admins';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['AdminID', 'Permissions'], 'required'],
            [['AdminID'], 'integer'],
            [['Permissions'], 'string', 'max' => 50],
            [['AdminID'], 'unique'],
            [['AdminID'], 'exist', 'skipOnError' => true, 'targetClass' => Users::class, 'targetAttribute' => ['AdminID' => 'UserID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'AdminID' => 'Admin ID',
            'Permissions' => 'Permissions',
        ];
    }

    /**
     * Gets query for [[Admin]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAdmin()
    {
        return $this->hasOne(Users::class, ['UserID' => 'AdminID']);
    }
}
