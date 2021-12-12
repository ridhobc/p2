<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\pegawai\models\DbKantor */

$this->title = 'Create Db Kantor';
$this->params['breadcrumbs'][] = ['label' => 'Db Kantors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="db-kantor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
