<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\p2\models\P2IntelNhi */

$this->title = 'Update: ' . $model->kd_kantor;
$this->params['breadcrumbs'][] = ['label' => 'NHI', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="p2-intel-nhi-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
