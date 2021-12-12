<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\spmbcetak\models\SpmbSp */

$this->title = 'Tujuan ' . $model->nm_tujuan ;
$this->params['breadcrumbs'][] = ['label' => 'Pos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="spmb-sp-view">

    <p>
        <?= Html::a('Home', ['index'], ['class' => 'btn btn-primary', 'title' => 'Home']) ?>
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
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-eye "></i> <?php echo Yii::t('app', 'Detail Tujuan Surat'); ?></h3>
        </div>
        <div class="box-body">

            <div class="row">
                <div class="col-xs-6 col-lg-6">
                    <div class="box box-solid box-info col-xs-6 col-lg-6 no-padding">
                        <div class="box-header with-border">
                            <h4 class="box-title"><i class="fa fa-info-circle"></i> <?php echo Yii::t('app', 'Detail Surat'); ?></h4>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <?=
                                    DetailView::widget([
                                        'model' => $model,
                                        'attributes' => [
                                            'nm_tujuan',
                                            'alamat_tujuan1',
                                            'alamat_tujuan2',
                                            'alamat_tujuan3',
                                            'kota_tujuan',
                                            [
                                                'attribute' => 'kota_tujuan_id',
                                                'value' => $model->kotatujuan->name,
                                            ],
                                            
                                        ],
                                    ])
                                    ?>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

</div>
