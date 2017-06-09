<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Posts */

$this->title = 'Gallery Form';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="Gallery-form">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <?php $form=ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']])?>
    
       <?= $form->field($model,'img_name')->fileInput()?>
       <?= $form->field($model, 'img_description')->textarea(['rows' => 4]) ?>
       <?= $form->field($model, 'city_id')->dropDownList(
            ArrayHelper::map(app\models\City::find()->all(),'city_id','city_name'),['prompt'=>'Select City Name'])?>
        <!--<button>Upload</button>-->
        <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Upload' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end()?>
</div>