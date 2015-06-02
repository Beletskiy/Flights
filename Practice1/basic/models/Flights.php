<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "flights".
 *
 * @property integer $id
 * @property string $route
 * @property integer $cost_base
 *
 * @property Tickets[] $tickets
 */
class Flights extends \yii\db\ActiveRecord
{
    

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'flights';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['route', 'cost_base'], 'required'],
            [['cost_base'], 'integer'],
            [['route'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'route' => 'Route',
            'cost_base' => 'Cost Base',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTickets()
    {
        return $this->hasMany(Tickets::className(), ['flight_id' => 'id']);
    }
}
