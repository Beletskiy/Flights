<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Place;

/**
 * PlaceSearh represents the model behind the search form about `app\models\Place`.
 */
class PlaceSearh extends Place
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'seat_num', 'free'], 'integer'],
            [['class'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Place::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'seat_num' => $this->seat_num,
            'free' => $this->free,
        ]);

        $query->andFilterWhere(['like', 'class', $this->class]);

        return $dataProvider;
    }
}
