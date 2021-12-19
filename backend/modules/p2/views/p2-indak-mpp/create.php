<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\p2\models\P2IndakMpp */

$this->title = 'Create P2 Indak Mpp';
$this->params['breadcrumbs'][] = ['label' => 'P2 Indak Mpps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="p2-indak-mpp-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
