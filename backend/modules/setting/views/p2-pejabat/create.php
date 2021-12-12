<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\p2\models\P2Pejabat */

$this->title = 'Rekam';
$this->params['breadcrumbs'][] = ['label' => 'Pejabat TTD', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="p2-pejabat-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
