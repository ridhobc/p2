<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\pos\models\PosTujuan */

$this->title = 'Update Tujuan pengiriman: ' . $model->nm_tujuan;
$this->params['breadcrumbs'][] = ['label' => 'Pos Tujuans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pos-tujuan-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
