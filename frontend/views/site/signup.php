<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= "Registrasi" ?></h1>

    <!-- <p>Silakan lengkapi informasi berikut untuk registrasi :</p> -->

    <div class="row">
        
            <?php $form = ActiveForm::begin([
                'id' => 'form-signup',
                //'layout' => 'horizontal'
            ]); ?>
            <div class="col-lg-6">
                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'nama') ?>

                <?= $form->field($model, 'email') ?>

            </div><div class="col-lg-6">

                <?= $form->field($model, 'instansi')->dropDownList($instansi, ['prompt'=>'Pilih Instansi...']) ?>

                <?= $form->field($model, 'keperluan')->dropDownList($keperluan, ['prompt'=>'Pilih Keperluan...']) ?>

                <div class="form-group">
                    <?= Html::submitButton('Daftar', ['class' => 'btn btn-primary pull-right', 'name' => 'signup-button']) ?>
                </div>
            </div>
            <?php ActiveForm::end(); ?>

    </div>
</div>
