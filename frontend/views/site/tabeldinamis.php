<?php
    use yii\bootstrap\Collapse;
        $this->registerJsFile('@web/js/plotly-basic-latest.min.js');
        //$this->registerJsFile('@web/js/jquery.min.js');
        $this->registerJsFile('@web/js/jquery-ui.min.js');
        $this->registerJsFile('@web/js/d3.min.js');
        $this->registerJsFile('@web/js/jquery.ui.touch-punch.min.js');
        $this->registerJsFile('@web/js/papaparse.min.js');
        $this->registerJsFile('@web/js/chosen.jquery.js');
        $this->registerJsFile('@web/js/c3.min.js');
        $this->registerJsFile('@web/js/pivottable/dist/pivot.js');
        $this->registerJsFile('@web/js/pivottable/dist/d3_renderers.js');
        $this->registerJsFile('@web/js/pivottable/dist/c3_renderers.js');
        $this->registerJsFile('@web/js/pivottable/dist/plotly_renderers.js');
        $this->registerJsFile('@web/js/tour/bootstrap-tour.js', ['position' => $this::POS_HEAD, 'depends' => [yii\web\JqueryAsset::className(), yii\bootstrap\BootstrapPluginAsset::className()]]);

        $this->registerCssFile('@web/js/tour/bootstrap-tour.css');
        $this->registerCssFile('@web/js/pivottable/dist/pivot.css');
?>

<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use frontend\models\MTabel;
use kartik\select2\Select2;
use kartik\dialog\Dialog;
use yii\grid\GridView;

$this->title = 'BEKRAF Data';
?>
    <style type="text/css">
      .site-tabeldinamis{margin-left: 0px;margin-top: 0px;width: 99.9%;}
      /*.pvtUnused > li {display: none;}*/
      .pvtAggregator {display: none;}
      #output{overflow-x: scroll;}
      .modal table, .modal .grid-view, .modal .form-control{font-size: 7pt;}
      .modal br{display: none}
      .modal .pagination{margin:0;}
      .modal-xl{width: 90%}
    </style>
<div class="site-tabeldinamis">
    <div class="body-content">
        <div class="row"><button class='btn btn-link pull-right' id="tour" data-toggle="tooltip" title="Butuh bantuan? Mulai tour kembali."><span class="glyphicon glyphicon-question-sign"></span></button></div>
        <p><div id="datasets" class="row">
        <?php 
            echo Html::beginForm(['tabeldinamis'], 'post');
            echo '<div class="col-sm-2" style="padding: 7px 2px 7px 25px;">Pilih Dataset :</div>';
            echo '<div class="col-sm-8">'.Select2::widget([
                'name' => 'id',
                'size' => Select2::MEDIUM,
                'value' => $id,
                'data' => $items,
                'addon' => [
                        'prepend' => [
                            'content' => 
                                \yii\bootstrap\ButtonDropdown::widget([
                                    'label' => 'Kategori Tabel ...',
                                    'dropdown' => [
                                        'items' => $kategori,
                                        'options' => [
                                            'id' => 'items-id',
                                        ],
                                    ],
                                    'options' => [
                                        'class'=>'btn-default',
                                        'id' => 'kategori-id'
                                    ],
                                ]),
                            'asButton' => true
                        ],
                    ],
                'options' => ['placeholder' => 'Pilih Dataset ...', 'onchange' => 'this.form.submit()', 'style' => 'width: 50%;display: inline-block', 'id' => 'tabel-id', 'disabled'=>'disabled'],
            ]).'</div>';
            echo Html::endForm();

            //download data hasil pivot
            echo '<div class="col-sm-2" id="unduh">';
            if (Yii::$app->user->isGuest) {
                echo '<a href="index.php?r=site%2Flogin" data-toggle="tooltip" title="Login untuk unduh data" class="btn btn-info"><span class="glyphicon glyphicon-download-alt"></span></a>';
            } else {
                echo Html::beginForm(['export2'], 'post');
                echo Html::hiddenInput('dataid', $id);
                echo Html::hiddenInput('hasil');
                echo Html::submitButton('<span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span>', ['id'=>'ekstrak','class' => 'btn btn-info','data-toggle'=>'tooltip','title'=>'Unduh data','onmouseover' => 'set_mouseover()']);
                echo Html::endForm();
            }            
            // button markups for launching the custom krajee dialog box
            echo '&nbsp;<a href="index.php?r=site%2Fdaftartabel" type="button" id="btn-custom-2" class="btn btn-info">Daftar Tabel</a>';
            echo '</div>';        

            //popoverdialog menu tabel
            /*echo Dialog::widget([
                'options' => [  // customized BootstrapDialog options
                    'size' => Dialog::SIZE_WIDE, // large dialog text
                    'type' => Dialog::TYPE_DEFAULT, // bootstrap contextual color
                    'title' => 'Daftar Tabel',
                    'closable' => true,                
                ]
            ]);
                         
            echo '<div id="kv-test-msg" style="display:none;font-size:7pt;">'.
                GridView::widget([
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
                ])
            .'</div>';*/
        ?>            
        </div>
        <span id="doc"></span></p>
        <div id="output" style="margin: 10px;"></div>

    </div>
