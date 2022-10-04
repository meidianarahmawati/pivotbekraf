<?php
	use yii\bootstrap\Nav;
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



<div id="accordion" class="row">
	<div class="col-sm-2">
		<?php
			/*echo Collapse::widget([
				'itemToggleOptions' => ['data-target' => '#item'],
			    'items' => [
			        // equivalent to the above
			        [
			            'label' => 'Item #1',
			            'content' => 'Data Usaha Per Subsektor',
			            // open its content by default
			            'contentOptions' => ['class' => 'in']
			        ],
			        // another group item
			        [
			            'label' => 'Item #2',
			            'content' => 'Data Usaha Berdasarkan Tenaga Kerja',
			            // 'contentOptions' => [...],
			            // 'options' => [...],
			        ],
			        // if you want to swap out .panel-body with .list-group, you may use the following
			        [
			            'label' => 'Item #3',
			            'content' => [
			                'Data Usaha Berdasarkan ...'
			            ],
			            // 'contentOptions' => [...],
			            // 'options' => [...],
			            'footer' => 'Footer' // the footer label in list-group
			        ],
			    ]
			]);*/
			Nav::begin();
			echo Nav::widget([
			    'items' => [
			        ['label' => 'Data Usaha Per Subsektor', 'url' => ['/////////#item1']],
			        ['label' => 'Data Jenis Tenaga Kerja berdasarkan Jenis Kelamin', 'url' => ['/////////#item2']],			        
			        ['label' => 'Data Usaha berdasarkan .....', 'url' => ['/////////#item3']],
			    ],
			    'options' => ['class' => 'navbar-stacked'],
			]);
			Nav::end();
			
			echo Tabs::widget([
			    'items' => [
			        [
			            'label' => 'Data Usaha Per Subsektor',
			            //'content' => 'Anim pariatur cliche...',
			            'url' => '#item1',
			            'active' => true
			        ],
			        [
			            'label' => 'Data Jenis Tenaga Kerja berdasarkan Jenis Kelamin', 
			            'url' => '#item2',
			            //'content' => 'Anim pariatur cliche...',
			            //'headerOptions' => [...],
			            'options' => ['id' => 'myveryownID'],
			        ],
			        [
			            'label' => 'Data Usaha berdasarkan .....', 
			            'url' => '#item3',			            
			        ],
			    ],
			    //'options' => ['class' => 'navbar-stacked'],
			]);
		?>
	</div>
	<div class="col-sm-10 tab-content" >
		<div id="item1" class="tab-pane fade in active">
			<div class="row">				
					<div class="col-sm-5">
						<div id="text1" style="width:100%;height:250px;display: inline-block">Berdasarkan jenis pekerjaan dan jenis kelamin, tenaga
	kerja sektor ekonomi kreatif pada tahun 2014 dan 2015
	didominasi oleh tenaga kerja yang bekerja sebagai blue collar
	baik laki-laki maupun perempuan (Tabel 4.5). Pada tahun
	2014, tenaga kerja laki-laki dengan jenis perkerjaan blue collar
	sebesar 90,48 persen dan white collar hanya 9,52 persen.
	Tenaga kerja perempuan dengan jenis pekerjaan blue collar
	yaitu sebesar 94,39 persen dan white collar hanya 5,61 persen.
	Pada tahun 2015, tenaga kerja laki-laki dengan jenis
	pekerjaan blue collar sebesar 89,84 persen dan white collar
	hanya 10,16 persen. Tenaga kerja perempuan dengan jenis
	pekerjaan blue collar yaitu sebesar 94,22 persen dan white
	collar hanya 5,78 persen.</div>	
					</div>
					<div class="col-sm-7">
						<div id="ChartDiv2" style="width:100%;height:250px;display: inline-block"></div>	
					</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div id="ChartDiv" style="width:100%;height:500px;display: inline-block"></div>	
				</div>
			</div>	
		</div>
		<div id="item2" class="tab-pane fade">
			<div class="row">
					<div class="col-sm-4">
						<div id="ChartDiv3" style="width:100%;height:250px;display: inline-block"></div>	
					</div>
					<div class="col-sm-4">
						<div id="ChartDiv4" style="width:100%;height:250px;display: inline-block"></div>	
					</div>
					<div class="col-sm-4">
						<div id="text1" style="width:100%;height:250px;display: inline-block">Berdasarkan jenis pekerjaan dan jenis kelamin, tenaga
	kerja sektor ekonomi kreatif pada tahun 2014 dan 2015
	didominasi oleh tenaga kerja yang bekerja sebagai blue collar
	baik laki-laki maupun perempuan (Tabel 4.5). Pada tahun
	2014, tenaga kerja laki-laki dengan jenis perkerjaan blue collar
	sebesar 90,48 persen dan white collar hanya 9,52 persen.
	Tenaga kerja perempuan dengan jenis pekerjaan blue collar
	yaitu sebesar 94,39 persen dan white collar hanya 5,61 persen.
	Pada tahun 2015, tenaga kerja laki-laki dengan jenis
	pekerjaan blue collar sebesar 89,84 persen dan white collar
	hanya 10,16 persen. Tenaga kerja perempuan dengan jenis
	pekerjaan blue collar yaitu sebesar 94,22 persen dan white
	collar hanya 5,78 persen.</div>	
					</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div id="ChartDiv2" style="width:100%;height:500px;display: inline-block"></div>	
				</div>
			</div>	
		</div>
		<div id="item3" class="tab-pane fade">
			<div class="row">
					
					<div class="col-sm-12">
						<div id="text1" style="width:100%;height:250px;display: inline-block">Berdasarkan jenis pekerjaan dan jenis kelamin, tenaga
	kerja sektor ekonomi kreatif pada tahun 2014 dan 2015
	didominasi oleh tenaga kerja yang bekerja sebagai blue collar
	baik laki-laki maupun perempuan (Tabel 4.5). Pada tahun
	2014, tenaga kerja laki-laki dengan jenis perkerjaan blue collar
	sebesar 90,48 persen dan white collar hanya 9,52 persen.
	Tenaga kerja perempuan dengan jenis pekerjaan blue collar
	yaitu sebesar 94,39 persen dan white collar hanya 5,61 persen.
	Pada tahun 2015, tenaga kerja laki-laki dengan jenis
	pekerjaan blue collar sebesar 89,84 persen dan white collar
	hanya 10,16 persen. Tenaga kerja perempuan dengan jenis
	pekerjaan blue collar yaitu sebesar 94,22 persen dan white
	collar hanya 5,78 persen.</div>	
					</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div id="text2">..........test test test........</div>	
				</div>
			</div>	
		</div>
				<style type="text/css">
				      svg > g:last-child {
				          display: none;
				      }
				      svg > line.EmptyMarker {display: none}
				   </style>
				   
				<script type="text/javascript" language="javascript">
				    //var chart1;

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
				        title.setText("User Engagement");
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
				        title.setText("User Engagement");
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
					        chart2();
					        chart3();
					        chart4();
					});

					        /*$('#w0').on('hidden.bs.collapse', function () {
							  // do something…
							  $('#item1').hide();
							  $('#item2').show();
							});*/

				</script>
	</div>
