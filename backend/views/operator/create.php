<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;



/* @var $this yii\web\View */
/* @var $model backend\models\Operator */

$this->title = 'Tambah Operator';
$this->params['breadcrumbs'][] = ['label' => 'Operators', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="operator-create">

    
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'nama') ?>

                <?= $form->field($model, 'email') ?>

                <div class="form-group">
                    <?= Html::submitButton('Buat Akun', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
