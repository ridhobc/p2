<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\p2\models\P2SidikLpf */

$this->title = 'Create P2 Sidik Lpf';
$this->params['breadcrumbs'][] = ['label' => 'P2 Sidik Lpfs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="p2-sidik-lpf-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
