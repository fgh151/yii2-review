<?php
namespace fgh151\review\models;

use yii\data\ActiveDataProvider;

class ReviewSearch extends Review
{
    public function rules()
    {
        return [
            [['id', 'userId', 'itemId', 'vote'], 'integer'],
            [['message', 'active', 'date'], 'safe'],
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
            'userId' => $this->userId,
            'itemId' => $this->itemId,
            'active' => $this->active,
            'vote' => $this->vote,
        ]);

        $query->andFilterWhere(['like', 'message', $this->message])
            ->andFilterWhere(['like', 'date', $this->date]);

        return $dataProvider;
    }
}
