<?php

use yii\helpers\Html;
/* @var $this yii\web\View */
$this->title = 'Ticket information';
$this->params['breadcrumbs'][] = $this->title;
?>
<h3>Ticket information</h3>

<?= Yii::trace($model); ?>
   
<ul>

   <li>SNP - <?= Html::encode("{$passengers[0]['snp']}") ?>  </li>
   <li>Flight - <?= Html::encode($flights) ?>  </li>
   <li>Class - <?= Html::encode("{$place[0]['class']}") ?>  </li>
   <li>Place - <?= Html::encode("{$place[0]['seat_num']}") ?>  </li>
   <li>Cost - <?= Html::encode("{$model[0]['price']}") ?>  </li>
   <li>Departure time - <?= Html::encode("{$model[0]['date']}") ?>  </li>
   
</ul>

