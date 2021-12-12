<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class SweetAlertAsset extends AssetBundle {

    public $basePath = '@bower/sweetalet/dist';
    public $css = [
        'sweetalert.css',
    ];
    public $js = [
        'sweetalert.min.js'
    ];

}
