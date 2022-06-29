<?php
namespace fgh151\review\models;

use yii\data\ActiveDataProvider;

class ReviewSearch extends Review
{
    public function rules()
    {
        return [
            [['id', 'user_id', 'item_id', 'vote'], 'integer'],
            [['message', 'date'], 'safe'],
            [['active'], 'boolean'],
        ];
    }

    public function search($params)
    {
        $query = Review::find()->orderBy('date DESC, id DESC');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'item_id' => $this->item_id,
            'active' => $this->active,
            'vote' => $this->vote,
        ]);

        $query->andFilterWhere(['like', 'message', $this->message])
            ->andFilterWhere(['like', 'date', $this->date]);

        return $dataProvider;
    }
}
