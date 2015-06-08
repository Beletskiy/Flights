<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "passengers".
 *
 * @property integer $id
 * @property string $snp
 * @property string $telephone_numb
 * @property integer $age
 * @property integer $baggage_weight
 *
 * @property Tickets[] $tickets
 */
class Passengers extends \yii\db\ActiveRecord
{
  //  public $age;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'passengers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['snp', 'telephone_numb', 'age', 'baggage_weight'], 'required'],
            [['age', 'baggage_weight'], 'integer'],
            [['snp'], 'string', 'max' => 64],
            [['telephone_numb'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'snp' => 'Surname Name Patronymic',
            'telephone_numb' => 'Telephone Number',
            'age' => 'Passenger Age',
            'baggage_weight' => 'Baggage Weight',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTickets()
    {
        return $this->hasMany(Tickets::className(), ['passenger_id' => 'id']);
    }
}
