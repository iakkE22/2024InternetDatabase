<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Mvcomments;

/**
 * MvcommentsSearch represents the model behind the search form of `app\models\Mvcomments`.
 */
class MvcommentsSearch extends Mvcomments
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['CommentID', 'MVID', 'UserID'], 'integer'],
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
        $query = Mvcomments::find();

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
            'MVID' => $this->MVID,
            'UserID' => $this->UserID,
            'CommentDate' => $this->CommentDate,
        ]);

        $query->andFilterWhere(['like', 'CommentText', $this->CommentText]);

        return $dataProvider;
    }
}
