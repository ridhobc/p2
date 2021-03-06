<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NoticeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('dash', 'Notice List');
$this->params['breadcrumbs'][] = ['label' => Yii::t('dash', 'Dashboard'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="col-xs-12">
  <div class="col-lg-4 col-sm-4 col-xs-12 no-padding"><h3 class="box-title"><i class="fa fa-th-list"></i> <?php echo Yii::t('dash', 'Notice List') ?></h3></div>
  <div class="col-xs-4"></div>
  <div class="col-lg-4 col-sm-4 col-xs-12 no-padding" style="padding-top: 20px !important;">
	<div class="col-xs-4 left-padding">
        
	</div>
	<div class="col-xs-4 left-padding">
	
	</div>
	<div class="col-xs-4 left-padding">
	<?= Html::a(Yii::t('dash', 'ADD'), ['create'], ['class' => 'btn btn-block btn-success']) ?>
	</div>
  </div>
</div>

<div class="col-xs-12" style="padding-top: 10px;">
   <div class="box">
      <div class="box-body table-responsive">
	<div class="notice-index">
	<?php \yii\widgets\Pjax::begin([
		'enablePushState' => false,
		]); ?>

	    <?= GridView::widget([
		'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,
		'summary'=>'',
		'columns' => [
		    ['class' => 'yii\grid\SerialColumn'],

		   // 'notice_id',
		    'notice_title',
		    'notice_description',		
		    [
			'attribute' => 'notice_user_type',
			'value' => function ($model) {
						return ((($model->notice_user_type == '1') ? "Info" : "General" )); 
					},
			'filter' => ['0' => 'General','1' => 'Info'],
		   ],
		   [
			'attribute' => 'notice_date',
			'value' => function($data) {
				return Yii::$app->formatter->asDate($data->notice_date);
				},
			'filter' => \yii\jui\DatePicker::widget([
		            'model'=>$searchModel,
		            'attribute'=>'notice_date',
		            'clientOptions' =>[
		                'dateFormat' => 'dd-mm-yyyy',
		                'changeMonth'=> true,
		                'changeYear'=> true,
				'defaultValue'=>null,
				'defaultDate'=> null,
				'yearRange'=>'1900:'.(date('Y')+1)],
			     'options'=>[
				'id' => 'notice_date',
		                'value' => NULL,
				'class' => 'form-control'
		              ],
		        ]),
			'format' => 'html',	
		    ],
		    [
				'class' => '\pheme\grid\ToggleColumn',
				'attribute'=>'is_status',
				'enableAjax' => true,
				'filter'=>['1'=>'Deactive', '0'=>'Active']
		  ],
		    ['class' => 'backend\components\CustomActionColumn'],
		],
	    ]); ?>
	<?php \yii\widgets\Pjax::end(); ?>
	</div>
      </div>
    </div>
</div>
