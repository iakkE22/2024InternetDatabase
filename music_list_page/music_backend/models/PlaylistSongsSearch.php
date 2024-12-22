<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PlaylistSongs;

/**
 * PlaylistSongsSearch represents the model behind the search form of `app\models\PlaylistSongs`.
 */
class PlaylistSongsSearch extends PlaylistSongs
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['PlaylistID', 'SongID', 'OrderIndex'], 'integer'],
            [['AddedDate'], 'safe'],
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
        $query = PlaylistSongs::find();

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
            'PlaylistID' => $this->PlaylistID,
            'SongID' => $this->SongID,
            'AddedDate' => $this->AddedDate,
            'OrderIndex' => $this->OrderIndex,
        ]);

        return $dataProvider;
    }
}
