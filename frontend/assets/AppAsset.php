<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        //'css/heroic-features.css',
        //'css/camera.css',
        //'css/style.css'
        //untuk infografis
        // 'js/infographic/css/default.css',
        // 'js/infographic/css/interactive-svg.css',
        // 'js/infographic/css/top.css',

        //untuk tabel dinamis
        //'css/site.css',
        //'js/pivottable/dist/pivot.css',

        //untuk jchartfx
        // 'js/jchartfx/styles/attributes/jchartfx.attributes.css',
        // 'js/jchartfx/styles/palettes/jchartfx.palette.css',
        // 'js/jchartfx/styles/jchartfx.userInterface.css',
    ];
    public $js = [
        //'js/jquery.min.js',
        
        //untuk tab


        //untuk tabel dinamis


        //untuk infografis
        // 'js/infographic/js/modernizr.custom.js',
        // 'js/infographic/js/interactive-svg.js',

        //untuk jchartfx        
/*        'js/jchartfx/js/jchartfx.system.js',
        'js/jchartfx/js/jchartfx.coreVector.js',
        'js/jchartfx/js/jchartfx.advanced.js',
        'js/jchartfx/js/jchartfx.gauge.js',
        'js/jchartfx/js/jchartfx.pictograph.js',
        'js/jchartfx/js/jchartfx.userInterface.js',
        'js/jchartfx/js/motifs/jchartfx.motif.js',   */
    ];
    public $jsOptions = array(
        'position' => \yii\web\View::POS_HEAD
    );
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        //'yii\bootstrap\BootstrapPluginAsset',
        /*'yii\bootstrap\ButtonDropdown',*/
    ];
}
