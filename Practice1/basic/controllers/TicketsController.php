<?php

namespace app\controllers;

use Yii;
use app\models\Tickets;
use app\models\Flights;
use app\models\Passengers;
use app\models\Place;

//$session = Yii::$app->session;

class TicketsController extends \yii\web\Controller
{
    
     /*   public static $base_price;
        public static $price_per_class;
        public static $baggage_weight_cost;
        public static $child_or_adult = 1;
        public static $price; */
        
    public function actionShowClass($age)
    {
      if ($age >= 14)
       { return '<option value="">select class</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>'
          ; }
      else {return "<option value=''>select class</option>
                   <option value='2'>2</option>
                   <option value='3'>3</option>"; 
           }
    }
    public function actionShowPlace($class)
    {
      Yii::trace($class.'from action класс');   
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
    
    public function actionCalculatePrice($route,$class,$baggage_weight,$age)
    {
        $session = Yii::$app->session;
        
        Yii::trace($class.'input класс'); 
        Yii::trace($route.'input маршрут');
        Yii::trace($baggage_weight.'input багаж');
        Yii::trace($age.'input возраст');
        $session['sprice_per_class'] = $price_per_class = 0;
        $session['sbaggage_weight_cost'] = $baggage_weight_cost = 0;
        $session['schild_or_adult'] = $child_or_adult =1;
        
        
        if ($route!=="0") {
            $sql = "SELECT `cost_base` FROM `flights` WHERE `route` = '$route' ";
            $base_price = Flights::findBySql($sql)->scalar();
            $session['sbase_price'] = $base_price;
            
        }
        if ($class!=="0") {
            if ($class == "1") {$price_per_class = 200;}
            if ($class == "2") {$price_per_class = 100;}
            if ($class == "3") {$price_per_class = 0;}
            $session['sprice_per_class'] = $price_per_class;
        }
        if ($baggage_weight!=="0") {
            $baggage_weight_cost = $baggage_weight*40;
            $session['sbaggage_weight_cost'] = $baggage_weight_cost;
        }
        if ($age!=="0") {
            if ($age<=14) {$child_or_adult = 0.8;}
            $session['schild_or_adult'] = $child_or_adult;
        }
      //  Yii::trace($child_or_adult.'возраст');
        $base_price = $session['sbase_price'];
        $price_per_class = $session['sprice_per_class'];
        $baggage_weight_cost = $session['sbaggage_weight_cost'];
        $child_or_adult = $session['schild_or_adult'];
        
        Yii::trace($base_price.'базовая цена'); 
        Yii::trace($price_per_class.'цена за класс');
        Yii::trace($baggage_weight_cost.'стоимость багажа');
        Yii::trace($child_or_adult.'ребенок?взрослый');
        
        $price = ($base_price + $price_per_class + $baggage_weight_cost)*$child_or_adult;
        Yii::trace($price.'выходная цена');
        return $price;
    
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
