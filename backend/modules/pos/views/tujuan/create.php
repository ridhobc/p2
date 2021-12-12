<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\pos\models\PosTujuan */

$this->title = 'Rekam Tujuan Pengiriman';
$this->params['breadcrumbs'][] = ['label' => 'Pos Tujuans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pos-tujuan-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
