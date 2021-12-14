<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class LoginAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'custom/vendors/bootstrap/dist/css/bootstrap.min.css',
        'custom/vendors/font-awesome/css/font-awesome.min.css',
        'custom/vendors/nprogress/nprogress.css',
        'custom/vendors/animate.css/animate.min.css',
        'custom/build/css/custom.min.css',
    ];
    public $js = [
    ];
    public $depends = [
    ];

}