</div>

<div id="isidata" style="display: none;"><?php echo $data; ?></div>

<?php
if($id>=71 && $id<=80){
?>
<style type="text/css">
.pvtTotal, .pvtTotalLabel, .pvtGrandTotal {display: none}
</style>
<?php
}
?>

<script type="text/javascript">
$("#btn-custom-2").on("click", function() {
    krajeeDialog.alert($('#kv-test-msg').html());
});
</script>

<script type="text/javascript">
// This example shows pivot() with a sum() aggregator
// with custom formatting (no digits after decimal)
$(function(){
    var tpl = $.pivotUtilities.aggregatorTemplates;
    var numberFormat = $.pivotUtilities.numberFormat;
    var intFormat = numberFormat({digitsAfterDecimal: 0});
    var renderers = $.extend(
        $.pivotUtilities.renderers,
        $.pivotUtilities.plotly_renderers,
        );
    $("#output").pivotUI(
        $("#input"),
        <?php echo $konfig;?>
    );    
 });
</script>

<script type="text/javascript">
//bootstrap tour
var tour = new Tour({
  steps: [
      {
        //element: orphan,
        title: "Mulai Tour",
        content: "Selamat Datang di menu tabel dinamis. Di sini Anda dapat mengeksplorasi serta mengubahnya sesuai kondisi yang diinginkan dengan memindahkan variabel, melakukan filter, dan sebagainya."
      },
      {
        element: "#output",
        title: "Area Pivot Tabel",
        content: "Ini adalah area yang menampilkan pivot tabel dari konfigurasi kolom dan baris yang dibuat.",
        placement: "top",
      },
      {
        element: ".pvtCols",
        title: "Area Pivot Columns",
        content: "Variabel yang diletakkan pada area ini akan menjadi <b>kolom</b> dari pivot tabel.",
        placement: "bottom",
      },
      {
        element: ".pvtRows",
        title: "Area Pivot Rows",
        content: "Variabel yang diletakkan pada area ini akan menjadi <b>baris</b> dari pivot tabel."
      },
      {
        element: ".pvtUnused",
        title: "Area Pivot Unused",
        content: "Variabel yang tidak ingin digunakan dapat diletakkan pada area ini.",
        placement: "bottom",
      },
      {
        element: ".pvtRenderer",
        title: "Area Pivot Renderer",
        content: "Dropdown ini digunakan untuk mengubah penyajian data menjadi beberapa pilihan lainnya yaitu.<br><b>1. Tabel Barchart </b>: Menampilkan tabel disertai perbandingan nilai antar <i>cell</i> dalam bentuk grafik batang. Semakin tinggi batang menandakan semakin tinggi nilainya<br><b>2. Heatmap </b>: Menampilkan tabel disertai perbandingan nilai antar <i>cell</i> dengan gradasi warna merah, semakin merah artinya nilai semakin tinggi dibandingkan nilai yang lain. <br><b>3. Row Heatmap </b>: Menampilkan tabel disertai perbandingan nilai antar <i>cell</i> dalam satu baris menggunakan gradasi warna merah.<br><b>4. Col Heatmap </b>: Menampilkan tabel disertai perbandingan nilai antar <i>cell</i> dalam satu kolom menggunakan gradasi warna merah."
      },
      {
        element: ".pvtRenderer",
        title: "Area Pivot Renderer",
        content: "<b>5. Horisontal Barchart</b> : Menampilkan data dalam bentuk grafik batang mendatar<br><b>6. Horisontal Stacked Barchart</b> : Menampilkan data dalam bentuk grafik batang mendatar dan bertumpuk<br><b>7. Bar Chart</b>: Menampilkan data dalam bentuk grafik batang vertikal<br><b>8. Stacked Bar Chart</b>: Menampilkan data dalam bentuk grafik batang vertikal dan bertumpuk<br><b>9. Line Chart</b>Menampilkan data dalam bentuk grafik garis<br><b>10. Scatter Chart </b>: Menampilkan data dalam grafik sebaran titik"
      },
      {
        element: "#datasets",
        title: "Pilih Datasets",
        content: "Anda juga dapat menggunakan ini untuk memilih dataset lainnya.",
        placement: "bottom",
      },
      {
        element: "#unduh",
        title: "Download",
        content: "Anda juga dapat mengunduh data dalam pivot tabel ini dalam bentuk file Ms Excel. Silakan login terlebih dahulu untuk mengunduh tabel",
        placement: "left",
      },
      {
        element: ".pvtCols li:first",
        title: "Pivot Column",
        content: "Anda dapat memulai dengan mencoba memindahkan variabel ini menjadi baris.",
        reflex: true,
      },
      {
        element: "#output",
        title: "Perubahan Pivot Tabel",
        content: "Akan terlihat perubahan pada pivot tabel menjadi seperti ini.",
        placement: "top",
      },
      {
        //element: orphan,
        title: "Akhir Tour",
        content: "Demikian penjelasan menu pada tabel dinamis ini.",
        reflex: true,
      },
      {
        element: "#tour",
        title: "Mengulang Tour",
        content: "Jika butuh bantuan, Anda dapat mengulang tour ini dengan klik tombol help berikut.",
        placement: "left",
      },
    ],
  orphan: true,
  backdrop: true,
});

