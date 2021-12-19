<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\p2\models\P2SidikLpp */

$this->title = 'Create P2 Sidik Lpp';
$this->params['breadcrumbs'][] = ['label' => 'P2 Sidik Lpps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="p2-sidik-lpp-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
