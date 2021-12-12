<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\pos\models\PosPropinsi */

$this->title = 'Create Pos Propinsi';
$this->params['breadcrumbs'][] = ['label' => 'Pos Propinsis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pos-propinsi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
