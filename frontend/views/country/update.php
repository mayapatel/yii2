<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Update Country ' . $model->country_id;
$this->params['breadcrumbs'][] = ['label' => 'Country', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->country_name, 'url' => ['view', 'id' => $model->country_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="country-update">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'country_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Update' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>


</div>
