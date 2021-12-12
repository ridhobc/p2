<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\pegawai\models\DbPegawaiMasterNew */

$this->title = 'Update Db Pegawai Master New: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Db Pegawai Master News', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="db-pegawai-master-new-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
