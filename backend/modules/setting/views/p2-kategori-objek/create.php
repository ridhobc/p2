<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\setting\models\P2KategoriObjek */

$this->title = 'Rekam';
$this->params['breadcrumbs'][] = ['label' => 'Kategori Objek', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="p2-kategori-objek-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