</div>
<select id = "opts">
	<option value="ds1">data1</option>
	<option value="ds2" selected="selected">data2</option> 
	<option value="ds3">data3</option>
  <!-- and so on... -->   
</select>  
		

		<select id = "opts">
<option value="ds1">data1</option>
<option value="ds2" selected="selected">data2</option> 
<option value="ds3">data3</option>
  <!-- and so on... -->   
  </select>  
<script type="text/javascript">
var w = 100,
    h = 100
;

var color = d3.scale.ordinal()
            .range(['#1459D9', '#daa520']);


var ds1 = [{x:0,y:12},{x:0,y:45}];
var ds2 = [{x:0,y:72},{x:0,y:28}];
var ds3 = [{x:0,y:82},{x:0,y:18}];


// config, add svg
var canvas = d3.select('body')
    .append('svg')
    .attr('width',100)
    .attr('height',100) 
    .append('g');


// function that wraps around the d3 pattern (bind, add, update, remove)
function updateLegend(newData) {

    // bind data
    var appending = canvas.selectAll('rect')
       .data(newData);

    // add new elements
    appending.enter().append('rect');

    // update existing elements
    appending.transition()
        .duration(0)
        .style("fill", function(d,i){return color(i);})
        .attr("x",10)
        .attr("y",10)
        .attr("width",function (d) {return d.y; })//d.y;})
        .attr("height",19);

    // remove old elements
    appending.exit().remove();

}

// generate initial legend
updateLegend(ds2);

// handle on click event
d3.select('#opts')
  .on('change', function() {
    var newData = eval(d3.select(this).property('value'));
    updateLegend(newData);
});
</script>
