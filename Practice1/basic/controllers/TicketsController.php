<?php

namespace app\controllers;

use Yii;
use app\models\Tickets;
use app\models\Flights;
use app\models\Passengers;
use app\models\Place;

class TicketsController extends \yii\web\Controller
{
    public function actionShowClass($age)
    {
      if ($age >= 14)
       { return '<option value="">select class</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>'
          ; }
      else return '<option value="">select class</option>
                   <option value="2">2</option>
                   <option value="3">3</option>';
    }
    public function actionShowPlace($class)
    {
     switch ($class){
         case 1: 
            $str ="";
            for ($i=1;$i<=5;$i++) { 
              $str .=  '<option value='.$i.'>'.$i.'</option>';
            }
            return $str;
             break;
         case 2: 
                $str ="";
            for ($i=6;$i<=15;$i++) { 
              $str .=  '<option value='.$i.'>'.$i.'</option>';
            }
            return $str;
             break;
         case 3:
             $str ="";
            for ($i=16;$i<=35;$i++) { 
              $str .=  '<option value='.$i.'>'.$i.'</option>';
            }
            return $str;
             break;
       } 
    }
    
    public function actionCalculatePrice($route,$class,$luggage)
    {
        Yii::trace($class); 
        Yii::trace($route);
        Yii::trace($luggage);
        if ($route!=="100") {
           $sql = "SELECT `cost_base` FROM `flights` WHERE `route` = '$route' ";
           $price = Flights::findBySql($sql)->scalar();
           return $price;
    }
    else {
        if (($route == "100")&&($class == 1)){
            return 200;
        }
        if (($route == "100")&&($class == 2)){
            return 100;
        }
    }
    }
    public function actionIndex()
    {
        $model = new Tickets();
        $flights = new Flights;
        $passengers = new Passengers();
        $place = new Place();
    
      //  $model->attributes = \Yii::$app->request->post();
        
     /*   $passengers->load(Yii::$app->request->post());
        Yii::trace($passengers->attributes); */
        
        if ($model->load(Yii::$app->request->post()) && 
            $passengers->load(Yii::$app->request->post())&&
            $flights->load(Yii::$app->request->post())&&
             $place->load(Yii::$app->request->post())){
            
         //   Yii::trace($flights->attributes);
          //  Yii::trace($passengers['age']);
           //  $passengers->age = $passengers['age'];
             
             $passengers->save($runValidation = false);
             $place->free = 0;
             $place->save($runValidation = false);
             
             $model->place_id = $place->id;
             $model->passenger_id = $passengers->id;
             $sql = "SELECT `id` FROM `flights` WHERE `route` = '".$flights['route']."'";
             $model->flight_id = Flights::findBySql($sql)->scalar();
         //    Yii::trace($model->flight_id);
             $model->save($runValidation = false);
             
                    return $this->goHome();
            }
        
        return $this->render('index', [
            'model' => $model,
            'flights' => $flights,
            'passengers' =>$passengers,
            'place' => $place
        ]);
    }

}
