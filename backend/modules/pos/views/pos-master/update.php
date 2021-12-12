<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\pos\models\PosMaster */

$this->title = 'Update Pengiriman Surat: ' . $model->no_srt;
$this->params['breadcrumbs'][] = ['label' => 'Pos Masters', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pos-master-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
