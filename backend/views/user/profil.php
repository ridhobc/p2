<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Modal;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\User */

$this->title = 'Profil ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">

                <h3 class="panel-title">
                    User Profil </h3>
            </div>
            <div class="panel-body">
                <div class="container">
                    <div class="pull-right">
                        
                    </div>
                    <div class="pull-left">
                        <?=
                        Html::a(
                                'Change Password', ['change_password'], ['data-method' => 'post', 'class' => 'btn btn-warning btn-flat '])
                        ?>
                    </div>
                </div>
                <div class="row">

                    <div class="col-12">

                        <div class="col-md-12">
                            <div class="col-md-12 text-center">
                                <?= Html::img($model->getPhoto($model->photo), ['alt' => 'No Image', 'class' => 'img-circle edusec-img-disp']); ?>
                                <div class="photo-edit">

                                    <?=
                                    Html::a('<i class="fa fa-pencil"></i>', ['emp-photo', 'id' => $model->id], ['class' => 'photo-edit-icon', 'title' => 'Change Profile Picture', 'data-toggle' => "modal",
                                        'data-target' => "#basicModal"])
                                    ?>

                                </div>
                                <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content row">            
                                            <div class="modal-body">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h5>PROFIL USER</h5>
                            <?php
                            $agama = [
                                '1' => 'Islam',
                                '2' => 'Kristen',
                                '3' => 'Kristen Protestan',
                                '4' => 'Hindu',
                                '5' => 'Budha',
                                '6' => 'Lainnya'
                            ];
                            
                            ?>
                            <?=
                            DetailView::widget([
                                'model' => $model,
                                'condensed' => true,
                                'hover' => true,
                                'bootstrap' => true,
                                'bordered' => true,
                                'responsive' => true,
                                'mode' => DetailView::MODE_VIEW,
                                'panel' => [
                                    'heading' => 'Username # ' . $model->username,
                                    'type' => DetailView::TYPE_INFO,
                                ],
//        'buttons1' => '{update} {delete}',        //untuk menambahkan tombol edit dan delete. untuk delete tambahkan {delete}
                                'buttons1' => '{view}', //untuk menambahkan tombol edit dan delete. untuk delete tambahkan {delete}
                                'attributes' => [
                                    'username',
//                        'password_hash',
//                        'auth_key',
                                    'name',
                                    'nip',
                                    'born',
                                    //'birthday',
                                    [
                                        'attribute' => 'birthday',
                                        'format' => 'date',
                                        'type' => DetailView::INPUT_DATE,
                                        'widgetOptions' => [
                                            'pluginOptions' => ['format' => 'yyyy-mm-dd']
                                        ],
                                        'inputContainer' => ['class' => 'col-sm-6']
                                    ],
                                    'address:ntext',
                                    'phone',
                                    'email:email',
                                    [
                                        'attribute' => 'religion_id',
                                        'format' => 'raw',
                                        'value' => $agama[$model->religion_id],
                                        'type' => DetailView::INPUT_SELECT2,
                                        'widgetOptions' => [
                                            'data' => $agama,
                                            'options' => ['placeholder' => 'Select ...'],
                                            'pluginOptions' => ['allowClear' => true]
                                        ],
                                        'inputContainer' => ['class' => 'col-sm-6']
                                    ],
                                    
                                ]
                            ]);
                            ?>

                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


