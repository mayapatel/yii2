<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

$this->title = 'Update Gallery: ' . $model->gallery_id;
$this->params['breadcrumbs'][] = ['label' => 'Gallery', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->gallery_id, 'url' => ['album', 'id' => $model->gallery_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="country-update">
    <?php $form=ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']])?>
    
    <?= $form->field($model,'img_name')->fileInput()?>
    
    <?= $form->field($model, 'img_description')->textarea(['rows' => 4]) ?>
    
    <?= $form->field($model, 'city_id')->dropDownList(
            ArrayHelper::map(app\models\City::find()->all(),'city_id','city_name'))?>
        
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
