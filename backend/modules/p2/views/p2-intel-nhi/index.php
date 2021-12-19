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

$this->title = Yii::t('app', 'Nota Hasi Intelijen');
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
            $searchModel = new backend\modules\p2\models\P2IntelLkaiSearch([
                'id' => $model->lkai_id,
            ]);

            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            $modellkai = \backend\modules\p2\models\P2IntelLkai::find()
                    ->where(['id' => $model->lkai_id])
                    ->one();


            return YII::$app->controller->renderPartial('_lkai-detail', [

                        'searchModel' => $searchModel,
                        'dataProvider' => $dataProvider,
                        'modellkai' => $modellkai,
            ]);
        },
            ],
            [
                'attribute' => 'kd_kantor',
                'value' => function ($data) {
                    return $data->kantor->nm_kantor;
                }
            ],
            'no_nhi',
            'tgl_nhi',
            'sifat_nhi_id',
            'klasifikasi_nhi_id',
            'lkai_id',
            'kd_kantor_tujuan_nhi_id',
            'tempat_info',
            'tgl_info',
            'kantor_bc_info_id',
            //'kepabenanan_info_chek',
            //'nm_no_dok_kepabeanan',
            //'nm_sarkut_kepab',
            //'voy_nopol_sarkut_kepab',
            //'no_bl_awb',
            //'no_kontainer_merk_koli',
            //'nm_imp_eks_ppjk',
            //'npwp',
            //'jenis_jumlah_brg_kepab',
            //'data_lainnya_kepab',
            //'cukai_info_cek',
            //'nm_eks_pab_tpe',
            //'nm_penyalur',
            //'nm_tpe',
            //'no_nppbkc',
            //'nm_sarkut_cukai',
            //'voy_nopol_sarkut_cukai',
            //'jenis_jumlah_brg_cukai',
            //'data_lainnya_cukai',
            //'barang_tertentu_cek',
            //'nm_no_dok_brg_tertentu',
            //'nm_sarkut_brg_tertentu',
            //'voy_nopol_brg_tertentu',
            //'no_bl_awb_brg_tertentu',
            //'no_kontainer_merk_koli_brg_tertentu',
            //'org_badan_hukum',
            //'jenis_jumlah_brg_brg_tertentu',
            //'data_lainnya_cukai_brg_tertentu',
            //'indikasi_info:ntext',
            //'pejabat_id',
            //'tembusan_kantor',
            //'created_at',
            //'created_by',
            //'updated_at',
            //'updated_by',
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
                'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-file"></i> NHI</h3>',
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