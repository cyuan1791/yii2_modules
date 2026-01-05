<?php

namespace frontend\modules\rate\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\rate\models\RateReview;

/**
 * RateReviewSearch represents the model behind the search form of `frontend\modules\rate\models\RateReview`.
 */
class RateReviewSearch extends RateReview
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'product_id', 'click', 'rating', 'status', 'created_at', 'updated_at'], 'integer'],
            [['title', 'email', 'author', 'brief', 'content'], 'safe'],
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
        $query = RateReview::find();

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
            'id' => $this->id,
            'product_id' => $this->product_id,
            'click' => $this->click,
            'rating' => $this->rating,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'author', $this->author])
            ->andFilterWhere(['like', 'brief', $this->brief])
            ->andFilterWhere(['like', 'content', $this->content]);

        return $dataProvider;
    }
}
