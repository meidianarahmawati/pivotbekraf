<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\OperatorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Operators';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="operator-index">
    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nama',
            'username',
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            'email:email',
            //'flag',
            //'status',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
        'toolbar' =>  [
            ['content'=>
                Html::a('Tambah Operator', ['create'], ['class' => 'btn btn-success']),
            ],
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
