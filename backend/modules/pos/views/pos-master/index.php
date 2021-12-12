<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\dynagrid;
use kartik\export\ExportMenu;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\setting\models\SimanAngkutanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Rekam Surat/Paket';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="box-body">
    <div class="row">
        <div class="col-md-12">
            <div class="pspdetail-index">

                <?php
               
                $tujuan = \yii\helpers\ArrayHelper::map(\backend\modules\pos\models\PosTujuan::find()->all(), 'id', 'nm_tujuan');
                $status = \yii\helpers\ArrayHelper::map(backend\modules\pos\models\PosStatusSrt::find()->all(), 'id', 'nm_status');
                ?>

                <?php
                Modal::begin([
                    'header' => '<h4>PSP</h4>',
                    'id' => 'modal',
                    'size' => 'modal-lg',
                ]);
                echo "<div id='modalContent'></div>";
                Modal::end();

                $gridColumns = [
                    ['class' => 'yii\grid\SerialColumn'],
                    
                    'no_srt',
                    ['attribute' => 'tgl_srt',
                        'format' => ['date', 'php:d M Y'],
                        'filter' => kartik\widgets\DatePicker::widget([
                            'model' => $searchModel,
                            'attribute' => 'tgl_srt',
                            'options' => ['placeholder' => 'masukkan tanggal'],
                            'pluginOptions' => [
                                'format' => 'yyyy-mm-dd',
                                'todayHighlight' => true
                            ]
                        ])
                    ],
                    [
                        'attribute' => 'tujuan_id',
                        'filter' => $tujuan,
                        'value' => function ($data) {
                            return $data->tujuanunit->nm_tujuan;
                        }
                    ],
                    [
                        'attribute' => 'status_srt',
                        'filter' => $status,
                        'value' => function ($data) {
                            return $data->status->nm_status;
                        }
                    ],
                    [
                        'format' => 'raw',
                        'header' => 'View',
                        'value' => function ($data) {
                            return Html::a("<i class='fa fa-eye'></i>", ['view', 'id' => $data->id], ['class' => 'btn btn-success', 'title' => 'View']); // ubah ini
                        },
                            ],
                            [
                                'format' => 'raw',
                                'header' => 'Edit',
                                'value' => function ($data) {
                                    if ($data->status_srt == '1') {
                                        return Html::a("<i class='fa fa-pencil'></i>", ['update', 'id' => $data->id], ['class' => 'btn btn-primary', 'title' => 'Ubah']); // ubah ini
                                    } else {
                                        return "-";
                                    }
                                },
                                    ],
                                    [
                                        'format' => 'raw',
                                        'header' => 'Kirim',
                                        'value' => function ($data) {
                                            if ($data->status_srt == '1') {
                                                return Html::a("<i class='fa fa-forward'></i>", ['prokirim', 'id' => $data->id], ['class' => 'btn btn-danger', 'title' => 'kirim ke Bagian Umum']); // ubah ini
                                            } else {
                                                return "-";
                                            }
                                        },
                                            ],
//                                ['class' => 'yii\grid\ActionColumn']
                                        ];
                                        $fullExportMenu = ExportMenu::widget([
                                                    'dataProvider' => $dataProvider,
                                                    'columns' => $gridColumns,
                                                    'target' => ExportMenu::TARGET_POPUP,
//            'messages'=> 'downloadProgress',
                                                    'fontAwesome' => true,
                                                    //'pjaxContainerId' => 'kv-pjax-container',
                                                    'dropdownOptions' => [
                                                        'label' => 'Full',
                                                        'class' => 'btn btn-danger',
                                                        'itemsBefore' => [
                                                            '<li class="dropdown-header">Export All Data</li>',
                                                        ],
                                                    ],
                                        ]);
                                        echo GridView::widget([
                                            'dataProvider' => $dataProvider,
                                            'filterModel' => $searchModel,
                                            'columns' => $gridColumns,
                                            'pjax' => false,
                                            'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
                                            'panel' => [
                                                'type' => GridView::TYPE_PRIMARY,
                                                'heading' => '<h3 class="panel-title"><i class="fa fa-truck"></i> Pengiriman Paket Pos</h3>',
                                            ],
// your toolbar can include the additional full export menu
                                            'toolbar' => [

                                                $fullExportMenu,
                                                ['content' =>
                                                    Html::a('<i class="glyphicon glyphicon-plus"></i> Rekam ', ['create'], ['class' => 'btn btn-success']) . ' ' .
//            Html::button('<i class="glyphicon glyphicon-plus"></i> Create Surat Masuk', ['value' => Url::to('index.php?r=surat-masuk/create'), 'class' => 'btn btn-success', 'id' => 'modalButton']) . ' ' .
                                                    Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], [
                                                        'data-pjax' => 0,
                                                        'class' => 'btn btn-info',
                                                        'title' => Yii::t('kvgrid', 'Refresh')
                                                    ])
                                                ],
                                            ],
                                            'export' => [
                                                'messages' => 'allowPopups',
                                            ],
                                        ]);
                                        ?>
                                    </div>

                                </div>
                                <?php
                                $this->registerJs("
    $('#myModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var modal = $(this)
        var title = button.data('title') 
        var href = button.attr('href') 
        modal.find('.modal-title').html(title)
        modal.find('.modal-body').html('<i class=\"fa fa-spinner fa-spin\"></i>')
        $.post(href)
            .done(function( data ) {
                modal.find('.modal-body').html(data)
            });
        })
");
                                ?>
    </div>
</div>
