<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\setting\models\P2IntelCekValid */

$this->title = 'Rekam';
$this->params['breadcrumbs'][] = ['label' => 'Cek Valid', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="p2-intel-cek-valid-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
