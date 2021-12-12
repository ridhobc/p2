<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\setting\models\P2IntelLppiKategori */

$this->title = 'Update: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Kategori LPPI', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="p2-intel-lppi-kategori-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
