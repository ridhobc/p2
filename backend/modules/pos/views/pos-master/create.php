<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\pos\models\PosMaster */

$this->title = 'Rekam Pengiriman Surat';
$this->params['breadcrumbs'][] = ['label' => 'Pos Masters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pos-master-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
