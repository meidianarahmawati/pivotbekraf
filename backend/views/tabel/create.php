<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\MTabel */

$this->title = 'Tambah Tabel';
$this->params['breadcrumbs'][] = ['label' => 'Mtabels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mtabel-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
