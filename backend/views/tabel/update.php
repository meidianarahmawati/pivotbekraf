<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\MTabel */

$this->title = 'Update Tabel: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Mtabels', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mtabel-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
