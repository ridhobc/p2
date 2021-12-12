<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\setting\models\P2IntelCekSumber */

$this->title = 'Update: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cek Sumber', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="p2-intel-cek-sumber-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
