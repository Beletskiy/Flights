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
      else {return "<option value=''>select class</option>
                   <option value='2'>2</option>
                   <option value='3'>3</option>"; 
           }
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
    
    public function actionCalculatePrice($route,$class,$baggage_weight,$age)
    {
        $session = Yii::$app->session;
        
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
            else {$child_or_adult = 1;}
            $session['schild_or_adult'] = $child_or_adult;
        }
        $base_price = $session['sbase_price'];
        $price_per_class = $session['sprice_per_class'];
        $baggage_weight_cost = $session['sbaggage_weight_cost'];
        $child_or_adult = $session['schild_or_adult'];
        
        $price = ($base_price + $price_per_class + $baggage_weight_cost)*$child_or_adult;
        return $price;
    }
    public function actionIndex()
    {
        $model = new Tickets();
        $flights = new Flights;
        $passengers = new Passengers();
        $place = new Place();
    
        if ($model->load(Yii::$app->request->post()) && 
            $passengers->load(Yii::$app->request->post())&&
            $flights->load(Yii::$app->request->post())&&
             $place->load(Yii::$app->request->post())){
             $passengers->save();
             
             $place->free = 0;
             $place->save();
             
             $model->place_id = $place->id;
             $model->passenger_id = $passengers->id;
             $sql = "SELECT `id` FROM `flights` WHERE `route` = '".$flights['route']."'";
             $model->flight_id = Flights::findBySql($sql)->scalar();
             $model->save();
             
                 //   return $this->goHome();
             return $this->actionTicket();
            }
        
        return $this->render('index', [
            'model' => $model,
            'flights' => $flights,
            'passengers' =>$passengers,
            'place' => $place
        ]);
    }
    public function actionTicket(){
        
        $model = new Tickets();
        $flights = new Flights;
        $passengers = new Passengers();
        $place = new Place();
        
        $sql = 'SELECT * FROM `tickets` WHERE id = (SELECT MAX( `id` )FROM tickets) order by price';
        $model = Tickets::findBySql($sql)->all();
        
        $sql1 = 'SELECT route FROM `flights` '
                . 'WHERE id = (SELECT flight_id FROM tickets '
                . 'WHERE id = (SELECT MAX( `id` )FROM tickets))';
        $flights = Flights::findBySql($sql1)->scalar();
        
        $sql2 = 'SELECT * FROM `passengers` WHERE id = (SELECT MAX( `id` )FROM passengers)';
        $passengers = Passengers::findBySql($sql2)->all();
        
        $sql3 = 'SELECT * FROM `place` WHERE id = (SELECT MAX( `id` )FROM place)';
        $place = Place::findBySql($sql3)->all();
        
      //  Yii::trace($place); 
        
        return $this->render('ticket', [
            'model' => $model,
            'flights' => $flights,
            'passengers' =>$passengers,
            'place' => $place
        ]);
    }

}
