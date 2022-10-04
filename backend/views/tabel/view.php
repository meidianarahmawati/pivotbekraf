<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\MTabel */

$this->title = "Tabel " . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Mtabels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mtabel-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'keterangan:ntext',
            'pilihkolom',
            'lokasi',
            'konfigjson',
            'value',
            'kolommaster',
            'setcol',
            'setrow',
            'kategori',
        ],
    ]) ?>

</div>
