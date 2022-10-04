<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Operator */

$this->title = 'Update Operator: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Operators', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="operator-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
