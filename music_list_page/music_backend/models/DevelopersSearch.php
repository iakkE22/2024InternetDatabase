<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Developers;

/**
 * DevelopersSearch represents the model behind the search form of `app\models\Developers`.
 */
class DevelopersSearch extends Developers
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['DeveloperID'], 'integer'],
            [['Name', 'Email', 'Phone', 'Role', 'Bio', 'GitHubLink'], 'safe'],
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
        $query = Developers::find();

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
            'DeveloperID' => $this->DeveloperID,
        ]);

        $query->andFilterWhere(['like', 'Name', $this->Name])
            ->andFilterWhere(['like', 'Email', $this->Email])
            ->andFilterWhere(['like', 'Phone', $this->Phone])
            ->andFilterWhere(['like', 'Role', $this->Role])
            ->andFilterWhere(['like', 'Bio', $this->Bio])
            ->andFilterWhere(['like', 'GitHubLink', $this->GitHubLink]);

        return $dataProvider;
    }
}
