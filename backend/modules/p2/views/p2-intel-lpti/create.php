<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\p2\models\P2IntelLpti */

$this->title = 'Rekam';
$this->params['breadcrumbs'][] = ['label' => 'LPTI', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="p2-intel-lpti-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
