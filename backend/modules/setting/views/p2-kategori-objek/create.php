<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\setting\models\P2KategoriObjek */

$this->title = 'Tambah Kategori Objek';
$this->params['breadcrumbs'][] = ['label' => 'P2 Kategori Objeks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="p2-kategori-objek-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
