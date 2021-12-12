<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\pegawai\models\DbPegawaiMasterNew */

$this->title = 'Create Db Pegawai Master New';
$this->params['breadcrumbs'][] = ['label' => 'Db Pegawai Master News', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="db-pegawai-master-new-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
