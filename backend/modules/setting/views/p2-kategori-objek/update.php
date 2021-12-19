<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\setting\models\P2KategoriObjek */

$this->title = 'Update: ' . $model->nm_kategori;
$this->params['breadcrumbs'][] = ['label' => 'Kategori Objek', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="p2-kategori-objek-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
