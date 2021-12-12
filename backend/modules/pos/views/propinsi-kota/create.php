<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\pos\models\PosPropinsiKota */

$this->title = 'Create Pos Propinsi Kota';
$this->params['breadcrumbs'][] = ['label' => 'Pos Propinsi Kotas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pos-propinsi-kota-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
