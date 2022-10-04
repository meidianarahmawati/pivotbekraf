<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Unduhan */

$this->title = 'Update Unduhan: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Unduhans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="unduhan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