// Initialize the tour
tour.init();

// Start the tour
tour.start();

//help button untuk restart tour
$(document).ready(function(){
    $('#tour').click(function(){
        tour.init();
        tour.restart();
    });
});

//reflex
$(document).on("drag", ".pvtCols li:first", function(e){
    tour.next();
});
</script>
<script type="text/javascript">
//tooltip dalam dropdown
    $(document).ready(function(){
        $(".pvtRenderer").click(function(){            
            $('.pvtRenderer option:eq(0)').attr("title", "Menampilkan data dalam bentuk tabel.");
            $('.pvtRenderer option:eq(1)').attr("title", "Menampilkan pivot tabel yang disertai barchart untuk menandakan besarnya isi cell. Semakin tinggi barchart semakin besar isi cell.");
            $('.pvtRenderer option:eq(2)').attr("title", "Menampilkan pivot tabel yang disertai gradasi warna untuk menandakan besarnya isi cell. Semakin gelap warnanya semakin besar isi cell.");
            $('.pvtRenderer option:eq(3)').attr("title", "Menampilkan pivot tabel yang disertai gradasi warna untuk menandakan besarnya isi cell dibandingkan dalam satu baris. Semakin gelap warnanya semakin besar isi cell.");
            $('.pvtRenderer option:eq(4)').attr("title", "Menampilkan pivot tabel yang disertai gradasi warna untuk menandakan besarnya isi cell dibandingkan dalam satu kolom. Semakin gelap warnanya semakin besar isi cell.");
            $('.pvtRenderer option:eq(5)').attr("title", "Menampilkan data dalam grafik batang mendatar.");
            $('.pvtRenderer option:eq(6)').attr("title", "Menampilkan data dalam grafik batang mendatar dan bertumpuk.");
            $('.pvtRenderer option:eq(7)').attr("title", "Menampilkan data dalam grafik batang tegak.");
            $('.pvtRenderer option:eq(8)').attr("title", "Menampilkan data dalam grafik batang tegak dan bertumpuk.");
            $('.pvtRenderer option:eq(9)').attr("title", "Menampilkan data dalam grafik garis.");
            $('.pvtRenderer option:eq(10)').attr("title", "Menampilkan data dalam grafik sebaran titik.");
        });       
    });
</script>
<script type="text/javascript">
    //ini buat ambil current pivot result
    function set_mouseover() {
        var x = document.getElementsByClassName("pvtRendererArea");
        var y = document.getElementsByName("hasil");
        y[0].value = x[0].innerHTML;
    }

    $(document).on('click', '#select2-tabel-id-container', function() {
        <?php echo $filterkat; ?>
        //$("#tabel-id").removeAttr('disabled');
        //$("#tabel-id").attr('style','cursor:pointer;')
    });

    $(document).on('click', '.select-bootstrap-prepend', function() {        
        $("#tabel-id").removeAttr('disabled');
        $("#tabel-id").attr('style','cursor:pointer;');
    });

    <?php if($id==""){ ?>
    $(document).ready(function(){
        $("#tabel-id").removeAttr('disabled');
        $("#tabel-id").attr('style','cursor:pointer;');
    });
    <?php } ?>

    $("#items-id li").click(function() {
            var pilih=$(this).html();
            $('#kategori-id').text(pilih);
            $('#kategori-id').append('&nbsp;&nbsp;<span class="caret"></span>');
            $('#select2-tabel-id-container').text("Pilih Tabel .....");
            $(this).addClass("selected");
            $(this).siblings().removeClass("selected");
    });
</script>