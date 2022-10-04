<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\MTabel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mtabel-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keterangan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'pilihkolom')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lokasi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'konfigjson')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'value')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kolommaster')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'setcol')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'setrow')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kategori')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
