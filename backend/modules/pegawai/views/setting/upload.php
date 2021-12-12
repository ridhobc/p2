<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
use kartik\grid\GridView;
use kartik\dynagrid;
use kartik\export\ExportMenu;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\modules\spd\models\SpdSuratTugas */

$this->title = "Upload Update Pegawai";
$this->params['breadcrumbs'][] = ['label' => 'Upload Detail Barang PSP', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="col-md-8">
    <div class="row">
        <div class="col-lg-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-upload"></i> <?php echo Yii::t('stu', 'Upload '); ?></h3>
                    <div class="box-tools pull-right">

                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            Sebelum di lakukan pengimporan data, lakukan formating data excel dengan struktur data sebagai berikut :<br/>
                            |No | Kode Barang | Nup | <br/>
                            Catatan : Untuk Kode Barang tidak boleh ada spasi atau tanda ".", sebaiknya formatnya seperti contoh ini : 2010104001
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">

                            <span class="text text-fuchsia">Pilih File Excel</span>
                            <?php
                            $form = \yii\bootstrap\ActiveForm::begin([
                                        'options' => ['enctype' => 'multipart/form-data'],
                                        'action' => ['import'],
                            ]);
                            echo \kartik\widgets\FileInput::widget([
                                'name' => 'import',
                                'pluginOptions' => [
                                    'previewFileType' => 'any',
                                    'uploadLabel' => "Import",
                                ]
                            ]);
                            \yii\bootstrap\ActiveForm::end();
                            ?>
                        </div> 
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
<div class="col-md-12">

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
//        [
//         'attribute'=>'UrlFoto',
//        'label'=>'Image',
//        'format'=>'html',
//
//         'value' => function ($data) {
//                $url = \Yii::getAlias($data['UrlFoto']);
//                return Html::img($url, ['alt'=>'foto','width'=>'50','height'=>'50']);
//         }
//         ],
        

        'NmPegawaiSk',
        'Nip',
        'NmJenisJabatan',
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
            'heading' => '<h3 class="panel-title"><i class="fa fa-truck"></i> Pengiriman Pos</h3>',
        ],
// your toolbar can include the additional full export menu
        'toolbar' => [

            $fullExportMenu,
            ['content' =>
                Html::a('<i class="glyphicon glyphicon-upload"></i> Update via Excel ', ['upload'], ['class' => 'btn btn-success']) . ' ' .
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




