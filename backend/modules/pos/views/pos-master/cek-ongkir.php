<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>


<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-suitcase "></i> <?php echo Yii::t('app', 'Cek Ongkos Kirim'); ?></h3>
    </div>
    <div class="box-body">
        <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>
        <div class="row">
            <div class="col-xs-6 col-lg-6">
                <div class="box box-solid box-info col-xs-6 col-lg-6 no-padding">
                    <div class="box-header with-border">
                        <h4 class="box-title"><i class="fa fa-info-circle"></i> <?php echo Yii::t('app', 'Silahkan Isi Detail Kota'); ?></h4>
                    </div>
                    <div class="box-body">

                        <div class="row">                        
                            <div class="col-md-4">
                                <?php
                                $data = \yii\helpers\ArrayHelper::map(
                                                \backend\modules\pos\models\PosPropinsiKota::find()->select(['id', 'name'])
                                                        ->asArray()->all(), 'id', 'name');
                                echo $form->field($model, 'origin')->widget(\kartik\widgets\Select2::classname(), [
                                    'options' => ['placeholder' => 'Select for a city ...'],
                                    'data' => $data,
                                ]);
                                ?>
                            </div>
                            <div class="col-md-4">
                                <?php
                                echo $form->field($model, 'destination')->widget(\kartik\widgets\Select2::classname(), [
                                    'options' => ['placeholder' => 'Select for a city ...'],
                                    'data' => $data,
                                ]);
                                ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">

                                <?= $form->field($model, 'weight')->textInput(['value' => 1000]) ?>
                            </div> 
                            <div class="col-md-4">

                                <?=
                                $form->field($model, 'courier')->dropDownList([
                                    'jne' => 'JNE',
                                    'pos' => 'POS',
                                    'tiki' => 'TIKI',
                                ])
                                ?>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-xs-6 col-xs-6">
                                <?=
                                Html::submitButton('Cek Ongkir', [
                                    'class' => 'btn btn-success'
                                ])
                                ?>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-lg-6">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <i class="fa fa-truck"></i> Hasil Pengecekan

                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body container-items"><!-- widgetContainer --><div class="row">
                            <div class="form-group">            

                                <div class="col-sm-12">
                                    <?php
                                    if (!empty($results)) {
                                        echo "<table class='table'>";
                                        foreach ($results as $result) {
//        print_r($result->query);
//        print_r($result->status);
//        print_r($result->origin_details);
//        print_r($result->results);
                                            foreach ($result->results[0]->costs as $costs) {
                                                echo '<tr><th>service</th><th>:</th><th>' . $costs->service . '</th></tr>';
                                                echo '<tr><td>description</td><td>:</td><td>' . $costs->description . '</td></tr>';
                                                echo '<tr><td>cost</td><td>:</td><td>' . $costs->cost[0]->value . '</td></tr>';
                                                echo '<tr><td>etd</td><td>:</td><td>' . $costs->cost[0]->etd . '</td></tr>';
                                            }
                                            echo "</table>";
                                        }
                                    }else {
                                      echo "<table class='table'><tr><td colspan=3>Silahkan masukkan kota pencarian</td></tr></table>";
                                    }
                                    ?>
                                </div>
                            </div>


                        </div>
                    </div>

                </div>
            </div>
        </div>  
    </div>
    <?php ActiveForm::end(); ?>
</div>
</div>

