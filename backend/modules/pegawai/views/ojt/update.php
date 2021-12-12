<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\pegawai\models\DbPegawaiOjt */

$this->title = 'Update Db Pegawai Ojt: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Db Pegawai Ojts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="db-pegawai-ojt-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
