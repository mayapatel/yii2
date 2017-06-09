<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Create Country';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="country-form">
  
    <?php $form = ActiveForm::begin(); ?>
    
    <h1><?= Html::encode($this->title) ?></h1>
    
    <?= $form->field($model, 'country_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>