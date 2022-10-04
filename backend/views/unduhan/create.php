<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Unduhan */

$this->title = 'Buat Unduhan';
$this->params['breadcrumbs'][] = ['label' => 'Unduhans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unduhan-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
