<?php

namespace app\controllers;

use Yii;
class TicketsController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model = new \app\models\Tickets();
        $flights = new \app\models\Flights();
        $passengers = new \app\models\Passengers();
       
   
      //  $model->attributes = \Yii::$app->request->post();
        
        $passengers->load(Yii::$app->request->post());
        Yii::trace($passengers->attributes);
        Yii::trace($passengers->age);
        $passengers->save($runValidation = false);
        
        $model->load(Yii::$app->request->post());
        $model->passenger_id = $passengers->id;
        $model->date = $this->date;
        $model->save($runValidation = false);
        
     /*   if ($model->load(Yii::$app->request->post())) {
            if ($model->signup()) {
                    return $this->goHome();
            }
        } */
        
        return $this->render('index', [
            'model' => $model,
            'flights' => $flights,
            'passengers' =>$passengers
        ]);
    }

}
