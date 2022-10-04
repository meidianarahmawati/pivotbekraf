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
            
var weatherIcons = {
    'Sunny': './image/weather/sunny_128.png',
    'Cloudy': './image/weather/cloudy_128.png',
    'Showers': './image/weather/showers_128.png'
};

var seriesLabel = {
    normal: {
        show: true,
        textBorderColor: '#333',
        textBorderWidth: 2
    }
}

option = {
    title: {
        text: 'Wheater Statistics'
    },
    tooltip: {
        trigger: 'axis',
        axisPointer: {
            type: 'shadow'
        }
    },
    legend: {
        data: ['City Alpha', 'City Beta', 'City Gamma']
    },
    grid: {
        left: 100
    },
    toolbox: {
        show: true,
        feature: {
            saveAsImage: {}
        }
    },
    xAxis: {
        type: 'value',
        name: 'Days',
        axisLabel: {
            formatter: '{value}'
        },
        splitLine: {show: false},
        axisLine: {show: false},
        axisLabel: {show: false},
        axisTick: {show: false},
    },
    yAxis: {
        type: 'category',
        inverse: true,
        data: ['Sunny', 'Cloudy', 'Showers'],
        splitLine: {show: false},
        axisLine: {show: false},
        axisLabel: {show: false},
        axisTick: {show: false},
        axisLabel: {
            formatter: function (value) {
                return '{' + value + '| }\n{value|' + value + '}';
            },
            margin: 20,
            rich: {
                value: {
                    lineHeight: 30,
                    align: 'center'
                },
                Sunny: {
                    height: 40,
                    align: 'center',
                    backgroundColor: {
                        image: weatherIcons.Sunny
                    }
                },
                Cloudy: {
                    height: 40,
                    align: 'center',
                    backgroundColor: {
                        image: weatherIcons.Cloudy
                    }
                },
                Showers: {
                    height: 40,
                    align: 'center',
                    backgroundColor: {
                        image: weatherIcons.Showers
                    }
                }
            }
        }
    },
    series: [
        {
            name: 'City Alpha',
            type: 'bar',
            data: [165, 170, 30],
            label: seriesLabel,
            markPoint: {
                symbolSize: 1,
                symbolOffset: [0, '50%'],
                label: {
                   normal: {
                        formatter: '{a|{a}\n}{b|{b} }{c|{c}}',
                        backgroundColor: 'rgb(242,242,242)',
                        borderColor: '#aaa',
                        borderWidth: 1,
                        borderRadius: 4,
                        padding: [4, 10],
                        lineHeight: 26,
                        // shadowBlur: 5,
                        // shadowColor: '#000',
                        // shadowOffsetX: 0,
                        // shadowOffsetY: 1,
                        position: 'right',
                        distance: 20,
                        rich: {
                            a: {
                                align: 'center',
                                color: '#fff',
                                fontSize: 18,
                                textShadowBlur: 2,
                                textShadowColor: '#000',
                                textShadowOffsetX: 0,
                                textShadowOffsetY: 1,
                                textBorderColor: '#333',
                                textBorderWidth: 2
                            },
                            b: {
                                 color: '#333'
                            },
                            c: {
                                color: '#ff8811',
                                textBorderColor: '#000',
                                textBorderWidth: 1,
                                fontSize: 22
                            }
                        }
                   }
                },
                data: [
                    {type: 'max', name: 'max days: '},
                    {type: 'min', name: 'min days: '}
                ]
            }
        },
        {
            name: 'City Beta',
            type: 'bar',
            label: seriesLabel,
            data: [150, 105, 110]
        },
        {
            name: 'City Gamma',
            type: 'bar',
            label: seriesLabel,
            data: [220, 82, 63]
        }
    ]
};
                var myChart3 = echarts.init(document.getElementById('picto3'));
                myChart3.setOption(option);

                    </script>
                </div>
            </div>