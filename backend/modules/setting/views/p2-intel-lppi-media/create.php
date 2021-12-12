<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\setting\models\P2IntelLppiMedia */

$this->title = 'Rekam';
$this->params['breadcrumbs'][] = ['label' => 'Media LPPI', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="p2-intel-lppi-media-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
