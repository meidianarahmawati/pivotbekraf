<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Pengunjung';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'username',
            'nama',
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            'email:email',
            [
                'label' => 'Instansi',
                'value' => 'instansi0.nama_instansi',
            ],
            [
                'label' => 'Keperluan',
                'value' => 'keperluan0.keperluan',
            ],
            //'flag',
            //'status',
            //'created_at',
            //'updated_at',

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
