<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\City */

$this->title = 'Photo Gallery';
$this->params['breadcrumbs'][] = ['label' => 'Add Image', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="album">

    <h1><?= Html::encode($this->title) ?></h1>
  
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'gallery_id',
            //'img_name',
            
            [
                'attribute'=>'img_name',
                'format'=>'html',
                'label'=>'Image',
                'value' => function ($data) {
                    return Html::img(Yii::getAlias('@web').'/uploads/'. $data['img_name'],
                ['width' => '70px']);
                },
            ],
            
            'img_description',
            'city.city_name',
            //'city_ctid.city_name',
            /*
             * 'name',
        [
            'attribute' => 'img',
            'format' => 'html',
            'label' => 'ImageColumnLable',
            'value' => function ($data) {
                return Html::img('/pathToImage/' . $data['img'],
                    ['width' => '60px']);
            },
        ],
             */
            
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
