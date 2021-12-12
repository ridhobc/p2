<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\p2\models\P2IntelStpi */

$this->title = 'STPI: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'STPI', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="p2-intel-stpi-update">

  

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
