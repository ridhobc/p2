<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\pos\models\PosStatusSrt */

$this->title = 'Update Pos Status Srt: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pos Status Srts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pos-status-srt-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
