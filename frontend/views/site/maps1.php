<?php
	use yii\helpers\Html;
	use yii\helpers\ArrayHelper;
	use yii\widgets\ActiveForm;
	use frontend\models\MTabel;
	use kartik\select2\Select2;


	use yii\bootstrap\Collapse;
	
	//maps highchart
	$this->registerJsFile('@web/js/highcharts/highmaps.js', ['position' => $this::POS_HEAD, 'depends' => [yii\web\JqueryAsset::className(), yii\bootstrap\BootstrapPluginAsset::className()]]);
	$this->registerJsFile('@web/js/highcharts/exporting.js', ['position' => $this::POS_HEAD, 'depends' => [yii\web\JqueryAsset::className(), yii\bootstrap\BootstrapPluginAsset::className()]]);
	$this->registerJsFile('@web/js/highcharts/id-all.js', ['position' => $this::POS_HEAD, 'depends' => [yii\web\JqueryAsset::className(), yii\bootstrap\BootstrapPluginAsset::className()]]);
	//$this->registerCssFile('@web/js/highcharts/flags32.css');

$this->title = 'BEKRAF Data';
?>
			
	<style type="text/css">
    	/*#item1 #container {
		    height: 500px; 
		    min-width: 310px; 
		    max-width: 800px; 
		    margin: 0 auto; 
		}
		#item1 .loading {
		    margin-top: 10em;
		    text-align: center;
		    color: gray;
		}*/
		* {
		    font-family: sans-serif;
		}
		#item1 #wrapper {
		    height: 500px;
		    width: 1000px;
		    margin: 0 auto;
		    padding: 0;
		    overflow:visible;
		}
		#item1 #container {
		    float: left;
		    height: 500px; 
		    width: 700px; 
		    margin: 0;
		}
		#item1 #info {
		    float: left;
		    width: 270px;
		    padding-left: 20px;
		    margin: 100px 0 0 0;
		    border-left: 1px solid silver;
		}
		#item1 #info h2 {
		    display: inline;
		    font-size: 13pt;
		}
		#item1 #info .f32 .flag {
		    vertical-align: bottom !important;
		}

		#item1 #info h4 {
		    margin: 1em 0 0 0;
		}
    </style>
	
    <div id="page-content-wrapper">
        <div class="container-fluid">
			<div id="container"></div>
			<script type="text/javascript">
				var data = [['id-3700', 0], ['id-ac', 1], ['id-ki', 2], ['id-jt', 3], ['id-be', 4], ['id-bt', 5], ['id-kb', 6], ['id-bb', 7], ['id-ba', 8], ['id-ji', 9], ['id-ks', 10], ['id-nt', 11], ['id-se', 12], ['id-kr', 13], ['id-ib', 14], ['id-su', 15], ['id-ri', 16], ['id-sw', 17], ['id-la', 18], ['id-sb', 19], ['id-ma', 20], ['id-nb', 21], ['id-sg', 22], ['id-st', 23], ['id-pa', 24], ['id-jr', 25], ['id-1024', 26], ['id-jk', 27], ['id-go', 28], ['id-yo', 29], ['id-kt', 30], ['id-sl', 31], ['id-sr', 32], ['id-ja', 33] ];

				// Create the chart
				Highcharts.mapChart('container', {
				    chart: {
				        map: 'countries/id/id-all'
				    },

				    title: {
				        text: 'Highmaps basic demo'
				    },

				    subtitle: {
				        text: 'Source map: <a href="http://code.highcharts.com/mapdata/countries/id/id-all.js">Indonesia</a>'
				    },

				    mapNavigation: {
				        enabled: true,
				        buttonOptions: {
				            verticalAlign: 'bottom'
				        }
				    },

				    colorAxis: {
				        min: 0
				    },

				    series: [{
				        data: data,
				        name: 'Random data',
				        states: {
				            hover: {
				                color: '#BADA55'
				            }
				        },
				        dataLabels: {
				            enabled: true,
				            format: '{point.name}'
				        }
				    }]
				});
			</script>
		</div>
	</div>