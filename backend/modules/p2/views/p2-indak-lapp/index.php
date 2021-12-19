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

$this->title = Yii::t('app', 'Lembar Analisi Pra Penindakan');
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
        'attribute' => 'kd_kantor',
        'value' => function ($data) {
            return $data->kantor->nm_kantor;
        }
    ],
    'no_lapp',
    'tgl_lapp',
    'li_id',
    'ni_id',
    'nhi_id',
    //'pelaku_cek',
    //'pelaku_keterangan',
    //'pelanggaran_cek',
    //'pelanggaran_keterangan',
    //'locus_cek',
    //'locus_keterangan',
    //'tempus_cek',
    //'tempus_keterangan',
    //'prosedural_cek',
    //'prosedural_keterangan',
    //'sdm_cek',
    //'sdm_keterangan',
    //'sarpras_cek',
    //'sarpras_keterangan',
    //'anggaran_cek',
    //'anggaran_keterangan',
    'layak_operasi_cek',
    //'mandiri_cek',
    //'mandiri_keterangan',
    //'dgn_bantuan_cek',
    //'dgn_bantuan_keterangan',
    //'pelimpahan_cek',
    //'pelimpahan_keterangan',
    //'pelimpahan_bantuan_cek',
    //'pelimpahan_bantuan_keterangan',
    //'perbantuan_insta_lain_cek',
    //'perbantuan_insta_lain_keterangan',
    'tidak_layak_operasi_cek',
    //'layak_patroli_cek',
    //'layak_patroli_keterangan',
    //'tidak_layak_patroli_cek',
    //'tidak_layak_patroli_keterangan',
    //'kesimpulan_lapp:ntext',
    //'petugas_id',
    //'pejabat_id',
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
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-file"></i> Lembar Informasi</h3>',
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