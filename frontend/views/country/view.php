<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\City */

$this->title = 'View Country';
$this->params['breadcrumbs'][] = ['label' => 'Country', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="country-view">

    <h1><?= Html::encode($this->title) ?></h1>
  
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'country_id',
            'country_name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
