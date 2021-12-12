<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\p2\models\P2Pejabat */

$this->title = 'Update : ' . $model->nm_pejabat;
$this->params['breadcrumbs'][] = ['label' => 'Pejabat TTD', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="p2-pejabat-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
