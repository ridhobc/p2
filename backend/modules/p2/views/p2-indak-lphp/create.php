<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\p2\models\P2IndakLphp */

$this->title = 'Create P2 Indak Lphp';
$this->params['breadcrumbs'][] = ['label' => 'P2 Indak Lphps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="p2-indak-lphp-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
