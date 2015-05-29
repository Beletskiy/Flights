<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "place".
 *
 * @property integer $id
 * @property string $class
 * @property integer $seat_num
 * @property integer $free
 *
 * @property Tickets[] $tickets
 */
class Place extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'place';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['class', 'seat_num'], 'required'],
            [['class'], 'string'],
            [['seat_num', 'free'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'class' => 'Class',
            'seat_num' => 'Seat Num',
            'free' => 'Free',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTickets()
    {
        return $this->hasMany(Tickets::className(), ['place_id' => 'id']);
    }
}
