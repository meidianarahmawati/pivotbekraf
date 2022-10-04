<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\UnduhanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="unduhan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'userid') ?>

    <?= $form->field($model, 'tabelid') ?>

    <?= $form->field($model, 'datetime') ?>

    <?= $form->field($model, 'ip') ?>

    <?php // echo $form->field($model, 'country') ?>

    <?php // echo $form->field($model, 'flag') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
