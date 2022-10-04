<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UnduhanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dashboard';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unduhan-index">


    <div class="row">
      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box bg-aqua">
          <span class="info-box-icon"><i class="fa fa-download"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Unduhan</span>
            <span class="info-box-number"><?= $totalUnduhan ?></span>

            <div class="progress">
              <div class="progress-bar" style="width: 100%"></div>
            </div>
                <span class="progress-description">
                  Total Unduhan Tabel
                </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box bg-green">
          <span class="info-box-icon"><i class="fa fa-user"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Pengunjung</span>
            <span class="info-box-number"><?= $totalPengunjung ?></span>

            <div class="progress">
              <div class="progress-bar" style="width: 100%"></div>
            </div>
                <span class="progress-description">
                  Total Pengunjung Teregistrasi
                </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box bg-yellow">
          <span class="info-box-icon"><i class="fa fa-table"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Tabel</span>
            <span class="info-box-number"><?= $totalTabel ?></span>

            <div class="progress">
              <div class="progress-bar" style="width: 100%"></div>
            </div>
                <span class="progress-description">
                  Total Data Tabel
                </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      </div>
      <!-- /.col -->
    </div>

    <div class="row">
      <div class="col-lg-4 col-xs-12">
        <!-- Widget: user widget style 1 -->
        <div class="box box-primary collapsed-box ">
          <div class="box-header with-border">
            <h3 class="box-title">Unduhan Per Bulan (2018)</h3>
            <div class="box-tools pull-right">              
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
              </button>
            </div>
            <!-- /.box-tools -->
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <?php

                /*foreach ($unduhanBulan as $key => $value) {
                  # code...
                  $bg = $value == 0 ? 'bg-red' : 'bg-green';
                  echo "<li>".$value." <span class='pull-right badge ".$bg."'>0</span></a></li>";
                }*/
                ?>
        <li>Januari <?= $unduhanJanuari==0 ? "<span class='pull-right badge bg-red'>" : "<span class='pull-right badge bg-green'>" ?><?= $unduhanJanuari ?></span></a></li>
        <li>Februari <?= $unduhanFebruari==0 ? "<span class='pull-right badge bg-red'>" : "<span class='pull-right badge bg-green'>" ?><?= $unduhanFebruari ?></span></a></li>
        <li>Maret <?= $unduhanMaret==0 ? "<span class='pull-right badge bg-red'>" : "<span class='pull-right badge bg-green'>" ?><?= $unduhanMaret ?></span></a></li>
        <li>April <?= $unduhanApril==0 ? "<span class='pull-right badge bg-red'>" : "<span class='pull-right badge bg-green'>" ?><?= $unduhanApril ?></span></a></li>
        <li>Mei <?= $unduhanMei==0 ? "<span class='pull-right badge bg-red'>" : "<span class='pull-right badge bg-green'>" ?><?= $unduhanMei ?></span></a></li>
        <li>Juni <?= $unduhanJuni==0 ? "<span class='pull-right badge bg-red'>" : "<span class='pull-right badge bg-green'>" ?><?= $unduhanJuni ?></span></a></li>
        <li>Juli <?= $unduhanJuli==0 ? "<span class='pull-right badge bg-red'>" : "<span class='pull-right badge bg-green'>" ?><?= $unduhanJuli ?></span></a></li>
        <li>Agustus <?= $unduhanAgustus==0 ? "<span class='pull-right badge bg-red'>" : "<span class='pull-right badge bg-green'>" ?><?= $unduhanAgustus ?></span></a></li>
        <li>September <?= $unduhanSeptember==0 ? "<span class='pull-right badge bg-red'>" : "<span class='pull-right badge bg-green'>" ?><?= $unduhanSeptember ?></span></a></li>
        <li>Oktober <?= $unduhanOktober==0 ? "<span class='pull-right badge bg-red'>" : "<span class='pull-right badge bg-green'>" ?><?= $unduhanOktober ?></span></a></li>
        <li>November <?= $unduhanNovember==0 ? "<span class='pull-right badge bg-red'>" : "<span class='pull-right badge bg-green'>" ?><?= $unduhanNovember ?></span></a></li>
        <li>Desember <?= $unduhanDesember==0 ? "<span class='pull-right badge bg-red'>" : "<span class='pull-right badge bg-green'>" ?><?= $unduhanDesember ?></span></a></li>
        <li><b>Total (2018) </b><span class="pull-right badge bg-blue"><?= $unduhanTotalTahun ?></span></a></li>
              </ul>
            </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.widget-user -->
      </div>
      <div class="col-lg-4 col-xs-12">
        <!-- Widget: user widget style 1 -->
        <div class="box box-success collapsed-box ">
          <div class="box-header with-border">
            <h3 class="box-title">Unduhan Per Keperluan</h3>
            <div class="box-tools pull-right">              
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
              </button>
            </div>
            <!-- /.box-tools -->
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li>Usaha <?= $unduhanKeperluan1==0 ? "<span class='pull-right badge bg-red'>" : "<span class='pull-right badge bg-green'>" ?><?= $unduhanKeperluan1 ?></span></a></li>
                <li>Riset <?= $unduhanKeperluan2==0 ? "<span class='pull-right badge bg-red'>" : "<span class='pull-right badge bg-green'>" ?><?= $unduhanKeperluan2 ?></span></a></li>
                <li>Lainnya <?= $unduhanKeperluan3==0 ? "<span class='pull-right badge bg-red'>" : "<span class='pull-right badge bg-green'>" ?><?= $unduhanKeperluan3 ?></span></a></li>
                <li><b>Total </b><span class="pull-right badge bg-blue"><?= $totalUnduhan ?></span></a></li>
              </ul>
            </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.widget-user -->
      </div>
      <div class="col-lg-4 col-xs-12">
        <!-- Widget: user widget style 1 -->
        <div class="box box-warning collapsed-box ">
          <div class="box-header with-border">
            <h3 class="box-title">Unduhan Per Kategori Tabel</h3>
            <div class="box-tools pull-right">              
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
              </button>
            </div>
            <!-- /.box-tools -->
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li>PDB <?= $unduhanKategori1==0 ? "<span class='pull-right badge bg-red'>" : "<span class='pull-right badge bg-green'>" ?><?= $unduhanKategori1 ?></span></a></li>
                <li>Tenaga Kerja <?= $unduhanKategori2==0 ? "<span class='pull-right badge bg-red'>" : "<span class='pull-right badge bg-green'>" ?><?= $unduhanKategori2 ?></span></a></li>
                <li>Upah <?= $unduhanKategori3==0 ? "<span class='pull-right badge bg-red'>" : "<span class='pull-right badge bg-green'>" ?><?= $unduhanKategori3 ?></span></a></li>
                <li>Ekspor <?= $unduhanKategori4==0 ? "<span class='pull-right badge bg-red'>" : "<span class='pull-right badge bg-green'>" ?><?= $unduhanKategori4 ?></span></a></li>
                <li>Profil Usaha <?= $unduhanKategori5==0 ? "<span class='pull-right badge bg-red'>" : "<span class='pull-right badge bg-green'>" ?><?= $unduhanKategori5 ?></span></a></li>
                <li>PDRB <?= $unduhanKategori6==0 ? "<span class='pull-right badge bg-red'>" : "<span class='pull-right badge bg-green'>" ?><?= $unduhanKategori6 ?></span></a></li>
                <li>SKEK 2016 <?= $unduhanKategori7==0 ? "<span class='pull-right badge bg-red'>" : "<span class='pull-right badge bg-green'>" ?><?= $unduhanKategori7 ?></span></a></li>
                <li>PDB <?= $unduhanKategori8==0 ? "<span class='pull-right badge bg-red'>" : "<span class='pull-right badge bg-green'>" ?><?= $unduhanKategori8 ?></span></a></li>
                <li>Lainnya <?= $unduhanKategori9==0 ? "<span class='pull-right badge bg-red'>" : "<span class='pull-right badge bg-green'>" ?><?= $unduhanKategori9 ?></span></a></li>
                <li>Total <span class="pull-right badge bg-blue"><?= $totalUnduhan ?></span></a></li>
              </ul>
            </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.widget-user -->
      </div>
    </div>

    <div class="row">
      <div class="col-lg-4 col-xs-12">
        <!-- Widget: user widget style 1 -->
        <div class="box box-primary collapsed-box ">
          <div class="box-header with-border">
            <h3 class="box-title">Unduhan Per Tahun</h3>
            <div class="box-tools pull-right">              
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
              </button>
            </div>
            <!-- /.box-tools -->
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li>2018 <?= $unduhanTotalTahun==0 ? "<span class='pull-right badge bg-red'>" : "<span class='pull-right badge bg-green'>" ?><?= $unduhanTotalTahun ?></span></a></li>
                <li>Total <span class="pull-right badge bg-blue"><?= $totalUnduhan ?></span></a></li>
              </ul>
            </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.widget-user -->
      </div>
      <div class="col-lg-4 col-xs-12">
        <!-- Widget: user widget style 1 -->
        <div class="box box-success collapsed-box ">
          <div class="box-header with-border">
            <h3 class="box-title">Unduhan Per Instansi</h3>
            <div class="box-tools pull-right">              
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
              </button>
            </div>
            <!-- /.box-tools -->
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li>Swasta <?= $unduhanInstansi1==0 ? "<span class='pull-right badge bg-red'>" : "<span class='pull-right badge bg-green'>" ?><?= $unduhanInstansi1 ?></span></a></li>
                <li>Pemerintah <?= $unduhanInstansi2==0 ? "<span class='pull-right badge bg-red'>" : "<span class='pull-right badge bg-green'>" ?><?= $unduhanInstansi2 ?></span></a></li>
                <li>Mahasiswa/Dosen/Guru <?= $unduhanInstansi3==0 ? "<span class='pull-right badge bg-red'>" : "<span class='pull-right badge bg-green'>" ?><?= $unduhanInstansi3 ?></span></a></li>
                <li>Total <span class="pull-right badge bg-blue"><?= $totalUnduhan ?></span></a></li>
              </ul>
            </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.widget-user -->
      </div>
      <div class="col-lg-4 col-xs-12">
        <!-- Widget: user widget style 1 -->
        <div class="box box-warning collapsed-box ">
          <div class="box-header with-border">
            <h3 class="box-title">Top 5 Tabel Unduhan</h3>
            <div class="box-tools pull-right">              
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
              </button>
            </div>
            <!-- /.box-tools -->
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <?php
                $x = 1;
                foreach ($top5 as $value) {
                  # code...
                  //echo "<li>".$x.". ".$value."</li>";
                  $x++;
                }
                ?>
              </ul>
            </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.widget-user -->
      </div>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="box">
      <div class="box-header">
        <h4>Data Unduhan</h4>
      </div>

      <div class="box-body no-padding">

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                //'id',
                //'userid',
                //'tabelid',
                //'datetime',
                //'ip',
                //'country',
                //'flag',
                [
                    'label' => 'Nama',
                    'value' => 'user.nama',
                ],
                [
                    'label' => 'Instansi',
                    'value' => 'instansi.nama_instansi',
                ],
                [
                    'label' => 'Keperluan',
                    'value' => 'keperluan.keperluan',
                ],
                [
                    'label' => 'Tabel',
                    'value' => 'tabel.keterangan',
                ],
                [
                    'label' => 'Tanggal Unduh',
                    'value' => 'datetime',
                ],
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
            'options' => ['class' => 'box-body table-striped no-padding'],
        ]); ?>
      </div>
    </div>
</div>
