<?php

use kartik\export\ExportMenu;
use kartik\grid\GridView;
use kartik\dynagrid;
use kartik\helpers\Html;
use yii\bootstrap\Modal;
use yii\helpers\Url;

$this->title = 'User';
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
    [
        'attribute' => 'photo',
        'format' => 'html',
        'value' => function ($data) {
            return Html::img(Yii::getAlias('@web') . '/user/' . $data['photo'], ['width' => '70px']);
        },
            ],
            'name',
            'username',
            'nip',
            'email:email',
            'role',
            [
                'attribute' => 'status',
                'value' => function ($data) {
                    $status = [
                        '10' => 'Aktif',
                        '0' => 'Banned'
                    ];
                    return $status[$data->status];
                }
                    ],
                    ['class' => 'yii\grid\ActionColumn',
                        'header' => 'Update',
                        'template' => '{update} {view} '
                    ],
                    [
                        'format' => 'raw',
                        'header' => 'Status',
                        'value' => function ($data) {
                            if (\Yii::$app->user->identity->role == 'admin') {
                                if ($data->status == 0) {
                                    return Html::a("Nonaktif", ['aktif', 'id' => $data->id], [
                                                'class' => 'btn btn-danger',
                                                'data' => [

                                                    'confirm' => 'User diaktifkan?',
                                                    'method' => 'post',
                                                ],
                                    ]);
                                } else {
                                    return Html::a("Aktif", ['banned', 'id' => $data->id], [
                                                'class' => 'btn btn-info',
                                                'data' => [
                                                    'confirm' => 'di non aktifkan?',
                                                    'method' => 'post',
                                                ],
                                    ]);
                                }
                            }
                        },
                            ],
                            [
                                'format' => 'raw',
                                'header' => 'Reset Password',
                                'value' => function ($data) {
                                    return Html::a(Html::encode(""), ['reset_password', 'id' => $data->id], ['class' => 'fa fa-cog fa-2x']);
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
            Html::a('Create User', ['create'], ['class' => 'btn btn-success']). ' ' .
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

