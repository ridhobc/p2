<?php

use kartik\export\ExportMenu;
use kartik\grid\GridView;
use kartik\dynagrid;
use kartik\helpers\Html;
use yii\bootstrap\Modal;
use yii\helpers\Url;

$this->title = 'Auto Number';
$this->params['breadcrumbs'][] = $this->title;

Modal::begin([
    'header' => '<h4>User</h4>',
    'id' => 'modal',
    'size' => 'modal-lg',
    'options' => [
        'id' => 'modal',
        'tabindex' => false // important for Select2 to work properly
    ],
]);
echo "<div id='modalContent'></div>";
Modal::end();

$gridColumns = [
    ['class' => 'yii\grid\SerialColumn'],
    'group',
    'number',
    'optimistic_lock',
    'update_time:datetime',
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
                'label' => 'Export To',
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
    'pjax' => true,
    'pjaxSettings' => [
        'neverTimeout' => true,
    ],
    'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-user"></i> User </h3>',
    ],
// your toolbar can include the additional full export menu
    'toolbar' => [

        $fullExportMenu,
        ['content' =>
//                                            Html::button('<i class="glyphicon glyphicon-plus"></i>  Create User', ['value' => Url::to('index.php?r=user/create'), 'class' => 'btn btn-success', 'id' => 'modalButton']) . ' ' .
            Html::a('Create User', ['create'], ['class' => 'btn btn-success']) . ' ' .
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

