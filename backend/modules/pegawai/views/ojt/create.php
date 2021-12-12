<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\pegawai\models\DbPegawaiOjt */

$this->title = 'Create Db Pegawai Ojt';
$this->params['breadcrumbs'][] = ['label' => 'Db Pegawai Ojts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="db-pegawai-ojt-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
