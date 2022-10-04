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
					<div class="col-sm-4">
						<div id="ChartDiv3" style="width:100%;height:250px;display: inline-block"></div>	
					</div>
					<div class="col-sm-4">
						<div id="ChartDiv4" style="width:100%;height:250px;display: inline-block"></div>	
					</div>
					<div class="col-sm-4">
						<div style="width:100%;height:250px;display: inline-block">Duis porttitor, leo quis sagittis iaculis, urna dolor dapibus orci, nec rhoncus lorem metus et erat. Fusce vel est tempor, semper ante id, lobortis nunc. Praesent pharetra, mauris eu feugiat sollicitudin, magna ligula molestie sapien, sit amet rhoncus sapien elit et sem. </div>	
					</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div id="ChartDiv" style="width:100%;height:500px;display: inline-block"></div>	
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
				    function chart1(){
				        chart1 = new cfx.Chart();
				        var pictobarExtension = new cfx.pictograph.PictoBar();
				        pictobarExtension.setTemplate("PictoCar1");
				        chart1.setGalleryAttributes(pictobarExtension);
				        var populationData = [ { "Continent": "Africa", "Population": 1110635000 },
				                   { "Continent": "Americas", "Population": 972005000 },
				                   { "Continent": "Asia", "Population": 4298723000 },
				                   { "Continent": "Europe", "Population": 742452000 },
				                   { "Continent": "Oceania", "Population": 38304000 } ];
				        chart1.setDataSource(populationData);
				        chart1.getAllSeries().setMultipleColors(true);
				        var titles = chart1.getTitles();
				        var title = new cfx.TitleDockable();
				        title.setText("Population by Continent (in Millions)");
				        titles.add(title);
				        var axisY = chart1.getAxisY();
				        axisY.setScaleUnit(1000000);
				        axisY.getDataFormat().setDecimals(2);
				        var axisX = chart1.getAxisX();
				        axisX.setInverted(true);
				        axisX.setVisible(false);      
				        var divHolder = document.getElementById('ChartDiv');
				        chart1.create(divHolder);
				    }
				    function chart3(){
				        radialGauge1 = new cfx.gauge.RadialGauge();
				        var borderTemplate = '<DataTemplate>' +
				            '<Canvas>' +
				                '<Ellipse Margin="3" Stroke="#DEDEDE" StrokeThickness="6" ></Ellipse>' +
				                '<Ellipse Margin="7" Stroke="#C8C8C8" StrokeThickness="3" ></Ellipse>' +
				                '<Ellipse Margin="10" Stroke="{Binding Path=Stroke}" StrokeThickness="3" Fill="{Binding Path=Fill}" ></Ellipse>' +
				            '</Canvas>' +
				        '</DataTemplate>';

				        var border = radialGauge1.getBorder();
				        border.setTemplate(borderTemplate);

				        var mainScale = radialGauge1.getMainScale();
				        mainScale.setMax(100);
				        mainScale.setDrawLabels(false);
				        var majorTickmarks = mainScale.getTickmarks().getMajor();
				        majorTickmarks.setVisible(false);
				        var mediumTickmarks = mainScale.getTickmarks().getMedium();
				        mediumTickmarks.setVisible(false);
				        mainScale.getCap().setVisible(false);
				        mainScale.setStartAngle(270);
				        mainScale.setSweepAngle(360);

				        mainScale.setThickness(0.2);
				        var filler = new cfx.gauge.Filler();
				        filler.setPosition(0.75);
				        filler.setSize(1);
				        radialGauge1.setMainIndicator(filler);
				        radialGauge1.setMainValue(14);

				        var title = new cfx.gauge.Title();
				        title.setTag("GaugeTitleLarge");
				        title.setText("%v%%");
				        title.setX(0.5);
				        title.setY(0.7);
				        radialGauge1.getTitles().add(title);

				        title = new cfx.gauge.Title();
				        title.setDock(cfx.gauge.DockArea.Bottom);
				        title.setText("Pria");
				        title.setX(0.5);
				        title.setY(0.5);
				        radialGauge1.getTitles().add(title);

				        title = new cfx.gauge.Title();
				        title.setImage("image/male.png,60,60");
				        title.setText("Test")
				        title.setX(0.5);
				        title.setY(0.25);
				        radialGauge1.getTitles().add(title);

				        radialGauge1.getDashboardBorder().setTemplate("<DataTemplate></DataTemplate>"); // This is only required if you use motifs

				        var divHolder = document.getElementById('ChartDiv3');
				        radialGauge1.create(divHolder);    
				    }
				    function chart4(){
				        radialGauge1 = new cfx.gauge.RadialGauge();
				        var borderTemplate = '<DataTemplate>' +
				            '<Canvas>' +
				                '<Ellipse Margin="3" Stroke="#DEDEDE" StrokeThickness="6" ></Ellipse>' +
				                '<Ellipse Margin="7" Stroke="#C8C8C8" StrokeThickness="3" ></Ellipse>' +
				                '<Ellipse Margin="10" Stroke="{Binding Path=Stroke}" StrokeThickness="3" Fill="{Binding Path=Fill}" ></Ellipse>' +
				            '</Canvas>' +
				        '</DataTemplate>';

				        var border = radialGauge1.getBorder();
				        border.setTemplate(borderTemplate);

				        var mainScale = radialGauge1.getMainScale();
				        mainScale.setMax(100);
				        mainScale.setDrawLabels(false);
				        var majorTickmarks = mainScale.getTickmarks().getMajor();
				        majorTickmarks.setVisible(false);
				        var mediumTickmarks = mainScale.getTickmarks().getMedium();
				        mediumTickmarks.setVisible(false);
				        mainScale.getCap().setVisible(false);
				        mainScale.setStartAngle(270);
				        mainScale.setSweepAngle(360);

				        mainScale.setThickness(0.2);
				        var filler = new cfx.gauge.Filler();
				        filler.setPosition(0.75);
				        filler.setSize(1);
				        radialGauge1.setMainIndicator(filler);
				        radialGauge1.setMainValue(60);

				        var title = new cfx.gauge.Title();
				        title.setTag("GaugeTitleLarge");
				        title.setText("%v%%");
				        title.setX(0.5);
				        title.setY(0.7);
				        radialGauge1.getTitles().add(title);

				        title = new cfx.gauge.Title();
				        title.setDock(cfx.gauge.DockArea.Bottom);
				        title.setText("Wanita");
				        title.setX(0.5);
				        title.setY(0.5);
				        radialGauge1.getTitles().add(title);

				        title = new cfx.gauge.Title();
				        title.setImage("image/female.png,60,60");
				        title.setText("Test")
				        title.setX(0.5);
				        title.setY(0.25);
				        radialGauge1.getTitles().add(title);

				        radialGauge1.getDashboardBorder().setTemplate("<DataTemplate></DataTemplate>"); // This is only required if you use motifs

				        var divHolder = document.getElementById('ChartDiv4');
				        radialGauge1.create(divHolder);    
				    }
					$( document ).ready(function() {					    
					        chart1();
					        chart3();
					        chart4();
					});


				</script>
