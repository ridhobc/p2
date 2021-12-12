<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\setting\models\P2KategoriPenugasan */

$this->title = 'Rekam';
$this->params['breadcrumbs'][] = ['label' => 'Penugasan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="p2-kategori-penugasan-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
