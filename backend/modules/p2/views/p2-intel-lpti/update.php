<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\p2\models\P2IntelLpti */

$this->title = 'LPTI: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'LPTI', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="p2-intel-lpti-update">

   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
