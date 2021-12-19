<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\p2\models\P2IntelNp */

$this->title = 'Rekam';
$this->params['breadcrumbs'][] = ['label' => 'NP', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="p2-intel-np-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
