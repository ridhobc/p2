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

$this->title = 'Tujuan Surat';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-default">
    <div class="box-header with-border ">
        <p>
            <?= Html::a('<i class="fa fa-home "></i> HOME', ['/pos/default/index'], ['class' => 'btn btn-success']) ?>    
            <?php // Html::a('<i class="fa fa-list"></i> Export Usulan Permohonan', ['ekspor-hapus'], ['class' => 'btn btn-default', 'target' => '_blank']) ?>
            <?php // Html::a('<i class="fa fa-play-circle-o"></i> Cek Eksekusi Rencana Penghapusan AADB', ['cek-rencana-hapus'], ['class' => 'btn btn-default', 'target' => '_blank']) ?>

        </p>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-12">
                <div class="pspdetail-index">

                    <?php
                    
                    $tujuan = \yii\helpers\ArrayHelper::map(backend\modules\pos\models\PosPropinsiKota::find()->all(), 'id', 'name');
                  
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
//                        
                        
                        'nm_tujuan',
                        'alamat_tujuan1',
                        'alamat_tujuan2',
                        'alamat_tujuan3',
                        'kota_tujuan',
                       
                        
                        
                        [
                            'attribute' => 'kota_tujuan_id',
                            'filter' => $tujuan,
                            'value' => function ($data) {
                                return $data->kotatujuan->name;
                            }
                        ],
                        [
                            'format' => 'raw',
                            'value' => function ($data) {

                                return Html::a("<i class='fa fa-eye'></i>", ['view', 'id' => $data->id], ['title' => 'Lihat']); // ubah ini
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
                                                    'heading' => '<h3 class="panel-title"><i class="fa fa-truck"></i> Tujuan Pengiriman</h3>',
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



</div>
