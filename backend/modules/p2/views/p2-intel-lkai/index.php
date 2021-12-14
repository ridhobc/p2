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

$this->title = Yii::t('app', 'Lembar Kerja Analisis Intelijen');
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
//    [
//        'class' => 'kartik\grid\ExpandRowColumn',
//        'value' => function ($model, $key, $index, $column) {
//            return GridView::ROW_COLLAPSED;
//        },
//        'detail' => function ($model, $key, $index, $column) {
//            $searchModel = new backend\modules\p2\models\P2IntelLppiDetailSearch([
//                'lppi_id' => $model->id,
//            ]);
//
//            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
//            $modellppi = \backend\modules\p2\models\P2IntelLppi::find()
//                    ->where(['id' => $model->id])
//                    ->one();
//
//
//            return YII::$app->controller->renderPartial('_lppi-detail', [
//
//                        'searchModel' => $searchModel,
//                        'dataProvider' => $dataProvider,
//                        'modellppi' => $modellppi,
//            ]);
//        },
//            ],
            [
                'attribute' => 'kd_kantor',
                'value' => function ($data) {
                    return $data->kantor->nm_kantor;
                }
            ],
            'no_lkai',
            'tgl_lkai',
            'dok_sumber_lppi',
            'no_lppi_id',
            'kesimpulan_lkai',
            'rekomendasi_lkai_id',
            
            ['class' => 'yii\grid\ActionColumn'],
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
                'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-file"></i> LKAI</h3>',
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