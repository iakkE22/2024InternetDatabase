<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "developers".
 *
 * @property int $DeveloperID
 * @property string $Name
 * @property string $Email
 * @property string|null $Phone
 * @property string|null $Role
 * @property string|null $Bio
 * @property string|null $GitHubLink
 */
class Developers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'developers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Name', 'Email'], 'required'],
            [['Bio'], 'string'],
            [['Name', 'Email'], 'string', 'max' => 100],
            [['Phone'], 'string', 'max' => 15],
            [['Role'], 'string', 'max' => 50],
            [['GitHubLink'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'DeveloperID' => 'Developer ID',
            'Name' => 'Name',
            'Email' => 'Email',
            'Phone' => 'Phone',
            'Role' => 'Role',
            'Bio' => 'Bio',
            'GitHubLink' => 'Git Hub Link',
        ];
    }
}
