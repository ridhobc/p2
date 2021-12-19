<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\p2\models\P2IntelNi */

$this->title = 'Rekam';
$this->params['breadcrumbs'][] = ['label' => 'NI', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="p2-intel-ni-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
