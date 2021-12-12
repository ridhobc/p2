<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\setting\models\P2IntelLppiSumberinfo */

$this->title = 'Rekam';
$this->params['breadcrumbs'][] = ['label' => 'Sumberinfo LPPI', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="p2-intel-lppi-sumberinfo-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
