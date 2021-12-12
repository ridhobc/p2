<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\pos\models\PosPropinsi */

$this->title = 'Update Pos Propinsi: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Pos Propinsis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pos-propinsi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
