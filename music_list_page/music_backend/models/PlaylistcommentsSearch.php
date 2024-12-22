<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Playlistcomments;

/**
 * PlaylistcommentsSearch represents the model behind the search form of `app\models\Playlistcomments`.
 */
class PlaylistcommentsSearch extends Playlistcomments
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['CommentID', 'PlaylistID', 'UserID'], 'integer'],
            [['CommentText', 'CommentDate'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Playlistcomments::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'CommentID' => $this->CommentID,
            'PlaylistID' => $this->PlaylistID,
            'UserID' => $this->UserID,
            'CommentDate' => $this->CommentDate,
        ]);

        $query->andFilterWhere(['like', 'CommentText', $this->CommentText]);

        return $dataProvider;
    }
}
