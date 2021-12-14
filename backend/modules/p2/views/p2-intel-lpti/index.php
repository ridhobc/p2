<?php

use yii\helpers\Html;
use backend\modules\psp\models\Psp;
use miloschuman\highcharts\Highcharts;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use kartik\editable\Editable;
use kartik\dynagrid;
use kartik\export\ExportMenu;
use yii\helpers\Url;
use kartik\money\MaskMoney;

$this->title = Yii::t('app', 'Laporan Pelaksanaan Tugas Intelijen');
$this->params['breadcrumbs'][] = $this->title;
$this->registerCss(".disp-count{cursor:default;} .disp-count:hover {background-color:none !important}");
?>

<?php

Modal::begin([
    'header' => '<h4>PSP</h4>',
    'id' => 'myModal',
    'size' => 'modal-lg',
]);
echo "<div id='modalContent'></div>";
Modal::end();

$gridColumns = [
    ['class' => 'yii\grid\SerialColumn'],
    [
        'class' => 'kartik\grid\ExpandRowColumn',
        'value' => function ($model, $key, $index, $column) {
            return GridView::ROW_COLLAPSED;
        },
        'detail' => function ($model, $key, $index, $column) {
             $modelstpi = \backend\modules\p2\models\P2IntelStpi::find()
                    ->where(['id' => $model->stpi_id])
                    ->one();
            $searchModel = new backend\modules\p2\models\P2IntelStpiPetugasSearch([
                'id_intel_stpi' => $model->stpi_id,
            ]);

            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


            return YII::$app->controller->renderPartial('_stpi', [
                        'searchModel' => $searchModel,
                        'dataProvider' => $dataProvider,
                'modelstpi' => $modelstpi,
            ]);
        },
            ],
            'no_lpti',
            'tgl_lpti',
            'lpti_simpulan:ntext',
            'lpti_rekom:ntext',
            [
                'header' => 'View',
                'format' => 'raw',
                'value' => function ($data) {
                    return Html::a("<i class='fa fa-eye'></i>", ['view', 'id' => $data->id]); // ubah ini
                },
                    ],
                    [
                        'header' => 'Edit',
                        'format' => 'raw',
                        'value' => function ($data) {
                            return Html::a("<i class='fa fa-pencil'></i>", ['update', 'id' => $data->id]); // ubah ini
                        },
                            ],
                            [
                                'header' => 'Petugas',
                                'format' => 'raw',
                                'value' => function ($data) {
                                    return Html::a("<i class='fa fa-user'></i>", ['view', 'idx' => $data->id]); // ubah ini
                                },
                                    ],
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
                                        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-file"></i> Laporan Pelaksanaan Tugas Intelijen</h3>',
                                    ],
// your toolbar can include the additional full export menu
                                    'toolbar' => [

                                        $fullExportMenu,
                                        ['content' =>
                                            Html::a('<i class="glyphicon glyphicon-plus"></i> Rekam ', ['create'], ['class' => 'btn btn-success']) . ' ' .
////            Html::button('<i class="glyphicon glyphicon-plus"></i> Create Surat Masuk', ['value' => Url::to('index.php?r=surat-masuk/create'), 'class' => 'btn btn-success', 'id' => 'modalButton']) . ' ' .
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