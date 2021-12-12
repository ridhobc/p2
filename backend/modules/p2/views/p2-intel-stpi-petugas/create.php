<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\p2\models\P2IntelStpiPetugas */

$this->title = 'Create P2 Intel Stpi Petugas';
$this->params['breadcrumbs'][] = ['label' => 'P2 Intel Stpi Petugas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="p2-intel-stpi-petugas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
