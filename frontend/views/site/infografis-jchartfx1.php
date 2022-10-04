<?php
	use yii\bootstrap\Tabs;
    $this->registerJsFile('@web/js/jchartfx/js/jchartfx.system.js');
    $this->registerJsFile('@web/js/jchartfx/js/jchartfx.coreVector.js');
    $this->registerJsFile('@web/js/jchartfx/js/jchartfx.advanced.js');
    $this->registerJsFile('@web/js/jchartfx/js/jchartfx.gauge.js');
    $this->registerJsFile('@web/js/jchartfx/js/jchartfx.pictograph.js');
    $this->registerJsFile('@web/js/jchartfx/js/jchartfx.userInterface.js');
    $this->registerJsFile('@web/js/jchartfx/js/motifs/jchartfx.motif.js'); 

    $this->registerCssFile('@web/js/jchartfx/styles/attributes/jchartfx.attributes.css');
    $this->registerCssFile('@web/js/jchartfx/styles/palettes/jchartfx.palette.css');
    $this->registerCssFile('@web/js/jchartfx/styles/jchartfx.userInterface.css');

$this->title = 'BEKRAF Data';
?>


    <div id="page-content-wrapper">
        <div class="container-fluid">
			<div class="row">				
				<div class="col-sm-5">
					<div style="width:100%;height:250px;display: inline-block">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent ut feugiat nunc, vitae porta quam. Duis non enim sed libero porta faucibus. Pellentesque tristique mattis neque, a scelerisque lacus hendrerit in.Fusce et erat tempor, consectetur eros quis, facilisis neque. Ut ac vehicula quam. Ut eu arcu lorem. Mauris dapibus nulla porta est ullamcorper, nec euismod turpis condimentum. Curabitur imperdiet purus dui, vitae posuere augue sagittis eget.</div>	
				</div>
				<div class="col-sm-7">
					<div id="ChartDiv5" style="width:100%;height:250px;display: inline-block"></div>	
				</div>
			</div>
			<div class="row">
				<div class="col-sm-9">
					<div id="ChartDiv2" style="width:100%;height:500px;display: inline-block"></div>	
				</div>				
				<div class="col-sm-3">
					<div style="width:100%;height:250px;display: inline-block">Berdasarkan jenis pekerjaan dan jenis kelamin, tenaga kerja sektor ekonomi kreatif pada tahun 2014 dan 2015 didominasi oleh tenaga kerja yang bekerja sebagai blue collar baik laki-laki maupun perempuan (Tabel 4.5). Pada tahun 2014, tenaga kerja laki-laki dengan jenis perkerjaan blue collar sebesar 90,48 persen dan white collar hanya 9,52 persen. Tenaga kerja perempuan dengan jenis pekerjaan blue collar yaitu sebesar 94,39 persen dan white collar hanya 5,61 persen. Pada tahun 2015, tenaga kerja laki-laki dengan jenis pekerjaan blue collar sebesar 89,84 persen dan white collar hanya 10,16 persen. Tenaga kerja perempuan dengan jenis pekerjaan blue collar yaitu sebesar 94,22 persen dan white collar hanya 5,78 persen.</div>
				</div>
			</div>	
		</div>
	</div>
				<style type="text/css">
				      svg {width:inherit;}
				      svg > g:last-child {
				          display: none;
				      }
				      svg > line.EmptyMarker {display: none}
				   </style>
				   
				<script type="text/javascript" language="javascript">
				    function chart2(){
				        chart1 = new cfx.Chart();
				        var populationData = [ { "Jenis Pekerjaan": "White Collar", "Female": 8736126, "Male": 18517830 }, { "Jenis Pekerjaan": "Blue Collar", "Female": 12673281, "Male": 19472280 } ];
				        var pictobarExtensionFemale = new cfx.pictograph.PictoBar();
				        chart1.setGalleryAttributes(pictobarExtensionFemale);
				        chart1.setDataSource(populationData);
				        chart1.getAxisX().setInverted(true);
				        pictobarExtensionFemale.setTemplate("PictoFigure4"); // Change the icon for the female pictobar
				        var pictobarExtensionMale = new cfx.pictograph.PictoBar(); // Create a different extension for the male pictobar
				        pictobarExtensionMale.setTemplate("PictoFigure3"); // Change the icon for the male pictobar
				        chart1.getSeries().getItem(1).setGalleryAttributes(pictobarExtensionMale); // Assign the male pictobar to the second series
				        var titles = chart1.getTitles();
				        var title = new cfx.TitleDockable();
				        title.setText("Population by Gender for Top 2 Most Populated US States (in Millions)");
				        titles.add(title);
				        var axisY = chart1.getAxisY();
				        axisY.getDataFormat().setFormat(cfx.AxisFormat.Number);
				        axisY.setScaleUnit(1000000);
				        axisY.getGrids().getMajor().setVisible(false);
				        chart1.getLegendBox().setVisible(false);
				        chart1.getAllSeries().getBorder().setWidth(0);
				        var divHolder = document.getElementById('ChartDiv2');
				        chart1.create(divHolder);    
				    }
				    function chart5(){
				    	pictograph1 = new cfx.gauge.PictoGraph();
				    	pictograph1.getTotal().setValue(318857056);
						pictograph1.getMainMeasure().setValue(38802500);
						pictograph1.getMainMeasure().setTitle("kuliner");
						var measure = new cfx.gauge.PictoMeasure();
						measure.setValue(26956958);
						measure.setTitle("musik");
						pictograph1.getMeasures().add(measure);
						measure = new cfx.gauge.PictoMeasure();
						measure.setValue(19893297);
						measure.setTitle("arsitektur");
						pictograph1.getMeasures().add(measure);
						measure = new cfx.gauge.PictoMeasure();
						measure.setValue(19746227);
						measure.setTitle("televisi");
						pictograph1.getMeasures().add(measure);
						measure = new cfx.gauge.PictoMeasure();
						measure.setValue(12880580);
						measure.setTitle("seni");
						pictograph1.getMeasures().add(measure);
						pictograph1.setCount(20);
						var hive = new cfx.gauge.PictoHiveLayout();
						pictograph1.setLayout(hive);
						var gaugeTitle = new cfx.gauge.Title();
						gaugeTitle.setText('sebaran tenaga kerja di 5 subsektor teratas');
						pictograph1.getTitles().add(gaugeTitle);
				        var divHolder = document.getElementById('ChartDiv5');
				        pictograph1.create(divHolder);    
				    }

					$( document ).ready(function() {					    
					        chart2();
					        chart5();
					});


				</script>
