<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\pegawai\models\Pangkat */

$this->title = 'Update Pangkat: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pangkats', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pangkat-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
