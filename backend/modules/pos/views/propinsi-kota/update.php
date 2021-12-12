<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\pos\models\PosPropinsiKota */

$this->title = 'Update Pos Propinsi Kota: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Pos Propinsi Kotas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pos-propinsi-kota-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
