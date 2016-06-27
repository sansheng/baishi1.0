<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\User_profile;

/**
 * User_profileSearch represents the model behind the search form about `app\models\User_profile`.
 */
class User_profileSearch extends User_profile
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid', 'tel_num', 'IMEI'], 'integer'],
            [['password', 'reg_at', 'channel'], 'safe'],
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
        $query = User_profile::find();

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
            'uid' => $this->uid,
            'tel_num' => $this->tel_num,
            'reg_at' => $this->reg_at,
            'IMEI' => $this->IMEI,
        ]);

        $query->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'channel', $this->channel]);

        return $dataProvider;
    }
}
