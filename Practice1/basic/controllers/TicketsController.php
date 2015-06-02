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
       
    /*    return $this->render('index', [
                'model' => $model,
                'flights' => $flights,
                'passengers' =>$passengers
            ]); */
        
        if ($model->load(Yii::$app->request->post())) {
            if ($model->signup()) {
                    return $this->goHome();
            }
        }
        return $this->render('index', [
            'model' => $model,
            'flights' => $flights,
            'passengers' =>$passengers
        ]);
    }

}
