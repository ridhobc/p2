<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\p2\models\P2IndakLi */

$this->title = 'Rekam';
$this->params['breadcrumbs'][] = ['label' => 'LI-1', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="p2-indak-li-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
