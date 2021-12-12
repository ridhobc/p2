<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\pegawai\models\Pangkat */

$this->title = 'Create Pangkat';
$this->params['breadcrumbs'][] = ['label' => 'Pangkats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pangkat-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
