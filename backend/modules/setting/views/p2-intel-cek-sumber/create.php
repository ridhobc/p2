<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\setting\models\P2IntelCekSumber */

$this->title = 'Rekam';
$this->params['breadcrumbs'][] = ['label' => 'Cek Sumber Info', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="p2-intel-cek-sumber-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
