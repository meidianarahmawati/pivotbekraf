<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MtabelSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mtabel-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?php echo $form->field($model, 'kategori') ?>

    <?= $form->field($model, 'keterangan') ?>

    <?php // $form->field($model, 'pilihkolom') ?>

    <?php // $form->field($model, 'lokasi') ?>

    <?php // $form->field($model, 'konfigjson') ?>

    <?php // echo $form->field($model, 'value') ?>

    <?php // echo $form->field($model, 'kolommaster') ?>

    <?php // echo $form->field($model, 'setcol') ?>

    <?php // echo $form->field($model, 'setrow') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
