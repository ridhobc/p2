<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\p2\models\P2Pejabat */

$this->title = $model->nm_pejabat;
$this->params['breadcrumbs'][] = ['label' => 'Pejabat TTD', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="p2-pejabat-view">


    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ])
        ?>
    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nm_pejabat',
            'nip_pejabat',
            'jab_pejabat',
            'kd_kantor',
            [
                'attribute' => 'Kantor',
                'value' => $model->kantor->nm_kantor,
            ],
        ],
    ])
    ?>

</div>
