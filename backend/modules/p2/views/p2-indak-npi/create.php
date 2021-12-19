<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\p2\models\P2IndakNpi */

$this->title = 'Rekam';
$this->params['breadcrumbs'][] = ['label' => 'NPI', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="p2-indak-npi-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
