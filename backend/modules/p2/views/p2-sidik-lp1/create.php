<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\p2\models\P2SidikLp1 */

$this->title = 'Create P2 Sidik Lp1';
$this->params['breadcrumbs'][] = ['label' => 'P2 Sidik Lp1s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="p2-sidik-lp1-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
