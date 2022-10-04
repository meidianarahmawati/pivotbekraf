<?php
	use yii\helpers\Html;
	use yii\helpers\ArrayHelper;
	use yii\widgets\ActiveForm;
	use frontend\models\MTabel;
	use kartik\select2\Select2;


	use yii\bootstrap\Collapse;
	
    //pictorial bar
    $this->registerJsFile('@web/js/echarts/echarts.min.js', ['position' => $this::POS_HEAD, 'depends' => [yii\web\JqueryAsset::className(), yii\bootstrap\BootstrapPluginAsset::className()]]);

    //item3 multichart

$this->title = 'BEKRAF Data';
?>
			
	
    <div id="page-content-wrapper">
        <div class="container-fluid">            
            <div id="picto3" style="height:400px;"></div>
			
			<script type="text/javascript">
				var dataMap = {};
				function dataFormatter(obj) {
				    var pList = ['15-24','25-34','35-44','45-54','55-64','65+'];
				    var temp;
				    for (var year = 2011; year <= 2016; year++) {
				        var max = 0;
				        var sum = 0;
				        temp = obj[year];
				        for (var i = 0, l = temp.length; i < l; i++) {
				            max = Math.max(max, temp[i]);
				            sum += temp[i];
				            obj[year][i] = {
				                name : pList[i],
				                value : temp[i]
				            };
				        }
				        obj[year + 'max'] = Math.floor(max / 100) * 100;
				        obj[year + 'sum'] = sum;
				    }
				    return obj;
				}

				dataMap.dataDesa = dataFormatter({
				    //max : 60000,
				    <?php
				    foreach($data as $year=>$year_value)
				    {
				        $val = $year.":[";
				        foreach($year_value["jmldesa"] as $value)
				            $val = $val.$value.",";
				        $val = substr($val, 0, -1);
				        $val = $val."], ";
				        echo $val;
				    }
				    ?>
				});

				dataMap.dataKota = dataFormatter({
				    //max : 4000,
				    <?php
				    foreach($data as $year=>$year_value)
				    {
				        $val = $year.":[";
				        foreach($year_value["jmlkota"] as $value)
				            $val = $val.$value.",";
				        $val = substr($val, 0, -1);
				        $val = $val."], ";
				        echo $val;
				    }
				    ?>
				});

				var myChart3 = echarts.init(document.getElementById('picto3'));

				option = {
				    baseOption: {
				        timeline: {
				            // y: 0,
				            axisType: 'category',
				            // realtime: false,
				            // loop: false,
				            autoPlay: true,
				            // currentIndex: 2,
				            playInterval: 5000,
				            // controlStyle: {
				            //     position: 'left'
				            // },
				            data: [
				                '2011-01-01','2012-01-01',
				                {
				                    value: '2013-01-01',
				                    tooltip: {
				                        formatter: '{b} Tahun 2013'
				                    },
				                    symbol: 'diamond',
				                    symbolSize: 16
				                },
				                '2014-01-01', '2015-01-01',
				                {
				                    value: '2016-01-01',
				                    tooltip: {
				                        formatter: function (params) {
				                            return params.name + 'Tahun 2016';
				                        }
				                    },
				                    symbol: 'diamond',
				                    symbolSize: 18
				                },
				            ],
				            label: {
				                formatter : function(s) {
				                    return (new Date(s)).getFullYear();
				                }
				            }
				        },
				        title: {
				            subtext: 'Berdasarkan Kelompok Umur dan Wilayah Pekerja'
				        },
				        toolbox: {
				            show : true,
				            feature : {
				                //dataView : {show: true, readOnly: false},
				                magicType : {show: true, type: ['line', 'bar']},
				                restore : {show: true},
				                saveAsImage : {show: true, text: 'Download'}
				            },
				            //orient : 'vertical',
				            showTitle : false,
				        },
				        tooltip: {
				        },
				        legend: {
				            x: 'right',
				            data: [ 'Desa', 'Kota'],
				            padding : 50,
				            /*selected: {
				                'GDP': false, '金融': false, '房地产': false
				            }*/
				        },
				        calculable : true,
				        grid: {
				            top: 80,
				            bottom: 100,
				            tooltip: {
				                trigger: 'axis',
				                axisPointer: {
				                    type: 'shadow',
				                    label: {
				                        show: true,
				                        formatter: function (params) {
				                            return params.value.replace('\n', '');
				                        }
				                    }
				                }
				            }
				        },
				        xAxis: [
				            {
				                'type':'category',
				                'axisLabel':{'interval':0},
				                'data':[
				                    '15-24','\n25-34','35-44','\n45-54','55-64','\n65+'],
				                splitLine: {show: false}
				            }
				        ],
				        yAxis: [
				            {
				                type: 'value',
				                name: 'Jumlah'
				            }
				        ],
				        series: [
				            {name: 'Desa', type: 'bar'},
				            {name: 'Kota', type: 'bar'},
				            {
				                name: 'Jumlah Penduduk Bekerja di Sektor Ekonomi Kreatif',
				                type: 'pie',
				                center: ['75%', '35%'],
				                radius: '28%',
				                z: 100,
				                itemStyle : { normal: {label : {show : true, position: 'top'}}}
				            },
				        ]
				    },
				    options: [
				        {
				            title: {text: 'Jumlah Penduduk Bekerja di Sektor Ekonomi Kreatif 2011'},
				            series: [
				                {data: dataMap.dataDesa['2011']},
				                {data: dataMap.dataKota['2011']},
				                {data: [
				                    {name: 'Total Pekerja Desa: '+dataMap.dataDesa['2011sum'], value: dataMap.dataDesa['2011sum'], itemStyle : { normal: {label : {show : true, position: 'top'}}}},
				                    {name: 'Total Pekerja Kota: '+dataMap.dataKota['2011sum'], value: dataMap.dataKota['2011sum'], itemStyle : { normal: {label : {show : true, position: 'top'}}}},
				                ]},
				                /*itemStyle: {
	                                normal: {
	                                    color: 'tomato',
	                                    barBorderColor: 'tomato',
	                                    barBorderWidth: 6,
	                                    barBorderRadius:0,
	                                    
	                                }
	                            },*/
	                            /*label : {
	                                        show: true, position: 'insideTop'
	                                    }*/
				            ]
				        },
				        {
				            title : {text: 'Jumlah Penduduk Bekerja di Sektor Ekonomi Kreatif 2012'},
				            series : [
				                {data: dataMap.dataDesa['2012']},
				                {data: dataMap.dataKota['2012']},
				                {data: [
				                    {name: 'Total Pekerja Desa: '+dataMap.dataDesa['2012sum'], value: dataMap.dataDesa['2012sum']},
				                    {name: 'Total Pekerja Kota: '+dataMap.dataKota['2012sum'], value: dataMap.dataKota['2012sum']},
				                ]}
				            ]
				        },
				        {
				            title : {text: 'Jumlah Penduduk Bekerja di Sektor Ekonomi Kreatif 2013'},
				            series : [
				                {data: dataMap.dataDesa['2013']},
				                {data: dataMap.dataKota['2013']},
				                {data: [
				                    {name: 'Total Pekerja Desa: '+dataMap.dataDesa['2013sum'], value: dataMap.dataDesa['2013sum']},
				                    {name: 'Total Pekerja Kota: '+dataMap.dataKota['2013sum'], value: dataMap.dataKota['2013sum']},
				                ]}
				            ]
				        },
				        {
				            title : {text: 'Jumlah Penduduk Bekerja di Sektor Ekonomi Kreatif 2014'},
				            series : [
				                {data: dataMap.dataDesa['2014']},
				                {data: dataMap.dataKota['2014']},
				                {data: [
				                    {name: 'Total Pekerja Desa: '+dataMap.dataDesa['2014sum'], value: dataMap.dataDesa['2014sum']},
				                    {name: 'Total Pekerja Kota: '+dataMap.dataKota['2014sum'], value: dataMap.dataKota['2014sum']},
				                ]}
				            ]
				        },
				        {
				            title : {text: 'Jumlah Penduduk Bekerja di Sektor Ekonomi Kreatif 2015'},
				            series : [
				                {data: dataMap.dataDesa['2015']},
				                {data: dataMap.dataKota['2015']},
				                {data: [
				                    {name: 'Total Pekerja Desa: '+dataMap.dataDesa['2015sum'], value: dataMap.dataDesa['2015sum']},
				                    {name: 'Total Pekerja Kota: '+dataMap.dataKota['2015sum'], value: dataMap.dataKota['2015sum']},
				                ]}
				            ]
				        },
				        {
				            title : {text: 'Jumlah Penduduk Bekerja di Sektor Ekonomi Kreatif 2016'},
				            series : [
				                {data: dataMap.dataDesa['2016']},
				                {data: dataMap.dataKota['2016']},
				                {data: [
				                    {name: 'Total Pekerja Desa: '+dataMap.dataDesa['2016sum'], value: dataMap.dataDesa['2016sum']},
				                    {name: 'Total Pekerja Kota: '+dataMap.dataKota['2016sum'], value: dataMap.dataKota['2016sum']},
				                ]}
				            ]
				        }
				    ]
				};
				myChart3.setOption(option);
			</script>
		</div>
	</div>