<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\setting\models\P2IntelLppiMedia */

$this->title = 'Update ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Media LPPI', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="p2-intel-lppi-media-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
