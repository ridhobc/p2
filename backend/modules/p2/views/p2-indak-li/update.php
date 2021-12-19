<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\p2\models\P2IndakLi */

$this->title = 'Update: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'LI-1', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="p2-indak-li-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
