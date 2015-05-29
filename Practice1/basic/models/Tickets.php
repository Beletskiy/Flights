<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tickets".
 *
 * @property integer $id
 * @property integer $passenger_id
 * @property integer $flight_id
 * @property integer $place_id
 * @property string $date
 *
 * @property Place $place
 * @property Passengers $passenger
 * @property Flights $flight
 */
class Tickets extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tickets';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['passenger_id', 'flight_id', 'place_id', 'date'], 'required'],
            [['passenger_id', 'flight_id', 'place_id'], 'integer'],
            [['date'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'passenger_id' => 'Passenger ID',
            'flight_id' => 'Flight ID',
            'place_id' => 'Place ID',
            'date' => 'Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlace()
    {
        return $this->hasOne(Place::className(), ['id' => 'place_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPassenger()
    {
        return $this->hasOne(Passengers::className(), ['id' => 'passenger_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFlight()
    {
        return $this->hasOne(Flights::className(), ['id' => 'flight_id']);
    }
}
