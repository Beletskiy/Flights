<?php

namespace app\controllers;

use Yii;
use app\models\Tickets;
use app\models\Flights;
use app\models\Passengers;

class TicketsController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model = new Tickets();
        $flights = new Flights;
        $passengers = new Passengers();
       
    
      //  $model->attributes = \Yii::$app->request->post();
        
     /*   $passengers->load(Yii::$app->request->post());
        Yii::trace($passengers->attributes); */
        
        if ($model->load(Yii::$app->request->post()) && 
            $passengers->load(Yii::$app->request->post())&&
            $flights->load(Yii::$app->request->post())){
            
            Yii::trace($flights->attributes);
          //  Yii::trace($passengers['age']);
           //  $passengers->age = $passengers['age'];
             
             $passengers->save($runValidation = false);
             
             $model->passenger_id = $passengers->id;
             //SELECT `id` FROM `flights` WHERE `route` = 'Киев-Харьков'
             //$model->flight_id = Flights::find()->where(['route' => $flights['route']])->all();
            // $sql = "SELECT `id` FROM `flights` WHERE `route` = ".$flights['route'];
             $sql = "SELECT `id` FROM `flights` WHERE `route` = '".$flights['route']."'";
             $model->flight_id = Flights::findBySql($sql)->scalar();
             Yii::trace($model->flight_id);
             $model->save($runValidation = false);
             
                    return $this->goHome();
            }
        
        return $this->render('index', [
            'model' => $model,
            'flights' => $flights,
            'passengers' =>$passengers
        ]);
    }

}
