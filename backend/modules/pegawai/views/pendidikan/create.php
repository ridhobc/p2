<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\pegawai\models\DbPendidikan */

$this->title = 'Create Db Pendidikan';
$this->params['breadcrumbs'][] = ['label' => 'Db Pendidikans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="db-pendidikan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
