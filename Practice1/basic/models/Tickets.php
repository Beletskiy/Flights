<?php

namespace app\models;

use Yii;
use app\models\Tickets;
use app\models\Passengers;

/**
 * This is the model class for table "tickets".
 *
 * @property integer $id
 * @property integer $passenger_id
 * @property integer $flight_id
 * @property integer $place_id
 * @property string $date
 * @property integer $price
 *
 * @property Passengers $passenger
 * @property Flights $flight
 * @property Place $place
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
            [['passenger_id', 'flight_id', 'place_id', 'date', 'price'], 'required'],
            [['passenger_id', 'flight_id', 'place_id', 'price'], 'integer'],
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
            'price' => 'Price',
        ];
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlace()
    {
        return $this->hasOne(Place::className(), ['id' => 'place_id']);
    }
    
    public function signup()
    {
     //  if ($this->validate()) {
            $ticket = new Tickets();
            $passenger = new Passengers();
            
            $passenger->save();
          //  $ticket->flight_id = $this->flight_id;
            $ticket->date = $this->date;
         //   $user->setPassword($this->password);
         // Yii::trace('!!!!!!!!pass!!!!!');
          //  $user->generateAuthKey();
          //  $user->accessToken= $this->name.'token';
            
        /*    Yii::$app->mailer->compose()
            ->setFrom('Buzik1980@gmail.com')
            ->setTo($user->email)
            ->setSubject('You are registered on the site "xxx.xxx.xxx" ')
            ->setTextBody('Hello, '.$user->name.'!
                         You have successfully registered.
                         Your login: '.$user->name.'. Your password: '.$this->password)        
            ->send(); */
            
              if ($ticket->save($runValidation = false)) {
                return $ticket;
            } 
      //  }
        return null;
    }
}
