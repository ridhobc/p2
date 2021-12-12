<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\pos\models\PosStatusSrt */

$this->title = 'Create Pos Status Srt';
$this->params['breadcrumbs'][] = ['label' => 'Pos Status Srts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pos-status-srt-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
