<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MtabelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Tabel';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mtabel-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        /*'filterModel' => $searchModel,*/
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'label' => 'Kategori',
                'value' => 'kategori0.kategori',
            ],
            'keterangan:ntext',
            //'pilihkolom',
            //'lokasi',
            //'konfigjson',
            //'value',
            //'kolommaster',
            //'setcol',
            //'setrow',
            
            /*['class' => 'yii\grid\ActionColumn'],*/
        ],
        'toolbar' =>  [
            '{export}',
            '{toggleData}'
        ],
        'pjax' => true,
        'responsive' => true,
        'hover' => true,
        'panel' => [
            'type' => GridView::TYPE_PRIMARY
        ],
    ]); ?>
</div>
