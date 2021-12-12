<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = Yii::t('app', 'Dashboard');
$this->params['breadcrumbs'][] = $this->title;
?>
<script>
    $(document).ready(function () {
        $('.tab-content').slimScroll({
            height: '300px'
        });
    });
    $(document).ready(function () {
        $('#coursList').slimScroll({
            height: '250px'
        });
    });
</script>
<style>
    .tab-content {
        padding:15px;
    }
    .box .box-body .fc-widget-header {
        background: none;
    }

    .fc-content {
        /*font-size: 13px;*/
        font-weight: bold;
        padding: 2px;
    }

    .closon {
        position: absolute;
        top: -2px;
        right: 0;
        cursor: pointer;
        background-color: #FFF
    }
    .popover{
        max-width:450px;   
    }
    .legend { list-style: none; }
    .legend li { float: left; margin-right: 10px; }
    .legend span { border: 1px solid #ccc; float: left; width: 12px; height: 12px; margin: 2px; }
    /* your colors */
    .legend .khusus { background-color: #00A65A; }
    .legend .umum { background-color: #00C0EF; }
    .legend .permintaan { background-color: #F39C12; }
    .legend .lainnya { background-color: #074979; }
    
    .fc-day-number {
    font-size: 12px;
    font-weight: 100;
    padding-right: 5px;
}
</style>

<?php
yii\bootstrap\Modal::begin([
    'id' => 'eventModal',
    //'header' => "<div class='row'><div class='col-xs-6'><h3>Add Event</h3></div><div class='col-xs-6'>".Html::a('Delete', ['#'], ['class' => 'btn btn-danger pull-right', 'style' => 'margin-top:5px'])."</div></div>",
    'header' => "<h3>Tambah Ceramah</h3>",
]);

yii\bootstrap\Modal::end();
?>
<?php
$this->registerJs(
        "$(function() {
	$('.noticeModalLink').click(function() {
		$('#NoticeModal').modal('show')
		.find('#NoticeModalContent')
		.load($(this).attr('data-value'));
	});
});");

$this->registerJs(
        "$('body').on('click', function (e) {
    $('[data-toggle=\"popover\"]').each(function () {
        if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
            $(this).popover('hide'); 
        }
    });
});"
)
?>

<?php
yii\bootstrap\Modal::begin([
    'header' => '<h4><i class="fa fa-eye"></i> View Notice Details</h4>',
    'id' => 'NoticeModal',
]);
echo '<div id="NoticeModalContent"></div>';
yii\bootstrap\Modal::end();
?>

<!-- Main content -->


