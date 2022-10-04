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
            //'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                    'attribute' => 'kategori',
                    'value' => 'kategori0.kategori',
                    'filter'=> $kategori2,
                ],
                'keterangan:ntext',
                [
                    'attribute' => 'setcol',
                    'value' => function ($dataProvider) {    
                        // Order of replacement
                        $str     = $dataProvider->setcol;
                        $order   = array('"', '[', ']');
                        $replace = ' ';

                        // Processes \r\n's first so they aren't converted twice.
                        return str_replace($order, $replace, $str);                  
                    },
                ],
                [
                    'attribute' => 'setrow',
                    'value' => function ($dataProvider) {    
                        // Order of replacement
                        $str     = $dataProvider->setrow;
                        $order   = array('"', '[', ']');
                        $replace = ' ';

                        // Processes \r\n's first so they aren't converted twice.
                        return str_replace($order, $replace, $str);                  
                    },
                ],
                'value',
                [
                    'label' => 'Action',
                    'format' => 'raw',
                    'value' => function ($dataProvider) {    
                        return Html::a('<span class="glyphicon glyphicon-send"></span>', ['tabeldinamis'], [
                            'data' => [
                                'method' => 'post',
                                'params' => [
                                    'id' => $dataProvider->id,
                                ],
                            ],
                        ]);
                    }
                ] 
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
