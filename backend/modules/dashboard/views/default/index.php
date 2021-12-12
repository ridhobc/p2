<?php 
use yii\helpers\Html; 
use yii\helpers\Url;
$this->title = Yii::t('app', 'Dashboard Modules');
$this->params['breadcrumbs'][] = $this->title;
$this->registerCss(".popover{max-width:500px}");
?>

<style>
/*    .tab-content {
        padding:15px;
    }
    .box .box-body .fc-widget-header {
        background: none;
    }
    .popover{
        max-width:450px;   
    }*/
    .legend { list-style: none; }
    .legend li { float: left; margin-right: 10px; }
    .legend span { border: 1px solid #ccc; float: left; width: 12px; height: 12px; margin: 2px; }
    /* your colors */
    .legend .holiday { background-color: #00A65A; }
    .legend .importantnotice { background-color: #00C0EF; }
    .legend .meeting { background-color: #F39C12; }
    .legend .messages { background-color: #074979; }
</style>
<div class="box box-default">
	<div class="box-header with-border">
		<h3 class="box-title"><i class="glyphicon glyphicon-dashboard"></i> <?php echo Yii::t('app', 'Manage Users Dashboard') ?></h3>
	</div>
	<div class="box-body">

	<div class="row">
		<div class="col-md-6 col-sm-6 col-xs-12">
		      <div class="edusec-link-box">
		        <span class="edusec-link-box-icon bg-yellow"><i class="fa fa-envelope"></i></span>
		        <div class="edusec-link-box-content">
		          <span class="edusec-link-box-text"><?= Html::a(Yii::t('app', 'Massage Of The Day'), ['/dashboard/msg-of-day']);?></span>
		          <span class="edusec-link-box-number"><?php $msgOfDay = backend\modules\dashboard\models\MsgOfDay::find()->where(['is_status'=>0])->count(); echo Yii::t('app', 'Status').' : '; echo(($msgOfDay==1) ? Yii::t("app", "Active") : Yii::t("app", "Deactive")); ?></span>
			 <span class="edusec-link-box-desc"></span>
			  <span class="edusec-link-box-bottom"><?= Html::a('<i class="fa fa-plus-square"></i> '.Yii::t('app', 'Create New'), ['/dashboard/msg-of-day/create']); ?></span>
		        </div><!-- /.info-box-content -->
		      </div><!-- /.info-box -->
		</div>

		<div class="col-md-6 col-sm-6 col-xs-12">
		      <div class="edusec-link-box">
		        <span class="edusec-link-box-icon bg-teal"><i class="fa fa-clipboard"></i></span>
		        <div class="edusec-link-box-content">
		          <span class="edusec-link-box-text"><?= Html::a(Yii::t('app', 'Notice'), ['/dashboard/notice']);?></span>
		          <span class="edusec-link-box-number"><?= backend\modules\dashboard\models\Notice::find()->where(['is_status'=>0])->count(); ?></span>
			 <span class="edusec-link-box-desc"><?php echo Yii::t('app', 'Notice dan Info One Day One Info'); ?></span>
			  <span class="edusec-link-box-bottom"><?= Html::a('<i class="fa fa-plus-square"></i> '.Yii::t('app', 'Create New'), ['/dashboard/notice/create']); ?></span>
		        </div><!-- /.info-box-content -->
		      </div><!-- /.info-box -->
		</div>

	</div> <!-- /. End Row-->	

</div><!-- /.box-body -->
</div>

</div><!-- /.box-body -->
</div>
<!---End Event manager block--->

<?php
	yii\bootstrap\Modal::begin([
		'id' => 'eventModal',
		'header' => "<h3>Add Event</h3>",
	]);

	yii\bootstrap\Modal::end(); 
?>
