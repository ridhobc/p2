<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\p2\models\P2IntelLppi */

$this->title = 'Update: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'LPPI', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="p2-intel-lppi-update">

    <?=
    $this->render('_form-next', [
        'model' => $model,
        'modelstpi' => $modelstpi,
        'searchModel' => $searchModel,
        'dataProvider' => $dataProvider,
    ])
    ?>

</div>
