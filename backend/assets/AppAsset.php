<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/profil.css',       
        
//        'custom/build/css/custom.min.css',
//         'css/custom.css',    
    ];
    public $js = [
        'js/yii-override.js',

    ];
    public $depends = [

        'rmrevin\yii\fontawesome\AssetBundle', //fontawesome//
        'yiister\gentelella\assets\ThemeAsset',
        'yiister\gentelella\assets\ExtensionAsset',
        'backend\assets\SweetAlertAsset', //sweetalerrt//
       
//        'yii\web\YiiAsset',
//        'yii\bootstrap4\BootstrapAsset',
//        'yii\bootstrap4\BootstrapPluginAsset',
//         'yiister\gentelella\assets\ThemeBuildAsset', //gentellela//
//        'yiister\gentelella\assets\ThemeSrcAsset', //gentellela//
//         'yiister\gentelella\assets\BootstrapProgressbar',
        
        
    ];

}
